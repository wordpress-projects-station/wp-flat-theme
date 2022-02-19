<div id="archivies-loop">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


        <div class="archivie-post card">
            <img class="card-img-top" src="<?php get_the_post_thumbnail_url( get_the_ID(), 'medium' );?>" alt="...">
            <div class="card-body">
                <h2 class="card-title"><?php the_title();?></h2>
                <p class="card-date"><?php get_the_date()();?></p>
                <p class="card-text"><?php the_expert();?></div>
                <a class="card-link" href="<?php the_permalink();?>">Read now ...</a>
            </div>
        </div>


    <?php endwhile; else : ?>

        <p><?php esc_html_e( 'Sorry, no posts finded.' ); ?></p>

    <?php endif; ?>
</div>

<div id="archivies-pagination">
    <?php
        $wp_query;
        $max= 99999;
        echo paginate_links([
            'base'=> str_replace($max,'%#%',esc_url( get_pagenum_link($max))),
            'format' => '?page=%#%',
            'current' => max(1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
        ])
    ?>
</div>