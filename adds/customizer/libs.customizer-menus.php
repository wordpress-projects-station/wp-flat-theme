<?

    // tab-title

    $customizer->add_section('design_of_top_menu',[
        'panel'    => 'nav_menus',
        'title'    => 'Top-Menu options',
        'priority' => 50,
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('top_menu_status_sets');
    get_theme_mod('top_menu_status_sets') ?: set_theme_mod('top_menu_status_sets',true);

    $customizer->add_control('top_menu_status',[
        'section'=>'design_of_top_menu',
        'settings'=>'top_menu_status_sets',
        'label'=>'show/hide top main menu',
        'type'=>'checkbox',
    ]);
    
    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('top_menu_in_fixed_position_sets');
    get_theme_mod('top_menu_in_fixed_position_sets') ?: set_theme_mod('top_menu_in_fixed_position_sets',false);

    $customizer->add_control('site_top_warning_status',[
        'section'       => 'design_of_top_menu',
        'settings'      => 'top_menu_in_fixed_position_sets',
        'label'         => 'Top menu in fixed position',
        'type'          => 'checkbox',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('top_finder_sets');
    get_theme_mod('top_finder_sets') ?: set_theme_mod('top_finder_sets',true);

    $customizer->add_control('top_finder',[
        'section'=>'design_of_top_menu',
        'settings'=>'top_finder_sets',
        'label'=>'show/hide search bar',
        'type'=>'checkbox',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('top_finder_querymode_sets');
    get_theme_mod('top_finder_querymode_sets') ?: set_theme_mod('top_finder_querymode_sets',false);

    $customizer->add_control('top_finder_querymode',[
        'section'=>'design_of_top_menu',
        'settings'=>'top_finder_querymode_sets',
        'label'=>'finder have query (?s=)',
        'type'=>'checkbox',
    ]);

    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

    $customizer->add_setting('top_menu_alignment_sets');
    get_theme_mod('top_menu_alignment_sets') ?: set_theme_mod('top_menu_alignment_sets','right');

    $customizer->add_control('top_menu_alignment',[
        'section'=>'design_of_top_menu',
        'label'=>'menu list alignment',
        'settings'=>'top_menu_alignment_sets',
        'type'     => 'radio',
        'choices'  => [
            'left'   => 'align left',
            'center' => 'align center',
            'right'  => 'align right',
        ],
    ]);

    // $customizer->add_setting('top_menu_layout_sets',[ 'default'=>'relative' ]);
    // $customizer->add_control('top_menu_layout',[
    //     'section'=>'design_of_top_menu',
    //     'label'=>'define layout of top main menu',
    //     'settings'=>'top_menu_layout_sets',
    //     'type'     => 'radio',
    //     'choices'  => [
    //         'relative' => 'relative to page',
    //         'framed'  => 'framed menu',
    //         'wide'   => 'wided menu',
    //     ],
    // ]);

?>