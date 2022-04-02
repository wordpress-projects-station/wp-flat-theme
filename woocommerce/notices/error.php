<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? if ( ! $notices ) { return; } else { ?>

	<? //echo '<pre><code>'; print_r($notices); echo '</pre></code>'; ?>

	<div class="modal fade show" id="modal-warning" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Warning message:</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?
					foreach ( $notices as $notice ) {
						$dataset = wc_get_notice_data_attr( $notice );
						echo '<div class="modal-body" role="alert" .'$dataset'.>'.$notice['notice'].'</div>';
					}
				?>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">OK / CLOSE</button>
				</div>

			</div>
		</div>
	</div>

<? } ?>