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


    function theme_file_name(){

        global $filename;
        return $filename = isset($template) ? basename($template) : '';

    }
    add_action ( 'wp', 'theme_file_name' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    function loop_page_types(){

        global $looptype; 

        // check if parent is shop
        $sub_page_of_shop = wp_get_post_parent_id() == get_page_by_path('shop')->ID ? true : false;

        // check membership

        if( is_product() ) {

            $folder = 'woocommerce';
            $type = 'product';

        }

        elseif( is_tax( 'product_cat' ) || is_product_category() || is_page( 'product-category' ) /*of woocommerce*/  ||  is_page( 'shop-categories')  /*permalink alterantive*/   || ( is_page( 'categories' ) && $sub_page_of_shop==true ) /*permalink "shop/categories"*/ ) {

            $folder = 'woocommerce';
            $type = is_page( 'categories' ) ? 'shop-categories' : 'archive-product' ; 
            // warning: -> archive-product is auto getted. go on woocommerce/archivie-product.php

        }

        elseif( is_page('product-catalog') ) {

            $folder = 'woocommerce';
            $type = 'shop-catalog';

        }

        elseif( ( is_page() && is_shop() ) || is_page('shop') ) {

            echo '<p style="padding:2px;background:white;position:absolute;left:0;">IT S SHOP FRONTPAGE</p>';
            // $folder = '';
            // $type = 'home';

        }

        elseif( is_front_page() || is_home() || is_page('front-page') ) {

            echo '<p style="padding:2px;background:white;position:absolute;left:0;">IT S A FRONTPAGE</p>';
            // $folder = '';
            // $type = 'home';

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

        elseif( is_page('blog') ) {

            $folder = 'wordpress';
            $type = 'blog-home';

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
            $folder = 'wordpress';
            $type = get_post_type();
            echo '<p>UNKNOWN: "'.$type.'"</p>';

        }

        $position = str_replace('adds/methods/','',(__DIR__.'/'.$folder));
        $path = $position.'/'.$type.'.php';

        return $looptype = [ 'folder'=>$folder, 'position'=> $position, 'path'=>$path, 'type'=>$type  ];

    }
    add_action ( 'wp', 'loop_page_types' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    function is_part_of_woo() {
        global $looptype;
        $result = $looptype['folder'] == 'woocommerce' ? true : false;
        return $result;
    }


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    function is_shop_home() {
        $result = (( is_page() && is_shop() ) || is_page('shop')) ? true : false;
        return $result;
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

    // currently off
    // function center_column_size(){
    //     global $mods;
    //     $occupiedcols = 0;
    //     if( $mods->sidebar_small_position != false ) $occupiedcols += 1; 
    //     if( ($mods->sidebar_shop_position != false && is_part_of_woo() ) || $mods->sidebar_big_position != false ) $occupiedcols += 3; 
    //     echo 'col col-xs-12 col-sm-12 col-md-'.(12-$occupiedcols);
    // }


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    function get_banner_background($POSTID){

        $bkgUrl = strtolower( get_the_post_thumbnail_url( $POSTID ) );
        $okExt  = ['gif','jpg','jpeg','png','webp','mp4'];
        $bkgExt = substr( $bkgUrl, strrpos($bkgUrl,'.') + 1);
        $bkgSrc = $bkgUrl && $bkgExt && in_array($bkgExt,$okExt) ? $bkgUrl : get_template_directory_uri().'/adds/404IMAGE.PNG';
        return 'background: url('.$bkgSrc.') center/cover;';

    }
    

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    function print_sidebar($sidebar){

        global $mods;

        if($sidebar == 'sidebar_big') {

            // fixing of cart widget's bug : https://stackoverflow.com/questions/50033227/is-there-any-way-to-display-the-woocommerce-mini-cart-on-my-wordpress-site
            ob_start(); woocommerce_mini_cart(); $minicart = ob_get_clean();
            ob_start(); dynamic_sidebar('sidebar_big'); $sidebar = ob_get_clean();
            $sidebar = preg_replace( '/<div class="widget_shopping_cart_content"><\/div>/', $minicart, $sidebar, 1 );

            echo '<aside class="'. ( $mods->sidebar_big_type == 'dynamic' ? 'col-xs-none col-sm-none col-md-none col-lg-3 col-xl-3 col-md-3 d-xs-none d-sm-none d-md-block d-lg-block d-xl-block' : /*static*/ 'bigsidebar col-3' ) .'">';
            echo $sidebar;
            echo '</aside>';

        }

        if($sidebar == 'sidebar_shop'){

            echo '<aside class="bigsidebar col-xs-none col-sm-none col-md-none col-lg-3 col-xl-3 col-md-3 d-xs-none d-sm-none d-md-block d-lg-block d-xl-block">';
                dynamic_sidebar('sidebar_shop');
            echo '</aside>';

        }

        if($sidebar == 'sidebar_small')
        {

            echo '<aside class="'. ( $mods->sidebar_small_type == 'dynamic' ? 'smallsidebar col-xs-1 col-sm-1 col-md-1 d-lg-none d-xl-none' : /*static*/ 'smallsidebar col-1' ) .'">';
                dynamic_sidebar('sidebar_small');
            echo '</aside>';

        }

    }


?>