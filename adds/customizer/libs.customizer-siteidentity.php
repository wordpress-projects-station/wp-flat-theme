<?

    $customizer->add_setting('site_custom_logo_position_settings',[ 'default'=>'false' ]);
    $customizer->add_control('site_custom_logo_position_data',[
        'priority'    => 1,
        'section'     => 'title_tagline',
        'label'       => 'Active/hide logo flyout',
        'description' => ' ',
        'settings'    => 'site_custom_logo_position_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('site_custom_logo_ratio_settings',[ 'default'=>'45' ]);
    $customizer->add_control('site_custom_logo_ratio_data',[
        'priority'    => 1,
        'section'     => 'title_tagline',
        'label'       => ' ',
        'settings'    => 'site_custom_logo_ratio_settings',
        'type'        => 'number',
    ]);

    $customizer->add_setting('site_custom_logo_title_ratio_settings',[ 'default'=>'Demo text' ]);
    $customizer->add_control('site_custom_logo_title_data',[
        'priority'    => 3,
        'section'     => 'title_tagline',
        'label'       => 'Set a logo title',
        'settings'    => 'site_custom_logo_title_ratio_settings',
        'type'        => 'text',
    ]);

    $customizer->add_setting('site_custom_logo_slogan_settings',[ 'default'=>'a sub demo text' ]);
    $customizer->add_control('site_custom_logo_slogan_data',[
        'priority'    => 3,
        'section'     => 'title_tagline',
        'label'       => 'Set a logo slogan',
        'settings'    => 'site_custom_logo_slogan_settings',
        'type'        => 'text',
    ]);


    $customizer->get_control( 'custom_logo' )->label = '';
    $customizer->get_control( 'custom_logo' )->priority = '2';

?>