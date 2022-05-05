<?

    // tab-title

    $customizer->add_section('design_of_top_menu',[
        'panel'    => 'nav_menus',
        'title'    => 'Top-Menu options',
        'priority' => 50,
    ]);

    $customizer->add_setting('top_menu_status_sets',[ 'default'=>'true' ]);
    $customizer->add_control('top_menu_status',[
        'section'=>'design_of_top_menu',
        'label'=>'[show/hide] top main menu',
        'type'=>'checkbox',
        'settings'=>'top_menu_status_sets',
    ]);

    $customizer->add_setting('top_finder_sets',[ 'default'=>'true' ]);
    $customizer->add_control('top_finder',[
        'section'=>'design_of_top_menu',
        'label'=>'[show/hide] search bar',
        'settings'=>'top_finder_sets',
        'type'=>'checkbox',
    ]);

    $customizer->add_setting('top_menu_alignment_sets',[ 'default'=>'left' ]);
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