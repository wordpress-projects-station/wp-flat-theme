<?php 

    //add navigations in wordpress
    add_theme_support('menus');
    register_nav_menus([

        'desktop-site-menu' => 'Desktop site menu',
        'desktop-social-menu' => 'Desktop social menu',

        'mobile-site-menu' => 'Mobile site menu', 
        'mobile-social-menu' => 'Mobile social menu',

    ]);


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    //add featured images
    add_theme_support( 'post-thumbnails' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    //set max excerpt length
    function max_excerpt_length($length){ return 35; }
    add_filter('excerpt_length', 'max_excerpt_length');


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


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


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add_theme_support( 'title-tag' );
    // add_theme_support( 'custom-logo', array(
    //     'height' => 480,
    //     'width'  => 720,
    // ) );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    //add widgets slots support
    add_theme_support( 'widgets' );

    function page_side_right(){
      register_sidebar([ 'name' => 'page_side_right','id' => 'page_side_right' ]);
    } add_action('init','page_side_right');

    function page_side_left(){
      register_sidebar([ 'name' => 'page_side_left', 'id' => 'page_side_left' ]);
    } add_action('init','page_side_left');


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // fix wp ico support types
    add_filter('upload_mimes', 'myfile_upload');
    function myfile_upload( $mimes ) {

        if ( !current_user_can( 'administrator' ) ) return $mimes;

        $mimes['ico'] = 'image/vnd.microsoft.icon';
        $mimes['ico'] = 'image/x-icon';
        $mimes['ico'] = 'mage/ico';

        return $mimes;
    }


?>