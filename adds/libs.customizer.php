
<?php
    

    // more info: https://developer.wordpress.org/themes/customize-api/
    // more info: https://www.youtube.com/watch?v=o0eb_Cv0zVA

    
    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo',[
        'width'  => 512,
        'flex-height' => true,
        'priority' => '5'
    ]);
    


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    add_action('customize_register', function( $wp_customize ) {

        $wp_customize->remove_panel( 'widgets' );

    },20);


    // add_action('customize_register', function( $wp_customize ) {

    //     $wp_customize->get_control( 'custom_logo' )->priority = '2';

    // },20);


    add_action('customize_register', function( $wp_customize ) {

        $wp_customize->get_section('title_tagline')->title = 'Site Identity';
        $wp_customize->get_section('title_tagline')->priority = '1';

    },100);
    
    
    add_action('customize_register', function( $wp_customize ) {

        $wp_customize->get_panel( 'nav_menus' )->title = 'Menu Controller';
        $wp_customize->get_panel( 'nav_menus' )->priority = '2';

        $wp_customize->get_section( 'menu_locations' )->title = 'Change positions';
        $wp_customize->get_section( 'menu_locations' )->priority = '0';

    },100);


    // set Design of the post
    add_action('customize_register', function( $wp_customize ) {

        $wp_customize->add_section('design_of_post',[
            'priority'=>10,
            'title'=>'Design of post',
        ]);

        $wp_customize->add_control( 'button_open_random_post', [
            'type' => 'button',
            'settings' => [],  
            'priority' => 0,
            'section' => 'design_of_post',
            'input_attrs' => [
                'data-urlshort' => get_site_url().'/blog/random-post/',
                'data-url' => admin_url( 'customize.php?url='.get_site_url().'/blog/random-post/' ),
                'value' => 'Open the customized page',
                'class' => 'button button-border button-primary',
            ]
        ]);

        $wp_customize->add_control('blank', [ 'label'=> '&#8206;', 'section'=>'design_of_post', 'type'=>'hidden', 'settings' => [] ]);

        $wp_customize->add_setting('post_sidebar_left_sets',['default'=>'false']);
        $wp_customize->add_control('post_sidebar_left_checkbox',[
            'section'=>'design_of_post',
            'settings'=>'post_sidebar_left_sets',
            'label'=>'Sidebar left',
            'description' => 'show/hide of micro sidebar on left of layout',
            'type'=>'checkbox',
        ]);

    },100);

    function custom_customize_enqueue() {
        wp_enqueue_script('wp-customizer-js', get_stylesheet_directory_uri() . '/adds/libs.customizer.js', ['jquery', 'customize-controls'], false, 'all'); 
        wp_enqueue_style('wp-customizer-css', get_stylesheet_directory_uri() . '/adds/libs.customizer.css', null, false, 'all');
    }
    add_action( 'customize_controls_init', 'custom_customize_enqueue' );

    
?>





<?php

// DESIGN MODEL:

// // ADD PANEL "Design Options"

// $wp_customize->add_panel('options_panel',[
//     'title'=>'Design Options',
//     'description'=> 'Collection of themes options',
//     'priority'=> 10,
// ]);
    
//     // "Design Options" > "tab_1"

//     $wp_customize->add_section('tab_1',[
//         'panel'=>'options_panel',
//         'priority'=>10,
//         'title'=>'TAB 1',
//     ]);

//         // "Design Options" > "tab_1" > ...

//         $wp_customize->add_setting('demo_text_sets',[ 'default'=>'a' ]);
//         $wp_customize->add_control('contrl_demo_text',[
//             'section'=>'tab_1',
//             'label'=>'Text',
//             'type'=>'text',
//             'settings'=>'demo_text_sets',
//         ]);

//         $wp_customize->add_setting('demo_checkbox_sets',[ 'default'=>'false' ]);
//         $wp_customize->add_control('contrl_demo_check',[
//             'section'=>'tab_1',
//             'label'=>'Choose Y/N',
//             'type'=>'checkbox',
//             'settings'=>'demo_checkbox_sets',
//         ]);

//         $wp_customize->add_setting( 'demo_radio_sets', ['default' => 'blue']);
//         $wp_customize->add_control( 'demo_radio_sets', [
//             'section' => 'tab_1',
//             'label' => 'Radio Selection',
//             'description' => 'This is a custom radio input.',
//             'type' => 'radio',
//             'choices' => [
//                 'red' => 'Red',
//                 'blue' => 'Blue',
//                 'green' => 'Green',
//             ],
//         ]);


//         $wp_customize->add_setting( 'demo_select_sets', ['default' => 'blue']);
//         $wp_customize->add_control( 'demo_select_sets', [
//             'section' => 'tab_1',
//             'label' => 'Select Selection',
//             'description' => 'This is a custom select input.',
//             'type' => 'select',
//             'choices' => [
//                 'red' => 'Red',
//                 'blue' => 'Blue',
//                 'green' => 'Green',
//             ],
//         ]);
?>