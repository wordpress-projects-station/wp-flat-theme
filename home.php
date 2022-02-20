<?php get_header();?>

<p>THIS IS HOME.PHP</p>

<?php if ( have_posts() ){ ?>
    <?php while ( have_posts() ) : the_post(); ?>

     <?php echo get_post_field('post_content', $post->ID); ?>

    <?php $tags = get_the_tags(); foreach ($tags as $tag){?>
        <a class="tag_link badge" href="<?php echo get_tag_link($tag->term_id);?>"> <?php echo $tag->term_name;?> </a>
    <?php}?>

    <?php $categories = get_the_category(); foreach ($categories as $cat){?>
        <a class="category_link badge" href="<?php echo get_cat_link($cat->term_id);?>"> <?php echo $cat->term_name;?> </a>
    <?php}?>

    <?php endwhile; ?>
<?php } ?>

<?php get_footer();?>