<?

    //
    // tab
    //

    // it's refered to "static_front_page" in libs.customizer-correction.php

    //
    // menu-style
    //

    $customizer->add_setting( 'front-page_menu_style_sets' );
    get_theme_mod('front-page_menu_style_sets') ?: set_theme_mod('front-page_menu_style_sets','wide');

    $customizer->add_control('front-page_menu_style',[
        'section'  => 'static_front_page',
        'label'    => 'Menu style',
        'settings' => 'front-page_menu_style_sets',
        'type'     => 'radio',
        'choices'  => [
            'off'       => 'off',
            'wide'      => 'wide',
            'framed'    => 'framed',
        ],
    ]);


    //
    // header-style
    //

    $customizer->add_setting( 'front-page_header_style_sets' );
    get_theme_mod('front-page_header_style_sets') ?: set_theme_mod('front-page_header_style_sets','big-wide');

    $customizer->add_control('front-page_header_style',[
        'section'  => 'static_front_page',
        'label'    => 'Header style',
        'settings' => 'front-page_header_style_sets',
        'type'     => 'radio',
        'choices'  => [
            'off'         => 'off',
            'slim-framed' => 'slim framed',
            'slim-wide'   => 'slim wide',
            'big-framed'  => 'big framed ',
            'big-wide'    => 'big wide',
        ],
    ]);


    //
    // Titles data settings
    //

    $customizer->add_setting( 'front-page_titles_position_sets' );
    get_theme_mod('front-page_titles_position_sets') ?: set_theme_mod('front-page_titles_position_sets','in-head');

    $customizer->add_control('front-page_titles_position',[
        // 'priority'    => 1,
        'section'     => 'static_front_page',
        'label'       => 'Titles data position',
        'settings'    => 'front-page_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting( 'front-page_title_sets' );
    get_theme_mod('front-page_title_sets') ?: set_theme_mod('front-page_title_sets',false);

    $customizer->add_control('front-page_title',[
        // 'priority'    => 1,
        'section'     => 'static_front_page',
        'label'       => 'Active/hide title',
        'settings'    => 'front-page_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting( 'front-page_subtitle_sets' );
    get_theme_mod('front-page_subtitle_sets') ?: set_theme_mod('front-page_subtitle_sets',false);

    $customizer->add_control('front-page_subtitle',[
        // 'priority'    => 1,
        'section'     => 'static_front_page',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'front-page_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting( 'front-page_excerpt_sets' );
    get_theme_mod('front-page_excerpt_sets') ?: set_theme_mod('front-page_excerpt_sets',false);

    $customizer->add_control('front-page_excerpt',[
        // 'priority'    => 1,
        'section'     => 'static_front_page',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'front-page_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting( 'front-page_banner_sets' );
    get_theme_mod('front-page_banner_sets') ?: set_theme_mod('front-page_banner_sets','off');

    $customizer->add_control('front-page_banner',[
        'section'   => 'static_front_page',
        'label'     => 'Main banner position',
        'settings'  => 'front-page_banner_sets',
        'type'      => 'radio',
        'choices'   => [
            'off'      => 'off',
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);


    //
    // Sidebars
    //

    $customizer->add_setting( 'front-page_small_side_sets' );
    get_theme_mod('checkout_subtitle_sets') ?: set_theme_mod('checkout_subtitle_sets','off');

    $customizer->add_control( 'front-page_small_side', [
        'section'   => 'static_front_page',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'front-page_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'front-page_big_side_sets' );
    get_theme_mod('checkout_subtitle_sets') ?: set_theme_mod('checkout_subtitle_sets','off');

    $customizer->add_control( 'front-page_big_side', [
        'section'  => 'static_front_page',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'front-page_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>