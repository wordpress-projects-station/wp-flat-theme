<? if( ! is_user_logged_in() ) { include __DIR__.'/contents/box-login.php'; } else { ?>

    <div>
        <div class="d-flex justify-content-center">
            <?

                $avatarurl = get_avatar_url( $current_user -> ID, 120 );

                if(!is_user_logged_in() || str_starts_with($avatarurl, 'https://secure.gravatar.com/') )
                $avatarurl = get_template_directory_uri().'/adds/404IMAGE.PNG';

            ?>

            <div class="rounded-circle" style="aspect-ratio:1/1; width:200px; height:200px; background: url(<?= $avatarurl;?>) center/cover;"></div>

        </div>


        <h2 class="display-4 text-center">YOUR ACCOUNT</h2>

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
            <?= do_shortcode('[woocommerce_my_account]'); ?>
        </div>

    </div>

<? } ?>
