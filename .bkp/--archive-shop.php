<?php

    echo '<hr><h3>YOU ARE IN SHOP<h3><hr>';

    $looptype='shop';

    get_header();

    include 'include/design-site-heading.php';

    include 'include/design-wrap-start.php';

    if(is_woocommerce()){

        echo '<p><b>woo condition...</b></p>';
        woocommerce_content();

    }

    include 'include/design-wrap-end.php';

    include 'include/design-site-ending.php';

    get_footer();

?>