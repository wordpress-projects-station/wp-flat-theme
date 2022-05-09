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

    $customizer->add_setting('blog-home_menu_style_sets');
    get_theme_mod('blog-home_menu_style_sets') ?: set_theme_mod('blog-home_menu_style_sets','wide');

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

    $customizer->add_setting('blog-home_header_style_sets');
    get_theme_mod('blog-home_header_style_sets') ?: set_theme_mod('blog-home_header_style_sets','big-wide');

    $customizer->add_control('blog-home_header_style',[
        'settings' => 'blog-home_header_style_sets',
        'section'  => 'design_of_blog-home',
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

    $customizer->add_setting('blog-home_titles_position_sets');
    get_theme_mod('blog-home_titles_position_sets') ?: set_theme_mod('blog-home_titles_position_sets','in-head');

    $customizer->add_control('blog-home_titles_position',[
        'settings'    => 'blog-home_titles_position_sets',
        'section'     => 'design_of_blog-home',
        'label'       => 'Titles data position',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);


    $customizer->add_setting('blog-home_title_sets');
    get_theme_mod('blog-home_title_sets') ?: set_theme_mod('blog-home_title_sets',true);

    $customizer->add_control('blog-home_title',[
        'settings'    => 'blog-home_title_sets',
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide title',
        'type'        => 'checkbox',
    ]);


    $customizer->add_setting('blog-home_subtitle_sets');
    get_theme_mod('blog-home_subtitle_sets') ?: set_theme_mod('blog-home_subtitle_sets',true);

    $customizer->add_control('blog-home_subtitle',[
        'settings'    => 'blog-home_subtitle_sets',
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide sub-title',
        'type'        => 'checkbox',
    ]);


    $customizer->add_setting('blog-home_excerpt_sets');
    get_theme_mod('blog-home_excerpt_sets') ?: set_theme_mod('blog-home_excerpt_sets',true);

    $customizer->add_control('blog-home_excerpt',[
        'settings'    => 'blog-home_excerpt_sets',
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide excerpt',
        'type'        => 'checkbox',
    ]);

    //
    // Header banner  
    //

    $customizer->add_setting('blog-home_banner_sets');
    get_theme_mod('blog-home_banner_sets') ?: set_theme_mod('blog-home_banner_sets','in-head');

    $customizer->add_control('blog-home_banner',[
        'settings'  => 'blog-home_banner_sets',
        'section'   => 'design_of_blog-home',
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

    $customizer->add_setting( 'blog-home_small_side_sets');
    get_theme_mod('blog-home_small_side_sets') ?: set_theme_mod('blog-home_small_side_sets','dynamic-right');

    $customizer->add_control( 'blog-home_small_side', [
        'settings'  => 'blog-home_small_side_sets',  
        'section'   => 'design_of_blog-home',
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

    $customizer->add_setting( 'blog-home_big_side_sets');
    get_theme_mod('blog-home_big_side_sets') ?: set_theme_mod('blog-home_big_side_sets','dynamic-left');

    $customizer->add_control( 'blog-home_big_side', [
        'settings' => 'blog-home_big_side_sets',
        'section'  => 'design_of_blog-home',
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