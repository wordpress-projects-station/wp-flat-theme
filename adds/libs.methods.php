<?php

    add_action( 'wp_head', 'loop_page_type' );
    function loop_page_type(){

        if( is_product() ) {

            $mode = 'shop';
            $type = 'product';

        }

        elseif( is_tax( 'product_cat' ) || is_product_category() || is_product_category( 'all-categories' ) || is_page( 'all-categories' ) ) {

            $mode = 'shop';
            $type = get_queried_object()->parent > 0 ? 'category' : 'categories-list' ;

        }

        elseif( !is_woocommerce() && is_shop() ) {

            $mode = 'shop';
            $type = 'home';

        }
        elseif( is_shop() && is_woocommerce() ) {

            $mode = 'shop';
            $type = 'page';

        }
        
        elseif( is_cart() ) {

            $mode = 'shop';
            $type = 'cart';

        }
        elseif( is_checkout() ) {

            $mode = 'shop';
            $type = 'checkout';

        }

        elseif( is_account_page() || is_page('account') )
        {

            $mode = 'site';
            $type = 'account';

        }
        elseif( is_archive() || is_category() ) {

            $mode = 'site';
            $type = 'category';

        }

        elseif( is_search() || is_tag() ) {

            $mode = 'site';
            $type = 'search';

        }

        elseif( is_page() ) {

            $mode = 'site';
            $type = 'page';

        }

        elseif( is_post() ) {

            $mode = 'site';
            $type = 'post';

        }

        else {

            // return the pages unkonwed page type
            $mode = 'site';
            $type = get_post_type();

        }

        $path = '/../contents/'.$mode.'-'.$type.'.php';

        return ['mode'=>$mode,'type'=>$type,'path'=>$path];

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