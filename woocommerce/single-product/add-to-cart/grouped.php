<? defined( 'ABSPATH' ) || exit; ?>


<?

	global $product, $post;

	do_action( 'woocommerce_before_add_to_cart_form' );
?>

	<form class="cart grouped_form" action="<?= esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>

		<? //echo '<pre><code>'; print_r($grouped_products); echo '</code></pre>'; ?>


		<table cellspacing="0" class="woocommerce-grouped-product-list group_table">
	
			<tbody>

				<?

					$quantites_required      = false;
					$previous_post           = $post;
					$grouped_product_columns = apply_filters(
						'woocommerce_grouped_product_columns',
						[
							'quantity',
							'label',
							'price',
						],
						$product
					);
					$show_add_to_cart_button = false;

					do_action( 'woocommerce_grouped_product_list_before', $grouped_product_columns, $quantites_required, $product );

					foreach ( $grouped_products as $grouped_product_child ) {

						$post_object        = get_post( $grouped_product_child->get_id() );
						$quantites_required = $quantites_required || ( $grouped_product_child->is_purchasable() && ! $grouped_product_child->has_options() );
						$post               = $post_object; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

						setup_postdata( $post );

						if ( $grouped_product_child->is_in_stock() )
						$show_add_to_cart_button = true;


						echo '<div style="border-bottom: 2px solid #ccc" id="product-' . esc_attr( $grouped_product_child->get_id() ) . '" class="woocommerce-grouped-product-list-item ' . esc_attr( implode( ' ', wc_get_product_class( '', $grouped_product_child ) ) ) . '">';

							

							// Output columns for each product.
							foreach ( $grouped_product_columns as $column_id ) {

								do_action( 'woocommerce_grouped_product_list_before_' . $column_id, $grouped_product_child );

								switch ( $column_id ) {

									case 'quantity' :

										ob_start();

										if ( !$grouped_product_child->has_options() && ! $grouped_product_child->is_purchasable() || ! $grouped_product_child->is_in_stock() ) {
											echo '<span id="outofstok-'.$column_id.'" class="badge badge-warning"><p class="m-0">in this version this product is out of stock</p></span><br>';
										}

										?>
										
											<div class="row variations mb-2" data-product="<?=wp_json_encode( $grouped_product_child )?>">
												
												<?

													if( $grouped_product_child->has_options() ) {


														$productdata = $grouped_product_child->get_data();

														// START VARIABLE PRODUCT

														foreach ( $productdata['attributes'] as $attributes_in_array ) {

															
															$sub_product 		= wc_get_product( $productdata['id'] );
															$attributes_data 	= $attributes_in_array->get_data();
															$attribute_name 	= $attributes_data['name'];
															$attribute_label 	= strtolower(preg_replace('/pa_/','',$attribute_name,1));
															
															$terms_list = wc_get_product_terms( $productdata['id'], $attribute_name, true );
															$slug_list 	= [];
															foreach ($terms_list as $term) {
																array_push($slug_list,$term->slug);
															}

															?>
												
																<div class="col-sm-12 col-md-4">
																	<div class="mb-1 mt-1">
																		<label class="btn" for="<?= esc_attr( sanitize_title( $attribute_name ) ); ?>"><?= ucfirst( wc_attribute_label( $attribute_name ) ); ?></label>
																	</div>
																</div>
											
																<div class="col-sm-12 col-md-8">
																	<div class="options-wrapper mb-1 mt-1">
											
																		<?

																			if($attribute_label=='color') {

																				wc_dropdown_variation_attribute_options([
																					'class'		=> 'd-hidden',
																					'options'   => $slug_list, //$attributes_data['options']
																					'attribute' => $attribute_name,
																					'product'   => $sub_product,
																				]);

																				foreach ($slug_list as $slug)
																				echo '<span class="option-data colordot" style="background-color:#'.$slug.';"></span>';

																			}

																			elseif($attribute_label=='size') {

																				wc_dropdown_variation_attribute_options([
																					'class'		=> 'd-hidden',
																					'options'   => $slug_list,
																					'attribute' => $attribute_name,
																					'product'   => $sub_product,
																				]);

																				foreach ( $slug_list as $slug ) 
																				echo '<span style="margin:5px 5px 0 0;display:inline-block;"><input class="option-data btn-check" type="radio" name="'.$attribute_name.'" id="'.$slug.'" autocomplete="off" value="'.$slug.'"><label class="btn btn-outline-secondary" for="'.$slug.'">'.$slug.'</label></span>';

																			}

																			elseif($attribute_label=='design' &&  count($productdata['attributes'])==1 ) {

																				wc_dropdown_variation_attribute_options([
																					'class'		=> 'd-hidden',
																					'options'   => $slug_list,
																					'attribute' => $attribute_name,
																					'product'   => $sub_product,
																				]);

																				$variations = $product->get_available_variations();
																				foreach ( $variations as $variant)
																				echo'<span class="option-data designdot" data-variant="'.$variant['variation_id'].'" style="background:url('.$variant['image']['src'].') center / 200% no-repeat;"></span>';

																			}

																			else {

																				wc_dropdown_variation_attribute_options([
																					'class'		=> 'form-select',
																					'options'   => $slug_list,
																					'attribute' => $attribute_name,
																					'product'   => $sub_product,
																				]);

																				// if( end( $attribute_keys ) === $attribute_name )
																				// echo '<span>',(wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a style="text-decoration:none;" class="reset_variations btn muted" href="#">🗙</a>' ) )),'</span>';

																			}

																		?>

																	</div>
																</div>

															<?

														}

														// END VARIABLE PRODUCT

													}
		
												?>

												<div class="col-sm-12 col-md-4">
													<div class="mb-1 mt-1">
														<label class="btn">Quantity </label>
													</div>
												</div>
							
												<div class="col-sm-12 col-md-8">
													<div class="options-wrapper mb-1 mt-1">

														<?
															do_action( 'woocommerce_before_add_to_cart_quantity' );

															woocommerce_quantity_input([
																'classes'		=> 'form-control',
																'input_name'	=> 'quantity[' . $grouped_product_child->get_id() . ']',
																'input_value' 	=> isset( $_POST['quantity'][ $grouped_product_child->get_id() ] ) ? wc_stock_amount( wc_clean( wp_unslash( $_POST['quantity'][ $grouped_product_child->get_id() ] ) ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Missing
																'min_value'		=> apply_filters( 'woocommerce_quantity_input_min', 1, $grouped_product_child ),
																'max_value'		=> apply_filters( 'woocommerce_quantity_input_max', $grouped_product_child->get_max_purchase_quantity(), $grouped_product_child ),
																'placeholder'	=> '1',
															]);

															do_action( 'woocommerce_after_add_to_cart_quantity' );
														?>

													</div>
												</div>

											</div>

										<?

										$value = ob_get_clean();

										break;

									case 'price' :
		
										$value = $grouped_product_child->get_price_html() . wc_get_stock_html( $grouped_product_child );
				
										break;

									default :
					
										$value = '';
						
										break;
								}

								echo '<div class="woocommerce-grouped-product-list-item__' . esc_attr( $column_id ) . '">' . apply_filters( 'woocommerce_grouped_product_list_column_' . $column_id, $value, $grouped_product_child ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

								do_action( 'woocommerce_grouped_product_list_after_' . $column_id, $grouped_product_child );
							}

						echo '</div>';

					}

					$post = $previous_post;
					setup_postdata( $post );

					do_action( 'woocommerce_grouped_product_list_after', $grouped_product_columns, $quantites_required, $product );
		
				?>

			</tbody>

		</table>

		<input type="hidden" name="add-to-cart" value="<?= esc_attr( $product->get_id() ); ?>" />

		<? if ( $quantites_required && $show_add_to_cart_button ) { ?>

			<? do_action( 'woocommerce_before_add_to_cart_button' ); ?>

			<button type="submit" class="single_add_to_cart_button button alt"><?= esc_html( $product->single_add_to_cart_text() ); ?></button>

			<? do_action( 'woocommerce_after_add_to_cart_button' ); ?>

		<? } ?>
	</form>

<? do_action( 'woocommerce_after_add_to_cart_form' ); ?>
