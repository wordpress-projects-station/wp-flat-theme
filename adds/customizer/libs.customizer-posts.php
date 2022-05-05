<?

    //
    // tab
    //

    $customizer->add_section('design_of_post',[
        'panel'    => 'design_controller',
        'priority' => 6,
        'title'    => 'Design of blog : posts',
    ]);


    //
    // menu-style
    //

    $customizer->add_setting('post_menu_style_sets',[ 'default'=>'wide' ]);
    $customizer->add_control('post_menu_style',[
        'section'  => 'design_of_post',
        'label'    => 'Menu style',
        'settings' => 'post_menu_style_sets',
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

    $customizer->add_setting('post_header_style_sets',[ 'default'=>'big-wide' ]);
    $customizer->add_control('post_header_style',[
        'section'  => 'design_of_post',
        'label'    => 'Header style',
        'settings' => 'post_header_style_sets',
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

    $customizer->add_setting('post_titles_position_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('post_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_post',
        'label'       => 'Titles data position',
        'settings'    => 'post_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('post_title_sets',[ 'default'=>'true' ]);
    $customizer->add_control('post_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_post',
        'label'       => 'Active/hide title',
        'settings'    => 'post_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('post_subtitle_sets',[ 'default'=>'true' ]);
    $customizer->add_control('post_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_post',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'post_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('post_excerpt_sets',[ 'default'=>'true' ]);
    $customizer->add_control('post_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_post',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'post_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('post_banner_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('post_banner',[
        'section'   => 'design_of_post',
        'label'     => 'Main banner position',
        'settings'  => 'post_banner_sets',
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

    $customizer->add_setting( 'post_small_side_sets', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'post_small_side', [
        'section'   => 'design_of_post',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'post_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    $customizer->add_setting( 'post_big_side_sets', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'post_big_side', [
        'section'  => 'design_of_post',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'post_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>