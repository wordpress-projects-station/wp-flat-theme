<?php get_header(); ?>

    <h3>PAGE.PHP</h3>

    <?php include 'include/layout-wrap-start.php'; ?>

        <?php if( loop_contents($post) ) { ?>

            <?php include 'include/contents-page-body.php'; ?>

        <?php } ?>
    
    <?php include 'include/layout-wrap-end.php'; ?>

<?php get_footer(); ?>