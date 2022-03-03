<main class="col">

    
    <hr>

    <?php

        echo '<h3 style="border:2px solid orange; padding:20px; margin:20px auto;">you are in : '.$filename.'<br>file: '.$pagetype['mode'].'-'.$pagetype['type'].'<br> path: <i>'.$pagetype['path'].'</i></h3>';

        $pagepath = __dir__.$pagetype['path'];

        if (!include($pagepath)) { 
           
            if( $pagetype['mode']=='site' || $pagetype['type']=='home' || $pagetype['type']=='cart' )
            the_content(); 
            else
            woocommerce_content();
        
        } else { include $pagepath; }




        // if( $pagetype['mode']=='site' || $pagetype['type']=='cart' || $pagetype['type']=='home' ) {

        //     if (!include($pagepath)) { the_content(); } else { include $pagepath; }

        // }

        // elseif($pagetype['mode']=='shop') {

        //     if (!include($pagepath)) { woocommerce_content(); } else { include $pagepath; }

        // }

        // switch($pagetype['model']) {

        //     case 'archive' :

        //         if (!include($pagepath)) { the_content(); } else { include $pagepath; }
        //         // include __DIR__.'/../contents/archive-body.php';

        //     case 'post' : 

        //         if (!include($pagepath)) { the_content(); } else { include $pagepath; }

        //         // include __DIR__.'/../contents/post-body.php';
        //         // include __DIR__.'/../contents/post-meta.php';
        //         // include __DIR__.'/../contents/post-author.php';
        //         // include __DIR__.'/../contents/post-comments.php';

        //         break;
    
        //     case 'page' : 

        //         if (!include($pagepath)) { the_content(); } else { include $pagepath; }
                
        //         break;
                
        //     case 'shop-home' : 
                    
        //         if (!include($pagepath)) { the_content(); } else { include $pagepath; }

        //         break;

        //     case 'shop-page' : 
                    
        //         if (!include($pagepath)) { woocommerce_content(); } else { include $pagepath; }

        //         break;

        //     case 'shop-categories-list' :

        //         if (!include($pagepath)){ woocommerce_content(); }else{ include $pagepath; }

        //         break;

        //     case 'shop-category' :

        //         if (!include($pagepath)){ woocommerce_content(); }else{ include $pagepath; }

        //         break;

        //     case 'shop-product' : 

        //         if (!include($pagepath)){ woocommerce_content(); }else{ include $pagepath; }

        //         break;

        //     case 'shop-cart' : 

        //         if (!include($pagepath)){ the_content(); }else{ include $pagepath; }

        //     case 'shop-checkout' : 

        //         if (!include($pagepath)){ woocommerce_content(); }else{ include $pagepath; }

        //         break;



        //     default : 

        //         echo 'split: <b>undefined page type</b><hr>';

        //         break;

        // };


    ?>

</main>