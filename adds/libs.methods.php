<?

    function generateKeywords() {

        $site_excerpt   = wp_filter_nohtml_kses(get_the_excerpt());
        $site_description = get_bloginfo( 'description' );

        $site_content = $site_excerpt ? $site_excerpt : $site_description;

        $banned = [
            /*code*/ '&nbsp;','&ldquo;','&hellip','[...]',
            /*eng*/  'the','to','i','am','is','are','he','she','a','an','and','here','there','can','could','were','has','have','had','been','welcome','of','home','&nbsp;','&ldquo;','words','into','this','there',
            /*ita*/  'di','a','da','in','con','su','per','tra','fra','ad','un','un\'','non','uno','una','il','lo','la','i','gli','le','qui','qua','questo','quello','o','oppure','anche','che','chi','cosa','come','quando','perchè','per'
        ];

        $symbols = [' ',',','.' ,';',':','_','-','+','*','/','<','>','\\','\'','\"','\"','(',')','[',']','{','}','!','?','$','£','ç'];

        $lowerstring    = strtolower($site_content);
        $no_tags        = strip_tags($lowerstring);
        $no_symbols     = str_replace( $symbols, ' ', $no_tags);
        $no_spaced      = preg_replace('/\s+/', ',', $no_symbols);
        $cleaned        = preg_replace('/[^A-Za-z0-9\s\/\-\.\,]/', '', $no_spaced);
        $wordslist      = explode(',', get_option( 'blogname' ).','.get_the_title().','.$cleaned);

        $final = [];
        
        foreach($wordslist as $word) {

            if( strlen($word) >= 4 && ! in_array( $word, $banned ) )
            array_push($final,$word);

        }

        return implode(',', $final);

    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    add_action ( 'wp', 'theme_file_name' );
    function theme_file_name(){

        global $filename;
        return $filename = isset($template) ? basename($template) : '';

    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    add_action ( 'wp', 'loop_page_types' );
    function loop_page_types(){

        global $looptype; 

        if( is_product() ) {

            $folder = 'woocommerce';
            $type = 'product';

        }

        elseif( is_tax( 'product_cat' ) || is_product_category() || is_page( 'categories' ) /*of theme*/ || is_page( 'product-category' ) /*of woocommerce*/ ) {
            $folder = 'woocommerce';
            $type =  is_page( 'categories' ) || is_page( 'product-category' ) ? 'shop-categories' : 'shop-category' ; //if main cat is first cat: get_queried_object()->parent == 0 ||

        }

        elseif( is_page() && is_shop() ) {

            $folder = 'woocommerce';
            $type = 'home';

        }

        elseif( is_shop() && is_woocommerce() ) {

            $folder = 'woocommerce';
            $type = 'page';

        }
        
        elseif( is_cart() ) {

            $folder = 'woocommerce';
            $type = 'cart';

        }

        elseif( is_checkout() ) {

            $folder = 'woocommerce';
            $type = 'checkout';

        }


        // wordpress
        
        elseif( is_account_page() || is_page('account') || is_page('profile') )
        {

            $folder = 'wordpress';
            $type = 'account';

        }

        elseif( is_search() || is_tag() ) {

            $folder = 'wordpress';
            $type = 'search';

        }

        elseif( is_attachment() ) {

            $folder = 'wordpress';
            $type = 'attachments';

        }

        elseif( is_single() /*|| is_post()*/ ) {

            $folder = 'wordpress';
            $type = 'post';

        }

        // elseif( is_page( 'categories' ) /*of theme*/ || is_page( 'product-category' ) /*of woocommerce*/  ) {
            
        //     echo 'shop-categories';
        //     $folder = 'woocommerce';
        //     $type = 'shop-categories';

        // }

        else if(is_tax( 'product_cat' ) || is_product_category() ) {

            echo 'shop-category';
            $folder = 'woocommerce';
            $type = 'shop-category';

        }

        elseif( is_page() || is_singular() ) {

            $folder = 'wordpress';
            $type = 'page';

        }

        elseif( is_archive() || is_category() ) {

            $folder = 'wordpress';
            $type = 'category';

        }

        else {

            // return the pages unkonwed page type
            echo 'ALL TYPES';
            $folder = 'wordpress';
            $type = get_post_type();

        }

        $position = str_replace('adds/','',(__DIR__.'/'.$folder));
        $path = $position.'/'.$type.'.php';
        
        return $looptype = [ 'folder'=>$folder, 'position'=> $position, 'path'=>$path, 'type'=>$type  ];

    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    function bootsrapped_breadcrumb() {

        function crumps($link,$label,$mute){ return '<li class="breadcrumb-item"><a class="text-decoration-none '.$mute.'" href="'.$link.'">'.$label.'</a></li>'; }
        function iswrong($s){ return empty($s)||!$s?true:false; }

        function getGuid($s) {
            $list = (array)get_page_by_path($s);
            foreach ($list as $k => $v){if($k=='guid'){return $v;}}
        }

        function getTermID($s) {
            $list = (array)get_term_by('slug', $s, 'product_cat');
            foreach ($list as $k => $v){if($k=='term_id'){return $v;}}
        }

        function getCatID($s) {
            $list = (array)get_term_by('slug', $s, 'category');
            foreach ($list as $k => $v){if($k=='ID'){return $v;}}
        }

        // 1. get www.mysites.com/possiblesubdomain
        // 2. get /possiblesubdomain/otherpagespaths
        // 3. filter /possiblesubdomain/ fo get only usable paths

        $homepath = explode('/', home_url());
        $urlpaths = explode('/', preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']));
        $urlslugs = array_diff($urlpaths,$homepath);
        $slugsqnt = count($urlslugs);

        // 4. print home an loop printable paths
        $output = '';

        $output .= '<nav aria-label="breadcrumb"><ol class="breadcrumb">';

            $muted = '';
            $output .= crumps( home_url(), 'home', $muted);

            $i=0; foreach ($urlslugs as $slug )
            {

                $slugurl = get_permalink( $slug ) ?: false;

                if ( iswrong($slugurl) )
                { 

                    $slugurl = getGuid($slug)?:false;

                    if( iswrong($slugurl) )
                    {

                        $cID = getTermID($slug) | getCatID($slug); if($cID == 0);
                        $slugurl = $cID>0 ? get_category_link($cID) : false ;
                    
                        if( iswrong($slugurl) )
                        {

                            global $wpdb; $pID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = %s", $slug));
                            $slugurl = get_permalink( $pID ) ?: false;
                            
                            if( iswrong($slugurl) )
                            {

                                $slugurl =  NULL; echo ''.$slug.': fail in last... WHAT TYPE IS IT? <br>';

                                if( iswrong($slugurl) )
                                {
    
                                    $slugurl = home_url().'/404/';
                                    echo $slug.'undefined';
    
                                }
                            }    
                        }
                    }
                }
                
                if(++$i==$slugsqnt){$muted='text-muted';}

                $output .= crumps( $slugurl , $slug , $muted);

            }

        $output .= '</ol></nav>';

        echo $output;


    }


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    function get_banner_background($POSTID){

        $bkgUrl = strtolower( get_the_post_thumbnail_url( $POSTID ) );
        $okExt  = ['gif','jpg','jpeg','png','webp','mp4'];
        $bkgExt = substr( $bkgUrl, strrpos($bkgUrl,'.') + 1);
        $bkgSrc = $bkgUrl && $bkgExt && in_array($bkgExt,$okExt) ? $bkgUrl : get_template_directory_uri().'/adds/404IMAGE.PNG';
        return 'background: url('.$bkgSrc.') center/cover;';

    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // add_action( 'wp_loaded', 'loop_pagination' );
    // function loop_pagination($wp_query){

    //     $max= 99999;

    //     $pages = paginate_links([
    //         'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    //         'format' => '?paged=%#%',
    //         'current' => max( 1, get_query_var('paged') ),
    //         'total' => $wp_query->max_num_pages,
    //         'type'  => 'array',
    //     ]);

    //     if( is_array( $pages ) ) {

    //         $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    //         echo '<div class="pagination-wrap"><ul class="pagination">';
    //         foreach ( $pages as $page ) {
    //             $page = str_replace('page-numbers','page-link page-numbers',$page);
    //             echo "<li class='page-item'>$page</li>";
    //         }
    //         echo '</ul></div>';

    //     }

    //     // folderal wp:
    //     // echo paginate_links([
    //     //     'base'=> str_replace($max,'%#%',esc_url( get_pagenum_link($max))),
    //     //     'format' => '?page=%#%',
    //     //     'current' => __( '<li>'max(1, get_query_var('paged') ),
    //     //     'total' => $wp_query->max_num_pages,
    //     //     'type' => 'string',
    //     // ])

    // }

    ?>