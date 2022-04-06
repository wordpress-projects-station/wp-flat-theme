   
<? 

    include_once __DIR__.'/header.php';

    ?><main class="col col-sm-12"><?

        echo '<p> the path:'.$looptype['path'].'</p>';

        if( $looptype['folder'] != 'woocommerce/...' )
        include_once $looptype['path'];

        else
        the_content();
        

        // ! file_exists($looptype['path']) 
        //     ? print_classic_theme($looptype)
        //     : print_file_check($looptype) ;


        // // check if file result empty
        // function print_file_check($looptype){

        //     ob_start();
        //     include $looptype['path'];
        //     $output = ob_get_flush();

        //     if( empty($output) ) { 
                
        //         if (isset( $wp_customize ))
        //         echo '<p class="p-3 mt-3 mb-3 border border-2 border-warning"><i class="bi bi-exclamation-diamond"></i> For administators: template file type not have a content. System try to print classic contents design.</p>';

        //         print_classic_theme($looptype); 

        //     } 

        // }

        // function print_classic_theme($looptype) {

        //     echo '<h3>printing classic contents</h3>';

            // woocommerce_content();
            // get_the_content();
            // the_content();

            // if(woocommerce_content()) $contents = woocommerce_content();
            // if(get_the_content())     $contents = get_the_content();
            // if(the_content())         $contents = the_content();


            // $contents = (strlen(get_the_content())+strlen($post->post_content))==0 ? false : true; 

            // if( ! $contents ) {

            //     // no contents in page
            //     $warning_for_admin = '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align:center;"><div><h3>MAKE YOUR GUTENBERG PAGE OR CONNECT THIS TYPEPAGE TO CONTENT IN THEME.</h3><p>You can build your own custom page with the internal editor.<br>Once you\'ve built some content of that page, it will appear here. In alternative of this you can make a custom '.$looptype['mode'].'-'.$looptype['type'].' php file and connect it inside "wrap-sideconetnts.php" </p></div></div>';
            //     $html_for_client   = '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align:center;"><div><h3>PAGE CURRENTLY UNDER MAINTENANCE</h3><p>At this specific time the content is not ready or reachable. Please try again in a few hours.</p></div></div>'; 
            //     print isset($wp_customize) ? $warning_for_admin : $html_for_client ;

            // }else{

            //     // contents are gutenberg or classic wordpress
            //     print $looptype['origin']=='wprs' || in_array( $looptype['type'], ['home','cart','account'] ) ? the_content() : woocommerce_content() ;

            // }

        // }


    ?></main><?

    include __DIR__.'/footer.php';

?>