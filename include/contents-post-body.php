
<h2 class="h2">
    <?php echo $post->post_title ?>
</h2>

<?php $post_banner_url = get_the_post_thumbnail_url( $post->ID ); ?>

<?php if($post_banner_url!=''){ ?>

    <div style="height:40vh; background: url(<?php echo $post_banner_url;?>) center/cover;"></div>

<?php } else { ?>

    <div style="height:40vh; background: url(<?php bloginfo('template_directory'); ?>/adds/404IMAGE.PNG) center/cover;"></div>

<?php } ?>

<?php echo get_post_field('post_content', $post->ID); ?>