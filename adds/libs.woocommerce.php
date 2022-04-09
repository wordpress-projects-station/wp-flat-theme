<?

    if ( class_exists( 'WooCommerce' ) ) {


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

        // set ON the arrows of slider
        add_filter( 'woocommerce_single_product_carousel_options', function($options){
            $options['directionNav'] = true;
            return $options;
        });


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        function add_woo_style() {    
            wp_enqueue_style( 'woostyle', get_template_directory_uri().'/woocommerce/woostyle.css' );
        }
        add_action( 'wp_enqueue_scripts', 'add_woo_style' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        function add_woo_scripts() {
            wp_enqueue_script('wooscripts', get_template_directory_uri().'/woocommerce/wooscripts.js', ['jquery','jquery-blockui-js'], true );
        }
        add_action( 'wp_enqueue_scripts', 'add_woo_scripts' );



        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        // set OFF the page title
        // add_filter( 'woocommerce_show_page_title', '__return_false' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // set N woo product per page
        // add_filter( 'loop_shop_per_page', function( $cols ) { return 12; } );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        // set qnt of related posts
        add_filter( 'woocommerce_output_related_products_args', function ( $args ) { 
            $args['posts_per_page'] = 8;
            return $args; 
        } );


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

        // add_action('init','woo_filter_sidebar');
        // function woo_filter_sidebar(){ register_sidebar([ 'name' => 'woo_filter_sidebar','id' => 'woo_filter_sidebar' ]); }

        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        /*
        // add upload image in profile
        // info : https://nuomiphp.com/a/stackoverflow/en/62196e0866630118d6380851.html
        //      : https://stackoverflow.com/questions/62016183/add-a-profile-picture-file-upload-on-my-account-edit-account-in-woocommerce/62021104#62021104
        */

        //: A ➔ expand the form to allow image upload

        function account_form_in_multipart() {
            echo 'enctype="multipart/form-data"';
        } 
        add_action( 'woocommerce_edit_account_form_tag', 'account_form_in_multipart' );

        //: B ➔ add profile image field in edit account 

        function edit_account_image_field() {
            ?>
            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-2">
                <label class="custom-file-label" for="image"><? esc_html_e( 'Image', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="file" class="fwoocommerce-Input custom-file-input form-control" name="image" accept="jpg,jpeg,png,webp" multiple="false">
            </div>
            <?
        }
        add_action( 'woocommerce_edit_account_form_start', 'edit_account_image_field' );

        //: C ➔  Validate image file

        function check_errors_of_image( $args ){
            if ( isset($_POST['image']) && empty($_POST['image']) )
            $args->add( 'image_error', __( 'Please provide a valid image', 'woocommerce' ) );
        }
        add_action( 'woocommerce_save_account_details_errors','check_errors_of_image', 10, 1 );

        //: D1 ➔ prevent return to dashboard
        function woo_action_save_safe_redirect( $ID ) {
            wp_safe_redirect( wc_get_endpoint_url( 'edit-account' ) );
            exit();
        }
        add_action( 'woocommerce_save_account_details', 'woo_action_save_safe_redirect', 90, 1 );

        //: D2 ➔ Save the data
        function save_account_details_with_the_image( $user_id ) {

            $error=false;

            if ( isset( $_FILES['image'] ) ) {

                try {

                    require_once( ABSPATH . 'wp-admin/includes/image.php' );
                    require_once( ABSPATH . 'wp-admin/includes/file.php' );

                    // generete main folder
                    $user_files_path = wp_upload_dir()['basedir'].'/users_files/'.$user_id;
                    is_dir($user_files_path) ?: mkdir($user_files_path, 0775, true);


                    // set base file properties
                    $file               = $_FILES['image'];
                    $ext                = explode('.', $file['name']);
                    $file_extension     = end($ext);
                    $file_name          = 'user_avatar_'.$user_id.'.'.'png';
                    $file_mime          = $file['type'];//'image/png'


                    // check extension
                    if( ! in_array($file_extension,['png','jpg','jpeg']) )
                    $error = '<p> Image uploading -> Operation fail </p><p>Wrong file! <b>only PMG or JPG.</b></p>';


                    // limit file size KB
                    if( $file['size']/1024 > 2048)
                    $error = '<p> Image uploading -> Operation fail </p><p>Wrong file! <b>maximum 2mb.</b></p>';


                    //limit size of file
                    $image_size = getimagesize($file['tmp_name']);
                    $iw = $image_size[0];
                    $ih = $image_size[1];
                    if ($iw > 3000 || $ih >3000 )
                    $error = '<p> Image uploading -> Operation fail </p><p>Wrong file! <b>image size max: 3000 x 3000 px</b></p>';

                    if($error){

                        throw new Exception($error);

                    } else { // save in wordpress:


                        // generete paths
                        $original_source    = $file['tmp_name'];
                        $path_destination   = $user_files_path.'/'.$file_name;
                        $local_file         = $path_destination.'.'.$file_extension;


                        // clear all (eventually) ex files
                        $files = glob( $user_files_path.'/user_avatar_'.$user_id.'-*');
                        foreach ( $files as $file ) unlink($file);


                        $file_exist = sizeof($files);

                        // from upload to folder
                        move_uploaded_file( $original_source , $path_destination );

                        // resize file
                        $newwidth   = 450;
                        $newheight  = round(($newwidth*$ih)/$iw);
                        $image = wp_get_image_editor( $path_destination );
                        if ( ! is_wp_error( $image ) ) {
                            $image->resize( $newwidth, $newheight, true );
                            $image->save( $path_destination );
                        }

                        // generate attach id
                        if( ! $file_exist ) {

                            $attachment = [
                                'post_mime_type' => $file_mime,
                                'post_title' => sanitize_file_name( $file_name ),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            ];
        
                            $attach_id = wp_insert_attachment( $attachment, $path_destination );

                        }

                        // get attach id
                        else {

                            $attach_id = get_user_meta( $user_id, 'custom_avatar', true );

                        }


                        // generate thumbnails
                        $attach_data   = wp_generate_attachment_metadata( $attach_id, $path_destination );


                        // final assingment
                        if( ! $file_exist ) {
                            wp_update_attachment_metadata( $attach_id, $attach_data );
                            wp_set_object_terms($attach_id, 'profile-picture', 'category', true);
                            update_user_meta( $user_id, 'custom_avatar', $attach_id );
                        }


                    }

                }

                catch (Exception $e) {

                    echo '<meta http-equiv="refresh" content="20">';
                    echo '<div style="display:grid;width:100%;height:100%;align-items:center;text-align:center;font-size:15px;"><span>'. ($e?'<p style="font-size:80px;margin:0;">⚠</p>'.$e->getMessage():'<p> Image uploaded -> <b>Operation success</b></p>').'<a style="cursor:pointer;border:2px solid lightgray;padding:8px 10px;border-radius:8px;top:15px;position:relative;" onclick="history.back()">OK - Return back</a></span></div>';
                    exit();

                }

                wp_cache_flush();

            }

        }
        add_action( 'woocommerce_save_account_details', 'save_account_details_with_the_image', 10, 1 );

        //: E ➔ Call result... the attached url
        function get_profile_image($currentUserId) {
            $attachment_id = get_user_meta( $currentUserId, 'custom_avatar', true );
            if ( $attachment_id ) return wp_get_attachment_url( $attachment_id );
        } 

        add_action( 'woocommerce_save_account_details', 'custom__woocommerce_save_account_details__redirect', 90, 1 );
        
        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // function woo_attachment_category( $attach_ID ) {

        //     // if( wp_get_object_terms( $attach_ID, 'category' ) ) { null } else{

        //         wp_set_object_terms( $attach_ID, 'products-shop', 'category', true);

        //     // }
        //     // wp_set_post_categories( $attachment_ID, 'shop-woocommerce' );
        // }
        // add_action('add_attachment', 'woo_attachment_category');
        // add_action('edit_attachment', 'woo_attachment_category');

        // function add_category_automatically($post_ID) {

        //     // $attach = get_post($post_ID);
        //     // $parentid = $attach->post_parent;
        //     // $post_type = get_post_type($attach->post_parent);

        //     // if ( $parentid /*&& $post_type == 'product'*/ ) {
        //         wp_set_object_terms($post_ID, 'shop-woocommerce', 'category', true);
        //         // $cats = get_the_category()($post->post_parent);
        //         // foreach ($cats as $cat)
        //         // wp_set_object_terms($parentID, $cat->slug, 'category', true);
        //     // }
        // }
        // add_action('add_attachment', 'add_category_automatically');
        
        /*- - - - - - - - - - - - - - - - - - - - - - - - */

        /*
        // Mod Form field of woocommerce for add bootstrap
        */


        //: A) Not all woo fields are in B, so... Get HTML and rewrote their class..

        // function start_mod_html_inWooEditAccount() {
        //     if( basename($_SERVER['REQUEST_URI']) == 'edit-account' ) { ob_start(); }
        // }
        // function end_mod_html_inWooEditAccount() {
        //     if( basename($_SERVER['REQUEST_URI']) == 'edit-account' ) {
        //         $html = ob_get_clean();
        //         echo str_replace( 'input-text', 'input-text form-control', $html );
        //     }
        // }
        // add_action( 'wp_head', 'start_mod_html_inWooEditAccount' );
        // add_action( 'wp_footer', 'end_mod_html_inWooEditAccount' );
    

        // //: B) regual walker of fields arguments for add the class

        // function woo_bootstrap_input_classes( $args, $key, $value = null  ) {

        //     /* This is not meant to be here, but it serves as a reference
        //     of what is possible to be changed.
        //     $defaults = array(
        //         'type'			  => 'text',
        //         'label'			 => '',
        //         'description'	   => '',
        //         'placeholder'	   => '',
        //         'maxlength'		 => false,
        //         'required'		  => false,
        //         'id'				=> $key,
        //         'class'			 => array(),
        //         'label_class'	   => array(),
        //         'input_class'	   => array(),
        //         'return'			=> false,
        //         'options'		   => array(),
        //         'custom_attributes' => array(),
        //         'validate'		  => array(),
        //         'default'		   => '',
        //     ); */
        
        //     // Start field type switch case
        //     $args['class'][] = 'form-group';

        //     switch ( $args['type'] ) {
        
        //         case 'selectselect' :
        //             $args['class'][] = 'form-group';
        //             $args['input_class'] = array('form-control', 'input-lg');
        //             //$args['custom_attributes']['data-plugin'] = 'select2';
        //             $args['label_class'] = array('control-label');
        //             $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
        //         break;
        
        //         case 'country' :
        //             $args['class'][] = 'form-group single-country';
        //             $args['label_class'] = array('control-label');
        //         break;
        
        //         case "state" :
        //             $args['class'][] = 'form-group';
        //             $args['input_class'] = array('form-control', 'input-lg');
        //             //$args['custom_attributes']['data-plugin'] = 'select2';
        //             $args['label_class'] = array('control-label');
        //             $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
        //         break;
        
        
        //         case "password" :
        //         case "text" :
        //         case "email" :
        //         case "tel" :
        //         case "number" :
        //             $args['class'][] = 'form-group';
        //             //$args['input_class'][] = 'form-control input-lg';
        //             $args['input_class'] = array('form-control', 'input-lg');
        //             $args['label_class'] = array('control-label');
        //         break;
        
        //         case 'textarea' :
        //             $args['input_class'] = array('form-control', 'input-lg');
        //             $args['label_class'] = array('control-label');
        //         break;
        
        //         case 'checkbox' :
        //         break;
        
        //         case 'radio' :
        //         break;

        //         case 'submit' :
        //         $args['class'][] = 'mt-3 mr-1 btn btn-outline-primary';
        //         break;

        //         case 'reset' :
        //         $args['class'][] = 'mt-3 mr-1 btn btn-outline-secondary';
        //         break;
                
        //         default :
        //             $args['class'][] = 'form-group';
        //             $args['input_class'] = array('form-control', 'input-lg');
        //             $args['label_class'] = array('control-label');
        //         break;
        //     }
        
        //     return $args;
        // }
        // add_filter('woocommerce_form_field_args','woo_bootstrap_input_classes',10,3);


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



        
    }
    
    ?>