<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	if ( empty( $product ) || ! $product->is_visible() ) {return;}

	// $banner = (wp_get_attachment_url( $product->image_id ))?:(get_template_directory_uri().'/adds/404IMAGE.PNG');
	$link = get_post_permalink($product->id);
	$title = $product->name;
	$price = $product->price;
	$excerpt = $product->short_description;

?>

<div class="slider-box">

	<div class="related-box m-2">

		<div class="card" style="cursor:pointer" onclick="window.location='<?=$link?>'">

			<div class="card-header p-0" onclick="window.location='<?= $link; ?>'">
				<div style="<?= get_banner_background($product->image_id); ?>"></div>
			</div>

			<div class="card-body text-center">

				<p class="card-subtitle fs-5 text-muted">
					<?= $price; ?> <?= get_woocommerce_currency_symbol(); ?>
				</p>

				<div class="card-title">
					<h4>
						<?= $title; ?>
					</h4>
				</div>

				<a href="<?=$link?>" class="btn btn-outline-secontary"><?= print_theme_lang("","OPEN DETAILS"); ?></a>

			</div>

		</div>

	</div>

</div>
