<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	$attribute_keys  = array_keys( $attributes );
	$variations_json = wp_json_encode( $available_variations );
	$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

	do_action( 'woocommerce_before_add_to_cart_form' );

?>

<div class="p-2"></div>

<form class="variations_form cart" action="<?= esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?= absint( $product->get_id() ); ?>" data-product_variations="<?= $variations_attr; // WPCS: XSS ok. ?>">

	<?
	
		do_action( 'woocommerce_before_variations_form' ); 
		
		if ( empty( $available_variations ) && false !== $available_variations ) {

			?>
				<p class="stock out-of-stock">
					<?= esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?>
				</p>
			<?

		} else { 
			
			foreach ( $attributes as $attribute_name => $values ) {
				
				?>

					<div class="row variations">

						<div class="col-sm-12 col-md-3 p-0">
							<?
								$in_lang_label 	= print_theme_lang("variationfilters",$attribute_name)
												? print_theme_lang("variationfilters",$attribute_name)
												: ucfirst( wc_attribute_label( $attribute_name ) );
							?>
							<label class="btn" for="<?= esc_attr( sanitize_title( $attribute_name ) ); ?>"><?= $in_lang_label; ?></label>
						</div>

						<div class="col-sm-12 col-md-9 p-0">
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

										// for variation swatch 
										// $attribute_terms = get_terms(['taxonomy'=>$attribute_name,'hide_empty'=>false]);
										// foreach ($attribute_terms as $term) echo'<span class="option-data colordot" style="background-color:'.get_term_meta($term->term_id)["color"][0].';"></span>';

										foreach ($values as $slugcolor)
										echo'<span class="option-data colordot" style="background-color:#'.$slugcolor.';"></span>';

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
										echo '<span class="option-data designdot" data-variant="'.$variant['variation_id'].'" style="background:url('.$variant['image']['src'].') center / 200% no-repeat;"></span>';

									}

									else {

										// echo 'simple selector';
										wc_dropdown_variation_attribute_options([
											'class'		=> 'form-select',
											'options'   => $values,
											'attribute' => $attribute_name,
											'product'   => $product,
										]);

										// if( end( $attribute_keys ) === $attribute_name )
										// echo '<span>',(wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a style="text-decoration:none;" class="reset_variations btn muted" href="#">🗙</a>' ) )),'</span>';

									}

								?>

							</div>
						</div>

					</div>
					
				<? 
			}

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

			var number_field 	= document.querySelectorAll('[id^="product-"] [type=number]')[0],
				price_display 	= document.querySelectorAll('[id^="product-"] .price')[0],
				price_bdi 		= price_display.querySelectorAll('.woocommerce-Price-amount.amount bdi'),
				form_selectors 	= document.querySelectorAll('[id^="product-"] input, select'),
				static_price 	= []

			price_bdi.forEach( bdi => { static_price.push( parseFloat(bdi.innerText.replace(/\s/g,'').replace(/\,/g, '.')) ) })

			form_selectors.forEach( selector => {

				selector.addEventListener( 'change', () => {

					setTimeout(() => {

						var nfv = parseInt(number_field.value)

						if ( document.querySelectorAll('.woocommerce-variation-price bdi')[0] ) {

							var subprice = parseFloat(document.querySelectorAll('.woocommerce-variation-price bdi')[0].innerHTML.split('&nbsp;')[0].replace(/\,/g, '.')),
								pricesymbol = document.querySelectorAll('.woocommerce-Price-currencySymbol')[0],
								pricetax = document.querySelectorAll('.woocommerce-price-suffix')[0]

								price_display.innerHTML = '<span class="fw-bold">'+(nfv*parseFloat(subprice)).toFixed(2)+'</span>'+'&nbsp;'+(pricesymbol?pricesymbol.innerHTML:' €')+'&nbsp;<span><sup><small>'+(pricetax?pricetax.innerHTML:'')+'</small></sup></span>'

						} else {

							static_price.forEach( (p,i) => {
								price_bdi[i].innerHTML = parseFloat(nfv*p).toFixed(2)+'&nbsp;'+'<?=get_woocommerce_currency_symbol()?>'
								i++
							})

						}

					}, 200)

				},true)

			})


			// update previews via variation id

			var variation_rows = document.querySelectorAll('.variations_form .variations'),
				variation_id_field = document.querySelectorAll('.variations_form [name=variation_id]')[0]

			variation_rows.forEach( row => {

				var select = row.querySelectorAll('select')[0],
					ex_value = select.value

				select.addEventListener('click',()=>{
					if(ex_value!=select.value){
						ex_value=select.value
						select.dispatchEvent( new Event("change") )
						variation_id_field.dispatchEvent( new Event("change") )
					}
				})

				row.querySelectorAll('.option-data').forEach( (trigger,i) => {

					trigger.onclick = () => {

						row.querySelectorAll('.option-data').forEach( t => t.classList.remove('active') )
						trigger.classList.add('active')

						let options = select.querySelectorAll('option')

						options.forEach( o => o.removeAttribute('selected') )
						options[i].setAttribute('selected','selected')

						// triggers for update all
						select.setAttribute('value', options[i].value )
						select.dispatchEvent( new Event("change") )
						variation_id_field.dispatchEvent( new Event("change") )
						jQuery(select).trigger('change');

					}

					i++

				})

			})


			// transfer json gallery

			<?	// variationdata is already printed in form html data-product_variations
				// $galleryItems = [];
				// for($i=0;$i<sizeof($available_variations);$i++){
				// 	$variant_id = $product->get_children()[$i];
				// 	$banner_src = $available_variations[$i]['image']['src'];
				// 	array_push($galleryItems, [$banner_src,$variant_id]);
				// }
				// $variations_gallery_json = wp_json_encode( $galleryItems );
			?>  // var gallerydata = JSON.parse(<?//=$variations_gallery_json?>)


			var	variationdata 	= JSON.parse(document.querySelectorAll(".variations_form")[0].dataset.product_variations/*, null, 2*/),
				variationtarget = document.querySelectorAll('.variations_form [name=variation_id]')[0],
				galleryfigure 	= document.querySelectorAll('.woocommerce-product-gallery__wrapper')[0],
				gallerylens 	= document.querySelectorAll('.woocommerce-product-gallery__trigger')[0]

			window.onload = () => { 
				let thumbnail = document.querySelectorAll(".flex-control-thumbs li:first-child")[0]
				if ( variationtarget && thumbnail ) thumbnail.classList.add('d-hidden')
			}
			
			variationtarget.addEventListener( 'change', () => { 

				let gallerytarget = document.querySelectorAll('.flex-control-thumbs>li>img')[0]

				if ( gallerytarget ) {

					gallerytarget.dispatchEvent(new MouseEvent("click",{bubbles: true, cancellable: true}));

					document.querySelectorAll('.flex-control-nav.flex-control-thumbs>li').forEach( (el,i) => {
						i==0 ? el.firstChild.classList.add('flex-active')
							: el.firstChild.classList.remove('flex-active')
						i++
					})

					variationdata.forEach( variation => {

						if(variation['variation_id']==variationtarget.value) {
							galleryfigure.querySelectorAll('div>img')[0].src		= variation['image']['src']
							galleryfigure.querySelectorAll('div>a')[0].href			= variation['image']['src']
							galleryfigure.querySelectorAll('div>a>img')[0].src		= variation['image']['src']
							galleryfigure.querySelectorAll('div>a>img')[0].srcset	= variation['image']['srcset']
							galleryfigure.querySelectorAll('div')[0].dataset.thumb 	= variation['image']['thumb_src'] 
						}
					
					})
				}

			})

		})
	</script>

</form>

<? do_action( 'woocommerce_after_add_to_cart_form' ); ?>