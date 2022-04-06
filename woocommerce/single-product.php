<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?

	get_header( 'shop' );

	$woobar_left = false;
	$woobar_right = true;

	?><main class="<?= $woobar_left||$woobar_right ? 'col-xs-12 col-sm-12 col-md-9' : 'col col-sm-12'; ?>"><?

		bootsrapped_breadcrumb();

		?><hr class="mb-5"><?

		while ( have_posts() ) {

			the_post(); wc_get_template_part( 'content', 'single-product' );

		}

	?></main><?

	get_footer( 'shop' );

?>