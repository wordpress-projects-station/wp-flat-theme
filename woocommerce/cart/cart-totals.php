<? defined( 'ABSPATH' ) || exit; ?>

<div class="cart_totals <?= ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<? do_action( 'woocommerce_before_cart_totals' ); ?>

	<!-- <h2><? //esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2> -->

	<div class="shop_table shop_table_responsive">

		<div class="mt-2 cart-subtotal">
			<b><i class="bi bi-bookmark-check"></i> <? esc_html_e( 'Subtotal', 'woocommerce' ); ?>: </b>
			<span data-title="<? esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
				<? wc_cart_totals_subtotal_html(); ?>
			</span>
		</div>

		<?
		
			// COUPON
			foreach ( WC()->cart->get_coupons() as $code => $coupon ) {
				
				?>
					<div class="mt-2 cart-discount coupon-<?= esc_attr( sanitize_title( $code ) ); ?>">
						<b><i class="bi bi-bookmark-heart"></i> <? wc_cart_totals_coupon_label( $coupon ); ?>: </b>
						<span data-title="<?= esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>">
							<? wc_cart_totals_coupon_html( $coupon ); ?>
						</span>
					</div>
				<?
	
			}
		?>

		<?
			// SHIPPING (cart/cart-shipping.php)
			if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) { 

				do_action( 'woocommerce_cart_totals_before_shipping' );
				
				ob_start();
				wc_cart_totals_shipping_html();
				$shipping_html = ob_get_clean();
				// ob_end_flush();
				
				// echo htmlspecialchars($shipping_html);
				$shipping_output = preg_replace('/<tr/', '<div class="mt-2"', $shipping_html,1);
				$shipping_output = preg_replace('/<\/tr/', '</div', $shipping_output);
				$shipping_output = preg_replace('/<th/', '<b', $shipping_output);
				$shipping_output = preg_replace('/<b>/', '<b><i class="bi bi-box2-heart"></i>&nbsp;', $shipping_output,1);
				$shipping_output = preg_replace('/woocommerce-shipping-methods/', 'woocommerce-shipping-methods list-unstyled', $shipping_output);
				$shipping_output = preg_replace('/woocommerce-shipping-destination/', 'woocommerce-shipping-destination m-0', $shipping_output);
				$shipping_output = preg_replace('/<li/', '<li style="padding-left:13px;"', $shipping_output);
				$shipping_output = preg_replace('/<label/', '&nbsp; <label', $shipping_output);

				echo $shipping_output;


				do_action( 'woocommerce_cart_totals_after_shipping' );

			}
			
			elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) {
				
				?>
					<div class="mt-2 shipping">
						<b><i class="bi bi-box2-heart"></i> <? esc_html_e( 'Shipping', 'woocommerce' ); ?>: </b>
						<div data-title="<? esc_attr_e( 'Shipping', 'woocommerce' ); ?>">
							<? woocommerce_shipping_calculator(); ?>
						</div>
					</div>
				<?
			}
		?>

		<?
			// FEEE & TAX
		 	foreach ( WC()->cart->get_fees() as $fee ) {

				 ?>
					<div class="mt-2 fee">
						<b><i class="bi bi-receipt-cutoff"></i> <?= esc_html( $fee->name ); ?></b>
						<span data-title="<?= esc_attr( $fee->name ); ?>"><? wc_cart_totals_fee_html( $fee ); ?></span>
					</div>
				<?
		 	}

			if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {

				$taxable_address = WC()->customer->get_taxable_address();
				$estimated_text  = '';

				if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {

					/* translators: %s location. */
					$estimated_text = sprintf( 
						
						'<small>'.
							esc_html__('(estimated for %s)', 'woocommerce' ).
						'</small>',
						
						WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ]
					);

				}

				if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {

					foreach ( WC()->cart->get_tax_totals() as $code => $tax ) {

						?>
							<div class="mt-2 tax-rate tax-rate-<?= esc_attr( sanitize_title( $code ) ); ?>">
								<b><i class="bi bi-receipt-cutoff"></i> <?= esc_html( $tax->label ) . $estimated_text; ?></b>
								<div data-title="<?= esc_attr( $tax->label ); ?>"><?= wp_kses_post( $tax->formatted_amount ); ?></div>
							</div>
						<?

					}
				}
				
				else {

					?>
						<div class="mt-2  tax-total">
							<b><i class="bi bi-receipt-cutoff"></i> <?= esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></b>
							<div data-title="<?= esc_attr( WC()->countries->tax_or_vat() ); ?>"><? wc_cart_totals_taxes_total_html(); ?></div>
						</div>
					<?

				}
			}
		?>

		<? do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<hr>

		<div class="mt-4 order-total">
			<? esc_html_e( 'Total', 'woocommerce' ); ?> :<br>
			<div class="fw-bold fs-5 text-success" data-title="<? esc_attr_e( 'Total', 'woocommerce' ); ?>"><? wc_cart_totals_order_total_html(); ?></div>
		</div>

		<? do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</div>

	<div class="wc-proceed-to-checkout">

		<? do_action( 'woocommerce_proceed_to_checkout' ); ?>

	</div>

	<? do_action( 'woocommerce_after_cart_totals' ); ?>

</div>