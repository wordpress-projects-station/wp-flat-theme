<?php get_header(); ?>

    <h2>SEARCH.PHP</h2>

    <?php include 'include/layout-wrap-start.php'; ?>

    <?php if( loop_contents($post) ) { ?>

        <?php include 'include/contents-search-body.php'; ?>

    <?php } ?>

    <?php include 'include/layout-wrap-end.php'; ?>

<?php get_footer(); ?>