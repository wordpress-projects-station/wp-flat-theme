<?

    // tab-title

    $customizer->add_section('design_of_page',[
        'panel'    => 'design_controller',
        'priority' => 2,
        'title'    => 'Design of page',
    ]);

    // thumbnail-stle

    $customizer->add_setting('page_header_style_settings',[ 'default'=>'framed-big' ]);
    $customizer->add_control('page_header_style_data',[
        'section'  => 'design_of_page',
        'label'    => 'Header style',
        'settings' => 'page_header_style_settings',
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
    $customizer->add_setting('page_title_settings',[ 'default'=>'true' ]);
    $customizer->add_control('page_title_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_page',
        'label'       => 'Active/hide title',
        'description' => ' ',
        'settings'    => 'page_title_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('page_subtitle_settings',[ 'default'=>'true' ]);
    $customizer->add_control('page_subtitle_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_page',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'page_subtitle_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('page_excerpt_settings',[ 'default'=>'true' ]);
    $customizer->add_control('page_excerpt_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_page',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'page_excerpt_settings',
        'type'        => 'checkbox',
    ]);

    // thumbnail

    $customizer->add_setting('page_banner_settings',[ 'default'=>'in-head' ]);
    $customizer->add_control('page_banner_data',[
        'section'   => 'design_of_page',
        'label'     => 'Main banner status',
        'settings'  => 'page_banner_settings',
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

    $customizer->add_setting( 'page_small_side_settings', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'page_small_side_data', [
        'section'   => 'design_of_page',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'page_small_side_settings',  
        'choices'   => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'page_big_side_settings', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'page_big_side_data', [
        'section'  => 'design_of_page',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'page_big_side_settings',
        'choices'  => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>