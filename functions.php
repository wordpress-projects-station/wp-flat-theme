<?php

    // load bootstrap
    wp_register_style('bootstrap', get_template_directory_uri() . 'bootstrap/bootstrap.min.css', [], false, 'all'); wp_enqueue_style('bootstrap');
    wp_register_script('bootstrap', get_template_directory_uri() . 'bootstrap/bootstrap.min.js', [], false, 'all'); wp_enqueue_script('bootstrap');

    // load static theme
    wp_register_style('theme', get_template_directory_uri() . 'theme/theme.css', [], false, 'all'); wp_enqueue_style('theme');


    //add menu
    add_theme_support('menus');
    register_nav_menus([
        'desktop-site-menu' => 'Desktop site menu',
        'mobile-site-menu' => 'Mobile site menu', 
    ])

    //add featured images
    add_theme_support('post-thumbnails');

    //set max excerpt length
    function max_excerpt_length($length){ return 80; }
    add_filter('excerpt_length', 'max_excerpt_length');

?>
