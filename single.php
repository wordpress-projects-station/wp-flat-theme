<?php get_header(); ?>

<h3>SINGLE.PHP</h3>

<?php include 'include/layout-wrap-start.php'; ?>

    <?php if( loop_contents($post) ) { ?>

        <?php include 'include/contents-post-body.php'; ?>

        <hr>

        <?php include 'include/contents-post-meta.php'; ?>

        <hr>

        <?php include 'include/contents-post-author.php'; ?>

        <hr>

        <?php include 'include/contents-post-comments.php'; ?>


    <?php }?>

<?php include 'include/layout-wrap-end.php'; ?>


<?php get_footer(); ?>