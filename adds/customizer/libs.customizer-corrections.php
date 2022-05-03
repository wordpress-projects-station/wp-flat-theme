<?
    // expand standards Controllers
    $customizer->get_section('title_tagline')->title = 'Site Identity';
    $customizer->get_section('title_tagline')->priority = '1';

    $customizer->get_panel( 'nav_menus' )->title = 'Site Menus';
    $customizer->get_panel( 'nav_menus' )->priority = '2';

    $customizer->get_section( 'menu_locations' )->title = 'Change positions';
    $customizer->get_section( 'menu_locations' )->priority = '0';
    
    $customizer->get_section( 'static_front_page' )->panel = 'design_controller';
    $customizer->get_section( 'static_front_page' )->title = 'Design of home';
    $customizer->get_section( 'static_front_page' )->description = null;
    $customizer->get_section( 'static_front_page' )->priority = '1';

    $customizer->get_control( 'show_on_front' )->choices = ['posts' => 'Theme Home', 'page' => 'Custom Home'];
    $customizer->get_control( 'show_on_front' )->description = '"theme home" is auto getted home: the wordpress/front-page.php contents; otherwise you can set a customizable gutenberg page.';
    $customizer->get_control( 'page_on_front' )->description = 'Make your custom gutenberg page contents and select it for populate it in gutenberg. ';
    $customizer->get_control( 'page_for_posts' )->description = 'It\'s good role rename in "Blog" or "News" the main category of posts (and blank this). In alternative: select a customized page for you posts archive contents.';

    $customizer->get_section( 'custom_css' )->title = 'CSS override';


    $customizer->get_panel( 'woocommerce' )->title = 'Store options';

    $customizer->get_section( 'woocommerce_store_notice' )->title = 'Store Warning';
    $customizer->get_control( 'woocommerce_demo_store_notice' )->label = 'Set a warning';
    $customizer->get_control( 'woocommerce_demo_store_notice' )->description = 'If enabled, this text will be shown site-wide. (this text override classic site warning only in shop\'s pages)';
    $customizer->get_control( 'woocommerce_demo_store' )->label = 'Active/hide the shop warnings';
    

    $customizer->get_section( 'woocommerce_product_catalog' )->title = 'Home options';


    // remove controllers
    $customizer->remove_panel( 'widgets' );
    $customizer->add_panel('design_controller',[ 'priority' => 4, 'title' => 'Design controller', ]);
?>