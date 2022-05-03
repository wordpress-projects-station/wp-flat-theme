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

            <?
                $link       = get_the_permalink(get_the_ID());
                $banner     = get_banner_background(get_the_ID());
                $title      = get_the_title();
                $date       = get_the_date();
                $excerpt    = get_the_excerpt();
            ?>

            <? include get_template_directory().'/elements/box-contents.php' ?>

        <? } else { include get_template_directory().'/elements/box-not-accessible.php'; } ?>

    <? } } else { include get_template_directory().'/elements/box-not-in-database.php'; } ?>

</div>

<? //loop_pagination($wp_query); ?>
