<?php

    $pagetype='home';

    get_header();

    include 'include/design-site-heading.php';

    include 'include/design-wrap-start.php';

    echo "this is home";
    if( contents_access($post) ) {

        //     include 'include/contents-page-body.php';

    }

    include 'include/design-wrap-end.php';

    include 'include/design-site-ending.php';

    get_footer();

?>