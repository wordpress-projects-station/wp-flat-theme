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

    $customizer->add_setting( 'page_menu_style_sets' );
    get_theme_mod('page_menu_style_sets') ?: set_theme_mod('page_menu_style_sets','wide');

    $customizer->add_control('page_menu_style',[
        'settings' => 'page_menu_style_sets',
        'section'  => 'design_of_page',
        'label'    => 'Menu style',
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

    $customizer->add_setting( 'page_header_style_sets' );
    get_theme_mod('page_header_style_sets') ?: set_theme_mod('page_header_style_sets','slim-wide');

    $customizer->add_control('page_header_style',[
        'settings' => 'page_header_style_sets',
        'section'  => 'design_of_page',
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

    $customizer->add_setting( 'page_titles_position_sets' );
    get_theme_mod('page_titles_position_sets') ?: set_theme_mod('page_titles_position_sets','in-head');

    $customizer->add_control('page_titles_position',[
        'settings'    => 'page_titles_position_sets',
        'section'     => 'design_of_page',
        'label'       => 'Titles data position',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting( 'page_title_sets' );
    get_theme_mod('page_title_sets') ?: set_theme_mod('page_title_sets','true');

    $customizer->add_control('page_title',[
        'settings'    => 'page_title_sets',
        'section'     => 'design_of_page',
        'label'       => 'Active/hide title',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting( 'page_subtitle_sets' );
    get_theme_mod('page_subtitle_sets') ?: set_theme_mod('page_subtitle_sets','true');

    $customizer->add_control('page_subtitle',[
        'settings'    => 'page_subtitle_sets',
        'section'     => 'design_of_page',
        'label'       => 'Active/hide sub-title',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting( 'page_excerpt_sets' );
    get_theme_mod('page_excerpt_sets') ?: set_theme_mod('page_excerpt_sets','true');

    $customizer->add_control('page_excerpt',[
        'settings'    => 'page_excerpt_sets',
        'section'     => 'design_of_page',
        'label'       => 'Active/hide excerpt',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('page_banner_sets' );
    get_theme_mod('page_banner_sets') ?: set_theme_mod('page_banner_sets','in-head');

    $customizer->add_control('page_banner',[
        'settings'  => 'page_banner_sets',
        'section'   => 'design_of_page',
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

    $customizer->add_setting( 'page_small_side_sets' );
    get_theme_mod('page_small_side_sets') ?: set_theme_mod('page_small_side_sets','off');

    $customizer->add_control( 'page_small_side', [
        'settings'  => 'page_small_side_sets',  
        'section'   => 'design_of_page',
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

    $customizer->add_setting( 'page_big_side_sets' );
    get_theme_mod('page_big_side_sets') ?: set_theme_mod('page_big_side_sets','off');

    $customizer->add_control( 'page_big_side', [
        'settings' => 'page_big_side_sets',
        'section'  => 'design_of_page',
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