<?
    
    /*

        more info: https://developer.wordpress.org/themes/customize-api/
        more info: https://www.youtube.com/watch?v=o0eb_Cv0zVA

        //:
        //: DESIGN MODEL
        //:

        // ADD PANEL "Design Options"

        $customizer->add_panel('options_panel',[
            'title'=>'Design Options',
            'description'=> 'Collection of themes options',
            'priority'=> 10,
        ]);

        // "Design Options" > "tab_1"

        $customizer->add_section('tab_1',[
            'panel'=>'options_panel',
            'priority'=>10,
            'title'=>'TAB 1',
        ]);

        // "Design Options" > "tab_1" > ...

        $customizer->add_setting('demo_text_sets',[ 'default'=>'a' ]);
        $customizer->add_control('contrl_demo_text',[
            'section'=>'tab_1',
            'label'=>'Text',
            'type'=>'text',
            'settings'=>'demo_text_sets',
        ]);

        $customizer->add_setting('demo_checkbox_sets',[ 'default'=>'false' ]);
        $customizer->add_control('contrl_demo_check',[
            'section'=>'tab_1',
            'label'=>'Choose Y/N',
            'type'=>'checkbox',
            'settings'=>'demo_checkbox_sets',
        ]);

        $customizer->add_setting( 'demo_radio_sets', ['default' => 'blue']);
        $customizer->add_control( 'demo_radio_sets', [
            'section' => 'tab_1',
            'label' => 'Radio Selection',
            'description' => 'This is a custom radio input.',
            'type' => 'radio',
            'choices' => [
                'red' => 'Red',
                'blue' => 'Blue',
                'green' => 'Green',
            ],
        ]);

        $customizer->add_setting( 'demo_select_sets', ['default' => 'blue']);
        $customizer->add_control( 'demo_select_sets', [
            'section' => 'tab_1',
            'label' => 'Select Selection',
            'description' => 'This is a custom select input.',
            'type' => 'select',
            'choices' => [
                'red' => 'Red',
                'blue' => 'Blue',
                'green' => 'Green',
            ],
        ]);

    */

    
    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo',[
        'width'  => 512,
        'flex-height' => true,
        'priority' => '2'
    ]);
    

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    add_action( 'customize_register', function( $customizer ) {

        $customizer->remove_panel( 'widgets' );
        $customizer->add_panel('design_controller',[ 'priority' => 4, 'title' => 'Design controller', ]);

    } , 20 );


    add_action( 'customize_register', function( $customizer ) {

        $customizer->get_section('title_tagline')->title = 'Site Identity';
        $customizer->get_section('title_tagline')->priority = '1';

        $customizer->get_panel( 'nav_menus' )->title = 'Menu controller';
        $customizer->get_panel( 'nav_menus' )->priority = '3';

        $customizer->get_section( 'menu_locations' )->title = 'Change positions';
        $customizer->get_section( 'menu_locations' )->priority = '0';
        
        $customizer->get_section( 'static_front_page' )->panel = 'design_controller';
        $customizer->get_section( 'static_front_page' )->title = 'Design of home';
        $customizer->get_section( 'static_front_page' )->description = null;
        $customizer->get_section( 'static_front_page' )->priority = '4';

        $customizer->get_control( 'show_on_front' )->choices = ['posts' => 'Theme Home', 'page' => 'Custom Home'];
        $customizer->get_control( 'show_on_front' )->description = 'suggest: use static custom.';
        $customizer->get_control( 'page_on_front' )->description = 'Make your custom gutenberg page contents and select it (printed via front-page.php). If blank you print empty maintence message (home.php). ';
        $customizer->get_control( 'page_for_posts' )->description = 'It\'s good role rename in "Blog" the main category of posts (and blank this). In alternative: select a customized page for you posts archive contents.';

        $customizer->get_panel( 'woocommerce' )->title = 'Store options';

        $customizer->get_section( 'custom_css' )->title = 'CSS override';

    } , 10 );


    // expand Site Controllers

    add_action( 'customize_register', function( $customizer ) {


        $customizer->add_section('site_settings',[
            'priority' => 2,
            'title'    => 'Site settings',
        ]);

        $customizer->add_setting('site_debug_path_line_settings',[ 'default'=>'false' ]);
        $customizer->add_control('site_debug_line_data',[
            'section'     => 'site_settings',
            'label'       => 'Debug template path line',
            'descriptino' => 'Active/hide the editor line for page information',
            'settings'    => 'site_debug_path_line_settings',
            'type'        => 'checkbox',
        ]);

        $customizer->add_setting('site_debug_notices_settings',[ 'default'=>'false' ]);
        $customizer->add_control('site_debug_notices_data',[
            'section'     => 'site_settings',
            'label'       => 'Debug notice boxes',
            'descriptino' => 'Active/hide the editor notice for page information',
            'settings'    => 'site_debug_notices_settings',
            'type'        => 'checkbox',
        ]);

        $customizer->add_setting('site_warning_status_settings',[ 'default'=>'false' ]);
        $customizer->add_control('site_warning_status_data',[
            'section'  => 'site_settings',
            'label'    => 'Warning message',
            'settings' => 'site_warning_status_settings',
            'type'     => 'checkbox',
        ]);

        $customizer->add_setting('site_warning_message_settings',[ 'default'=>'WARNING! THIS IS A DEMO SITE! <b>DO NOT BUY OR USE IT!</b>' ]);
        $customizer->add_control('site_warning_message_data',[
            'section'  => 'site_settings',
            'label'    => '',
            'settings' => 'site_warning_message_settings',
            'type'     => 'text',
        ]);


    } , 10 );

    // expand Menu Controllers
    
    add_action( 'customize_register', function( $customizer ) {

        // tab-title

        $customizer->add_section('design_of_top_menu',[
            'panel'    => 'nav_menus',
            'title'    => 'Top-Menu options',
            'priority' => 50,
        ]);

        $customizer->add_setting('top_menu_status_settings',[ 'default'=>'true' ]);
        $customizer->add_control('top_menu_status_data',[
            'section'=>'design_of_top_menu',
            'label'=>'[show/hide] top main menu',
            'type'=>'checkbox',
            'settings'=>'top_menu_status_settings',
        ]);

        $customizer->add_setting('top_finder_settings',[ 'default'=>'true' ]);
        $customizer->add_control('top_finder_data',[
            'section'=>'design_of_top_menu',
            'label'=>'[show/hide] search bar',
            'settings'=>'top_finder_settings',
            'type'=>'checkbox',
        ]);

        $customizer->add_setting('top_menu_alignment_settings',[ 'default'=>'left' ]);
        $customizer->add_control('top_menu_alignment_data',[
            'section'=>'design_of_top_menu',
            'label'=>'menu list alignment',
            'settings'=>'top_menu_alignment_settings',
            'type'     => 'radio',
            'choices'  => [
                'left'   => 'align left',
                'center' => 'align center',
                'right'  => 'align right',
            ],
        ]);

        $customizer->add_setting('top_menu_layout_settings',[ 'default'=>'relative' ]);
        $customizer->add_control('top_menu_layout_data',[
            'section'=>'design_of_top_menu',
            'label'=>'define layout of top main menu',
            'settings'=>'top_menu_layout_settings',
            'type'     => 'radio',
            'choices'  => [
                'relative' => 'relative to page',
                'framed'  => 'framed menu',
                'wide'   => 'wided menu',
            ],
        ]);

    } , 10 );


    // set Design of the pages

    add_action( 'customize_register', function( $customizer ) {

        // tab-title

        $customizer->add_section('design_of_page',[
            'panel'    => 'design_controller',
            'priority' => 4,
            'title'    => 'Design of pages',
        ]);

        // tab-action

        $customizer->add_control( 'button_open_random_page', [
            'section'   => 'design_of_page',
            'priority'  => 0,
            'settings'  => [],
            'type'      => 'button',
            'input_attrs' => [
                'value' => 'Open a home page',
                'class' => 'button button-border button-primary',
                'data-url' => get_home_url(),
            ],
        ]);

        $customizer->add_control('blank', [ 'label'=> '&#8206;', 'section'=>'design_of_page', 'type'=>'hidden', 'settings' => [] ]);

        // thumbnail

        $customizer->add_setting('page_banner_settings',[ 'default'=>'in-head' ]);
        $customizer->add_control('page_banner_data',[
            'section'   => 'design_of_page',
            'label'     => 'Main banner status',
            'settings'  => 'page_banner_settings',
            'type'      => 'radio',
            'choices'   => [
                'off'      => 'OFF',
                'in-head'  => 'in head',
                'in-body'  => 'in body',
            ],
        ]);

        // thumbnail-stle

        $customizer->add_setting('page_header_style_settings',[ 'default'=>'framed-big' ]);
        $customizer->add_control('page_header_style_data',[
            'section'  => 'design_of_page',
            'label'    => 'Header style',
            'settings' => 'page_header_style_settings',
            'type'     => 'radio',
            'choices'  => [
                'off'         => 'OFF',
                'framed-slim' => 'framed slim',
                'framed-big'  => 'framed big',
                'wide-slim'   => 'wide slim',
                'wide-big'    => 'wide big',
            ],
        ]);

        // sidebar-small

        $customizer->add_setting( 'page_small_side_settings', ['default'=>'dynamic-left'] );
        $customizer->add_control( 'page_small_side_data', [
            'section'   => 'design_of_page',
            'label'     => 'Small Sidebar position',
            'type'      => 'radio',
            'settings'  => 'page_small_side_settings',  
            'choices'   => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);

        // sidebar-big

        $customizer->add_setting( 'page_big_side_settings', ['default'=>'dynamic-right'] );
        $customizer->add_control( 'page_big_side_data', [
            'section'  => 'design_of_page',
            'label'    => 'Big Sidebar position',
            'type'     => 'radio',
            'settings' => 'page_big_side_settings',
            'choices'  => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);


    } , 10 );

    // set Design of the Account

    add_action( 'customize_register', function( $customizer ) {

        // tab-title

        $customizer->add_section('design_of_account',[
            'panel'    => 'design_controller',
            'priority' => 4,
            'title'    => 'Design of Account',
        ]);

        // tab-action

        $customizer->add_control( 'button_open_random_page', [
            'section'   => 'design_of_account',
            'priority'  => 0,
            'settings'  => [],
            'type'      => 'button',
            'input_attrs' => [
                'value' => 'Open a profile page',
                'class' => 'button button-border button-primary',
                'data-url' => get_home_url().'/account',
            ],
        ]);

        $customizer->add_control('blank', [ 'label'=> '&#8206;', 'section'=>'design_of_account', 'type'=>'hidden', 'settings' => [] ]);

        // thumbnail

        $customizer->add_setting('account_banner_settings',[ 'default'=>'in-head' ]);
        $customizer->add_control('account_banner_data',[
            'section'   => 'design_of_account',
            'label'     => 'Main banner status',
            'settings'  => 'account_banner_settings',
            'type'      => 'radio',
            'choices'   => [
                'off'      => 'OFF',
                'in-head'  => 'in head',
                'in-body'  => 'in body',
            ],
        ]);

        // thumbnail-stle

        $customizer->add_setting('account_header_style_settings',[ 'default'=>'framed-big' ]);
        $customizer->add_control('account_header_style_data',[
            'section'  => 'design_of_account',
            'label'    => 'Header style',
            'settings' => 'account_header_style_settings',
            'type'     => 'radio',
            'choices'  => [
                'off'         => 'OFF',
                'framed-slim' => 'framed slim',
                'framed-big'  => 'framed big',
                'wide-slim'   => 'wide slim',
                'wide-big'    => 'wide big',
            ],
        ]);

        // sidebar-small

        $customizer->add_setting( 'account_small_side_settings', ['default'=>'dynamic-left'] );
        $customizer->add_control( 'account_small_side_data', [
            'section'   => 'design_of_account',
            'label'     => 'Small Sidebar position',
            'type'      => 'radio',
            'settings'  => 'account_small_side_settings',  
            'choices'   => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);

        // sidebar-big

        $customizer->add_setting( 'account_big_side_settings', ['default'=>'dynamic-right'] );
        $customizer->add_control( 'account_big_side_data', [
            'section'  => 'design_of_account',
            'label'    => 'Big Sidebar position',
            'type'     => 'radio',
            'settings' => 'account_big_side_settings',
            'choices'  => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);


    } , 10 );

    // set Design of the archive

    add_action( 'customize_register', function( $customizer ) {


        /// tab-title

        $customizer->add_section('design_of_archive',[
            'panel'    => 'design_controller',
            'priority' => 4,
            'title'    => 'Design of archive',
        ]);

        // tab-action

        $customizer->add_control( 'button_open_random_archive', [
            'section'   => 'design_of_archive',
            'priority'  => 0,
            'settings'  => [],
            'type'      => 'button',
            'input_attrs' => [
                'value' => 'Open the customized page',
                'class' => 'button button-border button-primary',
                'data-url' => get_site_url().'/search/',
            ],
        ]);

        $customizer->add_control('blank', [ 'label'=> '&#8206;', 'section'=>'design_of_archive', 'type'=>'hidden', 'settings' => [] ]);

        // thumbnail

        $customizer->add_setting('archive_banner_settings',[ 'default'=>'in-head' ]);
        $customizer->add_control('archive_banner_data',[
            'section'   =>'design_of_archive',
            'label'     =>'Main banner status',
            'settings'  =>'archive_banner_settings',
            'type'      => 'radio',
            'choices'   => [
                'off'      => 'OFF',
                'in-head'  => 'in head',
                'in-body'  => 'in body',
            ],
        ]);

        // thumbnail-stle

        $customizer->add_setting('archive_header_style_settings',[ 'default'=>'framed-big' ]);
        $customizer->add_control('archive_header_style_data',[
            'section'  => 'design_of_archive',
            'label'    => 'Header style',
            'type'     => 'radio',
            'settings' => 'archive_header_style_settings',
            'choices'  => [
                'off'         => 'OFF',
                'framed-slim' => 'framed slim',
                'framed-big'  => 'framed big',
                'wide-slim'   => 'wide slim',
                'wide-big'    => 'wide big',
            ],
        ]);

        // sidebar-small

        $customizer->add_setting( 'archive_small_side_settings', ['default'=>'dynamic-left'] );
        $customizer->add_control( 'archive_small_side_data', [
            'section'   => 'design_of_archive',
            'label'     => 'Small Sidebar position',
            'type'      => 'radio',
            'settings'  => 'archive_small_side_settings',  
            'choices'   => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);

        // sidebar-big

        $customizer->add_setting( 'archive_big_side_settings', ['default'=>'dynamic-right'] );
        $customizer->add_control( 'archive_big_side_data', [
            'section'  => 'design_of_archive',
            'label'    => 'Big Sidebar position',
            'type'     => 'radio',
            'settings' => 'archive_big_side_settings',
            'choices'  => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);

    } , 10 );

    // set Design of the posts

    add_action( 'customize_register', function( $customizer ) {


        /// tab-title

        $customizer->add_section('design_of_post',[
            'panel'    => 'design_controller',
            'priority' => 4,
            'title'    => 'Design of post',
        ]);

        // tab-action

        $customizer->add_control( 'button_open_random_post', [
            'section'   => 'design_of_post',
            'priority'  => 0,
            'settings'  => [],
            'type'      => 'button',
            'input_attrs' => [
                'value' => 'Open the customized page',
                'class' => 'button button-border button-primary',
                'data-url' => get_site_url().'/random-post/',
            ],
        ]);

        $customizer->add_control('blank', [ 'label'=> '&#8206;', 'section'=>'design_of_post', 'type'=>'hidden', 'settings' => [] ]);

        // thumbnail

        $customizer->add_setting('post_banner_settings',[ 'default'=>'in-head' ]);
        $customizer->add_control('post_banner_data',[
            'section'   => 'design_of_post',
            'label'     => 'Main banner status',
            'settings'  => 'post_banner_settings',
            'type'      => 'radio',
            'choices'   => [
                'off'      => 'OFF',
                'in-head'  => 'in head',
                'in-body'  => 'in body',
            ],
        ]);
        
        // thumbnail-stle

        $customizer->add_setting('post_header_style_settings',[ 'default'=>'framed-big' ]);
        $customizer->add_control('post_header_style_data',[
            'section'  => 'design_of_post',
            'label'    => 'Header style',
            'settings' => 'post_header_style_settings',
            'type'     => 'radio',
            'choices'  => [
                'off'         => 'OFF',
                'framed-slim' => 'framed slim',
                'framed-big'  => 'framed big',
                'wide-slim'   => 'wide slim',
                'wide-big'    => 'wide big',
            ],
        ]);

        // sidebar-small

        $customizer->add_setting( 'post_small_side_settings', ['default'=>'dynamic-left'] );
        $customizer->add_control( 'post_small_side_data', [
            'section'   => 'design_of_post',
            'label'     => 'Small Sidebar position',
            'type'      => 'radio',
            'settings'  => 'post_small_side_settings',  
            'choices'   => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);

        // sidebar-big

        $customizer->add_setting( 'post_big_side_settings', ['default'=>'dynamic-right'] );
        $customizer->add_control( 'post_big_side_data', [
            'section'  => 'design_of_post',
            'label'    => 'Big Sidebar position',
            'type'     => 'radio',
            'settings' => 'post_big_side_settings',
            'choices'  => [
                'off'  => 'OFF',
                'static-left'  => 'static left',
                'static-right' => 'static right',
                'dynamic-left'  => 'dynamic left',
                'dynamic-right' => 'dynamic right',
            ],
        ]);

    } , 10 );



    function add_customize_sub_controllers() {

        wp_enqueue_script('wp-customizer-js', get_stylesheet_directory_uri() . '/adds/libs.customizer.js', ['jquery', 'customize-controls'], false, 'all'); 
        wp_enqueue_style('wp-customizer-css', get_stylesheet_directory_uri() . '/adds/libs.customizer.css', null, false, 'all');

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


        $mods->custom_site_logo = get_theme_mod( 'custom-logo' )?:false;



        /*
        //  NAVIGATION & HEADER
        */

       
        $mods->top_warning = get_theme_mod( 'site_warning_status_settings' )=='true' ? get_theme_mod( 'site_warning_message_settings' ) : false;

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
        $mods->heading_size       = str_contains( $hss,'big' ) ? 'height:33vh;' : false;

        /* - - - - - - - - - - */

        $hbs = get_theme_mod( $looptype['type'].'_banner_settings' );
        $mods->header_banner_mode =  ( str_contains( $hbs,'in-body' ) ? 'in-body' : str_contains( $hbs,'in-head' ) ) ? 'in-head' : false ; 



        /*
        //  SIDEBARS
        */

        /* - - - - - - - - - - */

        $sss = get_theme_mod( $looptype['type'].'_small_side_settings' );
        $mods->sidebar_small_position = ( str_contains( $sss , 'left' ) ? 'left' : str_contains( $sss , 'right' ) ) ? 'right' : false ;
        $mods->sidebar_small_type = str_contains( $sss, 'dynamic') ? 'dynamic' : 'static';

        /* - - - - - - - - - - */

        $sbs = get_theme_mod( $looptype['type'].'_big_side_settings' );
        $mods->sidebar_big_position = ( str_contains( $sbs , 'left' ) ? 'left' : str_contains( $sbs , 'right' ) ) ? 'right' : false ;
        $mods->sidebar_big_type = str_contains( $sbs, 'dynamic') ? 'dynamic' : 'static';



        /*
        //  SIDEBARS
        */

        /* - - - - - - - - - - */


        return $mods;

    }

    add_action( 'wp', 'release_customization' );

    ?>