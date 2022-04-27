<? defined( 'ABSPATH' ) || exit; ?>


<?

	global $product;

	if ( ! $product->is_purchasable() ) {
		return;
	}

	echo wc_get_stock_html( $product );

	if ( $product->is_in_stock() ) {

?>

	<? do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?= esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>

		<? 
			do_action( 'woocommerce_before_add_to_cart_button' );
			do_action( 'woocommerce_before_add_to_cart_quantity' );
		?>

			<div class="p-2"></div>

			<div class="row">

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
				<div class="col-sm-12 col-md-7">

					<button type="submit" name="add-to-cart" value="<?= esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button btn btn-primary"><?= esc_html( $product->single_add_to_cart_text() ); ?></button>

				</div>
			</div>

			<? do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>


		<? do_action( 'woocommerce_after_add_to_cart_button' ); ?>

		<script>
			document.addEventListener("DOMContentLoaded", () => {

				// update price preview via quantity

				var number_field = document.querySelectorAll('[id^="product-"] [type=number]')[0],
					// price_display = document.querySelectorAll('[id^="product-"] .price')[0],
					price_bdi = document.querySelectorAll('.woocommerce-Price-amount.amount bdi')[0]

				var static_price = parseFloat(price_bdi.innerText.replace(/\s/g,'').replace(/\,/g, '.'))

				document.querySelectorAll('[id^="product-"] input[type=number]')[0]
				.addEventListener( 'change', () => {

					setTimeout(() => {

						var nfv = parseInt(number_field.value)
						price_bdi.innerHTML = parseFloat(nfv*static_price).toFixed(2)+'&nbsp;'+'<?=get_woocommerce_currency_symbol()?>'

					}, 500)

				},true)

			})

		</script>


	</form>

	<? do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<? } ?>
