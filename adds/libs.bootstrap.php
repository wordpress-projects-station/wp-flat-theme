<?php


    // load bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', null, false, 'all'); 
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css', null, false, 'all'); 
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', null, false, 'all');

    // load bootstrap theme
    wp_enqueue_style('theme-css', get_stylesheet_directory_uri() . 'adds/bootstrap.theme.css', null, false, 'all');

    //bootstrap coverter: add comments 
    include_once get_template_directory().'/adds/bootstrap.comments.php';

    //bootstrap coverter: add navigations
    include_once get_template_directory().'/adds/bootstrap.navwalker.php';
    

?>