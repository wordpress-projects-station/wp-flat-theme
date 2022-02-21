<?php

    // check contents looped
    add_action( 'wp_head', 'loop_contents' );
    function loop_contents(){
      if ( have_posts() ) {

          if( ! $post->post_password ) {
              return true;
          } else {
              include 'include/layout-no-accessible.php';
              return false;
          }

      } else {
          include 'include/layout-no-contents.php'; 
          return false;
      }
    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // paginate the looped list
    add_action( 'wp_loaded', 'loop_pagination' );
    function loop_pagination($wp_query){

        $max= 99999;

        $pages = paginate_links([
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type'  => 'array',
        ]);

        if( is_array( $pages ) ) {

            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="pagination-wrap"><ul class="pagination">';
            foreach ( $pages as $page ) {
                $page = str_replace('page-numbers','page-link page-numbers',$page);
                echo "<li class='page-item'>$page</li>";
            }
            echo '</ul></div>';

        }

        // original wp:
        // echo paginate_links([
        //     'base'=> str_replace($max,'%#%',esc_url( get_pagenum_link($max))),
        //     'format' => '?page=%#%',
        //     'current' => __( '<li>'max(1, get_query_var('paged') ),
        //     'total' => $wp_query->max_num_pages,
        //     'type' => 'string',
        // ])

    }


?>