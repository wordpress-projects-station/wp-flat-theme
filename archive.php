<?php

    $pagetype='archive';

    get_header();

    include 'include/layout-wrap-start.php';

        if( contents_access($post) ) {

            include 'include/contents-archive-body.php';

        }

    include 'include/layout-wrap-end.php';

    get_footer();

?>