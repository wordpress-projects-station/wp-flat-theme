<? defined( 'ABSPATH' ) || exit; ?>

<table class="table borderless shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name"><? esc_html_e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-total"><? esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?= esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-name">
							<?= wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
							<?= apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
							<?= wc_get_formatted_cart_item_data( $cart_item ); ?>
						</td>
						<td class="product-total">
							<?= apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						</td>
					</tr>
					<?
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th><? esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td><? wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<? foreach ( WC()->cart->get_coupons() as $code => $coupon ) { ?>
			<tr class="cart-discount coupon-<?= esc_attr( sanitize_title( $code ) ); ?>">
				<th><? wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td><? wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<? } ?>

		<? 
		
			if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) {
				
				do_action( 'woocommerce_review_order_before_shipping' );
				
				ob_start();

				wc_cart_totals_shipping_html();

				$html_output = preg_replace('/<li/', '<div', ob_get_clean());
				$html_output = preg_replace('/li>/', 'div>', $html_output);
				$html_output = preg_replace('/><label/', '>&nbsp;&nbsp;<label', $html_output);
				echo $html_output;
				
				do_action( 'woocommerce_review_order_after_shipping' );
				
			}

		?>

		<? foreach ( WC()->cart->get_fees() as $fee ) { ?>
			<tr class="fee">
				<th><?= esc_html( $fee->name ); ?></th>
				<td><? wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<? } ?>

		<?
		
			if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			
				if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {

					foreach ( WC()->cart->get_tax_totals() as $code => $tax ) {
						?>
							<tr class="tax-rate tax-rate-<?= esc_attr( sanitize_title( $code ) ); ?>">
								<th><?= esc_html( $tax->label ); ?></th>
								<td><?= wp_kses_post( $tax->formatted_amount ); ?></td>
							</tr>
						<?
					}
				}
				else {
					?>
					<tr class="tax-total">
						<th><?= esc_html( WC()->countries->tax_or_vat() ); ?></th>
						<td><? wc_cart_totals_taxes_total_html(); ?></td>
					</tr>
					<?
				}
			} 

		?>

		<? do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total">
			<th><? esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td><? wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<? do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>
