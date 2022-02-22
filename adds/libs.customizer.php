
<?php


    // mre info: https://developer.wordpress.org/themes/customize-api/



   ;

    
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

        $wp_customize->get_panel( 'nav_menus' )->title = 'Menu del sito';
        $wp_customize->get_panel( 'nav_menus' )->priority = '2';

        $wp_customize->get_section( 'menu_locations' )->title = 'Modifica posizioni';
        $wp_customize->get_section( 'menu_locations' )->priority = '0';


    },100);

    add_action('customize_register', function( $wp_customize ) {

        $wp_customize->get_section('title_tagline')->title = 'Dati principali';
        $wp_customize->get_section('title_tagline')->priority = '1';

    },100);


    add_action('customize_register', function( $wp_customize ) {



        // ADD PANEL "Design Options"
            
            // "Design Options" > "tab_1"

            $wp_customize->add_section('tab_1',[
                'priority'=>10,
                'title'=>'TAB 1',
                'heading'=>'TESTER!'
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
            


        // remove widget tab
        // $wp_customize->get_section('title_tagline')->panel = 'options_panel';
        

        // $wp_customize->get_section('nav_menus')->title = 'Posizione Menu';
        // $wp_customize->get_section('nav_menus')->priority = 2;



        // // echo get_template_directory_uri().'/favico.png';
        // $wp_customize->add_setting( 'site_icon' ,[
        //     'default' => get_template_directory_uri().'/favico.png',
        // ]);

    },100);


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