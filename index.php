<?php

    echo '<hr><h3>YOU ARE IN INDEX<h3>';

    $pagetype='home';

    include __DIR__.'/template/site-header.php';
    include __DIR__.'/template/wrap-heading.php';
    include __DIR__.'/template/wrap-sideleft.php';

    if(isset($wp_customize))
    echo '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align: center;"><div><h3>MAKE YOUR GUTENBERG HOMEPAGE</h3><p>You can build your own custom homepage with the internal editor.<br>Once you\'ve built some content of that page, it will appear here.</p></div></div>';
    
    else
    echo '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align:center;"><div><h3>PAGE CURRENTLY UNDER MAINTENANCE</h3><p>At this specific time the content is not ready or reachable. Please try again in a few hours</p></div></div>';

    include __DIR__.'/template/wrap-sideright.php';
    include __DIR__.'/template/wrap-ending.php';
    include __DIR__.'/template/site-footer.php';


?>