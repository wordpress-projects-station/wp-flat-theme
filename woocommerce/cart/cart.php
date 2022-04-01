<? defined( 'ABSPATH' ) || exit; ?>

<? do_action( 'woocommerce_before_cart' ); ?>
<div class="row">

	<div class="col-9">

		<form class="woocommerce-cart-form" action="<?= esc_url( wc_get_cart_url() ); ?>" method="post">

			<? do_action( 'woocommerce_before_cart_table' ); ?>

			<table class="table borderless cart woocommerce-cart-form__contents" cellspacing="0">

				<thead>
					<tr>
						<th class="product-remove">&nbsp;</th>
						<th class="product-thumbnail">&nbsp;</th>
						<th class="product-name"><? esc_html_e( 'Product', 'woocommerce' ); ?></th>
						<th class="product-price"><? esc_html_e( 'Price', 'woocommerce' ); ?></th>
						<th class="product-quantity"><? esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
						<th class="product-subtotal"><? esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
					</tr>
				</thead>

				<tbody>

					<?
						do_action( 'woocommerce_before_cart_contents' );

						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

							$_product = apply_filters(
								'woocommerce_cart_item_product',
								$cart_item['data'],
								$cart_item,
								$cart_item_key
							);

							$product_id = apply_filters(
								'woocommerce_cart_item_product_id',
								$cart_item['product_id'],
								$cart_item,
								$cart_item_key
							);

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

								$product_permalink = apply_filters( 
									'woocommerce_cart_item_permalink', 
									$_product->is_visible() ? $_product->get_permalink( $cart_item ) : '',
									$cart_item,
									$cart_item_key
								);

								?>

									<tr class="woocommerce-cart-form__cart-item <?= esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

										<td class="align-middle product-remove">

											<?

												$remover = apply_filters(
													'woocommerce_cart_item_remove_link',
													sprintf(
														'<a href="%s" class="remove text-decoration-none text-danger" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="bi bi-backspace-reverse-fill"></i></a>',
														esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
														esc_html__( 'Remove this item', 'woocommerce' ),
														esc_attr( $product_id ),
														esc_attr( $_product->get_sku() )
													),
													$cart_item_key
												);

												echo $remover;

											?>
										</td>

										<td class="align-middle product-thumbnail">

											<?
												$thumbnail = get_the_post_thumbnail_url($_product->get_data()['id']);

												if(!$thumbnail) $thumbnail = bloginfo('template_directory').'/adds/404IMAGE.PNG';

												echo'
												<a href="'.esc_url( $thumbnail ).'">
													<div style="height:75px;width:75px;background: url('.$thumbnail.') center / cover no-repeat"></div>
												</a>';

											?>

										</td>

										<td class="align-middle product-name" data-title="<? esc_attr_e( 'Product', 'woocommerce' ); ?>">

											<?

												if ( ! $product_permalink )
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
												else
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="text-decoration-none fw-bold text-dark" href="%s"><i class="bi bi-arrow-up-right-square"></i> %s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );

												do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

												// Meta data.
												echo wc_get_formatted_cart_item_data( $cart_item );

												// Backorder notification.
												if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );

											?>

										</td>

										<td class="align-middle product-price" data-title="<? esc_attr_e( 'Price', 'woocommerce' ); ?>">

											<?
			
												$pricelabel = apply_filters(
													'woocommerce_cart_item_price',
													WC()->cart->get_product_price( $_product ),
													$cart_item,
													$cart_item_key
												);

												echo $pricelabel;

											?>

										</td>

										<td class="align-middle product-quantity" >
											<div style="width:100px" data-title="<? esc_attr_e( 'Quantity', 'woocommerce' ); ?>">

												<?

													if ( $_product->is_sold_individually() ) {

														$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );

													}
													
													else {

														$product_quantity = woocommerce_quantity_input(
															[
																'classes'		=> 'form-control',
																'input_name'	=> "cart[{$cart_item_key}][qty]",
																'input_value'	=> $cart_item['quantity'],
																'max_value'		=> $_product->get_max_purchase_quantity(),
																'min_value'		=> '0',
																'product_name'	=> $_product->get_name(),
															],
															$_product,
															false
														);

													}

													$quantity_field = apply_filters(
														'woocommerce_cart_item_quantity',
														$product_quantity,
														$cart_item_key,
														$cart_item
													);

													echo $quantity_field;

												?>

											</div>
										</td>

										<td class="align-middle product-subtotal" data-title="<? esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">

											<?

												$subtotal = apply_filters(
													'woocommerce_cart_item_subtotal',
													WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ),
													$cart_item,
													$cart_item_key
												);

												echo $subtotal;

											?>
			
										</td>
									</tr>

								<?
							}
						}

						do_action( 'woocommerce_cart_contents' );
					?>

					<tr>
						<td colspan="6" class="actions">

							<? if ( wc_coupons_enabled() ) { ?>

								<div class="coupon">
									<label for="coupon_code"><? esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<? esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<? esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><? esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
									<? do_action( 'woocommerce_cart_coupon' ); ?>
								</div>

							<? } ?>

							<button type="submit" class="button" name="update_cart" value="<? esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><? esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

							<? do_action( 'woocommerce_cart_actions' ); ?>

							<? wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

						</td>
					</tr>

					<? do_action( 'woocommerce_after_cart_contents' ); ?>

				</tbody>
			</table>

			<? do_action( 'woocommerce_after_cart_table' ); ?>

		</form>
	</div>

	<? do_action( 'woocommerce_before_cart_collaterals' ); ?>

	<div class="col-3  cart-collaterals">
		<? do_action( 'woocommerce_cart_collaterals' ); ?>
	</div>

	<? do_action( 'woocommerce_after_cart' ); ?>

</div>