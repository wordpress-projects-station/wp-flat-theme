<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?

	$columns = 12/wc_get_loop_prop( 'columns' );
	$banner = (wp_get_attachment_url( $category->image_id ))?:(get_template_directory_uri().'/adds/404IMAGE.PNG');
	$link = get_post_permalink($category->id);
	$title = $category->name;
	$excerpt = $category->short_description;

?>

<div class="mb-3 col-sm-12 col-md-<?=$columns?>">
	<div class="card" style="cursor:pointer" onclick="window.location='<?=$link?>'">

		<div class="card-header p-0">
			<img style="height:15vw;object-fit:cover;" class="card-img-top" src="<?=$banner?>" alt=" ... " />
		</div>

		<div class="card-body text-center">
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
