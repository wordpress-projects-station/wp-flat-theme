<?php
    

    // more info: https://developer.wordpress.org/themes/customize-api/
    // more info: https://www.youtube.com/watch?v=o0eb_Cv0zVA

    
    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo',[
        'width'  => 512,
        'flex-height' => true,
        'priority' => '2'
    ]);
    

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    add_action( 'customize_register', function( $wp_customize ) {

        $wp_customize->remove_panel( 'widgets' );

    } , 20 );


    add_action( 'customize_register', function( $wp_customize ) {

        $wp_customize->get_section('title_tagline')->title = 'Site Identity';
        $wp_customize->get_section('title_tagline')->priority = '1';

        $wp_customize->get_panel( 'nav_menus' )->title = 'Menu Controller';
        $wp_customize->get_panel( 'nav_menus' )->priority = '2';

        $wp_customize->get_section( 'menu_locations' )->title = 'Change positions';
        $wp_customize->get_section( 'menu_locations' )->priority = '0';

    } , 100 );


    // set Design of the pages
    add_action( 'customize_register', function( $wp_customize ) {

        $wp_customize->add_section('design_of_page',[
            'priority' => 10,
            'title'    => 'Design of pages',
        ]);

        $wp_customize->add_control( 'button_open_random_page', [
            'section'   => 'design_of_page',
            'priority'  => 0,
            'settings'  => [],
            'type'      => 'button',
            'input_attrs' => [
                'value' => 'Open the sample page',
                'class' => 'button button-border button-primary',
                'data-url' => admin_url( 'customize.php?url='.get_site_url().'/sample-page/' ),
                'data-urlshort' => get_site_url().'/sample-pages/',
            ],
        ]);

        $wp_customize->add_control('blank', [ 'label'=> '&#8206;', 'section'=>'design_of_page', 'type'=>'hidden', 'settings' => [] ]);

        // thumbnail

        $wp_customize->add_setting('page_banner_settings',[ 'default'=>'false' ]);
        $wp_customize->add_control('page_banner_data',[
            'section'=>'design_of_page',
            'label'=>'Show/hide top banner',
            'type'=>'checkbox',
            'settings'=>'page_banner_settings',
        ]);


        // sidebar small

        $wp_customize->add_setting( 'page_small_side_settings', ['default'=>'dynamic-left'] );
        $wp_customize->add_control( 'page_small_side_data', [
            'section'   => 'design_of_page',
            'label'     => 'Small Sidebar position',
            'type'      => 'radio',
            'settings'  => 'page_small_side_settings',  
            'choices'   => [
                'off'  => 'OFF',
                'static-left'  => 'STATIC-LEFT',
                'static-right' => 'STATIC-RIGHT',
                'dynamic-left'  => 'DYNAMIC-LEFT',
                'dynamic-right' => 'DYNAMIC-RIGHT',
            ],
        ]);

        // sidebar big

        $wp_customize->add_setting( 'page_big_side_settings', ['default'=>'dynamic-right'] );
        $wp_customize->add_control( 'page_big_side_data', [
            'section'  => 'design_of_page',
            'label'    => 'Big Sidebar position',
            'type'     => 'radio',
            'settings' => 'page_big_side_settings',
            'choices'  => [
                'off'  => 'OFF',
                'static-left'  => 'STATIC-LEFT',
                'static-right' => 'STATIC-RIGHT',
                'dynamic-left'  => 'DYNAMIC-LEFT',
                'dynamic-right' => 'DYNAMIC-RIGHT',
            ],
        ]);


        // set Design of the post

        $wp_customize->add_section('design_of_post',[
            'priority' => 10,
            'title'    => 'Design of post',
        ]);

        $wp_customize->add_control( 'button_open_random_post', [
            'section'   => 'design_of_post',
            'priority'  => 0,
            'settings'  => [],
            'type'      => 'button',
            'input_attrs' => [
                'value' => 'Open the customized page',
                'class' => 'button button-border button-primary',
                'data-url' => admin_url( 'customize.php?url='.get_site_url().'/blog/random-post/' ),
                'data-urlshort' => get_site_url().'/blog/random-post/',
            ],
        ]);

        $wp_customize->add_control('blank', [ 'label'=> '&#8206;', 'section'=>'design_of_post', 'type'=>'hidden', 'settings' => [] ]);

        // thumbnail

        $wp_customize->add_setting('post_banner_settings',[ 'default'=>'false' ]);
        $wp_customize->add_control('post_banner_data',[
            'section'=>'design_of_post',
            'label'=>'Show/hide top banner',
            'type'=>'checkbox',
            'settings'=>'post_banner_settings',
        ]);


        // sidebar small

        $wp_customize->add_setting( 'post_small_side_settings', ['default'=>'dynamic-left'] );
        $wp_customize->add_control( 'post_small_side_data', [
            'section'   => 'design_of_post',
            'label'     => 'Small Sidebar position',
            'type'      => 'radio',
            'settings'  => 'post_small_side_settings',  
            'choices'   => [
                'off'  => 'OFF',
                'static-left'  => 'STATIC-LEFT',
                'static-right' => 'STATIC-RIGHT',
                'dynamic-left'  => 'DYNAMIC-LEFT',
                'dynamic-right' => 'DYNAMIC-RIGHT',
            ],
        ]);

        // sidebar big

        $wp_customize->add_setting( 'post_big_side_settings', ['default'=>'dynamic-right'] );
        $wp_customize->add_control( 'post_big_side_data', [
            'section'  => 'design_of_post',
            'label'    => 'Big Sidebar position',
            'type'     => 'radio',
            'settings' => 'post_big_side_settings',
            'choices'  => [
                'off'  => 'OFF',
                'static-left'  => 'STATIC-LEFT',
                'static-right' => 'STATIC-RIGHT',
                'dynamic-left'  => 'DYNAMIC-LEFT',
                'dynamic-right' => 'DYNAMIC-RIGHT',
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

        $wp_customize->add_panel('options_panel',[
            'title'=>'Design Options',
            'description'=> 'Collection of themes options',
            'priority'=> 10,
        ]);

        // "Design Options" > "tab_1"

        $wp_customize->add_section('tab_1',[
            'panel'=>'options_panel',
            'priority'=>10,
            'title'=>'TAB 1',
        ]);

        // "Design Options" > "tab_1" > ...

        $wp_customize->add_setting('demo_text_sets',[ 'default'=>'a' ]);
        $wp_customize->add_control('contrl_demo_text',[
            'section'=>'tab_1',
            'label'=>'Text',
            'type'=>'text',
            'settings'=>'demo_text_sets',
        ]);

        $wp_customize->add_setting('demo_checkbox_sets',[ 'default'=>'false' ]);
        $wp_customize->add_control('contrl_demo_check',[
            'section'=>'tab_1',
            'label'=>'Choose Y/N',
            'type'=>'checkbox',
            'settings'=>'demo_checkbox_sets',
        ]);

        $wp_customize->add_setting( 'demo_radio_sets', ['default' => 'blue']);
        $wp_customize->add_control( 'demo_radio_sets', [
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

        $wp_customize->add_setting( 'demo_select_sets', ['default' => 'blue']);
        $wp_customize->add_control( 'demo_select_sets', [
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