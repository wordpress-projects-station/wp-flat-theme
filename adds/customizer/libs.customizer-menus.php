<?

    // tab-title

    $customizer->add_section('design_of_top_menu',[
        'panel'    => 'nav_menus',
        'title'    => 'Top-Menu options',
        'priority' => 50,
    ]);

    $customizer->add_setting('top_menu_status_settings',[ 'default'=>'true' ]);
    $customizer->add_control('top_menu_status_data',[
        'section'=>'design_of_top_menu',
        'label'=>'[show/hide] top main menu',
        'type'=>'checkbox',
        'settings'=>'top_menu_status_settings',
    ]);

    $customizer->add_setting('top_finder_settings',[ 'default'=>'true' ]);
    $customizer->add_control('top_finder_data',[
        'section'=>'design_of_top_menu',
        'label'=>'[show/hide] search bar',
        'settings'=>'top_finder_settings',
        'type'=>'checkbox',
    ]);

    $customizer->add_setting('top_menu_alignment_settings',[ 'default'=>'left' ]);
    $customizer->add_control('top_menu_alignment_data',[
        'section'=>'design_of_top_menu',
        'label'=>'menu list alignment',
        'settings'=>'top_menu_alignment_settings',
        'type'     => 'radio',
        'choices'  => [
            'left'   => 'align left',
            'center' => 'align center',
            'right'  => 'align right',
        ],
    ]);

    $customizer->add_setting('top_menu_layout_settings',[ 'default'=>'relative' ]);
    $customizer->add_control('top_menu_layout_data',[
        'section'=>'design_of_top_menu',
        'label'=>'define layout of top main menu',
        'settings'=>'top_menu_layout_settings',
        'type'     => 'radio',
        'choices'  => [
            'relative' => 'relative to page',
            'framed'  => 'framed menu',
            'wide'   => 'wided menu',
        ],
    ]);

?>