<? defined( 'ABSPATH' ) || exit; ?>

<div class="rounded-2">

    <div class="row m-0">
        <div class="col-9 bg-primary shadow-sm">
            <h5 class="m-0 p-3 text-white"><i class="bi bi-bag-heart"></i> Your cart</h5>
        </div>
        <div class="col-3 bg-light d-flex justify-content-center shadow-sm">
            <a style="width: 100%; height: 100%; display: grid; align-items: center; text-align: center;" href="<?= wc_get_cart_url();?>"><i class="bi bi-box-arrow-in-up-right"></i></a>
        </div>
    </div>
    <div class="bg-light text-dark">


        <? do_action( 'woocommerce_before_mini_cart' ); ?>

            <? if ( ! WC()->cart->is_empty() ) { ?>

                <ul class="m-0 p-3 list-unstyled woocommerce-mini-cart cart_list product_list_widget <?= esc_attr( $args['list_class'] ); ?>">

                    <? do_action( 'woocommerce_before_mini_cart_contents' ); ?>

                    <?

                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                            $item_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $item_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );


                            if ( $item_product && $item_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $item_product ), $cart_item, $cart_item_key );
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $item_product->is_visible() ? $item_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                            ?>
                                <li class="woocommerce-mini-cart-item <?= esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">

                                    <div style="display: flex; flex-flow: row; gap: 5px; align-items: center;">

                                        <?
                                            echo apply_filters (
                                                'woocommerce_cart_item_remove_link',
                                                sprintf(
                                                    '<a href="%s" class="text-danger text-decoration-none remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                    __( 'Remove this item', 'oceanwp' ),
                                                    esc_attr( $item_id ),
                                                    esc_attr( $cart_item_key ),
                                                    esc_attr( $item_product->get_sku() )
                                                ),
                                                $cart_item_key
                                            );
                                        ?>

                                        <?
                                            $thumbnail = get_the_post_thumbnail_url($item_id);
                                            if(!$thumbnail) $thumbnail = get_template_directory_uri().'/adds/404IMAGE.PNG';
                                            echo '<a href="'.esc_url( $thumbnail ).'"><div style="height:35px;width:35px;background: url('.$thumbnail.') center / cover no-repeat"></div></a>';
                                        ?>

                                        <a class="d-inline-block text-decoration-none text-truncate text-dark" style="max-width: 33%;" <?= empty( $product_permalink ) ?: 'href="'.esc_url( $product_permalink ).'"'; ?>>
                                            <?= $item_product->get_name(); ?>
                                        </a>

                                        <?//= wc_get_formatted_cart_item_data( $cart_item ); ?>
                                        <?=apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity"> | ' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>

                                    </div>

                                </li>
                            <?
                            }
                        }
                    ?>

                    <? do_action( 'woocommerce_mini_cart_contents' ); ?>

                </ul>

                <!--subtotal-->
                <p class="m-0 p-3 border border-2 border-white text-center woocommerce-mini-cart__total total" style="border-width: 2px 0 2px 0 !important;">
                    <? do_action( 'woocommerce_widget_shopping_cart_total' ); ?>
                </p>

                <? do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

                <a class="m-0 p-2 text-center text-white bg-secondary btn btn-outline-primary" style="width:100%; border-radius:0;" href="<?=wc_get_checkout_url();?>">GO TO CHECKOUT</a>

                <? do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>


            <? } else { ?>

                <p class="woocommerce-mini-cart__empty-message">
                    <? esc_html_e( 'No products in the cart.', 'oceanwp' ); ?>
                </p>

            <? } ?>

        <? do_action( 'woocommerce_after_mini_cart' ); ?>

    </div>

</div>

<div class="pt-2 pb-2"><hr></div>
