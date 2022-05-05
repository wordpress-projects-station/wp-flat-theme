<?

    //
    // tab
    //

    // it's refered to "static_front_page" in libs.customizer-correction.php

    //
    // menu-style
    //

    $customizer->add_setting('front-page_menu_style_sets',[ 'default'=>'wide' ]);
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

    $customizer->add_setting('front-page_header_style_sets',[ 'default'=>'big-wide' ]);
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

    $customizer->add_setting('front-page_titles_position_sets',[ 'default'=>'in-head' ]);
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

    $customizer->add_setting('front-page_title_sets',[ 'default'=>'false' ]);
    $customizer->add_control('front-page_title',[
        // 'priority'    => 1,
        'section'     => 'static_front_page',
        'label'       => 'Active/hide title',
        'settings'    => 'front-page_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('front-page_subtitle_sets',[ 'default'=>'false' ]);
    $customizer->add_control('front-page_subtitle',[
        // 'priority'    => 1,
        'section'     => 'static_front_page',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'front-page_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('front-page_excerpt_sets',[ 'default'=>'false' ]);
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

    $customizer->add_setting('front-page_banner_sets',[ 'default'=>'off' ]);
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

    $customizer->add_setting( 'front-page_small_side_sets', ['default'=>'off'] );
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

    $customizer->add_setting( 'front-page_big_side_sets', ['default'=>'off'] );
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