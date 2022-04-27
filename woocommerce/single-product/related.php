<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? 

	if ( $related_products ) {

	echo '<section id="products-releated-slider">';

			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

			if ( $heading ) echo '<h4>'.esc_html( $heading ).'</h4>';

			echo '<div id="products-slider" style="display:block;clear:both;overflow:hidden;">';
				echo '<div id="slider-wrap" style="white-space:nowrap;">';
			
					foreach ( $related_products as $related_product ) {

						$post_object = get_post( $related_product->get_id() );
						setup_postdata( $GLOBALS['post'] =& $post_object );
						wc_get_template_part( 'content', 'product-related' );

					}

				echo '</div>';
				echo '<a id="prev"></a><a id="next"></a>';
			echo '</div>';

	?>
		<style>
			#products-releated-slider,
			#products-slider{
				display:grid;
				overflow:hidden;
				position:relative;
			}
			#products-slider a#prev,
			#products-slider a#next{
				position: absolute;
				text-decoration: none;
				font-family: "bootstrap-icons";
				font-size: 35px;
				color: #00000069;
				z-index: 4000;
				cursor: crosshair;
			}
			#products-slider a#prev{
				left:0;
				top:50%;
				transform:translateY(-50%);
			}
			#products-slider a#next{
				right:0;
				top:50%;
				transform:translateY(-50%);
			}
			#products-slider a#prev::before{
				margin-left:10px;
				content: '\F129';
			}
			#products-slider a#next::before{
				margin-right:10px;
				content: '\F133';
			}
			#products-slider .slider-box{
				width:250px;
				max-width:100%;
				float:left;
				display:inline-block;
			}
		</style>
		<script>
			document.addEventListener("DOMContentLoaded", () => {

				let slider = document.querySelectorAll('#products-slider')[0],
					slider_container = slider.firstChild,
					slider_contents = [...slider_container.children],
					next = slider.lastChild,
					prev = next.previousElementSibling,
					accessibleQnt = slider_contents.length

				let container_width = 0;
				slider_contents.forEach( box => container_width+=parseInt(box.offsetWidth) )
				slider_container.style.width = container_width+"px"

				! slider_container.dataset.actual ? slider_container.dataset.actual = 0 : null ;
				! slider_container.style.transitionDuration ? slider_container.style.transitionDuration = '.5s' : null ;

				let maxrange = slider_container.offsetWidth-slider.offsetWidth

				next.onclick = () => {

					if ( slider_container.dataset.actual < accessibleQnt ) {

						slider_container.dataset.actual++

						let target 		= slider_contents[parseInt(slider_container.dataset.actual)],
							offset 		= target.offsetLeft

						if( offset <= maxrange ) {

							slider_container.style.webkitTransform = 'translateX(-'+offset+'px)'

						}
						
						else {

							accessibleQnt = slider_container.dataset.actual
							slider_container.style.webkitTransform = 'translateX(-'+maxrange+'px)'

						}

					}

				}
				

				prev.onclick = () => {

					if ( slider_container.dataset.actual >= 1 ) {

						slider_container.dataset.actual--

						let target 		= slider_contents[parseInt(slider_container.dataset.actual)],
							offset 		= target.offsetLeft

						offset >= maxrange
							? slider_container.style.webkitTransform = 'translateX(-'+maxrange+'px)'
							: slider_container.style.webkitTransform = 'translateX(-'+offset+'px)'

					}

				}


			})
		</script>
	
	<?
	echo '</section>';

}

wp_reset_postdata();
