
<?php

    echo '<hr><h3>YOU ARE IN SINGLE<h3><hr>';

    $pagetype='post';
    
    get_header();

    include 'include/design-site-heading.php';

    include 'include/design-wrap-start.php';

    if(is_woocommerce()) {

        echo '<p><b>woo condition...</b></p>';
        woocommerce_content();

    } else {

        if( contents_access($post) ) {

            include 'include/contents-post-body.php';

            echo '<hr>';

            include 'include/contents-post-meta.php';

            echo '<hr>';

            include 'include/contents-post-author.php';

            echo '<hr>';

            include 'include/contents-post-comments.php';

        }
    }

    include 'include/design-wrap-end.php'; 

    include 'include/design-site-ending.php';

    get_footer();

?>