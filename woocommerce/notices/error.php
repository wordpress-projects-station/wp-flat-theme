<? if ( ! defined( 'ABSPATH' ) ) { exit; } if ( ! $notices ) return; ?>

<div class="modal fade show" id="modal-warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content woocommerce-message" <?= wc_get_notice_data_attr( $notice ); ?>>
			<ul class="woocommerce-error" role="alert">
				<? foreach ( $notices as $notice ) { ?>
					<li <?= wc_get_notice_data_attr( $notice ); ?>>
						<?= wc_kses_notice( $notice['notice'] ); ?>
					</li>
				<? } ?>
			</ul>
			<span class="mt-3">
				<button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">OK / CLOSE</button>
			</span>
		</div>
	</div>
</div>
