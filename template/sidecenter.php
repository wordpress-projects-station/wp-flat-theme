<main class="col">

    <?

        echo '<h1>'.$pagetype['path'].'</h1>';

        ! file_exists($pagetype['path']) ? print_classic_theme($pagetype) : print_file_check($pagetype) ;

        function print_file_check($pagetype){

            echo 'including: '.$pagetype['path'];
            ob_start();
            include $pagetype['path'];
            $output = ob_get_flush();

            if( empty($output) ) { echo 'has empy'; print_classic_theme($pagetype); }; 

        }

        function print_classic_theme($pagetype) {

            $contents = (strlen(get_the_content())+strlen($post->post_content))==0 ? false : true; 

            if( ! $contents ) {

                // no contents in page
                $warning_for_admin = '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align:center;"><div><h3>MAKE YOUR GUTENBERG PAGE OR CONNECT THIS TYPEPAGE TO CONTENT IN THEME.</h3><p>You can build your own custom page with the internal editor.<br>Once you\'ve built some content of that page, it will appear here. In alternative of this you can make a custom '.$pagetype['mode'].'-'.$pagetype['type'].' php file and connect it inside "wrap-sideconetnts.php" </p></div></div>';
                $html_for_client   = '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align:center;"><div><h3>PAGE CURRENTLY UNDER MAINTENANCE</h3><p>At this specific time the content is not ready or reachable. Please try again in a few hours.</p></div></div>'; 
                print isset($wp_customize) ? $warning_for_admin : $html_for_client ;

            }else{

                // contents are gutenberg or classic wordpress
                print $pagetype['origin']=='wprs' || in_array( $pagetype['type'], ['home','cart','account'] ) ? the_content() : woocommerce_content() ;

            }

        }


    ?>

</main>