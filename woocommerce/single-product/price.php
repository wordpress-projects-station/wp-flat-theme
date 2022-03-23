<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? global $product; ?>

<p class="fs-4 <?= esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><b><?= $product->get_price_html(); ?></b></p>
