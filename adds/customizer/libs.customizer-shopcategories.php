<?

    //
    // tab
    //


    $customizer->add_section('design_of_shop_categories',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : categories',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting('shop-categories_menu_style_sets');
    get_theme_mod('shop-categories_menu_style_sets') ?: set_theme_mod('shop-categories_menu_style_sets','wide');
    
    $customizer->add_control('shop-categories_menu_style',[
        'section'  => 'design_of_shop_categories',
        'label'    => 'Menu style',
        'settings' => 'shop-categories_menu_style_sets',
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

    $customizer->add_setting('shop-categories_header_style_sets');
    get_theme_mod('shop-categories_header_style_sets') ?: set_theme_mod('shop-categories_header_style_sets','big-wide');
    
    $customizer->add_control('shop-categories_header_style',[
        'section'  => 'design_of_shop_categories',
        'label'    => 'Header style',
        'settings' => 'shop-categories_header_style_sets',
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

    $customizer->add_setting('shop-categories_titles_position_sets');
    get_theme_mod('shop-categories_titles_position_sets') ?: set_theme_mod('shop-categories_titles_position_sets','in-head');
    
    $customizer->add_control('shop-categories_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_categories',
        'label'       => 'Titles data position',
        'settings'    => 'shop-categories_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('shop-categories_title_sets');
    get_theme_mod('shop-categories_title_sets') ?: set_theme_mod('shop-categories_title_sets',true);
    
    $customizer->add_control('shop-categories_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_categories',
        'label'       => 'Active/hide title',
        'settings'    => 'shop-categories_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-categories_subtitle_sets');
    get_theme_mod('shop-categories_subtitle_sets') ?: set_theme_mod('shop-categories_subtitle_sets',true);
    
    $customizer->add_control('shop-categories_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_categories',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'shop-categories_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-categories_excerpt_sets');
    get_theme_mod('shop-categories_excerpt_sets') ?: set_theme_mod('shop-categories_excerpt_sets',true);
    
    $customizer->add_control('shop-categories_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_categories',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'shop-categories_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('shop-categories_banner_sets');
    get_theme_mod('shop-categories_banner_sets') ?: set_theme_mod('shop-categories_banner_sets','in-head');
    
    $customizer->add_control('shop-categories_banner',[
        'section'   => 'design_of_shop_categories',
        'label'     => 'Main banner position',
        'settings'  => 'shop-categories_banner_sets',
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

    $customizer->add_setting( 'shop-categories_small_side_sets');
    get_theme_mod('shop-categories_small_side_sets') ?: set_theme_mod('shop-categories_small_side_sets','dynamic-right');
    
    $customizer->add_control( 'shop-categories_small_side', [
        'section'   => 'design_of_shop_categories',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'shop-categories_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);


    $customizer->add_setting( 'shop-categories_big_side_sets' );
    get_theme_mod('shop-categories_small_side_sets') ?: set_theme_mod('shop-categories_small_side_sets','dynamic-left');
    
    $customizer->add_control( 'shop-categories_big_side', [
        'section'  => 'design_of_shop_categories',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'shop-categories_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>