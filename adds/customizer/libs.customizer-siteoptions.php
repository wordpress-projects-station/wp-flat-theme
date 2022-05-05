<?
    $customizer->add_section('site_settings',[
        'priority' => 2,
        'title'    => 'Site settings',
    ]);

    $customizer->add_setting('site_debug_notices_settings',[ 'default'=>'false' ]);
    $customizer->add_control('site_debug_notices_data',[
        'section'     => 'site_settings',
        'label'       => 'Debug notice boxes',
        'description' => 'Active/hide the editor notice for page information',
        'settings'    => 'site_debug_notices_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('site_top_warning_status_settings',[ 'default'=>'false' ]);
    $customizer->add_control('site_top_warning_status_data',[
        'section'  => 'site_settings',
        'label'    => 'Warning message',
        'settings' => 'site_top_warning_status_settings',
        'type'     => 'checkbox',
    ]);

    $customizer->add_setting('site_top_warning_message_settings',[ 'default'=>'WARNING! THIS IS A DEMO SITE! <b>DO NOT BUY OR USE IT!</b>' ]);
    $customizer->add_control('site_top_warning_message_data',[
        'section'  => 'site_top_settings',
        'label'    => '',
        'settings' => 'site_top_warning_message_settings',
        'type'     => 'text',
    ]);

    $customizer->add_setting('site_warnings_woocommercefiltersbug_status_settings',[ 'default'=>'true' ]);
    $customizer->add_control('site_warnings_woocommercefiltersbug_status_data',[
        'section'  => 'site_settings',
        'label'    => 'remove warning : woo filters bug',
        'settings' => 'site_warnings_woocommercefiltersbug_status_settings',
        'type'     => 'checkbox',
    ]);

?>