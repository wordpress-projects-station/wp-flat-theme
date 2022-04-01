<? defined( 'ABSPATH' ) || exit; ?>

<? do_action( 'woocommerce_before_shipping_calculator' ); ?>

<form class="woocommerce-shipping-calculator" action="<?= esc_url( wc_get_cart_url() ); ?>" method="post">

	<? printf( '<a href="#" class="shipping-calculator-button">%s</a>', esc_html( ! empty( $button_text ) ? $button_text : __( 'Calculate shipping', 'woocommerce' ) ) ); ?>

	<section class="shipping-calculator-form" style="display:none;">

		<? if ( apply_filters( 'woocommerce_shipping_calculator_enable_country', true ) ) { ?>

			<p class="form-row form-row-wide" id="calc_shipping_country_field">

				<select name="calc_shipping_country" id="calc_shipping_country" class="form-control country_to_state country_select" rel="calc_shipping_state">
					<option value="default"><? esc_html_e( 'Select a country / region&hellip;', 'woocommerce' ); ?></option>
					<?
					foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
					}
					?>
				</select>

			</p>

		<? } ?>

		<? if ( apply_filters( 'woocommerce_shipping_calculator_enable_state', true ) ) { ?>
			<p class="form-row form-row-wide" id="calc_shipping_state_field">
				<?
				$current_cc = WC()->customer->get_shipping_country();
				$current_r  = WC()->customer->get_shipping_state();
				$states     = WC()->countries->get_states( $current_cc );

				if ( is_array( $states ) && empty( $states ) ) {
					?>
					<input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<? esc_attr_e( 'State / County', 'woocommerce' ); ?>" />
					<?
				} elseif ( is_array( $states ) ) {
					?>
					<span>
						<select name="calc_shipping_state" class="state_select" id="calc_shipping_state" data-placeholder="<? esc_attr_e( 'State / County', 'woocommerce' ); ?>">
							<option value=""><? esc_html_e( 'Select an option&hellip;', 'woocommerce' ); ?></option>
							<?
							foreach ( $states as $ckey => $cvalue ) {
								echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
							}
							?>
						</select>
					</span>
					<?
				} else {
					?>
					<input type="text" class="input-text" value="<?= esc_attr( $current_r ); ?>" placeholder="<? esc_attr_e( 'State / County', 'woocommerce' ); ?>" name="calc_shipping_state" id="calc_shipping_state" />
					<?
				}
				?>
			</p>
		<? } ?>

		<? if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', true ) ) { ?>
			<p class="form-row form-row-wide" id="calc_shipping_city_field">
				<input type="text" class="input-text" value="<?= esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<? esc_attr_e( 'City', 'woocommerce' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
			</p>
		<? } ?>

		<? if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) { ?>
			<p class="form-row form-row-wide" id="calc_shipping_postcode_field">
				<input type="text" class="input-text" value="<?= esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<? esc_attr_e( 'Postcode / ZIP', 'woocommerce' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
			</p>
		<? } ?>

		<p><button type="submit" name="calc_shipping" value="1" class="button"><? esc_html_e( 'Update', 'woocommerce' ); ?></button></p>

		<? wp_nonce_field( 'woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce' ); ?>

	</section>

</form>

<? do_action( 'woocommerce_after_shipping_calculator' ); ?>
