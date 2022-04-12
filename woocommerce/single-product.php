<? if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?

	get_header( 'shop' );

	?><main class="<?= $mods->shopbar != 'off' ? 'col-xs-12 col-sm-12 col-md-9' : 'col col-sm-12'; ?>"><?

		bootsrapped_breadcrumb();

		?><hr class="mb-5"><?

		while ( have_posts() ) {

			the_post(); wc_get_template_part( 'content', 'single-product' );

		}

	?></main><?

	get_footer( 'shop' );

?>