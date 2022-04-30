<? defined( 'ABSPATH' ) || exit; ?>

<? 

	get_header( 'shop' );

	global $mods, $wp_query;

	$wp_query_data = $wp_query->get_queried_object();

	// what archive/page type is it?
	// echo '<pre><code>'; print_r($wp_query_data); echo '</pre></code>';
	$archive_type 	= isset($wp_query_data->has_archive)?$wp_query_data->has_archive:false;
	$taxonomy_type 	= isset($wp_query_data->taxonomy)?$wp_query_data->taxonomy:false;

	?><main class="contentsidebar col g-4"><?


		if( $archive_type == 'shop' )
		include_once 'content-archive-shop.php';

		elseif( $taxonomy_type = 'product_cat')
		include_once 'content-archive-category.php';

		else 
		echo '<p>PAGE TYPE ERROR: TYPE UNKNOWN<br>Please, contact the administration</p>';


	?></main><?
	
	get_footer( 'shop' );

?>