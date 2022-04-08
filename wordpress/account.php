<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<? if( ! is_user_logged_in() ) { include __DIR__.'/contents/box-login.php'; } else { ?>

    <div>

        <div class="d-flex justify-content-center">
            <?

                $current_user = wp_get_current_user();
                // echo 'Welcome : ' . esc_html( $current_user->display_name );

                if ( ($current_user instanceof WP_User) ) {

                    $avatarurl = get_profile_image($current_user->ID)?:get_avatar_url( $current_user -> ID, 100 );
 
                    if( empty( $avatarurl ) || str_contains($avatarurl,'d=blank') )
                    $avatarurl = get_template_directory_uri().'/adds/404IMAGE.PNG';

                    // echo $avatarurl;

                }

            ?>

            <div class="rounded-circle" style="aspect-ratio:1/1; width:200px; height:200px; background: url(<?= $avatarurl;?>) center/cover;"></div>

        </div>


        <h2 class="display-4 text-center mt-3 mb-4">YOUR ACCOUNT</h2>

        <div class="mb-5 d-flex justify-content-center">

            <nav class="woocommerce-MyAccount-navigation btn-group">

                <? foreach ( wc_get_account_menu_items() as $endpoint => $label ) { ?>
                    <span class="<?= wc_get_account_menu_item_classes( $endpoint ); ?>">
                        <a class="btn btn-secondary" href="<?= esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?= esc_html( $label ); ?></a>
                    </span>&nbsp;
                <? } ?>

            </nav>

        </div>

        <div>
            <div class="mb-4">
                <?

                    ob_start();
                    echo do_shortcode('[woocommerce_my_account]');
                    $html = ob_get_clean();

                    $html = preg_replace('/u-columns woocommerce-Addresses col2-set addresses/', 'row woocommerce-Addresses addresses', $html,1);
                    $html = preg_replace('/u-column1 col-1 woocommerce-Address/', 'col col-sm-12 col-md-6 woocommerce-Address', $html,1);
                    $html = preg_replace('/u-column2 col-2 woocommerce-Address/', 'col col-sm-12 col-md-6 woocommerce-Address', $html,1);

                    $html = preg_replace('/woocommerce-PaymentMethods/', 'list-unstyled woocommerce-PaymentMethods', $html);
                    $html = preg_replace('/class="woocommerce-PaymentMethod/', 'class="border border-2 p-3 woocommerce-PaymentMethod', $html);

                    $html = preg_replace('/input-text/', 'input-text form-control', $html );
                    
                    $html = preg_replace('/button" name="save_address/', 'mt-3 btn btn-outline-primary woocommerce-Button button" name="save_address', $html,1 );
                    $html = preg_replace('/woocommerce-Button button" name="save_account_details/', 'mt-3 btn btn-outline-primary woocommerce-Button button" name="save_account_details', $html,1 );

                    echo $html;

                ?>
            </div>
        </div>

    </div>

<? } ?>
