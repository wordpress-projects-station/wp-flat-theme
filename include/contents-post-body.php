
<h2 class="h2">
    <?php echo $post->post_title ?>
</h2>

<?php 
    if( get_theme_mod( 'post_banner_settings') ) {

        $post_banner_url = get_the_post_thumbnail_url( $post->ID );

        if($post_banner_url)
        echo '<div style="height:40vh; background: url('.$post_banner_url.') center/cover;"></div>';

        else
        echo '<div style="height:40vh; background: url('.bloginfo('template_directory').'/adds/404IMAGE.PNG) center/cover;"></div>';

    }
?>

<?php echo get_post_field('post_content', $post->ID); ?>