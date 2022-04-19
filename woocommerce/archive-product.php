<? defined( 'ABSPATH' ) || exit; ?>

<? 

	get_header( 'shop' );

	global $wp_query;

	$wp_query_data = $wp_query->get_queried_object();

	// what archive/page type is it?
	// echo '<pre><code>'; print_r($wp_query_data); echo '</pre></code>';
	$archive_type 	= isset($wp_query_data->has_archive)?$wp_query_data->has_archive:false;
	$taxonomy_type 	= isset($wp_query_data->taxonomy)?$wp_query_data->taxonomy:false;
	$is_sub_page_of_shop = wp_get_post_parent_id() == get_page_by_path('shop')->ID ? true : false;

	?><main class="<?= center_column_size(); ?>"><?


		if( $archive_type == 'shop' || $archive_type == 'shop-home' || ($archive_type == 'home' && $is_sub_page_of_shop) )
		include_once 'content-archive-shop.php';

		elseif( $taxonomy_type = 'product_cat')
		include_once 'content-archive-category.php';

		else 
		echo '<p>PAGE TYPE ERROR: TYPE UNKNOWN</p>';


	?></main><?
	
	get_footer( 'shop' );

?>