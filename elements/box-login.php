<div class="p-4 border border-3">

    <h2 class="display-4">
        <?php esc_html_e( 'Login', 'woocommerce' ); ?>
    </h2>

    <form class="login" method="post">

        <?php do_action( 'woocommerce_login_form_start' ); ?>

        <div class="mt-3">
            <label class="form-text" for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
        </div>

        <div class="mt-2">
            <label class="form-text" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input class="form-control woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
        </div>

        <?php do_action( 'woocommerce_login_form' ); ?>

        <label class="mt-3 woocommerce-form-login__rememberme">
            <input class="form-check-input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
            <span class="form-check-label">
                <?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
            </span>
        </label>
    
        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

        <hr class="mt-4 mb-4">

        <div>

            <button type="submit" class="btn btn-primary woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>

            <div class="float-end">
                <span>
                    <p class="p-2">
                        <a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_html_e( 'Sign Up', 'woocommerce' ); ?></a>&nbsp;&nbsp;⋮&nbsp;&nbsp;<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                    </p>
                </span>
            </div>

        </div>

        <?php do_action( 'woocommerce_login_form_end' ); ?>

    </form>
</div>