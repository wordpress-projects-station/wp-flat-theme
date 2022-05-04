<div>
    <h2>BEST PRODUCTS</h2>
</div>
<?

    // $meta_query   = WC()->query->get_meta_query();
    // $meta_query[] = [
    //     'key'   => 'featured',
    //     'value' => 'IN'
    // ];

    $query_latest_product = new WP_Query([
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'has_password'   => false,
        'tax_query' => [[
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
        ],],
    ]);
    
    ?><div class="row g-4"><?

        if( $query_latest_product->have_posts() ) {

            while( $query_latest_product->have_posts() ) { $query_latest_product->the_post();
                        
                ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                        <?
                            $link       = get_the_permalink(get_the_ID());
                            $banner     = get_banner_background(get_the_ID());
                            $title      = get_the_title();
                            $date       = get_the_date();
                            $excerpt    = get_the_excerpt();
                        ?>
                        <? include get_template_directory().'/elements/box-contents.php'; ?>

                    </div>

                <?

            }

        }

    ?></div><?

?>


<div class="py-3"><hr></div>



<div>
    <h2>ON SALE</h2>
</div>
<?

    // $meta_query   = WC()->query->get_meta_query();
    // $meta_query[] = [
    //     'key'   => 'featured',
    //     'value' => 'IN'
    // ];

    $query_latest_product = new WP_Query([
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'has_password'   => false,
        'meta_query'        => WC()->query->get_meta_query(),
        'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
    ]);
    
    ?><div class="row g-4"><?

        if( $query_latest_product->have_posts() ) {

            while( $query_latest_product->have_posts() ) { $query_latest_product->the_post();
                        
                ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                        <?
                            $link       = get_the_permalink(get_the_ID());
                            $banner     = get_banner_background(get_the_ID());
                            $title      = get_the_title();
                            $date       = get_the_date();
                            $excerpt    = get_the_excerpt();
                        ?>
                        <? include get_template_directory().'/elements/box-contents.php'; ?>

                    </div>

                <?

            }

        }

    ?></div><?

?>


<div class="py-3"><hr></div>


<div>
    <h2>LATEST PRODUCTS</h2>
</div>
<?

    $query_latest_product = new WP_Query([
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'has_password'   => false
    ]);
    
    ?><div class="row g-4"><?

        if( $query_latest_product->have_posts() ) {

            while( $query_latest_product->have_posts() ) { $query_latest_product->the_post();
                        
                ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                        <?
                            $link       = get_the_permalink(get_the_ID());
                            $banner     = get_banner_background(get_the_ID());
                            $title      = get_the_title();
                            $date       = get_the_date();
                            $excerpt    = get_the_excerpt();
                        ?>
                        <? include get_template_directory().'/elements/box-contents.php'; ?>

                    </div>

                <?

            }

        }

    ?></div><?

?>


<div class="py-3"><hr></div>

<div>
    <h2>LATEST POST</h2>
</div>
<?

    $query_latest_post = new WP_Query([
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'has_password'   => false
    ]);

    ?><div class="row g-4"><?

        if( $query_latest_post->have_posts() ) {

            while( $query_latest_post->have_posts() ) { $query_latest_post->the_post();
                        
                ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                        <?
                            $link       = get_the_permalink(get_the_ID());
                            $banner     = get_banner_background(get_the_ID());
                            $title      = get_the_title();
                            $date       = get_the_date();
                            $excerpt    = get_the_excerpt();
                        ?>
                        <? include get_template_directory().'/elements/box-contents.php'; ?>

                    </div>

                <?

            }

        }

    ?></div><?
    
?>


<div class="py-3"><hr></div>

<div>
    <h2>LATEST COMMENTS</h2>
</div>

<?

    $recent_comments = get_comments([ 
        'number'      => 5, // number of comments to retrieve.
        'status'      => 'approve', // we only want approved comments.
        'post_status' => 'publish' // limit to published comments.
    ]);

    ?><ul><?
    if ( $recent_comments ) {

        foreach ( (array) $recent_comments as $comment ) {

            echo    '<li>
                        <p class="m-0"><b>'.$comment->comment_author.'</b> : <a href="' . esc_url( get_comment_link( $comment ) ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a></p>
                        <p class="m-0">'.$comment->comment_content.'</p>
                    </lI>';

        }

    } 
    ?></ul><?

?>


<div class="py-3"><hr></div>

<div>
    <h2>LATEST REVIEWS</h2>
</div>

<?

    $number_of_reviews = 10; //How many reviews you want to retrieve
    $reviews = get_comments( array( 'number' => $number_of_reviews, 'status' => 'approve', 'post_status' => 'publish', 'post_type' => 'product' ) );

    echo "<ul>";
    foreach ( (array) $reviews as $review ) {
        $_product = WC_get_product( $review->comment_post_ID );
        $rating = intval( get_comment_meta( $review->comment_ID, 'rating', true ) );

        echo '<li style="list-style:none"><a href="' . esc_url( get_comment_link( $review->comment_ID ) ) . '">';
            echo $_product->get_title() . '</a>  ';
            for($i=0;$i<$rating;$i++){
                echo "<span style='color:grey'>&#9733</span>";
            }
            echo "<p>".$review->comment_content."    -   ".get_comment_author($review->comment_ID)."</p>";

        echo '</li><br><br>';
    }
    echo "</ul>";

?>