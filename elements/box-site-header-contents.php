<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<? global $mods, $looptype; ?>

<?
    if( $mods->top_menu_status )
    include __DIR__.'/box-site-header-contents-navbar.php';
?>

<? if( $mods->heading_status ) { ?>

    <header style="<? if( $mods->heading_status ) echo $mods->heading_size; ?>" class="<?= $mods->heading_frame; ?>">

        <?
            $page_id = is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();
            $css_banner = get_banner_background( $page_id );
        ?>

        <div style="height:inherit; width:100%;  <?= $mods->header_banner_mode == 'in-head' ? $css_banner : ''; ?>">

            <?
                if( $looptype['type']=='front-page' )
                include __DIR__.'/box-site-header-contents-slider.php';

                else
                include __DIR__.'/box-site-header-contents-banner.php';
            ?>

        </div>

    </header>
<? } ?>