<?

    //
    // tab
    //

    // it's original tab of woocommerce, move by libs.customizer-corrections.php


    //
    // menu-style
    //

    $customizer->add_setting('checkout_menu_style_sets');
    get_theme_mod('checkout_menu_style_sets') ?: set_theme_mod('checkout_menu_style_sets','wide');

    $customizer->add_control('checkout_menu_style',[
        'section'  => 'woocommerce_checkout',
        'label'    => 'Menu style',
        'settings' => 'checkout_menu_style_sets',
        'type'     => 'radio',
        'choices'  => [
            'off'       => 'off',
            'wide'      => 'wide',
            'framed'    => 'framed',
        ],
    ]);


    //
    // header-style
    //

    $customizer->add_setting('checkout_header_style_sets');
    get_theme_mod('checkout_header_style_sets') ?: set_theme_mod('checkout_header_style_sets','off');

    $customizer->add_control('checkout_header_style',[
        'section'  => 'woocommerce_checkout',
        'label'    => 'Header style',
        'settings' => 'checkout_header_style_sets',
        'type'     => 'radio',
        'choices'  => [
            'off'         => 'off',
            'slim-framed' => 'slim framed',
            'slim-wide'   => 'slim wide',
            'big-framed'  => 'big framed ',
            'big-wide'    => 'big wide',
        ],
    ]);


    //
    // Titles data settings
    //

    $customizer->add_setting('checkout_titles_position_sets');
    get_theme_mod('checkout_titles_position_sets') ?: set_theme_mod('checkout_titles_position_sets','in-head');

    $customizer->add_control('checkout_titles_position',[
        // 'priority'    => 1,
        'section'     => 'woocommerce_checkout',
        'label'       => 'Titles data position',
        'settings'    => 'checkout_titles_position_sets',
        'type'        => 'radio',
        'choices'     => [
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);

    $customizer->add_setting('checkout_title_sets');
    get_theme_mod('checkout_title_sets') ?: set_theme_mod('checkout_title_sets',true);

    $customizer->add_control('checkout_title',[
        // 'priority'    => 1,
        'section'     => 'woocommerce_checkout',
        'label'       => 'Active/hide title',
        'settings'    => 'checkout_title_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('checkout_subtitle_sets');
    get_theme_mod('checkout_subtitle_sets') ?: set_theme_mod('checkout_subtitle_sets',true);

    $customizer->add_control('checkout_subtitle',[
        // 'priority'    => 1,
        'section'     => 'woocommerce_checkout',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'checkout_subtitle_sets',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('checkout_excerpt_sets');
    get_theme_mod('checkout_excerpt_sets') ?: set_theme_mod('checkout_excerpt_sets',true);

    $customizer->add_control('checkout_excerpt',[
        // 'priority'    => 1,
        'section'     => 'woocommerce_checkout',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'checkout_excerpt_sets',
        'type'        => 'checkbox',
    ]);


    //
    // Header banner  
    //

    $customizer->add_setting('checkout_banner_sets');
    get_theme_mod('checkout_banner_sets') ?: set_theme_mod('checkout_banner_sets','in-head');

    $customizer->add_control('checkout_banner',[
        'section'   => 'woocommerce_checkout',
        'label'     => 'Main banner position',
        'settings'  => 'checkout_banner_sets',
        'type'      => 'radio',
        'choices'   => [
            'off'      => 'off',
            'in-head'  => 'print in header',
            'in-body'  => 'print in contents',
        ],
    ]);


    //
    // Sidebars
    //

    $customizer->add_setting( 'checkout_small_side_sets');
    get_theme_mod('checkout_small_side_sets') ?: set_theme_mod('checkout_small_side_sets','off');

    $customizer->add_control( 'checkout_small_side', [
        'section'   => 'woocommerce_checkout',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'checkout_small_side_sets',  
        'choices'   => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'checkout_big_side_sets');
    get_theme_mod('checkout_big_side_sets') ?: set_theme_mod('checkout_smcheckout_big_side_setsall_side_sets','off');

    $customizer->add_control( 'checkout_big_side', [
        'section'  => 'woocommerce_checkout',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'checkout_big_side_sets',
        'choices'  => [
            'off'  => 'off',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>