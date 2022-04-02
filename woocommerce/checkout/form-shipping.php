<? defined( 'ABSPATH' ) || exit; ?>

<div class="mb-3">

	<div class="border border-2 border-light p-4">

		<div class="woocommerce-shipping-fields">
			<? if ( true === WC()->cart->needs_shipping_address() ) { ?>

				<p class="m-0" id="ship-to-different-address">
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
						<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <? checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><? esc_html_e( 'Ship to a different address?', 'woocommerce' ); ?></span>
					</label>
				</p>

				<div class="shipping_address mt-2">

					<? do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

					<div class="woocommerce-shipping-fields__field-wrapper">
						<?

							$fields = $checkout->get_checkout_fields( 'shipping' );

							foreach ( $fields as $key => $field )
							woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );

						?>
					</div>

					<? do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

				</div>

			<? } ?>
		</div>

	</div>

</div>

<div class="mb-3">

	<div class="border border-2 border-light p-4">

		<div class="woocommerce-additional-fields">

		<? 
		
			do_action( 'woocommerce_before_order_notes', $checkout );
			
			if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) {
				
				if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) { ?>

					<h3><? esc_html_e( 'Additional information', 'woocommerce' ); ?></h3>

				<? } ?>

				<div class="woocommerce-additional-fields__field-wrapper">
					<? 
						foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field )
						woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					?>
				</div>

				<?
			} 
		
			do_action( 'woocommerce_after_order_notes', $checkout );
		?>

		</div>

	</div>

</div>
