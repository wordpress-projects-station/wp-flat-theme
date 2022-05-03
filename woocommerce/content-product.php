<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	if ( empty( $product ) || ! $product->is_visible() ) {return;}

	$columns = 12/wc_get_loop_prop( 'columns' );
	// $classes = wc_get_product_class('',$product); $classes = preg_replace('/class="/','', $classes); $classes = preg_replace('/"/','',$classes);

	$link = get_post_permalink($product->id);
	$title = $product->name;
	$price = $product->price;
	$excerpt = $product->short_description;
	$banner = get_banner_background($product->ID);

?>

<div class="product-box col-sm-12 col-md-<?=$columns?>">

	<? include get_stylesheet_directory().'/elements/box-contents.php' ?>
	
</div>