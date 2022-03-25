<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	$attribute_keys  = array_keys( $attributes );
	$variations_json = wp_json_encode( $available_variations );
	$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

	do_action( 'woocommerce_before_add_to_cart_form' );

?>

<form class="variations_form cart" action="<?= esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?= absint( $product->get_id() ); ?>" data-product_variations="<?= $variations_attr; // WPCS: XSS ok. ?>">

	<?
	
		do_action( 'woocommerce_before_variations_form' ); 
		
		if ( empty( $available_variations ) && false !== $available_variations ) {

			echo '<p class="stock out-of-stock">'.esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ).'</p>';

		} else { 
			
			foreach ( $attributes as $attribute_name => $values ) { ?>

				<div class="row variations mb-2">

					<div class="col-sm-12 col-md-3">
						<label class="btn" for="<?= esc_attr( sanitize_title( $attribute_name ) ); ?>"><?= ucfirst( wc_attribute_label( $attribute_name ) ); ?></label>
					</div>

					<div class="col-sm-12 col-md-9">
						<div class="options-wrapper">

							<?

								$attribute_label = strtolower(preg_replace('/pa_/','',sanitize_title( $attribute_name ),1));

								if($attribute_label=='color') {

									wc_dropdown_variation_attribute_options([
										'class'		=> 'd-hidden',
										'options'   => $values,
										'attribute' => $attribute_name,
										'product'   => $product,
									]);

									$attribute_terms = get_terms(['taxonomy'=>$attribute_name,'hide_empty'=>false]);
									foreach ($attribute_terms as $term)
									echo'<span class="option-data colordot" style="background-color:'.get_term_meta($term->term_id)["color"][0].';"></span>';

								}

								elseif($attribute_label=='size') {

									wc_dropdown_variation_attribute_options([
										'class'		=> 'd-hidden',
										'options'   => $values,
										'attribute' => $attribute_name,
										'product'   => $product,
									]);

									foreach ( $values as $v ) 
									echo '<span style="margin:5px 5px 0 0;display:inline-block;"><input class="option-data btn-check" type="radio" name="'.$attribute_name.'" id="'.$v.'" autocomplete="off" value="'.$v.'"><label class="btn btn-outline-secondary" for="'.$v.'">'.$v.'</label></span>';

								}

								elseif($attribute_label=='design' &&  count($attributes)==1 ) {

									wc_dropdown_variation_attribute_options([
										'class'		=> 'd-hidden',
										'options'   => $values,
										'attribute' => $attribute_name,
										'product'   => $product,
									]);

									$variations = $product->get_available_variations();
									foreach ( $variations as $variant)
									echo'<span class="option-data designdot" data-variant="'.$variant['variation_id'].'" style="background:url('.$variant['image']['src'].') center / 200% no-repeat;"></span>';

								}

								else {

									// echo 'simple selector';
									wc_dropdown_variation_attribute_options([
										'class'		=> 'form-select',
										'options'   => $values,
										'attribute' => $attribute_name,
										'product'   => $product,
									]);

									if( end( $attribute_keys ) === $attribute_name ) {
										echo '<span>'; wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a style="text-decoration:none;" class="reset_variations btn muted" href="#">🗙</a>' ) ); echo '</span>';
									}

								}

							?>

						</div>
					</div>

				</div>
				
			<? }

			do_action( 'woocommerce_after_variations_table' ); 
			
			echo '<div class="single_variation_wrap">';
			do_action( 'woocommerce_before_single_variation' );
			do_action( 'woocommerce_single_variation' );
			do_action( 'woocommerce_after_single_variation' );
			echo '</div>';

		} 

		do_action( 'woocommerce_after_variations_form' );
		
	?>

	<script>
		document.addEventListener("DOMContentLoaded", () => {

			// hide variation price

			document.querySelectorAll('.woocommerce-variation.single_variation')[0].classList.add('d-hidden')


			// update price preview via quantity

			var number_field = document.querySelectorAll('[id^="product-"] [type=number]')[0],
				price_display = document.querySelectorAll('[id^="product-"] .price')[0],
				price_bdi = price_display.querySelectorAll('.woocommerce-Price-amount.amount bdi')

			var static_price = []; price_bdi.forEach( el => { static_price.push( parseFloat(el.innerText.replace(/\s/g,'').replace(/\,/g, '.')) ) })

			document.querySelectorAll('[id^="product-"] input, select').forEach( f => {
				f.addEventListener( 'change', () => {

					setTimeout(() => {

						var nfv = parseInt(number_field.value)

						if ( document.querySelectorAll('.woocommerce-variation-price bdi')[0] ) {

							var subprice = parseFloat(document.querySelectorAll('.woocommerce-variation-price bdi')[0].innerHTML.split('&nbsp;')[0].replace(/\,/g, '.')),
								pricesymbol = document.querySelectorAll('.woocommerce-Price-currencySymbol')[0].innerHTML,
								pricetax = document.querySelectorAll('.woocommerce-price-suffix')[0].innerHTML

								price_display.innerHTML = '<span class="fw-bold">'+(nfv*parseFloat(subprice)).toFixed(2)+'</span>'+'&nbsp;'+pricesymbol+'&nbsp;<span><sup><small>'+pricetax+'</small></sup></span>'

						} else {

							static_price.forEach( (p,i) => {
								console.log("p",p);
								price_bdi[i].innerHTML = parseFloat(nfv*p).toFixed(2)+'&nbsp;'+'<?=get_woocommerce_currency_symbol()?>'
								i++
							})

						}

					}, 500)

				},true)				
			})

			// update price preview via variation

			document.querySelectorAll('.variations_form .variations').forEach( row => {

				var selectbox = row.querySelectorAll('select')[0];

				row.querySelectorAll('.option-data').forEach( (trigger,i) => {

					trigger.onclick = () => {

						row.querySelectorAll('.option-data').forEach( t => t.classList.remove('active') )
						trigger.classList.add('active')

						let options = selectbox.querySelectorAll('option')

						options.forEach( o => o.removeAttribute('selected') )
						options[i].setAttribute('selected','selected')

						// this is trigger for update woocomerce form after selection, woo change the final variant id

						let selectEvent = new Event("change")
						selectbox.dispatchEvent(selectEvent)

						// original woo trigger:
						// jQuery(selectbox).trigger('change');

					}

					i++

				})

			})


		})
	</script>

</form>

<? do_action( 'woocommerce_after_add_to_cart_form' ); ?>