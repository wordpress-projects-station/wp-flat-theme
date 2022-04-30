<? defined( 'ABSPATH' ) || exit; ?>

<? global $product; ?>


<div class="woocommerce-variation-add-to-cart variations_button">

	<? 
		do_action( 'woocommerce_before_add_to_cart_button' );
		do_action( 'woocommerce_before_add_to_cart_quantity' );
	?>

	<div class="row g-4">

		<div class="col-sm-12 col-md-3 p-0"><label class="btn" for="pa_design">Quantity</label></div>

		<div class="col-sm-12 col-md-2 p-0">
			<?
				woocommerce_quantity_input([
					'classes'	  => 'form-control',
					'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
					'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
					'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				]);
			?>
		</div>

		<div class="col-sm-12 col-md-7">&nbsp;</div>

	</div>

	<? do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>
		
	<div class="p-2"></div>

	<button type="submit" class="mt-3 btn btn-primary single_add_to_cart_button button alt"><?= esc_html( $product->single_add_to_cart_text() ); ?></button>

	<? do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?= absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?= absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />

</div>
