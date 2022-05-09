<?

    // tab-title

    $customizer->add_section('design_of_account',[
        'panel'    => 'design_controller',
        'priority' => 3,
        'title'    => 'Design of account',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting( 'account_menu_style_sets' );
    get_theme_mod('account_menu_style_sets') ?: set_theme_mod('account_menu_style_sets','wide');

    $customizer->add_control('account_menu_style',[
        'settings' => 'account_menu_style_sets',
        'section'  => 'design_of_account',
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

    $customizer->add_setting( 'account_header_style_sets' );
    get_theme_mod('account_header_style_sets') ?: set_theme_mod('account_header_style_sets','slim-wide');

    $customizer->add_control('account_header_style',[
        'settings' => 'account_header_style_sets',
        'section'  => 'design_of_account',
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

    $customizer->add_setting( 'account_titles_position_sets' );
    get_theme_mod('account_titles_position_sets') ?: set_theme_mod('account_titles_position_sets','in-head');

    $customizer->add_control('account_titles_position',[
        'settings'    => 'account_titles_position_sets',
        'section'     => 'design_of_account',
        'label'       => 'Titles data position',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting( 'account_title_sets' );
    get_theme_mod('account_title_sets') ?: set_theme_mod('account_title_sets',true);

    $customizer->add_control('account_title',[
        'settings'    => 'account_title_sets',
        'section'     => 'design_of_account',
        'label'       => 'Active/hide title',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting( 'account_subtitle_sets' );
    get_theme_mod('account_subtitle_sets') ?: set_theme_mod('account_subtitle_sets',true);

    $customizer->add_control('account_subtitle',[
        'settings'    => 'account_subtitle_sets',
        'section'     => 'design_of_account',
        'label'       => 'Active/hide sub-title',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting( 'account_excerpt_sets' );
    get_theme_mod('account_excerpt_sets') ?: set_theme_mod('account_excerpt_sets',true);

    $customizer->add_control('account_excerpt',[
        'settings'    => 'account_excerpt_sets',
        'section'     => 'design_of_account',
        'label'       => 'Active/hide excerpt',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('account_banner_sets' );
    get_theme_mod('account_banner_sets') ?: set_theme_mod('account_banner_sets','in-head');

    $customizer->add_control('account_banner',[
        'settings'  => 'account_banner_sets',
        'section'   => 'design_of_account',
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

    $customizer->add_setting( 'account_small_side_sets' );
    get_theme_mod('account_small_side_sets') ?: set_theme_mod('account_small_side_sets','off');

    $customizer->add_control( 'account_small_side', [
        'settings'  => 'account_small_side_sets',  
        'section'   => 'design_of_account',
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

    $customizer->add_setting( 'account_big_side_sets' );
    get_theme_mod('account_big_side_sets') ?: set_theme_mod('account_big_side_sets','off');

    $customizer->add_control( 'account_big_side', [
        'settings' => 'account_big_side_sets',
        'section'  => 'design_of_account',
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