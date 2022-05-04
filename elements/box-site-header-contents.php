<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<? global $mods, $looptype; ?>

<? 
    $page_id = is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();

    $css_banner = get_banner_background( $page_id );

?>

<div class="bg-light" id="page-heading-title">

    <div style="<?= $mods->heading_size; ?>" class="<?= $mods->heading_frame; ?>">

        <div style=" position:relative; width:100%; height: inherit; <?= $mods->heading_status && !$mods->header_banner_frame ? $css_banner : '' ; ?>">

            <?
                if( $mods->top_menu_status )
                include __DIR__.'/box-site-header-contents-navbar.php';
            ?>

            <?
                if( $mods->heading_status && $looptype['type']=='front-page' )
                include __DIR__.'/box-site-header-contents-slider.php';

                elseif( $mods->heading_status )
                include __DIR__.'/box-site-header-contents-banner.php';
            ?>

        </div>

    </div>

</div>