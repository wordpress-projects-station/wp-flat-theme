<main class="col">

    
    <hr>

    <?php

        echo '<h3 style="border:2px solid orange; padding:20px; margin:20px auto;">you are in : '.$filename.'<br>file: '.$pagetype['target'].'-'.$pagetype['type'].'<br> path: <i>'.$pagetype['path'].'</i></h3>';

        if ( ! include( $pagetype['path'] ) ) { 

            if(strlen($post->post_content)==0) {

                if(isset($wp_customize))
                echo '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align:center;"><div><h3>MAKE YOUR GUTENBERG PAGE OR CONNECT THIS TYPEPAGE TO CONTENT IN THEME.</h3><p>You can build your own custom page with the internal editor.<br>Once you\'ve built some content of that page, it will appear here. In alternative of this you can make a custom '.$pagetype['mode'].'-'.$pagetype['type'].' php file and connect it inside "wrap-sideconetnts.php" </p></div></div>';
            
                else
                echo '<div style="display:grid;width:100%;height:100%;min-height:50vh;align-self:center;align-items:center;text-align:center;"><div><h3>PAGE CURRENTLY UNDER MAINTENANCE</h3><p>At this specific time the content is not ready or reachable. Please try again in a few hours.</p></div></div>';

            } else {

                if( $pagetype['mode']=='site' || in_array($pagetype['type'],['home','cart','account']) )
                echo the_content(); 

                else
                echo woocommerce_content();

            }


        } else { include_once $pagetype['path']; }

    ?>

</main>