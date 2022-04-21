<?

    // tab-title

    $customizer->add_section('design_of_shop_categories',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : categories',
    ]);

    // thumbnail-stle

    $customizer->add_setting('shop-categories_header_style_settings',[ 'default'=>'framed-big' ]);
    $customizer->add_control('shop-categories_header_style_data',[
        'section'  => 'design_of_shop_categories',
        'label'    => 'Header style',
        'settings' => 'shop-categories_header_style_settings',
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
    $customizer->add_setting('shop-categories_title_settings',[ 'default'=>'true' ]);
    $customizer->add_control('shop-categories_title_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_categories',
        'label'       => 'Active/hide title',
        'description' => ' ',
        'settings'    => 'shop-categories_title_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-categories_subtitle_settings',[ 'default'=>'true' ]);
    $customizer->add_control('shop-categories_subtitle_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_categories',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'shop-categories_subtitle_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-categories_excerpt_settings',[ 'default'=>'true' ]);
    $customizer->add_control('shop-categories_excerpt_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_categories',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'shop-categories_excerpt_settings',
        'type'        => 'checkbox',
    ]);

    // thumbnail

    $customizer->add_setting('shop-categories_banner_settings',[ 'default'=>'in-head' ]);
    $customizer->add_control('shop-categories_banner_data',[
        'section'   => 'design_of_shop_categories',
        'label'     => 'Main banner status',
        'settings'  => 'shop-categories_banner_settings',
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

    $customizer->add_setting( 'shop-categories_small_side_settings', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'shop-categories_small_side_data', [
        'section'   => 'design_of_shop_categories',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'shop-categories_small_side_settings',  
        'choices'   => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'shop-categories_big_side_settings', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'shop-categories_big_side_data', [
        'section'  => 'design_of_shop_categories',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'shop-categories_big_side_settings',
        'choices'  => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>