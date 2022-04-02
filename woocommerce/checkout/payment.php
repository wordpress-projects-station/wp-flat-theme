<? defined( 'ABSPATH' ) || exit; ?>

<?
	if ( ! wp_doing_ajax() )
	do_action( 'woocommerce_review_order_before_payment' );
?>

<div id="payment" class="woocommerce-checkout-payment">

	<? if ( WC()->cart->needs_payment() ) { ?>

		<div class="wc_payment_methods payment_methods methods mb-4">
			<?
				if ( ! empty( $available_gateways ) ) {
				
					ob_start();

					foreach ( $available_gateways as $gateway )
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );

					$html = ob_get_clean();

					$html_output = preg_replace('/<li class="/', '<div class="border border-2 border-light p-2 mb-4', $html);
					$html_output = preg_replace('/li>/', 'div>', $html_output);

					echo $html_output;

				} else {

					echo '<div class="border border-2 border-light p-2 mb-4 woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</div>';

				}

			?>
		</div>

	<? } ?>

	<div class="form-row place-order">

		<noscript>
			<?
				/* translators: $1 and $2 opening and closing emphasis tags respectively */
				printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
			?>
			<br/>
			<button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<? esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><? esc_html_e( 'Update totals', 'woocommerce' ); ?> </button>
		</noscript>

		<hr class="mt-4 mb-4">

		<? 

			ob_start();

			wc_get_template( 'checkout/terms.php' );

			$html = ob_get_clean();
			$html_output = preg_replace('/policy-text"/', 'policy-text" style="margin-top: -17px;font-size: 10px;"', $html);
			echo $html_output;

		?>

		<hr class="mt-4 mb-4">

		<?

			do_action( 'woocommerce_review_order_before_submit' );

			echo '<div class="mt-4">';
			echo apply_filters(
				'woocommerce_order_button_html',
				'<button type="submit" class="btn btn-success button alt" name="woocommerce_checkout_place_order" id="place_order" value="'.esc_attr( $order_button_text ).'" data-value="'.esc_attr( $order_button_text ).'">'.esc_html( $order_button_text ).' <i class="bi bi-cart-check"></i> </button>'
			);
			echo '</div>';
			
			do_action( 'woocommerce_review_order_after_submit' );

			wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' );
		
		?>

	</div>

</div>

<?
	if ( ! wp_doing_ajax() )
	do_action( 'woocommerce_review_order_after_payment' );
?>