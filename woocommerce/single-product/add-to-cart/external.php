<? defined( 'ABSPATH' ) || exit; ?>

<? do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart" action="<?= esc_url( $product_url ); ?>" method="get">
	<? do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<button type="submit" class="btn btn-primary single_add_to_cart_button alt"><?= esc_html( $button_text ); ?></button>

	<? wc_query_string_form_fields( $product_url ); ?>

	<? do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>

<? do_action( 'woocommerce_after_add_to_cart_form' ); ?>
