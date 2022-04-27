<? 
	defined( 'ABSPATH' ) || exit;
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
?>


<?

	global $product;

	do_action( 'woocommerce_before_add_to_cart_form' );

?>

	<form class="cart grouped_form" action="<?= esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>

		<div class="woocommerce-grouped-product-list group_table">
	
				<?

					foreach ( $grouped_products as $grouped_product_child ) {


						$isoutofstock 			= $grouped_product_child->get_data()['stock_status'];
						$haveaprice 			= $grouped_product_child->is_purchasable() && floatval($grouped_product_child->get_price())>0 ? true : false;

						$haveAttributes 		= false;
						$haveDefaultAttribute 	= count($grouped_product_child->get_data()['default_attributes'])>1 ? true : false;
						$defaultAttribute 		= htmlspecialchars(json_encode($grouped_product_child->get_data()['default_attributes']), ENT_QUOTES, 'UTF-8');
						
						
						$json_variation_asset = '';
						if( method_exists($grouped_product_child, 'get_available_variations' ) ) {

							$sub_product_variations_data = $grouped_product_child->get_available_variations();

							$variations_abstract = [];

							if ( $sub_product_variations_data ) {
								
								$haveAttributes = true;

								foreach ($sub_product_variations_data as $variation_datas) {


									$attribute_slugs_list = [];
									foreach ($variation_datas['attributes'] as $datas => $slug){
										array_push($attribute_slugs_list,$slug);
									}

									array_push($variations_abstract,[
										'variation_id' 			=> $variation_datas['variation_id'],
										'variation_attributes' 	=> $attribute_slugs_list,
										'variation_price' 		=> $variation_datas['display_regular_price'],
										'is_purchasable'		=> ($variation_datas['is_purchasable']&&floatval($variation_datas['display_price'])>0?true:false),
										'variation_image'		=> $variation_datas['image']['src'],
										'variation_availability'=> $variation_datas['is_in_stock'],
									]);
	
								}
	
							}
	
							$json_variation_asset = htmlspecialchars(json_encode($variations_abstract), ENT_QUOTES, 'UTF-8');
						}

						echo '<div id="product-'.esc_attr( $grouped_product_child->get_id() ).'" data-default-attributes="'.($haveDefaultAttribute?$defaultAttribute:'false').'" data-variation="'.$json_variation_asset.'" class="woocommerce-grouped-product-list-item '.esc_attr( implode( ' ', wc_get_product_class( '', $grouped_product_child ) ) ).'">';

							// Output printer

							$grouped_product_columns = apply_filters(
								'woocommerce_grouped_product_columns',
								[
									'label',
									'quantity',
									'price',
								],
								$product
							);

							foreach ( $grouped_product_columns as $column_type ) {

								$productdata = $grouped_product_child->get_data();

								switch ( $column_type ) {

									case 'label' :

										ob_start();
	
										?>
											<div>
												<h3 class="fw-bold fs-6 mt-3 mb-2">
													<?=$productdata['name'];?>
												</h3>
											</div>
										<?

										$outputHTML = ob_get_clean();

										break;

									case 'quantity' :

										ob_start();

											?><div class="row mb-2 variations" data-product="<?=wp_json_encode( $column_type );?>"><?
										
											// START VARIABLE PRODUCT

											if( $grouped_product_child->has_options() ) {

												foreach ( $productdata['attributes'] as $attributes_in_array ) {

													$sub_product 		= wc_get_product( $productdata['id'] );
													$attributes_data 	= $attributes_in_array->get_data();
													$attribute_name 	= $attributes_data['name'];
													$attribute_label 	= strtolower(preg_replace('/pa_/','',$attribute_name,1));
													
													$slug_list 	= [];
													$terms_list = wc_get_product_terms( $productdata['id'], $attribute_name, true );
													foreach ($terms_list as $term)
													array_push($slug_list,$term->slug);

													?>

														<div class="col-sm-12 col-md-4">
															<div class="mb-1 mt-1">
																<label class="btn" for="<?= esc_attr( sanitize_title( $attribute_name ) ); ?>"><?= ucfirst( wc_attribute_label( $attribute_name ) ); ?></label>
															</div>
														</div>
									
														<div class="col-sm-12 col-md-8">
															<div class="options-wrapper mb-1 mt-1">
									
																<?

																	if( $attribute_label == 'color' ) {

																		wc_dropdown_variation_attribute_options([
																			'class'		=> 'd-hidden',
																			'options'   => $slug_list, //$attributes_data['options']
																			'attribute' => $attribute_name,
																			'product'   => $sub_product,
																		]);

																		foreach ($slug_list as $slug)
																		echo '<span class="option-data colordot" style="background-color:#'.$slug.';"></span>';

																	}

																	elseif( $attribute_label == 'size' ) {

																		wc_dropdown_variation_attribute_options([
																			'class'		=> 'd-hidden',
																			'options'   => $slug_list,
																			'attribute' => $attribute_name,
																			'product'   => $sub_product,
																		]);

																		foreach ( $slug_list as $slug ) 
																		echo '<span style="margin:5px 5px 0 0;display:inline-block;"><input class="option-data btn-check" type="radio" name="'.$attribute_name.'" id="'.$slug.'" autocomplete="off" value="'.$slug.'"><label class="btn btn-outline-secondary" for="'.$slug.'">'.$slug.'</label></span>';

																	}

																	elseif( $attribute_label=='design' &&  count($productdata['attributes'])==1 ) {

																		wc_dropdown_variation_attribute_options([
																			'class'		=> 'd-hidden',
																			'options'   => $slug_list,
																			'attribute' => $attribute_name,
																			'product'   => $sub_product,
																		]);

																		$design_variations = $sub_product->get_available_variations();
																		foreach ( $design_variations as $design_data)
																		echo'<span class="option-data designdot" data-variant="'.$design_data['variation_id'].'" style="background:url('.$design_data['image']['src'].') center / 200% no-repeat;"></span>';

																	}

																	else {

																		wc_dropdown_variation_attribute_options([
																			'class'		=> 'form-select',
																			'options'   => $slug_list,
																			'attribute' => $attribute_name,
																			'product'   => $sub_product,
																		]);

																	}

																?>

															</div>
														</div>

													<?

												}

											}

											// END VARIABLE PRODUCT
		
											?>
											
												<div class="col-sm-12 col-md-4">
													<div class="mb-1 mt-1">
														<label class="btn">Quantity</label>
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

										$outputHTML = ob_get_clean();
	

										break;

									case 'price' :

										ob_start();

											?>
												<div class="row mb-4">
													<div class="col-sm-12 col-md-4">&nbsp;</div>
													<div class="col-sm-12 col-md-8">
														<div>
															<div id="pricebox">
																<?= $grouped_product_child->get_price_html(); ?>
															</div>
															<div id="warningsbox">
																<?=
																	$haveaprice
																	? '<span class="badge bg-warning text-dark'.($isoutofstock=='outofstock'?'':' d-none').'"><p class="m-0">'.($haveDefaultAttribute?'You need to select a variation of this product.':'The version chosen is out of stock.').'</p></span>'
																	: '<span class="badge bg-warning text-dark"><p class="m-0">'.($haveAttributes?'You need to select a variation of this product .':'This product not have an available price.').'</p></span>';
																?>
															</div>
														</div>
													</div>
												</div>
											<?

										$outputHTML = ob_get_clean();

										break;

									default :

										$outputHTML = '';
	
										break;

								}

								echo '<div class="woocommerce-grouped-product-list-item__'.esc_attr( $column_type ).'">'.
										apply_filters( 'woocommerce_grouped_product_list_column_'.$column_type, $outputHTML, $grouped_product_child ).
									 '</div>';

							}

						echo '</div><hr class="mt-1 mb-1"/>';

					}

				?>

		</div>

		<input type="hidden" name="add-to-cart" value="<?= esc_attr( $product->get_id() ); ?>" />

		<? do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="p-2"></div>

		<button type="submit" class="btn btn-primary single_add_to_cart_button button alt"><?= esc_html( $product->single_add_to_cart_text() ); ?></button>

		<? do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	</form>

<? do_action( 'woocommerce_after_add_to_cart_form' ); ?>


<script>

	document.addEventListener("DOMContentLoaded", () => {

		var variations = document.querySelectorAll('.variations')

		
		variations.forEach( selectorsgroup => {
			
			var productwrapper 	= selectorsgroup.parentNode.parentNode,
				variationdata 	= productwrapper.dataset.variation ? JSON.parse(productwrapper.dataset.variation) : false,
				pricecontainer 	= productwrapper.querySelectorAll('.woocommerce-grouped-product-list-item__price')[0],
				pricebox 		= productwrapper.querySelectorAll('#pricebox')[0],
				warning 		= productwrapper.querySelectorAll('#warningsbox>span')[0],
				idfield 		= selectorsgroup.querySelectorAll('[type=number]')[0],
				numberfield		= idfield
			

			idfield.setAttribute('value',1)

			!pricebox.innerHTML&&!warning.innerHTML
				? pricecontainer.classList.style='height:0'
				: pricecontainer.classList.style=null

			if ( productwrapper.dataset.variation ) {
				
				var selectedattributes = [];

				selectorsgroup.querySelectorAll('.options-wrapper').forEach( row => {

					var select   = row.querySelectorAll('select')[0],
						triggers = row.querySelectorAll('.option-data'),
						ex_value = ! select ? false : select.value

					if(select){

						triggers.forEach( (trigger,i) => {

							trigger.onclick = () => {

								row.querySelectorAll('.option-data').forEach( t => t.classList.remove('active') )
								trigger.classList.add('active')

								let options = select.querySelectorAll('option')

								options.forEach( o => o.removeAttribute('selected') )
								options[i].setAttribute( 'selected', 'selected' )

								select.setAttribute( 'value', options[i].value )
								select.dispatchEvent( new Event("change") )

							}

							i++

						})

						select.addEventListener('click', event =>{

							if ( ex_value != select.value ) {
								ex_value = select.value
								select.setAttribute( 'value', event.target.value )
								select.dispatchEvent( new Event("change") )
							}

						})

						select.addEventListener('change', ()=>{

							selectedattributes = [];

							selectorsgroup.querySelectorAll('.options-wrapper>select').forEach( input_select => {
							 	selectedattributes.push(input_select.value)
							})

							variationdata.forEach( (data,i) => {

								let exist = selectedattributes.every( value => {
									return variationdata[i].variation_attributes.includes(value);
								})

								if ( exist && variationdata[i].variation_availability ) {

									idfield.name = 'quantity['+variationdata[i].variation_id+']'
									productwrapper.id = 'product-'+variationdata[i].variation_id
									
									if(variationdata[i].variation_price && variationdata[i].is_purchasable){
										pricebox.innerHTML = '<p class="m-0">'+(variationdata[i].variation_price*parseInt(numberfield.value)).toFixed(2)+' <?=get_woocommerce_currency_symbol();?></p>'
										warning.classList.add('d-none')
									}

									if(!variationdata[i].variation_price || !variationdata[i].is_purchasable)
									{
										pricebox.innerHTML = 'unavailable product'
										warning.innerText = 'your choosen not have an available price'
										warning.classList.remove('d-none')
									}

									return;

								}
								
								!pricebox.innerHTML&&!warning.innerHTML
									? pricecontainer.classList.style='height:0'
									: pricecontainer.classList.style=null

							})

						})

					}


				})

			}

			let price_bdi  = pricebox.querySelectorAll('bdi'),
				startprice = []

			price_bdi.forEach( bdi => { startprice.push( parseFloat(bdi.innerText.replace(/\s/g,'').replace(/\,/g, '.')) ) })

			numberfield.addEventListener('change',()=>{

				if(  pricebox.querySelectorAll('bdi').length>0 ) {

					startprice.forEach( (price,i) => {
						price_bdi[i].innerHTML = parseFloat(price*parseInt(numberfield.value)).toFixed(2)+'&nbsp;'+'<?=get_woocommerce_currency_symbol()?>'
						i++
					})

				}
				
				else {

					variationdata.forEach( (data,i) => {

						if( variationdata[i].variation_id == productwrapper.id.split("product-")[1] ){
							pricebox.innerHTML = '<p class="m-0">'+(variationdata[i].variation_price*parseInt(numberfield.value)).toFixed(2)+' <?=get_woocommerce_currency_symbol();?></p>'
							return false;
						}

					})

				}

			})


		})

	})

</script>
