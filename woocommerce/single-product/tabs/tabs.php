<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?

$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) { ?>

	<div class="mt-5 mb-5 p-3 border border-3 border-light">

		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">

				<? 
					foreach ( $product_tabs as $key => $product_tab ) {
					$first=array_key_last($product_tabs) == $key ?'active':'';
				?>
					<button
						class="nav-link <?=$first?>"
						id="nav-<?= esc_attr( $key ); ?>-tab"
						data-bs-toggle="tab"
						data-bs-target="#nav-<?= esc_attr( $key ); ?>"
						type="button"
						role="tab"
						aria-controls="nav-home"
						aria-selected="true">

						<?= wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>

					</button>
				<? } ?>
			</div>
		</nav>

		<div class="tab-content p-3">

			<? 
				foreach ( $product_tabs as $key => $product_tab ) {
				$first=array_key_last($product_tabs) == $key ?'show active':'';
			?>
				<div class="tab-pane <?=$first?>" id="nav-<?= esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="nav-<?= esc_attr( $key ); ?>-tab">
					<? if ( isset( $product_tab['callback'] ) ) call_user_func( $product_tab['callback'], $key, $product_tab ); ?>
				</div>

			<? }; ?>

		</div>


		<script>
			document.addEventListener("DOMContentLoaded", ()=>{

				var triggerTabList = [].slice.call(document.querySelectorAll('#tab-product'))

				triggerTabList.forEach(function (triggerEl) {
					var tabTrigger = new bootstrap.Tab(triggerEl)
					triggerEl.addEventListener('click', function (event) {
						event.preventDefault()
						tabTrigger.show()
					})
				})

			});
		</script>

	</div>

	<? do_action( 'woocommerce_product_after_tabs' ); ?>

<?}?>
