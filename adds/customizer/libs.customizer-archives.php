<?

    // tab-title

    $customizer->add_section('design_of_archivie',[
        'panel'    => 'design_controller',
        'priority' => 4,
        'title'    => 'Design of archivie',
    ]);

    // thumbnail-stle

    $customizer->add_setting('archivie_header_style_settings',[ 'default'=>'framed-big' ]);
    $customizer->add_control('archivie_header_style_data',[
        'section'  => 'design_of_archivie',
        'label'    => 'Header style',
        'settings' => 'archivie_header_style_settings',
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
    $customizer->add_setting('archivie_title_settings',[ 'default'=>'true' ]);
    $customizer->add_control('archivie_title_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_archivie',
        'label'       => 'Active/hide title',
        'description' => ' ',
        'settings'    => 'archivie_title_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('archivie_subtitle_settings',[ 'default'=>'true' ]);
    $customizer->add_control('archivie_subtitle_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_archivie',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'archivie_subtitle_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('archivie_excerpt_settings',[ 'default'=>'true' ]);
    $customizer->add_control('archivie_excerpt_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_archivie',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'archivie_excerpt_settings',
        'type'        => 'checkbox',
    ]);

    // thumbnail

    $customizer->add_setting('archivie_banner_settings',[ 'default'=>'in-head' ]);
    $customizer->add_control('archivie_banner_data',[
        'section'   => 'design_of_archivie',
        'label'     => 'Main banner status',
        'settings'  => 'archivie_banner_settings',
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

    $customizer->add_setting( 'archivie_small_side_settings', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'archivie_small_side_data', [
        'section'   => 'design_of_archivie',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'archivie_small_side_settings',  
        'choices'   => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'archivie_big_side_settings', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'archivie_big_side_data', [
        'section'  => 'design_of_archivie',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'archivie_big_side_settings',
        'choices'  => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>