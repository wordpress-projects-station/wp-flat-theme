<?

    //
    // tab
    //

    $customizer->add_section('design_of_shop-cart',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : cart',
    ]);

 
    //
    // menu-style
    //

    $customizer->add_setting('cart_menu_style_sets');
    get_theme_mod('cart_menu_style_sets') ?: set_theme_mod('cart_menu_style_sets','wide');

    $customizer->add_control('cart_menu_style',[
        'section'  => 'design_of_shop-cart',
        'label'    => 'Menu style',
        'settings' => 'cart_menu_style_sets',
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

    $customizer->add_setting('cart_header_style_sets');
    get_theme_mod('cart_header_style_sets') ?: set_theme_mod('cart_header_style_sets','slim-wide');

    $customizer->add_control('cart_header_style',[
        'settings' => 'cart_header_style_sets',
        'section'  => 'design_of_shop-cart',
        'label'    => 'Header style',
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

    $customizer->add_setting('cart_titles_position_sets');
    get_theme_mod('cart_titles_position_sets') ?: set_theme_mod('cart_titles_position_sets','in-head');

    $customizer->add_control('cart_titles_position',[
        'settings'    => 'cart_titles_position_sets',
        'section'     => 'design_of_shop-cart',
        'label'       => 'Titles data position',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);


    $customizer->add_setting('cart_title_sets');
    get_theme_mod('cart_title_sets') ?: set_theme_mod('cart_title_sets','true');

    $customizer->add_control('cart_title',[
        'settings'    => 'cart_title_sets',
        'section'     => 'design_of_shop-cart',
        'label'       => 'Active/hide title',
        'type'        => 'checkbox',
    ]);


    $customizer->add_setting('cart_subtitle_sets');
    get_theme_mod('cart_subtitle_sets') ?: set_theme_mod('cart_subtitle_sets','true');

    $customizer->add_control('cart_subtitle',[
        'settings'    => 'cart_subtitle_sets',
        'section'     => 'design_of_shop-cart',
        'label'       => 'Active/hide sub-title',
        'type'        => 'checkbox',
    ]);


    $customizer->add_setting('cart_excerpt_sets');
    get_theme_mod('cart_excerpt_sets') ?: set_theme_mod('cart_excerpt_sets','true');

    $customizer->add_control('cart_excerpt',[
        'settings'    => 'cart_excerpt_sets',
        'section'     => 'design_of_shop-cart',
        'label'       => 'Active/hide excerpt',
        'type'        => 'checkbox',
    ]);

    //
    // Header banner  
    //

    $customizer->add_setting('cart_banner_sets');
    get_theme_mod('cart_banner_sets') ?: set_theme_mod('cart_banner_sets','in-head');

    $customizer->add_control('cart_banner',[
        'settings'  => 'cart_banner_sets',
        'section'   => 'design_of_shop-cart',
        'label'     => 'Main banner position',
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

    $customizer->add_setting( 'cart_small_side_sets');
    get_theme_mod('cart_small_side_sets') ?: set_theme_mod('cart_small_side_sets','off');

    $customizer->add_control( 'cart_small_side', [
        'settings'  => 'cart_small_side_sets',  
        'section'   => 'design_of_shop-cart',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);


    // sidebar-big

    $customizer->add_setting( 'cart_big_side_sets');
    get_theme_mod('cart_big_side_sets') ?: set_theme_mod('cart_big_side_sets','off');

    $customizer->add_control( 'cart_big_side', [
        'settings' => 'cart_big_side_sets',
        'section'  => 'design_of_shop-cart',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);


?>