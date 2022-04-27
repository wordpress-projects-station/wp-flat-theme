<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? global $mods; ?>

<?

	global $product;
	do_action( 'woocommerce_product_meta_start' );

	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) {

		echo '<p class="m-0 sku_wrapper">';
			echo '<span class="sku">'.esc_html_e( 'SKU:', 'woocommerce' ).(( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' )).'</span>&nbsp;&nbsp;⁞&nbsp;&nbsp';
			echo wc_get_product_category_list( $product->get_id(), ', ', _n( 'Category : ', 'Categories : ', count( $product->get_category_ids() ), 'woocommerce' ),'');
		echo '</p>';

	} else {

		echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="m-0"><p>'._n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ).' ', '</p></span>' );

	}

	do_action( 'woocommerce_product_meta_end' );

?>

<div class="p-2"></div>

<? if( !$mods->heading_status && $mods->excerpt_status ) { ?>


	<?
		global $post;
		$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
		if ( ! $short_description ) { $short_description='nothing has written...'; }
		echo $short_description;
	?>

	<div class="p-2"></div>

<? } ?>