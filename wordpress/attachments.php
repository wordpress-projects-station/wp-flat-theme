<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<? global $post; ?>

<!-- 
---- ATTACHED IMAGE
--->
<main class="text-center">

    <h2 class="h2">
        <?= $post->post_title ?>
    </h2>
    
    <div class="mt-4 mb-4">
        <b><?= print_theme_lang("","Posted in date"); ?> : <?= get_post_field('post_date', $post->ID); ?></b>&nbsp;&nbsp;<?$categories = get_the_category(); if($categories){ ?>⋮&nbsp;&nbsp;<b><?= print_theme_lang("","Categories"); ?> :&nbsp;&nbsp;</b> <? foreach ($categories as $cat) {echo '<span class="car"><a class="btn btn-outline-primary btn-sm" href="'.get_category_link($cat->term_id).'"> '.$cat->name.' </a></span>&nbsp; ';}} $tags = get_the_tags(); if($tags) {?> &nbsp;&nbsp;⋮&nbsp;&nbsp;<b><?= print_theme_lang("","Arguments"); ?>  :&nbsp;</b> <? foreach ($tags as $tag) {echo '<span class="category"><a class="btn btn-primary btn-sm" href="'.get_tag_link($tag->term_id).'"> '.$tag->name.' </a></span>&nbsp; ';}}?>
    </div

    <? 
        if( $mods->header_banner_mode == 'in-body' )
        echo '<div style="height:40vh; '.get_banner_background(get_the_ID()).'"></div>';
    ?>

    <?= get_post_field('post_content', $post->ID); ?>

    <div>
        <?
            $img = wp_get_attachment_image_src( null , 'full' );
            echo $img ? '<img src="'.esc_url( $img[0] ).'" alt=" ... ">':null;
        ?>
    </div>

</main>