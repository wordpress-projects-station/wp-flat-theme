<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? global $product; ?>
<? if($product->get_type()!='grouped'){?>
    <p class="fs-2 <?= esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><b><?= $product->get_price_html(); ?></b></p>
<?}?>
