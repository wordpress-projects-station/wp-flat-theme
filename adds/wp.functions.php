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


    //add random post url
    add_filter( 'pre_get_posts', 'random_post' );
    function random_post( $query ) {

        if ( $query->get( 'name' ) == 'random-post'  ) {

            global $wpdb;

            if ( $post_id = $wpdb->get_var( "SELECT ID from $wpdb->posts WHERE post_type LIKE 'post' AND post_status LIKE 'publish' ORDER BY RAND() LIMIT 1;" ) ) {
                $post = get_post( $post_id );
                $query->set( 'name', $post->post_name );
            }

        }

    }


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    //add featured images
    add_theme_support( 'post-thumbnails' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    //set max excerpt length
    add_filter('excerpt_length', 'max_excerpt_length');
    function max_excerpt_length($length){ return 35; }


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add social profiles for users
    add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);
    function add_to_author_profile( $profiledata ) {

        $profiledata['rss_url_link'] = 'RSS URL';
        $profiledata['google_profile_link'] = 'Google Profile URL';
        $profiledata['youtube_profile_link'] = 'Youtube Profile URL';
        $profiledata['pinterest_profile_link'] = 'Pinterest Profile URL';
        $profiledata['twitter_profile_link'] = 'Twitter Profile URL';
        $profiledata['facebook_profile_link'] = 'Facebook Profile URL';
        $profiledata['linkedin_profile_link'] = 'Linkedin Profile URL';
        $profiledata['instagram_profile_link'] = 'Instagram Profile URL';
        $profiledata['whatsapp_number_link'] = 'Whatsapp Number';
        
        return $profiledata;

    }


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    //add widgets slots support
    add_theme_support( 'widgets' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    //add sides slots support
    add_action('init','page_side_small');
    function page_side_small(){ register_sidebar([ 'name' => 'page_side_small', 'id' => 'page_side_small' ]); } 

    add_action('init','page_side_big');
    function page_side_big(){ register_sidebar([ 'name' => 'page_side_big','id' => 'page_side_big' ]); }


?>