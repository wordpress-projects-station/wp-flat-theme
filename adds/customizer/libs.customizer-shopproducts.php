<?

    //
    // tab
    //

    $customizer->add_section('design_of_shop_product',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : products',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting('product_menu_style_sets',[ 'default'=>'framed-big' ]);
    $customizer->add_control('product_menu_style',[
        'section'  => 'design_of_shop_product',
        'label'    => 'Menu style',
        'settings' => 'product_menu_style_sets',
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

    $customizer->add_setting('product_header_style_sets',[ 'default'=>'framed-big' ]);
    $customizer->add_control('product_header_style',[
        'section'  => 'design_of_shop_product',
        'label'    => 'Header style',
        'settings' => 'product_header_style_sets',
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

    $customizer->add_setting('product_titles_position_sets',[ 'default'=>'true' ]);
    $customizer->add_control('product_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_product',
        'label'       => 'Titles data position',
        'settings'    => 'product_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('product_title_sets',[ 'default'=>'true' ]);
    $customizer->add_control('product_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_product',
        'label'       => 'Active/hide title',
        'settings'    => 'product_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('product_subtitle_sets',[ 'default'=>'true' ]);
    $customizer->add_control('product_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_product',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'product_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('product_excerpt_sets',[ 'default'=>'true' ]);
    $customizer->add_control('product_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_product',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'product_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('product_banner_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('product_banner',[
        'section'   => 'design_of_shop_product',
        'label'     => 'Main banner position',
        'settings'  => 'product_banner_sets',
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

    $customizer->add_setting( 'product_small_side_sets', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'product_small_side', [
        'section'   => 'design_of_shop_product',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'product_small_side_sets',  
        'choices'   => [
            'off'           => 'off',
            'static-left'   => 'static left',
            'static-right'  => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    $customizer->add_setting( 'product_big_side_sets', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'product_big_side', [
        'section'  => 'design_of_shop_product',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'product_big_side_sets',
        'choices'  => [
            'off'           => 'off',
            'static-left'   => 'static left',
            'static-right'  => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>