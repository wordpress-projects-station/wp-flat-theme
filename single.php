
<?php

    $pagetype='post';
    
    get_header();

    include 'include/design-site-heading.php';

    include 'include/design-wrap-start.php';

        if( contents_access($post) ) {

            include 'include/contents-post-body.php';

            echo '<hr>';

            include 'include/contents-post-meta.php';

            echo '<hr>';

            include 'include/contents-post-author.php';

            echo '<hr>';

            include 'include/contents-post-comments.php';

        }

    include 'include/design-wrap-end.php'; 

    include 'include/design-site-ending.php';

    get_footer();

?>