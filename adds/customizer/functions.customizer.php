<?
    
    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo',[
        'width'  => 512,
        'flex-height' => true,
        'priority' => '2'
    ]);
    

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/



    add_action( 'customize_register', function( $customizer ) {

        // remake of standard Controllers

        include_once 'libs.customizer-corrections.php';

        // expand Site Identity Controllers

        include_once 'libs.customizer-siteidentity.php';

        // set a site options

        include_once 'libs.customizer-siteoptions.php';

        // expand Menu Controllers

        include_once 'libs.customizer-menus.php';

        // set all Designs types

        include_once 'libs.customizer-account.php';
        include_once 'libs.customizer-archives.php';
        include_once 'libs.customizer-pages.php';

        include_once 'libs.customizer-bloghome.php';
        include_once 'libs.customizer-posts.php';

        include_once 'libs.customizer-shophome.php';
        include_once 'libs.customizer-shopcatalog.php';
        include_once 'libs.customizer-shopcategories.php';
        include_once 'libs.customizer-shopcategory.php';
        include_once 'libs.customizer-shopproducts.php';

    } , 10 );



    function add_customize_sub_controllers() {

        // wp_enqueue_script('wp-customizer-js', get_stylesheet_directory_uri() . '/adds/customizer/libs.customizer.js', ['jquery', 'customize-controls'], false, 'all'); 
        wp_enqueue_style('wp-customizer-css', get_stylesheet_directory_uri() . '/adds/customizer/libs.customizer.css', null, false, 'all');

    }
    add_action( 'admin_enqueue_scripts', 'add_customize_sub_controllers' );


    function release_customization() {

        global $mods, $looptype;

        $mods = (object)[];



        /*
        //  DEBUG
        */

        $mods->debug_path_line = get_theme_mod( 'site_debug_path_line_settings' ) == 'true' && isset( $wp_customize ) ? true : false;

        /* - - - - - - - - - - */

        $mods->debug_notices = get_theme_mod( 'site_debug_notices_settings' ) == 'true' && isset( $wp_customize ) ? true : false;



        /*
        //  COMMON SITE OPTION
        */


        $mods->custom_logo_flyout   = get_theme_mod( 'site_custom_logo_position_settings' )?:false;
        $mods->custom_logo_ratio    = get_theme_mod( 'site_custom_logo_ratio_settings' )?:false;
        $mods->custom_logo_title    = get_theme_mod( 'site_custom_logo_title_ratio_settings' )?:false;
        $mods->custom_logo_slogan   = get_theme_mod( 'site_custom_logo_slogan_settings' )?:false;



        /*
        //  NAVIGATION & HEADER
        */



        if( is_part_of_woo() && is_store_notice_showing() && strlen(get_option('woocommerce_demo_store_notice'))>1 )
        $mods->top_site_warning = get_option('woocommerce_demo_store_notice');

        elseif(get_theme_mod( 'site_top_warning_status_settings' )=='true')
        $mods->top_site_warning = get_theme_mod( 'site_warning_message_settings' );

        else
        $mods->top_site_warning = false;


        /* - - - - - - - - - - */

        $mods->top_menu_status   = get_theme_mod( 'top_menu_status_settings' ) == 'true' ? true : false;

        /* - - - - - - - - - - */

        $mods->top_finder_status = get_theme_mod( 'top_finder_settings' ) == 'true' ? true : false;

        /* - - - - - - - - - - */

        $tas = get_theme_mod( 'top_menu_alignment_settings' );

        if($tas=='right')          $mods->top_menu_position = "justify-content-end";
        elseif($tas=='center')     $mods->top_menu_position = "justify-content-center";
        else                       $mods->top_menu_position = "justify-content-start";

        $mods->top_menu_row_type = $tas=='left' || $tas=='center' ? 'style="width:100%"' : false;

        /* - - - - - - - - - - */
        
        $tls = get_theme_mod( 'top_menu_layout_settings' );

        if( str_contains( $tls,'relative' ) ) $mods->top_menu_layout = 'relative';
        if( str_contains( $tls,'framed' ) )   $mods->top_menu_layout = 'framed';
        if( str_contains( $tls,'wide' ) )     $mods->top_menu_layout = 'wide';

        /* - - - - - - - - - - */

        $hss = get_theme_mod( $looptype['type'].'_header_style_settings' );

        $mods->heading_status     = str_contains( $hss,'off' ) ? false : true;
        $mods->heading_frame      = str_contains( $hss,'framed' ) ? 'container' : false;
        $mods->heading_size       = str_contains( $hss,'big' ) ? 'height:45vh;' : false;

        /* - - - - - - - - - - */

        $hbs = get_theme_mod( $looptype['type'].'_banner_settings' );
        $mods->header_banner_mode =  ( str_contains( $hbs,'in-body' ) ? 'in-body' : str_contains( $hbs,'in-head' ) ) ? 'in-head' : false ; 
        $mods->header_banner_frame =  str_contains( $hbs,'framed' ) ? true : false ; 

        /* - - - - - - - - - - */

        $mods->title_status      =  get_theme_mod( $looptype['type'].'_title_settings' ) == 'true' ? true : false ; 
        $mods->subtitle_status   =  get_theme_mod( $looptype['type'].'_subtitle_settings' ) == 'true' ? true : false ; 
        $mods->excerpt_status    =  get_theme_mod( $looptype['type'].'_excerpt_settings' ) == 'true' ? true : false ; 



        /*
        //  SIDEBARS
        */

        /* - - - - - - - - - - */

        $sss = get_theme_mod( $looptype['type'].'_small_side_settings' );

        $mods->sidebar_small_type = str_contains( $sss, 'dynamic') ? 'dynamic' : 'static';

        if(str_contains( $sss , 'left' ))  $mods->sidebar_small_position = 'left';
        elseif(str_contains( $sss , 'right' ))  $mods->sidebar_small_position = 'right';
        else $mods->sidebar_small_position = false ;

        /* - - - - - - - - - - */

        $sbs = get_theme_mod( $looptype['type'].'_big_side_settings' );

        $mods->sidebar_big_type = str_contains( $sbs, 'dynamic') ? 'dynamic' : 'static';

        if(str_contains( $sbs , 'left' ))  $mods->sidebar_big_position = 'left';
        elseif(str_contains( $sbs , 'right' ))  $mods->sidebar_big_position = 'right';
        else $mods->sidebar_big_position = false ;


        /* - - - - - - - - - - */

        $mods->sidebar_shop_position = $mods->sidebar_big_position;


        /*
        //  WOOCOMMERCE
        */

        /* - - - - - - - - - - */

        $mods->woocommerce_filters_bug_warning = get_theme_mod( 'site_warnings_woocommercefiltersbug_status_settings' )=='true' ? true : false;



        return $mods;

    }

    add_action( 'wp', 'release_customization' );

    ?>