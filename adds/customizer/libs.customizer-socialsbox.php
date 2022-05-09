<?

    //
    // Instagram
    //

    $customizer->add_section('instagram_assets',[
        'panel'    => 'social_boxes',
        'priority' => 1,
        'title'    => 'Instagram box',
    ]);

    $customizer->add_setting('instagram_box_sets');
    get_theme_mod('instagram_box_sets') ?: set_theme_mod('instagram_box_sets',true);

    $customizer->add_control('instagram_box',[
        'settings'    => 'instagram_box_sets',
        'section'     => 'instagram_assets',
        'label'       => 'Instagram box',
        'description' => 'Active/hide the box',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('instagram_box_logo_sets');
    get_theme_mod('instagram_box_logo_sets') ?: set_theme_mod('instagram_box_logo_sets',true);

    $customizer->add_control('instagram_box_logo',[
        'settings'    => 'instagram_box_logo_sets',
        'section'     => 'instagram_assets',
        'label'       => 'Show logo, not profile',
        'description' => 'Active/hide the original logo',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('instagram_box_page_name_sets');
    get_theme_mod('instagram_box_page_name_sets') ?: set_theme_mod('instagram_box_page_name_sets','My ig nickname');

    $customizer->add_control('instagram_box_page_name',[
        'section'  => 'instagram_assets',
        'label'    => 'All url of contents',
        'settings' => 'instagram_box_page_name_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('instagram_box_profile_cover_sets');
    get_theme_mod('instagram_box_profile_cover_sets') ?: set_theme_mod('instagram_box_profile_cover_sets','https://images.unsplash.com/photo-1579546929662-711aa81148cf?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=640');

    $customizer->add_control('instagram_box_profile_cover',[
        'section'  => 'instagram_assets',
        'label'    => '',
        'settings' => 'instagram_box_profile_cover_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('instagram_box_profile_image_sets');
    get_theme_mod('instagram_box_profile_image_sets') ?: set_theme_mod('instagram_box_profile_image_sets','https://source.unsplash.com/random/512×512/?logo');

    $customizer->add_control('instagram_box_profile_image',[
        'section'  => 'instagram_assets',
        'label'    => '',
        'settings' => 'instagram_box_profile_image_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('instagram_box_profile_link_sets');
    get_theme_mod('instagram_box_profile_link_sets') ?: set_theme_mod('instagram_box_profile_link_sets','https://www.instagram.com/');

    $customizer->add_control('instagram_box_profile_link',[
        'section'  => 'instagram_assets',
        'label'    => '',
        'settings' => 'instagram_box_profile_link_sets',
        'type'     => 'text',
    ]);

    //
    // facebook
    //

    $customizer->add_section('facebook_assets',[
        'panel'    => 'social_boxes',
        'priority' => 1,
        'title'    => 'Facebook box',
    ]);

    $customizer->add_setting('facebook_box_sets');
    get_theme_mod('facebook_box_sets') ?: set_theme_mod('facebook_box_sets',true);

    $customizer->add_control('facebook_box',[
        'settings'    => 'facebook_box_sets',
        'section'     => 'facebook_assets',
        'label'       => 'Facebook box',
        'description' => 'Active/hide the box',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('facebook_box_logo_sets');
    get_theme_mod('facebook_box_logo_sets') ?: set_theme_mod('facebook_box_logo_sets',true);

    $customizer->add_control('facebook_box_logo',[
        'settings'    => 'facebook_box_logo_sets',
        'section'     => 'facebook_assets',
        'label'       => 'Show logo, not profile',
        'description' => 'Active/hide the original logo',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('facebook_box_page_name_sets');
    get_theme_mod('facebook_box_page_name_sets') ?: set_theme_mod('facebook_box_page_name_sets','faMy fb nicknam');

    $customizer->add_control('facebook_box_page_name',[
        'section'  => 'facebook_assets',
        'label'    => 'All url of contents',
        'settings' => 'facebook_box_page_name_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('facebook_box_profile_cover_sets');
    get_theme_mod('facebook_box_profile_cover_sets') ?: set_theme_mod('facebook_box_profile_cover_sets','https://images.unsplash.com/photo-1588421357574-87938a86fa28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=640');

    $customizer->add_control('facebook_box_profile_cover',[
        'section'  => 'facebook_assets',
        'label'    => '',
        'settings' => 'facebook_box_profile_cover_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('facebook_box_profile_image_sets');
    get_theme_mod('facebook_box_profile_image_sets') ?: set_theme_mod('facebook_box_profile_image_sets','https://source.unsplash.com/random/512×512/?logo');

    $customizer->add_control('facebook_box_profile_image',[
        'section'  => 'facebook_assets',
        'label'    => '',
        'settings' => 'facebook_box_profile_image_sets',
        'type'     => 'text',
    ]);

    $customizer->add_setting('facebook_box_profile_link_sets');
    get_theme_mod('facebook_box_profile_link_sets') ?: set_theme_mod('facebook_box_profile_link_sets','https://www.facebook.com/');

    $customizer->add_control('facebook_box_profile_link',[
        'section'  => 'facebook_assets',
        'label'    => '',
        'settings' => 'facebook_box_profile_link_sets',
        'type'     => 'text',
    ]);

    
?>