<?

    //
    // tab
    //

    $customizer->add_section('design_of_shop_home',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : home',
    ]);

    //
    // menu-style
    //

    $customizer->add_setting('shop_menu_style_sets',[ 'default'=>'wide' ]);
    $customizer->add_control('shop_menu_style',[
        'section'  => 'design_of_shop_home',
        'label'    => 'Menu style',
        'settings' => 'shop_menu_style_sets',
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

    $customizer->add_setting('shop_header_style_sets',[ 'default'=>'big-wide' ]);
    $customizer->add_control('shop_header_style',[
        'section'  => 'design_of_shop_home',
        'label'    => 'Header style',
        'settings' => 'shop_header_style_sets',
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

    $customizer->add_setting('shop_titles_position_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('shop_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_home',
        'label'       => 'Titles data position',
        'settings'    => 'shop_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('shop_title_sets',[ 'default'=>'true' ]);
    $customizer->add_control('shop_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_home',
        'label'       => 'Active/hide title',
        'settings'    => 'shop_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop_subtitle_sets',[ 'default'=>'true' ]);
    $customizer->add_control('shop_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_home',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'shop_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop_excerpt_sets',[ 'default'=>'true' ]);
    $customizer->add_control('shop_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_home',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'shop_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('shop_banner_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('shop_banner',[
        'section'   => 'design_of_shop_home',
        'label'     => 'Main banner position',
        'settings'  => 'shop_banner_sets',
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

    $customizer->add_setting( 'shop_small_side_sets', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'shop_small_side', [
        'section'   => 'design_of_shop_home',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'shop_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    $customizer->add_setting( 'shop_big_side_sets', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'shop_big_side', [
        'section'  => 'design_of_shop_home',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'shop_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>