<?

    add_action( 'wp_head', 'loop_page_type' );
    function loop_page_type(){

        if( is_product() ) {

            $origin = 'wooc';
            $type = 'product';

        }

        elseif( is_tax( 'product_cat' ) || is_product_category() ||  is_page( 'categories' ) /*of theme*/ || is_page( 'product-category' ) /*of woocommerce*/ ) {

            $origin = 'wooc';
            $type =  is_page( 'categories' ) || is_page( 'product-category' ) ? 'categories-list' : 'category' ; //if main cat is first cat: get_queried_object()->parent == 0 ||

        }

        elseif( is_page() && is_shop() ) {

            $origin = 'wooc';
            $type = 'home';

        }

        elseif( is_shop() && is_woocommerce() ) {

            $origin = 'wooc';
            $type = 'page';

        }
        
        elseif( is_cart() ) {

            $origin = 'wooc';
            $type = 'cart';

        }

        elseif( is_checkout() ) {

            $origin = 'wooc';
            $type = 'checkout';

        }

        elseif( is_account_page() || is_page('account') )
        {

            $origin = 'wprs';
            $type = 'account';

        }

        elseif( is_search() || is_tag() ) {

            $origin = 'wprs';
            $type = 'search';

        }
        
        elseif( is_page() || is_singular() ) {

            $origin = 'wprs';
            $type = 'page';

        }

        elseif( is_single() || is_post() ) {

            $origin = 'wprs';
            $type = 'post';

        }

        elseif( is_archive() || is_category() ) {

            $origin = 'wprs';
            $type = 'category';

        }

        else {

            // return the pages unkonwed page type
            $origin = 'wprs';
            $type = get_post_type();

        }

        $path = str_replace('adds/','', (__DIR__.'/contents/'.$origin.'-'.$type.'.php') );

        return ['origin'=>$origin,'type'=>$type,'path'=>$path];

    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    function bootsrapped_breadcrumb() {

        function crumps($link,$label){ return '<li class="breadcrumb-item"><a href="'.$link.'">'.$label.'</a></li>'; }
        function iswrong($s){ return empty($s)||!$s?true:false; }

        // 1. get www.mysites.com/possiblesubdomain
        // 2. get /possiblesubdomain/otherpagespaths
        // 3. filter /possiblesubdomain/ fo get only usable paths

        $homepath = explode('/', home_url());
        $urlpaths = explode('/', preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']));
        $urlslugs = array_diff($urlpaths,$homepath);

        // 4. print home an loop printable paths

        $output .= '<nav aria-label="breadcrumb"><ol class="breadcrumb">';

            $output .= crumps( home_url(), 'home' );

            foreach ($urlslugs as $slug )
            {

                $slugurl = get_permalink( $slug ) ?: false;

                if ( iswrong($slugurl) )
                { 
                    
                    $slugurl = get_page_by_path( $slug )->guid ?: false;

                    if( iswrong($slugurl) )
                    {

                        $cID = get_term_by('slug', $slug, 'product_cat')->term_id | get_term_by('slug', $slug, 'category')->ID; if($cID == 0);
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
                                    echo $slug.': not fineded<br>';
    
                                }
                            }    
                        }
                    }
                }

                $output .= crumps( $slugurl , $slug );

            }

        $output .= '</ol></nav>';

        print $output;

    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // paginate the looped list
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

    //     // original wp:
    //     // echo paginate_links([
    //     //     'base'=> str_replace($max,'%#%',esc_url( get_pagenum_link($max))),
    //     //     'format' => '?page=%#%',
    //     //     'current' => __( '<li>'max(1, get_query_var('paged') ),
    //     //     'total' => $wp_query->max_num_pages,
    //     //     'type' => 'string',
    //     // ])

    // }

?>