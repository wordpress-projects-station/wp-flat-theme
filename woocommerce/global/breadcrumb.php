<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?

	if ( ! empty( $breadcrumb ) ) {

		?><nav aria-label="breadcrumb"><ol class="breadcrumb"><?

		foreach ( $breadcrumb as $key => $crumb ) {

			?><li class="breadcrumb-item active" aria-current="page"><?

			if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
				echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
			} else {
				echo esc_html( $crumb[0] );
			}

			?></li><?
		}

		?></ol></nav><?

	}

?>
    