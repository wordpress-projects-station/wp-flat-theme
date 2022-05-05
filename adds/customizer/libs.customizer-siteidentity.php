<?

    $customizer->add_setting('site_custom_logo_position_sets',[ 'default'=>'false' ]);
    $customizer->add_control('site_custom_logo_position',[
        'priority'    => 1,
        'section'     => 'title_tagline',
        'label'       => 'Active/hide logo flyout',
        'description' => ' ',
        'settings'    => 'site_custom_logo_position_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('site_custom_logo_ratio_sets',[ 'default'=>'45' ]);
    $customizer->add_control('site_custom_logo_ratio',[
        'priority'    => 1,
        'section'     => 'title_tagline',
        'label'       => ' ',
        'settings'    => 'site_custom_logo_ratio_sets',
        'type'        => 'number',
    ]);

    $customizer->add_setting('site_custom_logo_title_ratio_sets',[ 'default'=>'Demo text' ]);
    $customizer->add_control('site_custom_logo_title',[
        'priority'    => 3,
        'section'     => 'title_tagline',
        'label'       => 'Set a logo title',
        'settings'    => 'site_custom_logo_title_ratio_sets',
        'type'        => 'text',
    ]);

    $customizer->add_setting('site_custom_logo_slogan_sets',[ 'default'=>'a sub demo text' ]);
    $customizer->add_control('site_custom_logo_slogan',[
        'priority'    => 3,
        'section'     => 'title_tagline',
        'label'       => 'Set a logo slogan',
        'settings'    => 'site_custom_logo_slogan_sets',
        'type'        => 'text',
    ]);


    $customizer->get_control( 'custom_logo' )->label = '';
    $customizer->get_control( 'custom_logo' )->priority = '2';

?>