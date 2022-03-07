<footer class="bg-dark text-white">
    <div class="border-bottom border-light border-2">

            <div class="container">

                <h5 class="mb-3 text-center flex-center">::: Follow on socials :::</h5>

                <div class="mb-5 text-center flex-center">
                    <?
                        wp_nav_menu([

                            'theme_location'  => 'desktop-social-menu',
                            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                            'container'       => 'div',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id'    => 'bs-example-navbar-collapse-1',
                            'menu_class'      => 'navbar-nav mr-auto',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),

                        ]);
                    ?>
                </div>

            </div>

            <div class="container">
                <div class="row">

                    <div class="col-6 sm-12 align-self-center">

                    LEFT

                    </div>

                    <div class="col-6 sm-12 align-self-center">

                    RIGHT

                    </div>

                </div>
            </div>

            <div class="container bg-gray-dark">
                <div class="footer-copyright text-center py-3">
                    © 2022 Copyright / Made in <a href="https://YOUR_AGENCY_URL.tech/"> <strong>AGENCY MADE</strong> </a> for: <a href="./bio/"> NAME OF SITE S.r.l.</a><br>
                    Powered by <a href="https://wordpress.org/"> wordpress </a> and <a href="https://bertz.tech/"> bertz technologies </a>
                </div>
            </div>

    </div>
</footer>
