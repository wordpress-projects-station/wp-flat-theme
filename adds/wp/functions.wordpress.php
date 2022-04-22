<? 


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add featured images
    add_theme_support( 'post-thumbnails' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // set max excerpt length
    add_filter('excerpt_length', 'max_excerpt_length');
    function max_excerpt_length($length){ return 100; }


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


    // unlock oversized images (not raccomended)
    // function support_big_image_size_threshold( $threshold ) {
    //     unset( $sizes['1536x1536']); // disable 2x medium-large size
    //     unset( $sizes['2048x2048']); // disable 2x large size
    //     return 9999;
    // }
    // add_filter('big_image_size_threshold', 'support_big_image_size_threshold', 100, 1);

    // // prevent error oversized images (not raccomended)
    // function prevent_server_oversize_image_error($editors) {
    //     return ['WP_Image_Editor_GD', 'WP_Image_Editor_Imagick'];
    // }
    // add_filter('wp_image_editors', 'prevent_server_oversize_image_error');


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add tags in media (not raccomended)
    // function support_tags_for_media_attachments() {
    //     register_taxonomy_for_object_type( 'post_tag', 'attachment' );
    // }
    // add_action( 'init' , 'support_tags_for_media_attachments' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add categories in media
    function support_categories_for_media_attachments() {
        register_taxonomy_for_object_type( 'category', 'attachment' );
    }
    add_action( 'init' , 'support_categories_for_media_attachments' );


    /*- - - - - - - - - - - - - - - - - - - - - - - - */


    function add_to_media_category_automatically($post_ID) {

        $attach = get_post($post_ID);
        $parentid = $attach->post_parent;
        $post_type = get_post_type($attach->post_parent);

        if ( $parentid ){

            if ( $post_type == 'product' ) {
                wp_set_object_terms($post_ID, 'shop-products', 'category', true);
            }

            elseif ( $post_type == 'post' ) {
                wp_set_object_terms($post_ID, 'post-media', 'category', true);
            }

            else {

                wp_set_object_terms($post_ID, 'uncategorized', 'category', true);

            }

        }

    }
    add_action('add_attachment', 'add_to_media_category_automatically');


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    add_theme_support( 'widgets' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    add_post_type_support( 'page', 'excerpt' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add sides slots support
    add_action('init','sidebars');
    function sidebars () {

        register_sidebar([
            'name' => 'Sidebar small', 
            'id' => 'sidebar_small',
            'description' => 'if active on the theme customizer, it generates an utility icons side on pages',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<b>',
            'after_title'   => '</b>',
        ]); 

        register_sidebar([ 
            'name' => 'Sidebar big',
            'id' => 'sidebar_big',
            'description' => 'if active on the theme customizer, it generates a standard sidebar on pages',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<b>',
            'after_title'   => '</b>',
        ]);
    } 


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add navigations in wordpress
    add_theme_support('menus');
    register_nav_menus([

        'desktop-site-menu' => 'Desktop site menu',
        'desktop-social-menu' => 'Desktop social menu',

        'mobile-site-menu' => 'Mobile site menu', 
        'mobile-social-menu' => 'Mobile social menu',

    ]);


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // Replace default Gravatar Image used in WordPress
    function filter_get_avatar( $avatar, $id_or_email, $size, $default, $alt ) {    

        // If is email, try and find user ID
        if ( ! is_numeric( $id_or_email ) && is_email( $id_or_email->comment_author_email ) ) {
            $user = get_user_by( 'email', $id_or_email );
            if ( $user ) $id_or_email = $user->ID;
        }

        // If not user ID, return
        if( ! is_numeric( $id_or_email ) ) return $avatar;

        // Get attachment id
        $attachment_id  = get_user_meta( $id_or_email, 'custom_avatar', true );
        
        // NOT empty Return saved image
        if ( ! empty ( $attachment_id  ) )
        return wp_get_attachment_image( $attachment_id, [ $size, $size ], false, ['alt' => $alt] );

        return $avatar;

    }
    add_filter( 'get_avatar', 'filter_get_avatar', 10, 5 );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // load customizable style
    function add_standard_style() {
        wp_enqueue_style('standard', get_stylesheet_directory_uri() . 'style.css', null, false, 'all');
    }
    add_action('wp_enqueue_scripts','add_standard_style');


?>