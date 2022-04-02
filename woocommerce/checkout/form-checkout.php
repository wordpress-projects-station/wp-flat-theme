<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?

	do_action( 'woocommerce_before_checkout_form', $checkout );

	// If checkout registration is disabled and not logged in, the user cannot checkout.
	if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
		echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
		return;
	}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?= esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<? if ( $checkout->get_checkout_fields() ) { ?>

		<? do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div id="customer_details">
			<? do_action( 'woocommerce_checkout_billing' ); ?>
			<? do_action( 'woocommerce_checkout_shipping' ); ?>
		</div>

		<? do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<? } ?>

	<hr class="mb-4 mt-4">

	<div>

		<div class="border border-2 border-light p-4">

			<? do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
			
			<h3 id="order_review_heading"><i class="bi bi-clipboard-check"></i>  <? esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
			
			<? do_action( 'woocommerce_checkout_before_order_review' ); ?>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<? do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>

			<? do_action( 'woocommerce_checkout_after_order_review' ); ?>

		</div>

	</div>

</form>

<? do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
