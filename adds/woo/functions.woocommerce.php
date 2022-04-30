<?

    if ( class_exists( 'WooCommerce' ) ) {


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


        // add sidebar of shop
        add_action('init','sidebar_shop');
        function sidebar_shop() { 
            
            register_sidebar([ 
                'name' => 'Sidebar shop',
                'id' => 'sidebar_shop',
                'description' => 'if active on the theme customizer, it generates a sidebar on the pages of the shop',
                'before_widget' => '<div>',
                'after_widget'  => '</div>',
                'before_title'  => '<b>',
                'after_title'   => '</b>',
            ]); 
        }


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // remove standard woo css
        add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

        // add new woo css
        function add_woo_style() { wp_enqueue_style( 'woostyle', get_template_directory_uri().'/woocommerce/woostyle.css' ); }
        add_action( 'wp_enqueue_scripts', 'add_woo_style' );

        // add new woo scripts
        function add_woo_scripts() { wp_enqueue_script('wooscripts', get_template_directory_uri().'/woocommerce/wooscripts.js', ['jquery'], true ); }
        add_action( 'wp_enqueue_scripts', 'add_woo_scripts' );


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // set qnt of related posts
        add_filter( 'woocommerce_output_related_products_args', function ( $args ) { 
            $args['posts_per_page'] = 8;
            return $args;
        } );


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

        // print widget active and check the names
        // 
        // add_action( 'wp', function() {
        //     if ( empty ( $GLOBALS['wp_widget_factory'] ) ) return;
        //     $widgets = array_keys( $GLOBALS['wp_widget_factory']->widgets );
        //     print '<pre>';print_r($widgets);echo'</pre>';
        //     foreach ($widgets as $i => $name) {
        //         if($name=='WC_Widget_Product_Categories')
        //         // do...
        //     }
        // });


        /*- - - - - - - - - - - - - - - - - - - - - - - - */


        // This is a solution for override original wc-widget-layered-nav-filters.php
        // Unluckily work at alph: run it but not override the class
        // 
        // function override_woocommerce_filter_via_attributes() {
        //     if ( class_exists( 'WC_Widget_Layered_Nav' ) ) {
        //         // echo get_template_directory().'/woocommerce/includes/widgets/custom-wc-widget-layered-nav-filters.php';
        //         unregister_widget( 'WC_Widget_Layered_Nav' );
        //         include_once get_template_directory().'/woocommerce/includes/widgets/wc-widget-layered-nav-filters.php';
        //         register_widget( 'Custom_WC_Widget_Layered_Nav' );
        //     }
        // }
        // add_action( 'widgets_init', 'override_woocommerce_filter_via_attributes', 15 );


        // add bootsrap checkbox on filtering

        function custom_woocommerce_layered_nav_term_html( $term_html, $term, $link, $count ) { 

            $slug   = strtolower($term->slug);
            $label  = strtoupper($term->name);
            $type   = preg_replace('/pa_/','',$term->taxonomy);

            if($type=='color') {

                //query: filter_color=white
                
                $html_checkbox = str_replace(["\r","\n"],'','
                <div>
                    <div class="form-check">
                        <input type="checkbox" id="filter_selector_'.$slug.'" class="form-check-input" data-type="'.$type.'" style="background-color:'.$slug.'" value="'.$slug.'">
                        <label class="form-check-label" for="filter_selector_'.$slug.'">
                            '.$label.'
                        </label>
                    </div>
                </div>
                ');
                
                $output = preg_replace( '/<a rel=\"nofollow\" href=\"(.+?)\">(.+?)<\/a>/', $html_checkbox, $term_html);

            }

            elseif($type=='size') {

                //query: filter_size=large&amp;query_type_size=or
                
                $html_checkbox = str_replace(["\r","\n","\s\s"],'','
                <div class="form-check">
                    <input type="checkbox" id="filter_selector_'.$slug.'" class="form-check-input" data-type="'.$type.'" value="'.$slug.'">
                    <label class="form-check-label" for="filter_selector_'.$slug.'">
                        '.$label.'
                    </label>
                </div>
                ');

                $output = preg_replace( '/<a rel=\"nofollow\" href=\"(.+?)\">(.+?)<\/a>/', $html_checkbox, $term_html);

            }
            
            else {

                $output=$term_html;

            }

            return $output;
        }
        add_filter('woocommerce_layered_nav_term_html', 'custom_woocommerce_layered_nav_term_html', 10, 4);        

    }
    
    ?>