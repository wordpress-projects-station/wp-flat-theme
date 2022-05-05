<?

    //
    // tab
    //

    $customizer->add_section('design_of_blog-home',[
        'panel'    => 'design_controller',
        'priority' => 5,
        'title'    => 'Design of blog : home',
    ]);

 
    //
    // menu-style
    //

    $customizer->add_setting('blog-home_menu_style_sets',[ 'default'=>'framed-big' ]);
    $customizer->add_control('blog-home_menu_style',[
        'section'  => 'design_of_blog-home',
        'label'    => 'Menu style',
        'settings' => 'blog-home_menu_style_sets',
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

    $customizer->add_setting('blog-home_header_style_sets',[ 'default'=>'framed-big' ]);
    $customizer->add_control('blog-home_header_style',[
        'section'  => 'design_of_blog-home',
        'label'    => 'Header style',
        'settings' => 'blog-home_header_style_sets',
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

    $customizer->add_setting('blog-home_titles_position_sets',[ 'default'=>'true' ]);
    $customizer->add_control('blog-home_titles_position',[
        // 'priority'    => 1,
        'section'     => 'design_of_blog-home',
        'label'       => 'Titles data position',
        'settings'    => 'blog-home_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('blog-home_title_sets',[ 'default'=>'true' ]);
    $customizer->add_control('blog-home_title',[
        // 'priority'    => 1,
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide title',
        'settings'    => 'blog-home_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('blog-home_subtitle_sets',[ 'default'=>'true' ]);
    $customizer->add_control('blog-home_subtitle',[
        // 'priority'    => 1,
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'blog-home_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('blog-home_excerpt_sets',[ 'default'=>'true' ]);
    $customizer->add_control('blog-home_excerpt',[
        // 'priority'    => 1,
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'blog-home_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('blog-home_banner_sets',[ 'default'=>'in-head' ]);
    $customizer->add_control('blog-home_banner',[
        'section'   => 'design_of_blog-home',
        'label'     => 'Main banner position',
        'settings'  => 'blog-home_banner_sets',
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

    $customizer->add_setting( 'blog-home_small_side_sets', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'blog-home_small_side', [
        'section'   => 'design_of_blog-home',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'blog-home_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'blog-home_big_side_sets', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'blog-home_big_side', [
        'section'  => 'design_of_blog-home',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'blog-home_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>