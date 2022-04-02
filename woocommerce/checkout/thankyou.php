<? defined( 'ABSPATH' ) || exit; ?>


	<? if ( $order ) { ?>

		
		<?

			do_action( 'woocommerce_before_thankyou', $order->get_id() );

			if ( $order->has_status( 'failed' ) ) {
				?>
					<h3 class="text-center mb-5 woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
						<? esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
					</h3>
					<?

			} else{

				?>
					<h3 class="text-center mb-5 woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
						<?= apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?>
					</h3>
					<p class="text-center mb-5 ">
						Well done! You have completed the operations successfully.
						<? if ( $order->get_payment_method()=='bacs' ) { ?>
							<br>In case of bank transfer <a class="btn btn-small btn-outline-secondary">print this page <i class="bi bi-printer"></i></a> and follow the instructions for the transfer.<br>
							<small>- pay attention to correctly transcribe the causal and bank details -</small>
						<? } ?>
					</p>
				<?
			}

		?>

	<div class="woocommerce-order border border-2 border-light p-4">

			<div class="row g-3 mt-2 addresses">
				<div class="col col-sm-12 col-md-6">

					<?

						if ( $order->has_status( 'failed' ) ) {
							
							?>

								<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
									<a href="<?= esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><? esc_html_e( 'Pay', 'woocommerce' ); ?></a>
									<? if ( is_user_logged_in() ) { ?>
										<a href="<?= esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><? esc_html_e( 'My account', 'woocommerce' ); ?></a>
									<? } ?>
								</p>

							<?

						}
						
						else {
							
							?>

								<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

									<li class="woocommerce-order-overview__order order">
										<? esc_html_e( 'Order number:', 'woocommerce' ); ?>
										<strong><?= $order->get_order_number(); ?></strong>
									</li>

									<li class="woocommerce-order-overview__date date">
										<? esc_html_e( 'Date:', 'woocommerce' ); ?>
										<strong><?= wc_format_datetime( $order->get_date_created() ); ?></strong>
									</li>

									<? if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) { ?>
										<li class="woocommerce-order-overview__email email">
											<? esc_html_e( 'Email:', 'woocommerce' ); ?>
											<strong><?= $order->get_billing_email(); ?></strong>
										</li>
									<? } ?>

									<li class="woocommerce-order-overview__total total">
										<? esc_html_e( 'Total:', 'woocommerce' ); ?>
										<strong><?= $order->get_formatted_order_total(); ?></strong>
									</li>

									<? if ( $order->get_payment_method_title() ) { ?>
										<li class="woocommerce-order-overview__payment-method method">
											<? esc_html_e( 'Payment method:', 'woocommerce' ); ?>
											<strong><?= wp_kses_post( $order->get_payment_method_title() ); ?></strong>
										</li>
									<? } ?>

								</ul>
							<?
						
						}

					?>

				</div>

				<div class="col col-sm-12 col-md-6">
					<? 
						ob_start();
						do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); 

						$html = ob_get_clean();
						$html_output =  preg_replace('/<h2(.*?)\/h2>/','', $html);
						$html_output =  preg_replace('/\<h3/','<b', $html_output);
						$html_output =  preg_replace('/\<\/h3/','</b', $html_output);
						$html_output =  preg_replace('/<li class="bank_name">/','<li class="purpose_of_the_transfer">Reason: <strong>shop order '.$order->get_id().'</strong></li><li class="bank_name">', $html_output);

						echo $html_output;
					?>
				</div>
			</div>
			
		<?

			ob_start();
			do_action( 'woocommerce_thankyou', $order->get_id() );

			$html = ob_get_clean();
			$html_output =  preg_replace('/table class="woocommerce-table/','table class="table woocommerce-table', $html);
			$html_output =  preg_replace('/woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses/','row g-3 mt-2 addresses', $html_output);
			$html_output =  preg_replace('/woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1/','col col-sm-12 col-md-6', $html_output);
			$html_output =  preg_replace('/woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2/','col col-sm-12 col-md-6', $html_output);
			$html_output =  preg_replace('/<h2/','<div class="border border-2 border-light p-4"><h2', $html_output);
			$html_output =  preg_replace('/<\/address>/','</address></div>', $html_output);
			
			echo $html_output;
			
		} else { ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
				<?= apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?>
			</p>

	</div>

<? } ?>