<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	$attribute_keys  = array_keys( $attributes );
	$variations_json = wp_json_encode( $available_variations );
	$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

	do_action( 'woocommerce_before_add_to_cart_form' );

?>

<form class="variations_form cart" action="<?= esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?= absint( $product->get_id() ); ?>" data-product_variations="<?= $variations_attr; // WPCS: XSS ok. ?>">

	<? do_action( 'woocommerce_before_variations_form' ); ?>

	<? if ( empty( $available_variations ) && false !== $available_variations ) { ?>

		<p class="stock out-of-stock"><?= esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>

	<? } else { ?>

		<table class="table borderless collapsed variations">
			<tbody>
				<? foreach ( $attributes as $attribute_name => $options ) { ?>

					<tr>
						<th width="200">

							<label class="btn" for="<?= esc_attr( sanitize_title( $attribute_name ) ); ?>"><?= wc_attribute_label( $attribute_name ); ?></label>

						</th>
						<td class="row">
							<span class="col">
								<?

									if($attribute_name=='pa_color') {
										echo 'COLOR!';
									}

									elseif($attribute_name=='pa_size') {
										echo 'SIZE!';
									}

									elseif($attribute_name=='pa_design') {
										echo 'selector design';
									}

									else{
										// echo 'simple selector';
										wc_dropdown_variation_attribute_options(
											[
												'class'		=> 'form-select',
												'options'   => $options,
												'attribute' => $attribute_name,
												'product'   => $product,
											]
										);

									}

								?>
							</span>
							<span class="col-2">
								<?= end( $attribute_keys ) != $attribute_name ?: wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a style="text-decoration:none;" class="reset_variations btn muted" href="#">🗙</a>' ) );?>
							</span>
						</td>
					</tr>
				<? } ?>
			</tbody>
		</table>

		<? do_action( 'woocommerce_after_variations_table' ); ?>

		<div class="single_variation_wrap">
			<?
				do_action( 'woocommerce_before_single_variation' );
				do_action( 'woocommerce_single_variation' );
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

	<? } ?>

	<? do_action( 'woocommerce_after_variations_form' ); ?>

</form>

<?
do_action( 'woocommerce_after_add_to_cart_form' );
