<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<?

    global $mods, $looptype;


    /* - - - - - - - - - - */

    // moved in side of content
    // if( $mods->sidebar_small_position == 'right' )
    // print_sidebar('sidebar_small');

    if( is_shop_home() && $mods->sidebar_shop_position == 'right' )
    print_sidebar('sidebar_shop');

    elseif($mods->sidebar_big_position == 'right')
    print_sidebar('sidebar_big');


?>