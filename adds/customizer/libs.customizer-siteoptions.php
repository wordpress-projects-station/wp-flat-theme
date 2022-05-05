<?

    $customizer->add_section('site_settings',[
        'priority' => 2,
        'title'    => 'Site settings',
    ]);

    $customizer->add_setting('site_debug_notices_sets',[ 'default'=>'false' ]);
    $customizer->add_control('site_debug_notices',[
        'section'     => 'site_settings',
        'label'       => 'Debug notice boxes',
        'description' => 'Active/hide the editor notice for page information',
        'settings'    => 'site_debug_notices_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('site_top_warning_status_sets',[ 'default'=>'false' ]);
    $customizer->add_control('site_top_warning_status',[
        'section'  => 'site_settings',
        'label'    => 'Warning message',
        'settings' => 'site_top_warning_status_sets',
        'type'     => 'checkbox',
    ]);

    $customizer->add_setting('site_top_warning_message_sets',[ 'default'=>'WARNING! THIS IS A DEMO SITE! <b>DO NOT BUY OR USE IT!</b>' ]);
    $customizer->add_control('site_top_warning_message',[
        'section'  => 'site_top_settings',
        'label'    => '',
        'settings' => 'site_top_warning_message_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('site_warnings_woocommercefiltersbug_status_sets',[ 'default'=>'true' ]);
    $customizer->add_control('site_warnings_woocommercefiltersbug_status',[
        'section'  => 'site_settings',
        'label'    => 'remove warning : woo filters bug',
        'settings' => 'site_warnings_woocommercefiltersbug_status_sets',
        'type'     => 'checkbox',
    ]);

    $customizer->add_setting('site_header_big_height_sets',[ 'default'=>'55' ]);
    $customizer->add_control('site_header_big_height',[
        'section'  => 'site_settings',
        'label'    => 'Header big size in vh',
        'settings' => 'site_header_big_height_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('site_header_small_height_sets',[ 'default'=>'20' ]);
    $customizer->add_control('site_header_small_height',[
        'section'  => 'site_settings',
        'label'    => 'Header small size in vh',
        'settings' => 'site_header_small_height_sets',
        'type'     => 'text',
    ]);

?>