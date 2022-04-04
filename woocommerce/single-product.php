<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	get_header( 'shop' );
	
	// overrided: do_action( 'woocommerce_before_main_content' );
	echo '<div class="row">';

		echo str_contains(get_theme_mod( $pagetype.'_small_side_settings' ),'left') ? '<aside class="'.( str_contains( get_theme_mod( $pagetype.'_small_side_settings' ), 'dynamic') ? 'col-1 d-none d-md-block d-lg-none d-xl-none':'col-1' ).'">'.dynamic_sidebar('page_side_small').'</aside>':null;
		echo str_contains(get_theme_mod( $pagetype.'_big_side_settings' ),'left') ? '<aside class="'.( str_contains( get_theme_mod( $pagetype.'_big_side_settings' ), 'dynamic') ? 'col-3 d-none d-lg-block':'col-3' ).'">'.dynamic_sidebar('page_side_big').'</aside>':null;

		echo '<main class="col-9">';

			bootsrapped_breadcrumb().'<hr class="mb-5">';

			echo '<hr class="mb-5">';

			while ( have_posts() ) {
				the_post();
				wc_get_template_part( 'content', 'single-product' );
			}

		echo '</main>';
	
		// overrided: do_action( 'woocommerce_after_main_content' );

		if(get_theme_mod( $pagetype.'_small_side_settings' )) {
		    echo str_contains( get_theme_mod( $pagetype.'_small_side_settings' ), 'right' ) ? '<aside class="'.( str_contains(get_theme_mod( $pagetype.'_small_side_settings' ), 'dynamic') ? 'col-1 d-none d-md-block d-lg-none d-xl-none':'col-1' ).'">'.dynamic_sidebar('page_side_small').'</aside>':null;
		}

		if(get_theme_mod( $pagetype.'_big_side_settings' )) {
		    $isright=str_contains( get_theme_mod( $pagetype.'_big_side_settings' ), 'right' );
		    $ct = str_contains( get_theme_mod( $pagetype.'_big_side_settings' ), 'dynamic') ? 'col-3 d-none d-lg-block':'col-3';
		    echo $isright ? '<aside class="'.$ct.'">'.dynamic_sidebar('page_side_big').'</aside>':null;
		}

		echo '<aside class="col-3">';
			do_action( 'woocommerce_sidebar' );
		echo '</aside>';

	echo '</div>';

	get_footer( 'shop' );

?>