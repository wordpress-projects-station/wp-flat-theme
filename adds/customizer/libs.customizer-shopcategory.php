
<?

    //
    // tab
    //

    $customizer->add_section('design_of_shop_category',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : category',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting('archive-product_menu_style_sets',[ 'default'=>'wide' ]);
    $customizer->add_control('archive-product_menu_style',[
        'section'  => 'design_of_shop_category',
        'label'    => 'Menu style',
        'settings' => 'archive-product_menu_style_sets',
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

    $customizer->add_setting('archive-product_header_style_sets',[ 'default'=>'big-wide' ]);
    $customizer->add_control('archive-product_header_style',[
        'section'  => 'design_of_shop_category',
        'label'    => 'Header style',
        'settings' => 'archive-product_header_style_sets',
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

    $customizer->add_setting('archive-product_titles_position_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('archive-product_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_category',
        'label'       => 'Titles data position',
        'settings'    => 'archive-product_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('archive-product_title_sets',[ 'default'=>'true' ]);
    $customizer->add_control('archive-product_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_category',
        'label'       => 'Active/hide title',
        'settings'    => 'archive-product_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('archive-product_subtitle_sets',[ 'default'=>'true' ]);
    $customizer->add_control('archive-product_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_category',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'archive-product_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('archive-product_excerpt_sets',[ 'default'=>'true' ]);
    $customizer->add_control('archive-product_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_category',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'archive-product_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('archive-product_banner_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('archive-product_banner',[
        'section'   => 'design_of_shop_category',
        'label'     => 'Main banner position',
        'settings'  => 'archive-product_banner_sets',
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

    $customizer->add_setting( 'archive-product_small_side_sets', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'archive-product_small_side', [
        'section'   => 'design_of_shop_category',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'archive-product_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'archive-product_big_side_sets', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'archive-product_big_side', [
        'section'  => 'design_of_shop_category',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'archive-product_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>