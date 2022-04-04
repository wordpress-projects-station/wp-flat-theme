<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? 

	if ( ! $notices ) { return; }
	
	else {

		if( is_page('checkout') || is_checkout() ) {

			?><div class=" p-2 border border-2 border-notice"><?
			foreach ( $notices as $notice ) 
			?><p class="m-2 woocommerce-info" role="alert" <?= wc_get_notice_data_attr( $notice ); ?>><i class="bi bi-bell"></i> <?= $notice['notice'] ?></p><?
			?></div><?

		} else {

			?>

				<div class="modal fade show" id="modal-notice" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">

							<div class="modal-header">
								<h5 class="modal-title">Message:</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<?
								foreach ( $notices as $notice )
								echo '<div class="modal-body">'.$notice['notice'].'</div>';
							?>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">OK / CLOSE</button>
							</div>

						</div>
					</div>
				</div>

			<?

		}
		
	}
?>
