<?

    // tab-title

    $customizer->add_section('design_of_account',[
        'panel'    => 'design_controller',
        'priority' => 3,
        'title'    => 'Design of account',
    ]);

    // thumbnail-stle

    $customizer->add_setting('account_header_style_settings',[ 'default'=>'framed-big' ]);
    $customizer->add_control('account_header_style_data',[
        'section'  => 'design_of_account',
        'label'    => 'Header style',
        'settings' => 'account_header_style_settings',
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
    $customizer->add_setting('account_title_settings',[ 'default'=>'true' ]);
    $customizer->add_control('account_title_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_account',
        'label'       => 'Active/hide title',
        'description' => ' ',
        'settings'    => 'account_title_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('account_subtitle_settings',[ 'default'=>'true' ]);
    $customizer->add_control('account_subtitle_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_account',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'account_subtitle_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('account_excerpt_settings',[ 'default'=>'true' ]);
    $customizer->add_control('account_excerpt_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_account',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'account_excerpt_settings',
        'type'        => 'checkbox',
    ]);

    // thumbnail

    $customizer->add_setting('account_banner_settings',[ 'default'=>'in-head' ]);
    $customizer->add_control('account_banner_data',[
        'section'   => 'design_of_account',
        'label'     => 'Main banner status',
        'settings'  => 'account_banner_settings',
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

    $customizer->add_setting( 'account_small_side_settings', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'account_small_side_data', [
        'section'   => 'design_of_account',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'account_small_side_settings',  
        'choices'   => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'account_big_side_settings', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'account_big_side_data', [
        'section'  => 'design_of_account',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'account_big_side_settings',
        'choices'  => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>