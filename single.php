
<?php

    $pagetype='post';
    
    get_header();

    include 'include/layout-wrap-start.php';

        if( contents_access($post) ) {

            include 'include/contents-post-body.php';

            echo '<hr>';

            include 'include/contents-post-meta.php';

            echo '<hr>';

            include 'include/contents-post-author.php';

            echo '<hr>';

            include 'include/contents-post-comments.php';

        }

    include 'include/layout-wrap-end.php'; 

    get_footer();

?>