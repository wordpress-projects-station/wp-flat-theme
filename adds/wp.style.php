<?php

    // load customizable style
    wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . 'style.css', null, false, 'all');
    wp_enqueue_style('custom-fix', get_stylesheet_directory_uri() . '/adds/wp.fix.css', null, false, 'all');
 
    
?>