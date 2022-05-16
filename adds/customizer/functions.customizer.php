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
        include_once 'libs.customizer-front-page.php';

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
        include_once 'libs.customizer-cart.php';
        include_once 'libs.customizer-checkout.php';

        // set the social box

        include_once 'libs.customizer-socialsbox.php';


    } , 10 );



    function add_customize_sub_controllers() {

        // wp_enqueue_script('wp-customizer-js', get_stylesheet_directory_uri() . '/adds/customizer/libs.customizer.js', ['jquery', 'customize-controls'], false, 'all'); 
        wp_enqueue_style('wp-customizer-css', get_stylesheet_directory_uri() . '/adds/customizer/libs.customizer.css', null, false, 'all');

    }
    add_action( 'admin_enqueue_scripts', 'add_customize_sub_controllers' );


    function release_customization() {

        global $mods, $looptype;

        $mods = (object)[];

        $mod->user_lang = get_user_locale();


        /*
        //  DEBUG
        */

        $mods->debug_notices = boolval( get_theme_mod( 'site_debug_notices_sets' ) ); //&& isset( $wp_customize )



        /*
        //  COMMON MENUBAR LOGO OPTION
        */


        $mods->custom_logo_flyout   = get_theme_mod( 'site_custom_logo_position_sets' )?:false;
        $mods->custom_logo_ratio    = get_theme_mod( 'site_custom_logo_ratio_sets' )?:false;
        $mods->custom_logo_title    = get_theme_mod( 'site_custom_logo_title_ratio_sets' )?:false;
        $mods->custom_logo_slogan   = get_theme_mod( 'site_custom_logo_slogan_sets' )?:false;



        /*
        //  WARNINGS ON TOP THE SITE
        */


        if( is_part_of_woo() && is_store_notice_showing() && strlen(get_option('woocommerce_demo_store_notice'))>1 )
        $mods->top_site_warning = get_option('woocommerce_demo_store_notice');

        elseif( boolval( get_theme_mod( 'site_top_warning_message_status_sets' ) ) && strlen(get_theme_mod('site_top_warning_message_sets'))>1 )
        $mods->top_site_warning = get_theme_mod( 'site_top_warning_message_sets' );

        else
        $mods->top_site_warning = false;



        /*
        //  MAIN MANU
        */

        /* - - - - - - - - - - */
        
        $menu_layout = get_theme_mod( $looptype['type'].'_menu_style_sets' );

        $mods->top_menu_status = str_contains( $menu_layout, 'off' ) ? false : true; //! get_theme_mod( 'top_menu_status_sets' ) || 
        $mods->top_menu_layout = str_contains( $menu_layout, 'framed' ) ? 'framed' : false;

        /* - - - - - - - - - - */

        $mods->top_menu_fixed_position = boolval( get_theme_mod( 'top_menu_in_fixed_position_sets' ) );

        /* - - - - - - - - - - */

        $mods->top_menu_finder_status = boolval( get_theme_mod( 'top_finder_sets' ) );
        $mods->finder_in_query_mode = boolval( get_theme_mod( 'top_finder_querymode_sets' ) );

        /* - - - - - - - - - - */

        $menu_align = get_theme_mod( 'top_menu_alignment_sets' );

        if($menu_align=='right')          $mods->top_menu_position = "justify-content-end";
        elseif($menu_align=='center')     $mods->top_menu_position = "justify-content-center";
        else                              $mods->top_menu_position = "justify-content-start";


        /*
        //  HEADER LAYOUT
        */

        $header_layout  = get_theme_mod( $looptype['type'].'_header_style_sets' );

        $mods->heading_status     = str_contains( $header_layout,'off' ) ? false : true ;
        $mods->heading_frame      = str_contains( $header_layout,'framed' ) ? 'container' : '';

        $headerbigsize            = get_theme_mod( 'site_header_big_height_sets' );
        $headersmallsize          = get_theme_mod( 'site_header_small_height_sets' );
        $mods->heading_size       = str_contains( $header_layout,'big' ) ? 'height:'.$headerbigsize.'vh;' : 'height:'.$headersmallsize.'vh;';
        


        /*
        //  BANNER POSITIONS
        */

        $header_banner = get_theme_mod( $looptype['type'].'_banner_sets' );

        

        if( str_contains( $header_banner,'off' ) )
        $mods->header_banner_mode =  'off';

        elseif( str_contains( $header_banner,'in-head' ) )
        $mods->header_banner_mode =  'in-head';

        elseif( str_contains( $header_banner,'in-body' ) )
        $mods->header_banner_mode = 'in-body'; 

        else
        $mods->header_banner_mode = $header_banner; 


        /*
        //  TITLES POSITIONS
        */

        $mods->titles_position   =  get_theme_mod( $looptype['type'].'_titles_position_sets' );

        $mods->title_status      =  boolval( get_theme_mod( $looptype['type'].'_title_sets' ) ); 

        $mods->subtitle_supported =  boolval( get_theme_mod( 'site_metasubtitles_status_sets' ) ); 
        $mods->subtitle_status    =  boolval( get_theme_mod( $looptype['type'].'_subtitle_sets' ) ); 
        
        $mods->excerpt_status    =  boolval( get_theme_mod( $looptype['type'].'_excerpt_sets' ) ); 



        /*
        //  SIDEBARS
        */


        $mods->site_reverse_layout = boolval( get_theme_mod('site_layout_reverse_sets' ) );

        /* - - - - - - - - - - */

        $sss = get_theme_mod( $looptype['type'].'_small_side_sets' );

        $mods->sidebar_small_type = str_contains( $sss, 'dynamic') ? 'dynamic' : 'static';

        if(str_contains( $sss , 'left' ))  $mods->sidebar_small_position = 'left';
        elseif(str_contains( $sss , 'right' ))  $mods->sidebar_small_position = 'right';
        else $mods->sidebar_small_position = false ;

        /* - - - - - - - - - - */

        $sbs = get_theme_mod( $looptype['type'].'_big_side_sets' );

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

        $mods->woocommerce_filters_bug_warning = boolval( get_theme_mod( 'site_warnings_wfb_status_sets' ) );



        return $mods;

    }

    add_action( 'wp', 'release_customization' );

    ?>