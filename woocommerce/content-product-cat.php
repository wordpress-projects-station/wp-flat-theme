<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?

	$columns = 12/wc_get_loop_prop( 'columns' );
	// $banner = (wp_get_attachment_url( $category->image_id ))?:(get_template_directory_uri().'/adds/404IMAGE.PNG');
	$link = get_post_permalink($category->id);
	$title = $category->name;
	$excerpt = $category->short_description;

?>

<div class="category-box col-sm-12 col-md-<?=$columns?>">
	<div class="card">

		<div class="card-header p-0" onclick="window.location='<?= $link; ?>'">
			<div style="<?= get_banner_background($category->image_id); ?>"></div>
			<!-- <img style="height:15vw;object-fit:cover;" class="card-img-top" src="<?//= $banner;?>" alt=" ... " /> -->
		</div>

		<div class="card-body text-center">

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
