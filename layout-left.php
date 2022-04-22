<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<?

    global $mods, $looptype;


    /* - - - - - - - - - - */


    if( $mods->sidebar_small_position == 'left' )
    print_sidebar('sidebar_small');

    if( is_shop_home() && $mods->sidebar_shop_position == 'left' )
    print_sidebar('sidebar_shop');

    elseif($mods->sidebar_big_position == 'left')
    print_sidebar('sidebar_big');


?>