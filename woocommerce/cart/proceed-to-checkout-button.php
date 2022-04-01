<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<a href="<? echo esc_url( wc_get_checkout_url() ); ?>" class="mt-3 btn btn-small btn-outline-secondary checkout-button alt wc-forward">
	<? esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
</a>
