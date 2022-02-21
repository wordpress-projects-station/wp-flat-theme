<div>

    <div class="mb-5 border-bottom border-dark">
        <p class="h1">Ricerca per: <b>"<?php echo the_search_query(); ?>"</b></p>
    </div>

    <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>

                <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

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

    <?php loop_pagination($wp_query); ?>

</div>