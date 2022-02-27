<main class="col">

    <?php

        echo '<h3>you are in : '.$filename.' / '.$pagetype.'</h3>';

        if($filename=='archive.php') {

            include __DIR__.'/../contents/archive-body.php';

        }

        else if( contents_access($post) ){

            switch($pagetype) {

                case 'shop' : 

                    echo 'split: <b>shop page</b><hr>';
                    woocommerce_content();
        
                    break;

                case 'post' : 

                    include __DIR__.'/../contents/post-body.php';
                    include __DIR__.'/../contents/post-meta.php';
                    include __DIR__.'/../contents/post-author.php';
                    include __DIR__.'/../contents/post-comments.php';

                    break;
        
                case 'page' : 

                    include __DIR__.'/../contents/page-body.php';

                    break;

                default : 

                    echo 'split: <b>undefined page type</b><hr>';

                    break;


            };

        }

    ?>

</main>