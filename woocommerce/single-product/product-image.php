<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	// echo'<code><pre>'; print_r($product); echo'</pre></code>';

	$columns			= apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
	$thumbnail_id 		= $product->get_image_id();
	$wrapper_classes	= apply_filters( 'woocommerce_single_product_image_gallery_classes',[
								'woocommerce-product-gallery',
								'woocommerce-product-gallery--' . ( $thumbnail_id ? 'with-images' : 'without-images' ),
								'woocommerce-product-gallery--columns-' . absint( $columns ),
								'images',
						]);

?>
<div class="bg-light">

	<div class="<?= esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?= esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">

		<?// info: icon zoom is added from woocomerce. You can mod it via css. ?>

		<figure class="woocommerce-product-gallery__wrapper">
			<?

				if ( $thumbnail_id ) {

					$html = wc_get_gallery_image_html( $thumbnail_id, true );

				} else {

					$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
					$html .= '</div>';

				}

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $thumbnail_id ); 

				do_action( 'woocommerce_product_thumbnails' );

			?>
		</figure>

	</div>

</div>