<?

    //
    // tab
    //


    $customizer->add_section('design_of_archivie',[
        'panel'    => 'design_controller',
        'priority' => 4,
        'title'    => 'Design of archivie',
    ]);

    //
    // menu-style
    //

    $customizer->add_setting('archivie_menu_style_sets');
    get_theme_mod('archivie_menu_style_sets')?:set_theme_mod('archivie_menu_style_sets','wide');

    $customizer->add_control('archivie_menu_style',[
        'section'  => 'design_of_archivie',
        'label'    => 'Menu style',
        'settings' => 'archivie_menu_style_sets',
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

    $customizer->add_setting('archivie_header_style_sets');
    get_theme_mod('archivie_header_style_sets')?:set_theme_mod('archivie_header_style_sets','slim-wide');

    $customizer->add_control('archivie_header_style',[
        'section'  => 'design_of_archivie',
        'label'    => 'Header style',
        'settings' => 'archivie_header_style_sets',
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

    $customizer->add_setting('archivie_titles_position_sets');
    get_theme_mod('archivie_titles_position_sets')?:set_theme_mod('archivie_titles_position_sets','in-head');

    $customizer->add_control('archivie_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_archivie',
        'label'       => 'Titles data position',
        'settings'    => 'archivie_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('archivie_title_sets');
    get_theme_mod('archivie_title_sets')?:set_theme_mod('archivie_title_sets','true');

    $customizer->add_control('archivie_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_archivie',
        'label'       => 'Active/hide title',
        'settings'    => 'archivie_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('archivie_subtitle_sets',[ 'default'=>'true' ]);
    get_theme_mod('archivie_subtitle_sets')?:set_theme_mod('archivie_subtitle_sets','true');

    $customizer->add_control('archivie_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_archivie',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'archivie_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('archivie_excerpt_sets',[ 'default'=>'true' ]);
    get_theme_mod('archivie_excerpt_sets')?:set_theme_mod('archivie_excerpt_sets','true');

    $customizer->add_control('archivie_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_archivie',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'archivie_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('archivie_banner_sets');
    get_theme_mod('archivie_banner_sets')?:set_theme_mod('archivie_banner_sets','in-head');

    $customizer->add_control('archivie_banner',[
        'section'   => 'design_of_archivie',
        'label'     => 'Main banner position',
        'settings'  => 'archivie_banner_sets',
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

    // sidebar-small

    $customizer->add_setting( 'archivie_small_side_sets' );
    get_theme_mod('archivie_small_side_sets')?:set_theme_mod('archivie_small_side_sets','dynamic-right');

    $customizer->add_control( 'archivie_small_side', [
        'section'   => 'design_of_archivie',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'archivie_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'archivie_big_side_sets');
    get_theme_mod('archivie_big_side_sets')?:set_theme_mod('archivie_big_side_sets','dynamic-left');

    $customizer->add_control( 'archivie_big_side', [
        'section'  => 'design_of_archivie',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'archivie_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>