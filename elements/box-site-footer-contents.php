
<? if ( ! defined ( 'ABSPATH' ) ) exit (); ?>

<? global $mods, $looptype; ?>

    <div class="container py-4">

        <div class="row <?= is_active_sidebar('newsletter-box')?'row-cols-3':'row-cols-2'; ?> g-4">

            <? if( is_active_sidebar('newsletter-box') ) { ?>
                <div class="col-12 col-sm-12 col-md">
                    
                    <? print_sidebar('newsletter-box'); ?>

                </div>
            <? } ?>

            <div class="col-12 col-sm-12 col-md">
                <? include get_stylesheet_directory().'/adds/socials/instagram_box.php'; ?>
            </div>
            
            <div class="col-12 col-sm-12 col-md">
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