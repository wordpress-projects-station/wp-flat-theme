<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;
	if ( empty( $product ) || ! $product->is_visible() ) {return;}

	$banner = (wp_get_attachment_url( $product->image_id ))?:(get_template_directory_uri().'/adds/404IMAGE.PNG');
	$link = get_post_permalink($product->id);
	$title = $product->name;
	$price = $product->price;
	$excerpt = $product->short_description;

?>

<div class="slider-box">
	<div class="m-2">
		<div class="card" style="cursor:pointer" onclick="window.location='<?=$link?>'">

			<div class="card-header p-0">
				<img style="height:10vw;object-fit:cover;" class="card-img-top" src="<?=$banner?>" alt=" ... " />
			</div>

			<div class="card-body text-center">
				<p class="card-subtitle fs-5 text-muted"><?=$price?> €</p>
				<h5 class="card-title fs-6" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?=$title?></h5>
				<a href="<?=$link?>" class="btn btn-outline-secontary">OPEN DETAILS</a>
			</div>

		</div>
	</div>
</div>
