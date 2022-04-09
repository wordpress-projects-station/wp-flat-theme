<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<?

    global $mods, $looptype;

    /* - - - - - - - - - - */


    if( $mods->sidebar_small_position == 'right' )
    echo '<aside class="'.( $mods->sidebar_small_type == 'dynamic' ? 'col-1 d-none d-md-block d-lg-none d-xl-none':'col-1' ).'">'.dynamic_sidebar('page_side_small').'</aside>';


    /* - - - - - - - - - - */


    if( $mods->sidebar_big_position == 'right'  )
    echo '<aside class="'.($mods->sidebar_big_type == 'dynamic' ? 'col-3 d-none d-lg-block':'col-3').'">'.dynamic_sidebar('page_side_big').'</aside>';


    /* - - - - - - - - - - */


    $woobar_right = true;
    if( $woobar_right && is_woocommerce() || is_shop() || is_product() ) {

        echo '<aside class="col-3">';
        do_action( 'woocommerce_sidebar' );
        echo '</aside>';

    }

?>