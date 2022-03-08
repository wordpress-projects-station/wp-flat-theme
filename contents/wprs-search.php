<?= 'SEI SULLA CONTENT SEARCH'; ?>
<div>

    <div class="mb-5 border-bottom border-dark">

        <p class="h1">Result for : <b>"<? echo the_search_query(); ?>"</b></p>

    </div>


    <div class="row">

        <? if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

            <? if ( ! post_password_required() ) { ?>

                <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

                    <div class="archivie-post card mx-auto">

                        <?php

                            $bkgUrl = get_the_post_thumbnail_url( get_the_ID() );

                            if($bkgUrl)
                            echo '<div style="height:200px; background: url('.$bkgUrl.') center/cover;"></div>';

                            else
                            echo '<div style="height:200px; background: url('.bloginfo('template_directory').'/adds/404IMAGE.PNG) center/cover;"></div>';

                        ?>

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

            <? } else { include 'include/not-accessible.php'; } ?>

        <? } } else { include 'include/not-in-database.php'; } ?>

    </div>

    <? loop_pagination($wp_query); ?>

</div>