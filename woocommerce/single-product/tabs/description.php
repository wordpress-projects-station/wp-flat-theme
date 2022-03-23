<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $post;

	$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<? if ( $heading ) { ?>
	<h3 class="fs-7"><i class="bi bi-chat-square-dots"></i>&nbsp;&nbsp;<?= esc_html( $heading ); ?></h3>
	<div class="mt-3 mb-3 border border-1 border-clear"></div>
<? } ?>

<? the_content(); ?>
