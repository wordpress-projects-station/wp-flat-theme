<?php 

    echo '<hr><h3>YOU ARE IN SEARCH<h3><hr>';

    $pagetype='archive';

    get_header();

    include 'include/design-site-heading.php';

    include 'include/design-wrap-start.php';
    
        if( contents_access($post) ) {

            include 'include/contents-search-body.php';

        }

    include 'include/design-wrap-end.php';

    include 'include/design-site-ending.php';

    get_footer();

?>