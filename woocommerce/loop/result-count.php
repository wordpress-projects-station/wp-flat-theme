<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="d-inline-block d-inline-block mt-1">
	<p class="woocommerce-result-count m-0">
		<?

			if ( 1 === intval( $total ) ) {

				_e( 'Showing the single result', 'woocommerce' );

			} elseif ( $total <= $per_page || -1 === $per_page ) {

				printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'woocommerce' ), $total );

			} else {

				$first = ( $per_page * $current ) - $per_page + 1;
				$last  = min( $total, $per_page * $current );

				printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
			}

		?>
	</p>
</div>