<? if( is_category() && !is_category('blog') ) { ?>
    
    <p class="h1">Category Posts :</p>

<? } else if( is_tag() ) { ?>

    <p class="h1">Posts whit Tag :</p>
        
<? } else  { ?> 

    <p class="h1">Posts of Blog</p>

<?php } ?>

<?php if ( have_posts() ){ ?>

    <div class="row -sm">
    <?php while ( have_posts() ) : the_post(); ?>

            <div class="col-sm-4 mb-4">

                <div class="archivie-post card mx-auto">
                    <?php $bkgUrl = get_the_post_thumbnail_url( get_the_ID() ); ?>
                    <?php if($bkgUrl!=''){ ?>
                        <div style="height:200px; background: url(<?php echo $bkgUrl;?>) center/cover;"></div>
                    <?php } else { ?>
                        <div style="height:200px; background: url(<?php bloginfo('template_directory'); ?>/adds/404IMAGE.PNG) center/cover;"></div>
                    <?php } ?>
                    <div class="card-body">
                        <h2 class="card-title"><?php the_title();?></h2>
                        <p class="card-date"><?php get_the_date();?></p>
                        <div class="card-text" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                            <p><?php the_excerpt();?></p>
                        </div>
                        <a class="btn card-link" href="<?php the_permalink();?>">Read now ...</a>
                    </div>
                </div>

            </div>

    <?php endwhile; ?>
    </div>

    <?php 

        $wp_query;
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

    ?>
</div>

<?php } else { ?>

    <p><?php esc_html_e( 'Sorry, contents not finded.' ); ?></p>

<?php } ?>
