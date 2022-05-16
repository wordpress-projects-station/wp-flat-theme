<?

    $customizer->add_section('site_settings',[
        'priority' => 2,
        'title'    => 'Site settings',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('site_debug_notices_sets');
    get_theme_mod('site_debug_notices_sets') ?: set_theme_mod('site_debug_notices_sets',false);

    $customizer->add_control('site_debug_notices',[
        'section'       => 'site_settings',
        'settings'      => 'site_debug_notices_sets',
        'label'         => 'Debug notice boxes',
        'description'   => 'Active/hide the notice for developers',
        'type'          => 'checkbox',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('site_warnings_wfb_status_sets');
    get_theme_mod('site_warnings_wfb_status_sets') ?: set_theme_mod('site_warnings_wfb_status_sets',false);

    $customizer->add_control('site_warnings_wfb_status',[
        'section'       => 'site_settings',
        'settings'      => 'site_warnings_wfb_status_sets',
        'label'         => 'Remove wfb warning ',
        'description'   => 'Active/hide the developers notice of woocommerce filter native bug',
        'type'          => 'checkbox',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('site_layout_reverse_sets');
    get_theme_mod('site_layout_reverse_sets') ?: set_theme_mod('site_layout_reverse_sets',true);

    $customizer->add_control('site_layout_reverse',[
        'section'       => 'site_settings',
        'settings'      => 'site_layout_reverse_sets',
        'label'         => 'Reverse layout in mobile',
        'description'   => 'filters and left sidebar appear in bottom when you are in mobile',
        'type'          => 'checkbox'
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('site_metasubtitles_status_sets');
    get_theme_mod('site_metasubtitles_status_sets') ?: set_theme_mod('site_metasubtitles_status_sets',false);

    $customizer->add_control('site_metasubtitles_status',[
        'section'       => 'site_settings',
        'settings'      => 'site_metasubtitles_status_sets',
        'label'         => 'Add subtitle on post, page and woo products',
        'description'   => 'Active/hide the subtitle meta (warning: this create/override "post_subtitle" taxonomy if is it pre existent)',
        'type'          => 'checkbox',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('site_top_warning_message_status_sets');
    get_theme_mod('site_top_warning_message_status_sets') ?: set_theme_mod('site_top_warning_message_status_sets',true);

    $customizer->add_control('site_warning_message_status',[
        'section'       => 'site_settings',
        'settings'      => 'site_top_warning_message_status_sets',
        'label'         => 'Visitors warning message',
        'description'   => '',
        'type'          => 'checkbox'
    ]);

    $customizer->add_setting('site_top_warning_message_sets');
    get_theme_mod('site_top_warning_message_sets') ?: set_theme_mod('site_top_warning_message_sets','WARNING! THIS IS A DEMO SITE! <b>DO NOT BUY OR USE IT!</b>');

    $customizer->add_control('site_top_warning_message',[
        'section'       => 'site_settings',
        'settings'      => 'site_top_warning_message_sets',
        'label'         => '', //Set a common warning
        'description'   => '',
        'type'          => 'text',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('site_header_big_height_sets');
    get_theme_mod('site_header_big_height_sets')?:set_theme_mod('site_header_big_height_sets','55');

    $customizer->add_control('site_header_big_height',[
        'settings'      => 'site_header_big_height_sets',
        'section'       => 'site_settings',
        'label'         => 'Header big size in vh',
        'description'   => '',
        'type'          => 'text',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('site_header_small_height_sets');
    get_theme_mod('site_header_small_height_sets')?:set_theme_mod('site_header_small_height_sets','25');

    $customizer->add_control('site_header_small_height',[
        'settings'      => 'site_header_small_height_sets',
        'section'       => 'site_settings',
        'label'         => 'Header small size in vh',
        // 'description'   => '',
        'type'          => 'text',
    ]);

?>