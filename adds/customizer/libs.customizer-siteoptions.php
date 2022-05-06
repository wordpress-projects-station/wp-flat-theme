<?

    $customizer->add_section('site_settings',[
        'priority' => 2,
        'title'    => 'Site settings',
    ]);

    $customizer->add_setting('site_debug_notices_sets');
    get_theme_mod('site_debug_notices_sets') ?: set_theme_mod('site_debug_notices_sets','false');

    $customizer->add_control('site_debug_notices',[
        'settings'      => 'site_debug_notices_sets',
        'section'       => 'site_settings',
        'label'         => 'Debug notice boxes',
        'description'   => 'Active/hide the editor notice for page information',
        'type'          => 'checkbox',
    ]);

    $customizer->add_setting('site_top_warning_status_sets');
    get_theme_mod('site_top_warning_status_sets') ?: set_theme_mod('site_top_warning_status_sets','false');

    $customizer->add_control('site_top_warning_status',[
        'settings'      => 'site_top_warning_status_sets',
        'section'       => 'site_settings',
        'label'         => 'Warning message',
        'type'          => 'checkbox',
    ]);

    $customizer->add_setting('site_top_warning_message_sets');
    get_theme_mod('site_top_warning_message_sets') ?: set_theme_mod('site_top_warning_message_sets','WARNING! THIS IS A DEMO SITE! <b>DO NOT BUY OR USE IT!</b>');

    $customizer->add_control('site_top_warning_message',[
        'settings'      => 'site_top_warning_message_sets',
        'section'       => 'site_top_settings',
        'label'         => '',
        'description'   => '',
        'type'          => 'text',
    ]);

    $customizer->add_setting('site_warnings_woocommercefiltersbug_status_sets');
    get_theme_mod('site_warnings_woocommercefiltersbug_status_sets') ?: set_theme_mod('site_warnings_woocommercefiltersbug_status_sets','true');

    $customizer->add_control('site_warnings_woocommercefiltersbug_status',[
        'settings'      => 'site_warnings_woocommercefiltersbug_status_sets',
        'section'       => 'site_settings',
        'label'         => 'remove warning : woo filters bug',
        'description'   => '',
        'type'          => 'checkbox',
    ]);

    $customizer->add_setting('site_header_big_height_sets');
    get_theme_mod('site_header_big_height_sets')?:set_theme_mod('site_header_big_height_sets','55');

    $customizer->add_control('site_header_big_height',[
        'settings'      => 'site_header_big_height_sets',
        'section'       => 'site_settings',
        'label'         => 'Header big size in vh',
        'description'   => '',
        'type'          => 'text',
    ]);

    $customizer->add_setting('site_header_small_height_sets');
    get_theme_mod('site_header_small_height_sets')?:set_theme_mod('site_header_small_height_sets','20');

    $customizer->add_control('site_header_small_height',[
        'settings'      => 'site_header_small_height_sets',
        'section'       => 'site_settings',
        'label'         => 'Header small size in vh',
        'description'   => '',
        'type'          => 'text',
    ]);

?>