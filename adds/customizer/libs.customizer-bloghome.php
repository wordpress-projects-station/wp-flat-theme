<?

    // tab-title

    $customizer->add_section('design_of_blog-home',[
        'panel'    => 'design_controller',
        'priority' => 5,
        'title'    => 'Design of blog : home',
    ]);

    // thumbnail-stle

    $customizer->add_setting('blog-home_header_style_settings',[ 'default'=>'framed-big' ]);
    $customizer->add_control('blog-home_header_style_data',[
        'section'  => 'design_of_blog-home',
        'label'    => 'Header style',
        'settings' => 'blog-home_header_style_settings',
        'type'     => 'radio',
        'choices'  => [
            'off'         => 'OFF',
            'framed-slim' => 'framed slim',
            'framed-big'  => 'framed big',
            'wide-slim'   => 'wide slim',
            'wide-big'    => 'wide big',
        ],
    ]);

    // add titles ecc in-head
    $customizer->add_setting('blog-home_title_settings',[ 'default'=>'true' ]);
    $customizer->add_control('blog-home_title_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide title',
        'description' => ' ',
        'settings'    => 'blog-home_title_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('blog-home_subtitle_settings',[ 'default'=>'true' ]);
    $customizer->add_control('blog-home_subtitle_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'blog-home_subtitle_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('blog-home_excerpt_settings',[ 'default'=>'true' ]);
    $customizer->add_control('blog-home_excerpt_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_blog-home',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'blog-home_excerpt_settings',
        'type'        => 'checkbox',
    ]);

    // thumbnail

    $customizer->add_setting('blog-home_banner_settings',[ 'default'=>'in-head' ]);
    $customizer->add_control('blog-home_banner_data',[
        'section'   => 'design_of_blog-home',
        'label'     => 'Main banner status',
        'settings'  => 'blog-home_banner_settings',
        'type'      => 'radio',
        'choices'   => [
            'off'      => 'OFF',
            'in-head-framed' => 'in head framed',
            'in-head'  => 'in head full',
            'in-body-framed'  => 'in body framed',
            'in-body'  => 'in body full',
        ],
    ]);

    // sidebar-small

    $customizer->add_setting( 'blog-home_small_side_settings', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'blog-home_small_side_data', [
        'section'   => 'design_of_blog-home',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'blog-home_small_side_settings',  
        'choices'   => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'blog-home_big_side_settings', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'blog-home_big_side_data', [
        'section'  => 'design_of_blog-home',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'blog-home_big_side_settings',
        'choices'  => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>