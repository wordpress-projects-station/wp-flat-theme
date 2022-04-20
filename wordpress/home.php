<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<?

    $paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $per_page       = 6;

    $query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'paged' => $paged
    ]);
    
    ?><div class="row"><?

    if( $query->have_posts() ) {

        while( $query->have_posts() ) {

            $query->the_post();

                if ( ! post_password_required() ) {
                    
                    ?>

                        <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                            <div class="archivie-post card mx-auto">

                                <div style="height:200px; <?= get_banner_background(get_the_ID()); ?>"></div>

                                <div class="card-body">

                                    <h2 class="card-title"><? the_title();?></h2>
                                    <p class="card-date"><? get_the_date();?></p>
                                    <div class="card-text" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                                        <p><? the_excerpt();?></p>
                                    </div>
                                    <a class="btn card-link" href="<? the_permalink();?>">Read now ...</a>

                                </div>

                            </div>

                        </div>

                    <?

                } else { include __DIR__.'/contents/not-accessible.php'; }
                
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