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
      if ( 'random-post' == $query->get( 'name' ) ) {
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


    //add widgets slots support
    add_theme_support( 'widgets' );

    function page_side_right(){
      register_sidebar([ 'name' => 'page_side_right','id' => 'page_side_right' ]);
    } add_action('init','page_side_right');

    function page_side_left(){
      register_sidebar([ 'name' => 'page_side_left', 'id' => 'page_side_left' ]);
    } add_action('init','page_side_left');


?>