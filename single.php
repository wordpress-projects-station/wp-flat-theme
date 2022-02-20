<?php get_header();?>

<h3>SINGLE.PHP</h3>

<?php include 'include/component-contents-before.php'; ?>

    <?php if ( have_posts() ) { ?>

        <!-- <pre><?php//print_r($post);?></pre> -->

        <?php if( ! $post->post_password ) { ?>

            <?php include 'include/component-post-contents.php' ?>

            <hr>

            <?php include 'include/component-post-meta.php' ?>

            <hr>

            <?php include 'include/component-post-author.php' ?>

            <hr>

            <?php include 'include/component-post-comments.php' ?>

        <?php } else { ?>

            <?php include 'include/component-no-accessible.php' ?>

        <?php } ?>

    <?php } else { ?>

        <?php include 'include/component-no-contents.php' ?>

    <?php } ?>

<?php include 'include/component-contents-after.php'; ?>


<?php get_footer();?>