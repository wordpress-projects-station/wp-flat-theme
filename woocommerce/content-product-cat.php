<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?

	$columns = 12/wc_get_loop_prop( 'columns' );

	$link = get_post_permalink($category->id);
	$title = $category->name;
	$excerpt = $category->short_description;
	$banner = get_banner_background($category->image_id);

?>

<div class="category-box col-sm-12 col-md-<?=$columns?>">

	<? include get_template_directory().'/elements/box-contents.php' ?>

</div>
