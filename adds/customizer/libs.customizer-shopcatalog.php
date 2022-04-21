<?

    // tab-title

    $customizer->add_section('design_of_shop_catalog',[
        'panel'    => 'design_controller',
        'priority' => 7,
        'title'    => 'Design of shop : catalog',
    ]);

    // thumbnail-stle

    $customizer->add_setting('shop-catalog_header_style_settings',[ 'default'=>'framed-big' ]);
    $customizer->add_control('shop-catalog_header_style_data',[
        'section'  => 'design_of_shop_catalog',
        'label'    => 'Header style',
        'settings' => 'shop-catalog_header_style_settings',
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
    $customizer->add_setting('shop-catalog_title_settings',[ 'default'=>'true' ]);
    $customizer->add_control('shop-catalog_title_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_catalog',
        'label'       => 'Active/hide title',
        'description' => ' ',
        'settings'    => 'shop-catalog_title_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-catalog_subtitle_settings',[ 'default'=>'true' ]);
    $customizer->add_control('shop-catalog_subtitle_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_catalog',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'shop-catalog_subtitle_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('shop-catalog_excerpt_settings',[ 'default'=>'true' ]);
    $customizer->add_control('shop-catalog_excerpt_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_shop_catalog',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'shop-catalog_excerpt_settings',
        'type'        => 'checkbox',
    ]);

    // thumbnail

    $customizer->add_setting('shop-catalog_banner_settings',[ 'default'=>'in-head' ]);
    $customizer->add_control('shop-catalog_banner_data',[
        'section'   => 'design_of_shop_catalog',
        'label'     => 'Main banner status',
        'settings'  => 'shop-catalog_banner_settings',
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

    $customizer->add_setting( 'shop-catalog_small_side_settings', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'shop-catalog_small_side_data', [
        'section'   => 'design_of_shop_catalog',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'shop-catalog_small_side_settings',  
        'choices'   => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'shop-catalog_big_side_settings', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'shop-catalog_big_side_data', [
        'section'  => 'design_of_shop_catalog',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'shop-catalog_big_side_settings',
        'choices'  => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>