<?

    // if ( class_exists( 'WooCommerce' ) ) {


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // remove standard woo css
        add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // add custom woo theme
        add_theme_support( 'woocommerce' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // add product image zoom
        add_theme_support( 'wc-product-gallery-zoom' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // add product image lightbox
        add_theme_support( 'wc-product-gallery-lightbox' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // add product image slider
        add_theme_support( 'wc-product-gallery-slider' );

        // set OFF the thumbnail inside the slider
        function rm_woocommerce_remove_featured_image( $html, $attachment_id ) {
            global $post, $product;
            $attachment_ids = $product->get_gallery_image_ids();
            if ( ! $attachment_ids ) { return $html; }
            $featured_image = get_post_thumbnail_id( $post->ID );
            if ( is_product() && $attachment_id === $featured_image ) { var_dump($html); $html = ''; }
            return $html;
        }
        add_filter( 'woocommerce_single_product_image_thumbnail_html', 'rm_woocommerce_remove_featured_image', 10, 2 );

        // set ON the arrows of slider
        add_filter( 'woocommerce_single_product_carousel_options', function($options){
            $options['directionNav'] = true; return $options;
        });

        // set N woo product image columns
        // add_action( 'woocommerce_product_thumbnails_columns', function () { return 4; } );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        function support_parent_style() {    
            wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
        }
        add_action( 'wp_enqueue_scripts', 'support_parent_style' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        // set OFF the page title
        // add_filter( 'woocommerce_show_page_title', '__return_false' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // set N woo product per page
        // add_filter( 'loop_shop_per_page', function( $cols ) { return 12; } );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        // set qnt of related posts
        add_filter( 'woocommerce_output_related_products_args', function ( $args ) { $args['posts_per_page'] = 2; return $args; } );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        // set shop columns
        // add_filter( 'loop_shop_columns', function ( $columns ) { return 4; } );
        // add_filter( 'body_class', function ( $classes ) {
        //     if ( is_shop() || is_product_category() || is_product_tag() ) { $classes[] = 'columns-4'; } return $classes;
        // } );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        //? set woo pagination        
        //? add_filter( 'woocommerce_pagination_args', function ( $args ) {
        //?     $args['prev_text'] = '<i class="bi bi-arrow-left-short"></i>';
        //?     $args['next_text'] = '<i class="bi bi-arrow-right-short"></i>';
        //?     return $args;
        //? });
        
        
        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        //? function woo_sale_flash() {
        //?     return '<span class="onsale">' . esc_html__( 'Sale', 'woocommerce' ) . '</span>';
        //? }
        //? add_filter( 'woocommerce_sale_flash', 'woo_sale_flash' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        /*
        // mod woo and up-selling
        // info: https://www.wpexplorer.com/woocommerce-compatible-theme/
        */

        // Filter up-sells columns
        // function woo_single_loops_columns( $columns ) {
        //     return 4;
        // }
        // add_filter( 'woocommerce_up_sells_columns', 'woo_single_loops_columns' );

        // // Filter related args
        // function woo_related_columns( $args ) {
        //     $args['columns'] = 4;
        //     return $args;
        // }
        // add_filter( 'woocommerce_output_related_products_args', 'woo_related_columns', 10 );

        // // Filter body classes to add column class
        // function woo_single_loops_columns_body_class( $classes ) {
        //     if ( is_singular( 'product' ) ) {
        //         $classes[] = 'columns-4';
        //     }
        //     return $classes;
        // }
        // add_filter( 'body_class', 'woo_single_loops_columns_body_class' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        //? function bootstrap_products_grid_start() {
        //?     ob_start(); 
        //? }
        //? function bootstrap_products_grid_loop() {
        //?     $html = ob_get_clean();
        //?     $html = preg_replace(['/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s'],['>','<','\\1'],$html);
        //?     $html = preg_replace('/<ul class="/', '<div class="row mt-3 mb-3 ', $html ,1);
        //?     $html = preg_replace('/ul>/', 'div>', $html ,1);
        //?     echo $html;
        //? }
        //? function bootstrap_products_grid_end() {
        //?     ob_end_flush(); 
        //? }
        //? add_filter( 'woocommerce_before_shop_loop', 'bootstrap_products_grid_start' );
        //? add_action( 'woocommerce_after_shop_loop', 'bootstrap_products_grid_loop' );
        //? add_filter( 'woocommerce_after_shop_loop', 'bootstrap_products_grid_end' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        // add_action('init','woo_filter_sidebar');
        // function woo_filter_sidebar(){ register_sidebar([ 'name' => 'woo_filter_sidebar','id' => 'woo_filter_sidebar' ]); }

        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        /*
        // add upload image in profile
        // info: https://nuomiphp.com/a/stackoverflow/en/62196e0866630118d6380851.html
        */

        //: A ➔ expand the form to allow image upload

        add_action( 'woocommerce_edit_account_form_tag', 'account_form_in_multipart' );
        function account_form_in_multipart() {
            echo 'enctype="multipart/form-data"';
        } 

        //: B ➔ add profile image field in edit account 

        add_action( 'woocommerce_edit_account_form_start', 'edit_account_image_field' );
        function edit_account_image_field() {
            ?>
            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label class="custom-file-label" for="image"><?php esc_html_e( 'Image', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="file" class="fwoocommerce-Input custom-file-input" name="image" accept="image/x-png,image/gif,image/jpeg">
            </div>
            <?php
        }

        //: C ➔  Validate image file

        add_action( 'woocommerce_save_account_details_errors','check_errors_of_image', 10, 1 );
        function check_errors_of_image( $args ){
            if ( isset($_POST['image']) && empty($_POST['image']) ) $args->add( 'image_error', __( 'Please provide a valid image', 'woocommerce' ) );
        }

        //: D ➔ Save the data

        add_action( 'woocommerce_save_account_details', 'save_account_details_with_the_image', 10, 1 );
        function save_account_details_with_the_image( $user_id ) {  

            if ( isset( $_FILES['image'] ) ) {

                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
                require_once( ABSPATH . 'wp-admin/includes/media.php' );

                $attachment_id = media_handle_upload( 'image', 0 );

                if ( is_wp_error( $attachment_id ) )
                update_user_meta( $user_id, 'image', $_FILES['image'] . ": " . $attachment_id->get_error_message() );
                else
                update_user_meta( $user_id, 'image', $attachment_id );

            }

        }


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        /*
        // Mod Form field of woocommerce for add bootstrap
        */


        //: A) Not all woo fields are in B, so... Get HTML and rewrote their class..

        function start_mod_html_inWooEditAccount() {
            if( basename($_SERVER['REQUEST_URI']) == 'edit-account' ) { ob_start(); }
        }
        function end_mod_html_inWooEditAccount() {
            if( basename($_SERVER['REQUEST_URI']) == 'edit-account' ) {
                $html = ob_get_clean();
                echo str_replace( 'input-text', 'input-text form-control', $html );
            }
        }
        add_action( 'wp_head', 'start_mod_html_inWooEditAccount' );
        add_action( 'wp_footer', 'end_mod_html_inWooEditAccount' );
    

        //: B) regual walker of fields arguments for add the class

        function woo_bootstrap_input_classes( $args, $key, $value = null  ) {

            /* This is not meant to be here, but it serves as a reference
            of what is possible to be changed.
            $defaults = array(
                'type'			  => 'text',
                'label'			 => '',
                'description'	   => '',
                'placeholder'	   => '',
                'maxlength'		 => false,
                'required'		  => false,
                'id'				=> $key,
                'class'			 => array(),
                'label_class'	   => array(),
                'input_class'	   => array(),
                'return'			=> false,
                'options'		   => array(),
                'custom_attributes' => array(),
                'validate'		  => array(),
                'default'		   => '',
            ); */
        
            // Start field type switch case
            $args['class'][] = 'form-group';

            switch ( $args['type'] ) {
        
                case 'selectselect' :  /* Targets all select input type elements, except the country and state select input types */
                    $args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag
                    $args['input_class'] = array('form-control', 'input-lg'); // Add a class to the form input itself
                    //$args['custom_attributes']['data-plugin'] = 'select2';
                    $args['label_class'] = array('control-label');
                    $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
                break;
        
                case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
                    $args['class'][] = 'form-group single-country';
                    $args['label_class'] = array('control-label');
                break;
        
                case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
                    $args['class'][] = 'form-group'; // Add class to the field's html element wrapper
                    $args['input_class'] = array('form-control', 'input-lg'); // add class to the form input itself
                    //$args['custom_attributes']['data-plugin'] = 'select2';
                    $args['label_class'] = array('control-label');
                    $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
                break;
        
        
                case "password" :
                case "text" :
                case "email" :
                case "tel" :
                case "number" :
                    $args['class'][] = 'form-group';
                    //$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
                    $args['input_class'] = array('form-control', 'input-lg');
                    $args['label_class'] = array('control-label');
                break;
        
                case 'textarea' :
                    $args['input_class'] = array('form-control', 'input-lg');
                    $args['label_class'] = array('control-label');
                break;
        
                case 'checkbox' :
                break;
        
                case 'radio' :
                break;
        
                default :
                    $args['class'][] = 'form-group';
                    $args['input_class'] = array('form-control', 'input-lg');
                    $args['label_class'] = array('control-label');
                break;
            }
        
            return $args;
        }
        add_filter('woocommerce_form_field_args','woo_bootstrap_input_classes',10,3);


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        /*
        // Mod Form field of woocommerce for remove required
        */

        // add_filter( 'woocommerce_form_field_args', 'no_requireds_custom_field', 10, 3 );
        // function no_requireds_custom_field( $args, $key, $value ){

        //     if( is_wc_endpoint_url( 'edit-account' ) ) return $args;

        //     $args['class'] = array('form-input-group');
        //     $args['required'] = false;

        //     return $args;
        // }


    // }

?>