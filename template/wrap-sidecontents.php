<main class="col">

    
    <hr>

    <?php

        echo '<h3>you are in : '.$filename.' / '.$pagetype.'</h3>';


        switch($pagetype) {

            case 'archive' : 

                include __DIR__.'/../contents/archive-body.php';

            case 'post' : 

                include __DIR__.'/../contents/post-body.php';
                include __DIR__.'/../contents/post-meta.php';
                include __DIR__.'/../contents/post-author.php';
                include __DIR__.'/../contents/post-comments.php';

                break;
    
            case 'page' : 

                include __DIR__.'/../contents/page-body.php';
                
                break;
                
            case 'shop-page' : 
                    
                echo 'SEMPLICE PAGINA, HOMEPAGE DELLO STORE, FORSE CART';
                include __DIR__.'/../contents/shop-body.php';

            case 'shop-product' : 

                echo 'split: <b>shop elements</b><hr>';
                $contents = woocommerce_content();

                ?><pre> THE CONTENT CALLED: <?php
                var_dump($contents);
                ?><pre><?php


                ?>
                    <hr>
                    <div style="border:2px solid orange; padding:10px;">
                        <?php

                            if( is_product_category( 'shop' ) ){
                                echo '<h1>EXELLENT, ITS MAIN OF SHOP</h1>';
                            }

                            if( is_product_category() ){

                                echo '<h1>EXELLENT, ITS MAIN OF CATEGORY</h1>';
                                // $cat = get_query_var('cat');
                                // echo 'THE CAT: '.$cat;
                                // $category = get_category($cat);
                                // if( $category->parent == 0 ) {
                                //     echo '<h1>'.$wp_query->category->ID.' EXELLENT, ITS CATEGORY LIST</h1>';
                                // } else {
                                //     echo '<h1>'.$wp_query->category->ID.' EXELLENT, ITS PRODUCT CATEGORY</h1>';
                                // };
                                

                                // if( $wp_query->category->ID == 0){
                                //     echo '<h1>'.$wp_query->category->ID.' EXELLENT, ITS CATEGORY LIST</h1>';
                                // }
                                // else{
                                //     echo '<h1>'.$wp_query->category->ID.' EXELLENT, ITS PRODUCT CATEGORY</h1>';
                                // }
                            }

                            if( is_product() ) {
                                echo '<h1>EXELLENT, ITS PRODUCT PAGE!</h1>';
                            }

                            if( is_cart() ){
                                echo '<h1>EXELLENT, ITS CART!</h1>';
                            }

                            if( is_checkout() ){
                                echo '<h1>EXELLENT, ITS CHECKOUT!</h1>';
                            }

                            if( is_account_page() ){
                                echo '<h1>EXELLENT, ITS ACCOUNT PAGE!</h1>';
                            }

                        ?>

                    </div>
                <?php
    
                break;

            default : 

                echo 'split: <b>undefined page type</b><hr>';

                break;

        };


    ?>

</main>