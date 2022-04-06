<? 

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // refresh standard actual jquery
    function refresh_jquery(){

        // wp_deregister_script('jquery');
        // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', [], '', false );

    }
    add_action('init','refresh_jquery');

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add bootstrap
    function add_bootstrap(){
        wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css', null, true, 'all'); 
        wp_enqueue_style('bootstrap-min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', null, true, 'all');
        wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/theme.css', null, true, 'all');
        wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '', false );
    }
    add_action('wp_footer','add_bootstrap');


    // add bootstrap walkers
    function add_bootstrap_walkers(){

        // bootstrap coverter: add navigations
        include get_template_directory().'/adds/libs.bootstrap.navwalker.php';

        // bootstrap coverter: add comments 
        include get_template_directory().'/adds/libs.bootstrap.comments.php';

    }
    add_action( 'after_setup_theme', 'add_bootstrap_walkers' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // add random post url
    add_filter( 'pre_get_posts', 'random_post' );
    function random_post( $query ) {

        if ( $query->get( 'name' ) == 'random-post'  ) {

            global $wpdb;

            if ( $post_id = $wpdb->get_var( "SELECT ID from $wpdb->posts WHERE post_type LIKE 'post' AND post_password LIKE '' AND post_status LIKE 'publish' ORDER BY RAND() LIMIT 1;" ) ) {
                $post = get_post( $post_id );
                $query->set( 'name', $post->post_name );
            }

        }

    }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    function shortcode_user_avatar() {

        if(is_user_logged_in()) {
            global $current_user;
            get_currentuserinfo();
            $url = get_avatar_url( $current_user -> ID, 120 );            
        }
        
        if(!is_user_logged_in() || str_starts_with($url, 'https://secure.gravatar.com/') ) {

            $url = get_template_directory_uri().'/adds/404IMAGE.PNG';

        }

        return '<div class="rounded-3" style="text-align:right; aspect-ratio: 1; min-height:350px; width:100%; background: url('.$url.') center/cover;"></div>';

    }

    add_shortcode('display-user-avatar','shortcode_user_avatar');

    
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


    // add widgets slots support
    add_theme_support( 'widgets' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add sides slots support
    add_action('init','page_side_small');
    function page_side_small(){ register_sidebar([ 'name' => 'page_side_small', 'id' => 'page_side_small' ]); } 

    add_action('init','page_side_big');
    function page_side_big(){ register_sidebar([ 'name' => 'page_side_big','id' => 'page_side_big' ]); }


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

    // load customizable style
    wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . 'style.css', null, false, 'all');

?>