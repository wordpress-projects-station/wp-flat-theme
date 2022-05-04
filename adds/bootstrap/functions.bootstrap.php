<?

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // add bootstrap
    function add_bootstrap(){
        wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css',null, false, 'all'); 
        wp_enqueue_style('bootstrap-min', get_stylesheet_directory_uri().'/adds/bootstrap/bootstrap.min.css',null, false, 'all');
        wp_enqueue_style('bootstrap-theme-colors', get_stylesheet_directory_uri().'/adds/bootstrap/bootstrap.theme.colors.css',null, false, 'all');
        wp_enqueue_style('bootstrap-theme-elements', get_stylesheet_directory_uri().'/adds/bootstrap/bootstrap.theme.elements.css',null, false, 'all');
        wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '', false );
    }
    add_action('wp_enqueue_scripts','add_bootstrap',1);

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // add bootstrap walkers
    function add_bootstrap_walkers(){

        // bootstrap coverter: add navigations
        include get_template_directory().'/adds/bootstrap/libs.bootstrap.navwalker.php';
        // bootstrap coverter: add comments 
        include get_template_directory().'/adds/bootstrap/libs.bootstrap.comments.php';

    }
    add_action( 'after_setup_theme', 'add_bootstrap_walkers' );


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // bootsrappized woocommerce checkout pages forms + billing and address account forms

    function checkouts_form_field_args($args, $key, $value) {
        $args['class'] = ['form-input-group'];
        $args['input_class'] = ['form-control'];
        return $args;
    }
    add_filter('woocommerce_form_field_args',  'checkouts_form_field_args',10,3);


    // bootsrappized my-account details form and sub layout

    function print_my_account() {

        ob_start();
        echo do_shortcode('[woocommerce_my_account]');
        $html = ob_get_clean();

        $html = preg_replace('/u-columns woocommerce-Addresses col2-set addresses/', 'row woocommerce-Addresses addresses', $html,1);
        $html = preg_replace('/u-column1 col-1 woocommerce-Address/', 'col col-sm-12 col-md-6 woocommerce-Address', $html,1);
        $html = preg_replace('/u-column2 col-2 woocommerce-Address/', 'col col-sm-12 col-md-6 woocommerce-Address', $html,1);

        $html = preg_replace('/woocommerce-PaymentMethods/', 'list-unstyled woocommerce-PaymentMethods', $html);
        $html = preg_replace('/class="woocommerce-PaymentMethod/', 'class="border border-2 p-3 woocommerce-PaymentMethod', $html);

        $html = preg_replace('/input-text"/', 'input-text form-control"', $html );
        
        $html = preg_replace('/button" name="save_address/', 'mt-3 btn btn-outline-primary woocommerce-Button button" name="save_address', $html,1 );
        $html = preg_replace('/woocommerce-Button button" name="save_account_details/', 'mt-3 btn btn-outline-primary woocommerce-Button button" name="save_account_details', $html,1 );

        return $html;

    }

?>