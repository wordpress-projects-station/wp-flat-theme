<? if ( ! defined( 'ABSPATH' ) ) { exit; } if ( ! $notices ) return; ?>

<? foreach ( $notices as $notice ) { ?>

<div class="modal fade show" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content p-4 woocommerce-message" <?= wc_get_notice_data_attr( $notice ); ?> >
			<?= wc_kses_notice( $notice['notice'] ); ?>
			<span class="mt-3">
				<button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">OK / CLOSE</button>
			</span>
		</div>
	</div>
</div>

<?}?>
