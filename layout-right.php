<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<?

    global $mods, $looptype;


    /* - - - - - - - - - - */


    if( $mods->sidebar_small_position == 'right' ) {
        echo '<aside class="'. ( $mods->sidebar_small_type == 'dynamic' ? 'smallsidebar col-xs-1 col-sm-1 col-md-1 d-lg-none d-xl-none' : /*static*/ 'smallsidebar col-1' ) .'">';
            dynamic_sidebar('sidebar_small');
        echo '</aside>';
    }


    /* - - - - - - - - - - */


    if( is_shop_home() && $mods->sidebar_shop_position == 'right' ) {
        echo '<aside class="bigsidebar col-xs-none col-sm-none col-md-none col-lg-3 col-xl-3 col-md-3 d-xs-none d-sm-none d-md-block d-lg-block d-xl-block">';
            dynamic_sidebar('sidebar_shop');
        echo '</aside>';
    }

    elseif($mods->sidebar_big_position == 'right') {
        echo '<aside class="'. ( $mods->sidebar_big_type == 'dynamic' ? 'col-xs-none col-sm-none col-md-none col-lg-3 col-xl-3 col-md-3 d-xs-none d-sm-none d-md-block d-lg-block d-xl-block' : /*static*/ 'bigsidebar col-3' ) .'">';
            dynamic_sidebar('sidebar_big');
        echo '</aside>';
    }

?>