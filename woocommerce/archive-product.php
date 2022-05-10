<? defined( 'ABSPATH' ) || exit; ?>

<? 

	get_header( 'shop' );

	global $mods, $looptype, $wp_query;

	$wp_query_data = $wp_query->get_queried_object();

	// what archive/page type is it?
	// echo '<pre><code>'; print_r($wp_query_data); echo '</pre></code>';
	$archive_type 	= isset($wp_query_data->has_archive)?$wp_query_data->has_archive:false;
	$taxonomy_type 	= isset($wp_query_data->taxonomy)?$wp_query_data->taxonomy:false;

	?>

	<div class="contentsidebar col">

		<div class="row <?= $mods->site_reverse_layout ? 'pb-4':''; ?>">

			<?
				if( $mods->sidebar_small_position == 'left' )
				print_sidebar('sidebar_small');
			?>

			<main class="col">

				<?

					if( $archive_type == 'shop' )
					include_once 'content-archive-shop.php';

					elseif( $taxonomy_type = 'product_cat')
					include_once 'content-archive-category.php';

					else 
					echo '<p>PAGE TYPE ERROR: TYPE UNKNOWN<br>Please, contact the administration</p>';

				?>

			</main>

			<?
				if( $mods->sidebar_small_position == 'right' )
				print_sidebar('sidebar_small');
			?>

		</div>

	</div>

	<? 

	get_footer( 'shop' );

?>