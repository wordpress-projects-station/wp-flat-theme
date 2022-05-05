<?

    //
    // tab
    //

    $customizer->add_section('design_of_page',[
        'panel'    => 'design_controller',
        'priority' => 2,
        'title'    => 'Design of page',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting('page_menu_style_sets',[ 'default'=>'wide' ]);
    $customizer->add_control('page_menu_style',[
        'section'  => 'design_of_page',
        'label'    => 'Menu style',
        'settings' => 'page_menu_style_sets',
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

    $customizer->add_setting('page_header_style_sets',[ 'default'=>'slim-wide' ]);
    $customizer->add_control('page_header_style',[
        'section'  => 'design_of_page',
        'label'    => 'Header style',
        'settings' => 'page_header_style_sets',
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

    $customizer->add_setting('page_titles_position_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('page_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_page',
        'label'       => 'Titles data position',
        'settings'    => 'page_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('page_title_sets',[ 'default'=>'true' ]);
    $customizer->add_control('page_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_page',
        'label'       => 'Active/hide title',
        'settings'    => 'page_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('page_subtitle_sets',[ 'default'=>'true' ]);
    $customizer->add_control('page_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_page',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'page_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('page_excerpt_sets',[ 'default'=>'true' ]);
    $customizer->add_control('page_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_page',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'page_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('page_banner_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('page_banner',[
        'section'   => 'design_of_page',
        'label'     => 'Main banner position',
        'settings'  => 'page_banner_sets',
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

    $customizer->add_setting( 'page_small_side_sets', ['default'=>'off'] );
    $customizer->add_control( 'page_small_side', [
        'section'   => 'design_of_page',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'page_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'page_big_side_sets', ['default'=>'off'] );
    $customizer->add_control( 'page_big_side', [
        'section'  => 'design_of_page',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'page_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>