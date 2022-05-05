
<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<? global $mods, $looptype; ?>

    <div class="container py-4">

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

    <div class="container py-4">

        <div class="row g-4">

            <div class="xm-12 sm-12 col-md-4  align-self-center">
                <?=get_stylesheet_directory_uri();?> 
            </div>

            <div class="xm-12 sm-12 col-md-4  align-self-center">
                <? include get_stylesheet_directory().'/adds/socials/instagram_box.php'; ?>
            </div>
            
            <div class="xm-12 sm-12 col-md-4  align-self-center">
                <? include get_stylesheet_directory().'/adds/socials/facebook_box.php'; ?>
            </div>

        </div>

    </div>

    <div class="footer-credits">
        <div class="container text-center py-3">
            © 2022 Copyright / Made in <a href="https://YOUR_AGENCY_URL.tech/"> <strong>AGENCY MADE</strong> </a> for: <a href="./bio/"> NAME OF SITE S.r.l.</a><br>
            Powered by <a href="https://wordpress.org/"> wordpress </a> and <a href="https://bertz.tech/"> bertz technologies </a>
        </div>
    </div>