<?php if( ! is_user_logged_in() ) { include __DIR__.'/box-login.php'; } else { ?>

    <div>
        <div class="d-flex justify-content-center">
            <?php

                $avatarurl = get_avatar_url( $current_user -> ID, 120 );            
                if(!is_user_logged_in() || str_starts_with($avatarurl, 'https://secure.gravatar.com/') )
                $avatarurl = get_template_directory_uri().'/adds/404IMAGE.PNG';

            ?>

            <div class="rounded-circle" style="aspect-ratio:1/1; width:200px; height:200px; background: url(<?php echo $avatarurl;?>) center/cover;"></div>

        </div>


        <h2 class="display-4 text-center">YOUR ACCOUNT</h2>

        <div class="mb-5 d-flex justify-content-center">

            <nav class="woocommerce-MyAccount-navigation btn-group">

                <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) { ?>
                    <span class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                        <a class="btn btn-secondary" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                    </span>&nbsp;
                <?php } ?>

            </nav>

        </div>

        <div>
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
        </div>

    </div>

    <style>
     .woocommerce-MyAccount-navigation:not(.btn-group) ul{ display:none; } 
    </style>

<?php } ?>
