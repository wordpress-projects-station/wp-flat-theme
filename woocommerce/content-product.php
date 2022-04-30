<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;
	if ( empty( $product ) || ! $product->is_visible() ) {return;}

	$columns = 12/wc_get_loop_prop( 'columns' );
	// $classes = wc_get_product_class('',$product); $classes = preg_replace('/class="/','', $classes); $classes = preg_replace('/"/','',$classes);
	// $banner = (wp_get_attachment_url( $product->image_id ))?:(get_template_directory_uri().'/adds/404IMAGE.PNG');
	$link = get_post_permalink($product->id);
	$title = $product->name;
	$price = $product->price;
	$excerpt = $product->short_description;

?>

<div class="product-box col-sm-12 col-md-<?=$columns?>">
	<div class="card">

		<div class="card-header p-0" onclick="window.location='<?= $link; ?>'">
			<div style="<?= get_banner_background($product->ID); ?>"></div>
		</div>

		<div class="card-body text-center">
			
			<p class="card-subtitle fs-5 text-muted">
				<?= $price; ?> <?=get_option('woocommerce_currency');?>
			</p>
		
			<div class="card-title">
				<h4>
					<?= $title; ?>
				</h4>
			</div>

			<div class="card-excerpt">
				<p class="card-text">
					<?= $excerpt; ?>
				</p>
			</div>

		</div>

		<div class="card-footer">

			<a href="<?= $link; ?>" class="btn btn-primary">
				OPEN DETAILS
			</a>

		</div>

	</div>
</div>