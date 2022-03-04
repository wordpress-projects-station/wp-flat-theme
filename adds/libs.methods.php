<?php

    add_action( 'wp_head', 'loop_page_type' );
    function loop_page_type(){

        if( is_product() ) {

            $origin = 'wooc';
            $type = 'product';

        }

        elseif( is_tax( 'product_cat' ) || is_product_category() || is_product_category( 'all-categories' ) || is_page( 'all-categories' ) ) {

            $origin = 'wooc';
            $type = get_queried_object()->parent > 0 ? 'category' : 'categories-list' ;

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

        elseif( is_search() || is_tag() ) {

            $origin = 'wprs';
            $type = 'search';

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