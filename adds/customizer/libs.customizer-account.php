<?

    //
    // tab
    //

    $customizer->add_section('design_of_account',[
        'panel'    => 'design_controller',
        'priority' => 3,
        'title'    => 'Design of account',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting('account_menu_style_sets',[ 'default'=>'wide' ]);
    $customizer->add_control('account_menu_style',[
        'section'  => 'design_of_account',
        'label'    => 'Menu style',
        'settings' => 'account_menu_style_sets',
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

    $customizer->add_setting('account_header_style_sets',[ 'default'=>'off' ]);
    $customizer->add_control('account_header_style',[
        'section'  => 'design_of_account',
        'label'    => 'Header style',
        'settings' => 'account_header_style_sets',
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

    $customizer->add_setting('account_titles_position_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('account_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_account',
        'label'       => 'Titles data position',
        'settings'    => 'account_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('account_title_sets',[ 'default'=>'true' ]);
    $customizer->add_control('account_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_account',
        'label'       => 'Active/hide title',
        'settings'    => 'account_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('account_subtitle_sets',[ 'default'=>'true' ]);
    $customizer->add_control('account_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_account',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'account_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('account_excerpt_sets',[ 'default'=>'true' ]);
    $customizer->add_control('account_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_account',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'account_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('account_banner_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('account_banner',[
        'section'   => 'design_of_account',
        'label'     => 'Main banner position',
        'settings'  => 'account_banner_sets',
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

    $customizer->add_setting( 'account_small_side_sets', ['default'=>'off'] );
    $customizer->add_control( 'account_small_side', [
        'section'   => 'design_of_account',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'account_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'account_big_side_sets', ['default'=>'off'] );
    $customizer->add_control( 'account_big_side', [
        'section'  => 'design_of_account',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'account_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>