<? if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?

	get_header( 'shop' );

	?>
	<div class="contentsidebar col">

		<div class="row <?= $mods->site_reverse_layout ? 'pb-4':''; ?>">

			<?
				if( $mods->sidebar_small_position == 'left' )
				print_sidebar('sidebar_small');
			?>

			<main class="col">

				<?

					bootsrapped_breadcrumb();

					?><hr class="mb-5"><?

					while ( have_posts() ) {

						the_post();
						
						wc_get_template_part( 'content', 'single-product' );

					}
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