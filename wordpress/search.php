<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<div class="mb-5 border-bottom border-dark">

    <?
        $queryed = the_search_query();
        if(!$queryed) $queryed = basename($_SERVER['REQUEST_URI']);
        if(strpos($queryed,'?s=') !== false) $queryed = preg_replace('/\?s\=/', '',$queryed)
    ?>

    <p class="h1">Result for : <b>"<?= $queryed; ?>"</b></p>

</div>


<div class="row g-4">

    <? if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

        <? if ( ! post_password_required() ) { ?>

            <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

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

        <? } else { include __DIR__.'/contents/not-accessible.php'; } ?>

    <? } } else { include __DIR__.'/contents/not-in-database.php'; } ?>

</div>

<? //loop_pagination($wp_query); ?>
