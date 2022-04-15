<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<?

    global $mods, $looptype;


    /* - - - - - - - - - - */


    if( $mods->sidebar_small_position == 'right' && dynamic_sidebar('sidebar_small') ) {
        echo '<aside class="'. ( $mods->sidebar_small_type == 'dynamic' ? 'col-1 d-none d-md-block d-lg-none d-xl-none':'col-1' ).'">';
            get_sidebar('sidebar_small');
        echo '</aside>';
    }


    /* - - - - - - - - - - */


    if( $mods->sidebar_big_position == 'right' && dynamic_sidebar('sidebar_big') ) {
        echo '<aside class="'. ( $mods->sidebar_big_type == 'dynamic' ? 'col-3 d-none d-lg-block':'col-3' ) .'">';
            get_sidebar('sidebar_big');
        echo '</aside>';
    }


    /* - - - - - - - - - - */


    if( $mods->shopbar == 'right' && is_woo() && dynamic_sidebar('sidebar_shop') ) {
        // echo '<aside class="'.($mods->sidebar_shop_type == 'dynamic' ? 'col-3 d-none d-lg-block':'col-3').'">'.dynamic_sidebar('sidebar_shop').'</aside>';
        echo '<aside class="col-3 d-none d-lg-block">';
            get_sidebar('sidebar_shop');
        echo '</aside>';
    }
?>