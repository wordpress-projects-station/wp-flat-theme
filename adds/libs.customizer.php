<?php
    

    // more info: https://developer.wordpress.org/themes/customize-api/
    // more info: https://www.youtube.com/watch?v=o0eb_Cv0zVA

    
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
        $customizer->get_section( 'static_front_page' )->priority = '4';

        $customizer->get_panel( 'woocommerce' )->title = 'Store options';

        $customizer->get_section( 'custom_css' )->title = 'CSS override';

    } , 100 );


    // expand Menu Controllers
    
    add_action( 'customize_register', function( $customizer ) {

        // tab-title

        $customizer->add_section('design_of_top_menu',[
            'panel'    => 'nav_menus',
            'title'    => 'Top-Menu options',
            'priority' => 50,
        ]);

        $customizer->add_setting('topmenu_status_settings',[ 'default'=>'true' ]);
        $customizer->add_control('topmenu_status_data',[
            'section'=>'design_of_top_menu',
            'label'=>'[show/hide] top main menu',
            'type'=>'checkbox',
            'settings'=>'topmenu_status_settings',
        ]);

        $customizer->add_setting('topmenu_search_settings',[ 'default'=>'true' ]);
        $customizer->add_control('topmenu_search_data',[
            'section'=>'design_of_top_menu',
            'label'=>'[show/hide] search bar',
            'settings'=>'topmenu_search_settings',
            'type'=>'checkbox',
        ]);

        $customizer->add_setting('topmenu_alignment_settings',[ 'default'=>'left' ]);
        $customizer->add_control('topmenu_alignment_data',[
            'section'=>'design_of_top_menu',
            'label'=>'menu list alignment',
            'settings'=>'topmenu_alignment_settings',
            'type'     => 'radio',
            'choices'  => [
                'left'   => 'align left',
                'center' => 'align center',
                'right'  => 'align right',
            ],
        ]);

        $customizer->add_setting('topmenu_layout_settings',[ 'default'=>'relative' ]);
        $customizer->add_control('topmenu_layout_data',[
            'section'=>'design_of_top_menu',
            'label'=>'define layout of top main menu',
            'settings'=>'topmenu_layout_settings',
            'type'     => 'radio',
            'choices'  => [
                'relative' => 'relative to page',
                'framed'  => 'framed menu',
                'wide'   => 'wided menu',
            ],
        ]);

    } , 100 );


    add_action( 'customize_register', function( $customizer ) {

        // tab-title

        $customizer->add_section('site_settings',[
            'priority' => 2,
            'title'    => 'Site settings',
        ]);

        $customizer->add_setting('site_warning_status_settings',[ 'default'=>'false' ]);
        $customizer->add_control('site_warning_status_data',[
            'section'  => 'site_settings',
            'label'    => 'Warning message',
            'settings' => 'site_warning_status_settings',
            'type'     => 'checkbox',
        ]);

        $customizer->add_setting('site_warning_message_settings',[ 'default'=>'- WARNING! THIS SITE IS A DEMO SITE! <b>DO NOT BUY OR USE IT!</b> -' ]);
        $customizer->add_control('site_warning_message_data',[
            'section'  => 'site_settings',
            'settings' => 'site_warning_message_settings',
            'type'     => 'text',
        ]);


    } , 100 );

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
                'value' => 'Open the sample page',
                'class' => 'button button-border button-primary',
                'data-url' => get_site_url().'/sample-pages/',
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


    } , 100 );

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
                'data-url' => get_site_url().'/blog/',
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

    } , 100 );

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
                'data-url' => get_site_url().'/blog/random-post/',
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

    } , 100 );



    function custom_customize_enqueue() {
        wp_enqueue_script('wp-customizer-js', get_stylesheet_directory_uri() . '/adds/libs.customizer.js', ['jquery', 'customize-controls'], false, 'all'); 
        wp_enqueue_style('wp-customizer-css', get_stylesheet_directory_uri() . '/adds/libs.customizer.css', null, false, 'all');
    }
    add_action( 'customize_controls_init', 'custom_customize_enqueue' );

 
 
    /****

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

    ****/
?>