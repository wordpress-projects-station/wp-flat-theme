<?php

    //enqueue assets
    // function add_theme_assets() {

        // load bootstrap
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', null, false, 'all'); 
        wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css', null, false, 'all'); 
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', null, false, 'all');

        // load static theme
        wp_enqueue_style('theme-css', get_stylesheet_directory_uri() . '/theme/theme.css', null, false, 'all');

        // load customizable style
        wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . 'style.css', null, false, 'all');

    // } add_action('wp_enqueue_scripts', 'add_theme_assets');


    //bootstrap coverter: add comments 
    // function add_bootstrap_comments() { add_theme_support( 'html5', array('comment-list') ); }
    // add_action( 'after_setup_theme', 'add_bootstrap_comments' );
    // require get_template_directory() . '/adds/class-wp-bootstrap-commentswalker.php';
    require get_template_directory() . '/adds/class-wp-bootstrap-comments.php';

    //bootstrap coverter: add navigations
    require get_template_directory() . '/adds/class-wp-bootstrap-navwalker.php';


    //add navigations in wordpress
    add_theme_support('menus');
    register_nav_menus([

        'desktop-site-menu' => 'Desktop site menu',
        'desktop-social-menu' => 'Desktop social menu',

        'mobile-site-menu' => 'Mobile site menu', 
        'mobile-social-menu' => 'Mobile social menu',

    ]);

    //add featured images
    add_theme_support( 'post-thumbnails' );


    //set max excerpt length
    function max_excerpt_length($length){ return 35; }
    add_filter('excerpt_length', 'max_excerpt_length');


    
    // add social profiles for users
    function add_to_author_profile( $socialprofile ) {
        $socialprofile['rss_url_link'] = 'RSS URL';
        $socialprofile['google_profile_link'] = 'Google Profile URL';
        $socialprofile['youtube_profile_link'] = 'Youtube Profile URL';
        $socialprofile['pinterest_profile_link'] = 'Pinterest Profile URL';
        $socialprofile['twitter_profile_link'] = 'Twitter Profile URL';
        $socialprofile['facebook_profile_link'] = 'Facebook Profile URL';
        $socialprofile['linkedin_profile_link'] = 'Linkedin Profile URL';
        $socialprofile['instagram_profile_link'] = 'Instagram Profile URL';
        $socialprofile['whatsapp_number_link'] = 'Whatsapp Number';
        
        return $socialprofile;
    }

    add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);


?>