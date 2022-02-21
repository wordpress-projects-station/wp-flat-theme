
<?php

    // function moveNAV( \WP_Customize_Manager $wp_customize )
    // {
    //     $wp_customize->add_section( 'nav_menus_custom', array(
    //         'title' => __( 'Custom Section Title', 'nssra' ),
    //         'panel' => 'nav_menus'
    //     ) );
    
    //     // add "menu primary flex" checkbox setting
    //     $wp_customize->add_setting( 'menu_primary_flex', array(
    //         'capability'        => 'edit_theme_options',
    //         'default'           => '1',
    //         'sanitize_callback' => 'nssra_sanitize_checkbox',
    //     ) );
    
    //     // add 'menu primary flex' checkbox control
    //     $wp_customize->add_control( 'menu_primary_flex', array(
    //         'label'    => __( 'Stretch the primary menu to fill the available space.', 'nssra' ),
    //         'section'  => 'nav_menus_custom',
    //         'settings' => 'menu_primary_flex',
    //         'std'      => '1',
    //         'type'     => 'checkbox',
    //         'priority' => 1,
    //     ));

    // }
    // add_action( 'customize_register', 'moveNAV' );

    //Create Logo Setting and Upload Control
    function customizer_settings($wp_customize) {


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
            


        // $wp_customize->add_section( 'nav_menus_custom', array(
        //     'title'       => __( 'Custom Section Title', 'nssra' ),
        //     'panel'       => 'nav_menus',
        //     'description' => __( 'Section description goes here.', 'nssra' ),
        //     'priority'    => 5
        // ) );

        // remove widget tab
        // $wp_customize->get_section('title_tagline')->panel = 'options_panel';
        $wp_customize->remove_panel( 'widgets' );

        // // echo get_template_directory_uri().'/favico.png';
        $wp_customize->add_setting( 'site_icon' ,[
            'default' => get_template_directory_uri().'/favico.png',
        ]);
    }

    add_action('customize_register', 'customizer_settings');



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