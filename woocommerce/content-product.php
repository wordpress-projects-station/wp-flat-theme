<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;
	if ( empty( $product ) || ! $product->is_visible() ) {return;}

	$columns = 12/wc_get_loop_prop( 'columns' );
	// $classes = wc_get_product_class('',$product); $classes = preg_replace('/class="/','', $classes); $classes = preg_replace('/"/','',$classes);
	$banner = (wp_get_attachment_url( $product->image_id ))?:(get_template_directory_uri().'/adds/404IMAGE.PNG');
	$link = get_post_permalink($product->id);
	$title = $product->name;
	$price = $product->price;
	$excerpt = $product->short_description;

?>

<div class="mb-3 col-sm-12 col-md-<?=$columns?>">
	<div class="card <?//=$classes;?>" style="cursor:pointer" onclick="window.location='<?=$link?>'">

		<div class="card-header p-0">
			<img style="height:15vw;object-fit:cover;" class="card-img-top" src="<?=$banner?>" alt=" ... " />
		</div>

		<div class="card-body text-center">
			<p class="card-subtitle fs-5 text-muted"><?=$price?> €</p>
			<h5 class="card-title fs-3"><?=$title?></h5>
			<div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp:3;-webkit-box-orient: vertical;">
				<p class="card-text"><?=$excerpt?></p>
			</div>
		</div>

		<div class="card-footer">
			<a href="<?=$link?>" class="btn btn-primary">OPEN DETAILS</a>
		</div>
			
	</div>
</div>