<?/* Template Name: Standard-page */?>

<?php get_header();?>

    <h3>PAGE.PHP</h3>

    <?php get_template_part('include/component','contents-before'); ?>
    <?php echo get_post_field('post_content', $post->ID); ?>
    <?php get_template_part('include/component','contents-after'); ?>


<?php get_footer();?>