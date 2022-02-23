<?php 

    $pagetype='archive';

    get_header();
    
    include 'include/layout-wrap-start.php';
    
        echo '<h3>SEARCH.PHP</h3>';

        if( contents_access($post) ) {

            include 'include/contents-search-body.php';

        }

    include 'include/layout-wrap-end.php';

    get_footer();

?>