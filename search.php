<?php 

    $pagetype='archive';

    get_header();

    include 'include/design-site-heading.php';

    include 'include/design-wrap-start.php';
    
        echo '<h3>SEARCH.PHP</h3>';

        if( contents_access($post) ) {

            include 'include/contents-search-body.php';

        }

    include 'include/design-wrap-end.php';

    include 'include/design-site-ending.php';

    get_footer();

?>