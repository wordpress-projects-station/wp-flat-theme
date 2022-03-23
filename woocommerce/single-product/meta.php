<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? global $product; ?>

<? do_action( 'woocommerce_product_meta_start' ); ?>
<div class="product_meta mt-3">

	<?= wc_get_product_category_list( $product->get_id(), ', ', '<p>' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</p>' ); ?>
	
	<? if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) { ?>
		<p class="sku_wrapper"><? esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><? echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></p>
	<? } ?>

</div>
<? do_action( 'woocommerce_product_meta_end' ); ?>
