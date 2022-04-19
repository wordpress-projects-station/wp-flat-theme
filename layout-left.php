<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<?

    global $mods, $looptype;


    /* - - - - - - - - - - */


    if( $mods->sidebar_small_position == 'left' ) {
        echo '<aside class="'. ( $mods->sidebar_small_type == 'dynamic' ? 'col-1 d-none d-md-block d-lg-none d-xl-none' : /*static*/ 'col-1' ) .'">';
            get_sidebar('sidebar_small');
        echo '</aside>';
    }


    /* - - - - - - - - - - */


    if( $mods->sidebar_big_position == 'left' || $mods->sidebar_shop_position=='left' ) {
        if( is_woo() && $mods->sidebar_shop_position=='left' ) {
            echo '<aside class="col-3 d-none d-lg-block">';
                get_sidebar('sidebar_shop');
            echo '</aside>';
        }else{
            echo '<aside class="'. ( $mods->sidebar_big_type == 'dynamic' ? 'col-3 d-none d-lg-block' : /*static*/ 'col-3' ) .'">';
                get_sidebar('sidebar_big');
            echo '</aside>';
        }
    }

?>