<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<?

    $paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $per_page       = 6;

    $query = new WP_Query([
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'paged' => $paged
    ]);
    
    ?><div class="row g-4"><?

    if( $query->have_posts() ) {

        while( $query->have_posts() ) { 

            $query->the_post();

            $link       = get_the_permalink(get_the_ID());
            $banner     = get_banner_background(get_the_ID());
            $title      = get_the_title();
            $date       = get_the_date();
            $excerpt    = get_the_excerpt();

            ?>

                <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                    <? include get_template_directory().'/elements/box-card.php' ?>

                </div>

            <?

        }

    } else { include __DIR__.'/contents/not-in-database.php'; }
        

    ?></div><?

    $pages = paginate_links( [
        'base'      => str_replace( 9999, '%#%', esc_url( get_pagenum_link( 9999 ) ) ),
        'total'     => $query->max_num_pages,
        'current'   => max( 1, get_query_var('paged') ),
        'format'    => '?paged=%#%',
        'type'      => 'array',
    ] );

    if( is_array( $pages ) ) {

        echo '<div class="d-flex justify-content-center"><nav aria-label="Page navigation"><ul class="pagination">';

        foreach ( $pages as $page )
        echo '<li class="page-item">'.preg_replace('/page-numbers/','page-numbers page-link',$page).'</li>';

        echo '</ul></nav></div>';
    }

    wp_reset_postdata();

?>