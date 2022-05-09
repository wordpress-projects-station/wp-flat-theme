<?

    //
    // tab
    //

    $customizer->add_section('design_of_shop_catalog',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : catalog',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting('shop-catalog_menu_style_sets' );
    get_theme_mod('shop-catalog_menu_style_sets') ?: set_theme_mod('shop-catalog_menu_style_sets','wide');

    $customizer->add_control('shop-catalog_menu_style',[
        'section'  => 'design_of_shop_catalog',
        'label'    => 'Menu style',
        'settings' => 'shop-catalog_menu_style_sets',
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

    $customizer->add_setting('shop-catalog_header_style_sets' );
    get_theme_mod('shop-catalog_header_style_sets') ?: set_theme_mod('shop-catalog_header_style_sets','big-wide');

    $customizer->add_control('shop-catalog_header_style',[
        'section'  => 'design_of_shop_catalog',
        'label'    => 'Header style',
        'settings' => 'shop-catalog_header_style_sets',
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

    $customizer->add_setting('shop-catalog_titles_position_sets' );
    get_theme_mod('shop-catalog_titles_position_sets') ?: set_theme_mod('shop-catalog_titles_position_sets','in-head');

    $customizer->add_control('shop-catalog_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_catalog',
        'label'       => 'Titles data position',
        'settings'    => 'shop-catalog_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('shop-catalog_title_sets' );
    get_theme_mod('shop-catalog_title_sets') ?: set_theme_mod('shop-catalog_title_sets',true);

    $customizer->add_control('shop-catalog_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_catalog',
        'label'       => 'Active/hide title',
        'settings'    => 'shop-catalog_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-catalog_subtitle_sets' );
    get_theme_mod('shop-catalog_subtitle_sets') ?: set_theme_mod('shop-catalog_subtitle_sets',true);

    $customizer->add_control('shop-catalog_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_catalog',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'shop-catalog_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-catalog_excerpt_sets' );
    get_theme_mod('shop-catalog_excerpt_sets') ?: set_theme_mod('shop-catalog_excerpt_sets',true);

    $customizer->add_control('shop-catalog_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_catalog',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'shop-catalog_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('shop-catalog_banner_sets' );
    get_theme_mod('shop-catalog_banner_sets') ?: set_theme_mod('shop-catalog_banner_sets','in-head');

    $customizer->add_control('shop-catalog_banner',[
        'section'   => 'design_of_shop_catalog',
        'label'     => 'Main banner position',
        'settings'  => 'shop-catalog_banner_sets',
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

    $customizer->add_setting( 'shop-catalog_small_side_sets' );
    get_theme_mod('shop-catalog_small_side_sets') ?: set_theme_mod('shop-catalog_small_side_sets','dynamic-right');

    $customizer->add_control( 'shop-catalog_small_side', [
        'section'   => 'design_of_shop_catalog',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'shop-catalog_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);


    $customizer->add_setting( 'shop-catalog_big_side_sets' );
    get_theme_mod('shop-catalog_big_side_sets') ?: set_theme_mod('shop-catalog_big_side_sets','dynamic-left');

    $customizer->add_control( 'shop-catalog_big_side', [
        'section'  => 'design_of_shop_catalog',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'shop-catalog_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>