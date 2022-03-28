<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}

?>
<div id="product-<? the_ID(); ?>">


	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-5">
			<? 
				// contains:
				// - image gallery ecc
				do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-7">
			<?
				// contains:
				// - single-product title
				// - single-product rating
				// - single-product price 
				// - single-product excerpt
				// - single-product add_to_cart 
				// - single-product meta 
				// - single-product sharing 
				// - WC_Structured_Data::generate_product_data()
				do_action( 'woocommerce_single_product_summary' );
			?>
		</div>

	</div>

	<div>

		<?
			// contains:
			// - woocommerce_after_single_product_summary.
			// - tabs
			// - upsell_display
			// - related_products
			do_action( 'woocommerce_after_single_product_summary' );
		?>

	</div>

</div>

<? do_action( 'woocommerce_after_single_product' ); ?>
