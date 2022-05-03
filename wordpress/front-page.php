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

                        <div class="post-box card">

                            <div class="card-header p-0" onclick="window.location='<?= $link; ?>'">
                                <div style="<?= get_banner_background(get_the_ID()); ?>"></div>
                            </div>

                            <div class="card-body">

                                <div class="card-title">
                                    <h4>
                                        <? the_title(); ?>
                                    </h4>
                                </div>

                                <? if(!empty(get_the_date())){ ?>
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                <?}?>

                                
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                
                                <div class="card-excerpt">
                                    <p class="card-text"><? the_excerpt(); ?></p>
                                </div>

                            </div>
                            <div class="card-footer">                              
                                <a class="btn card-link" href="<? the_permalink(); ?>">
                                    Read now ...
                                </a>
                            </div>
                        </div>

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

                        <div class="post-box card">

                            <div class="card-header p-0" onclick="window.location='<?= $link; ?>'">
                                <div style="<?= get_banner_background(get_the_ID()); ?>"></div>
                            </div>

                            <div class="card-body">

                                <div class="card-title">
                                    <h4>
                                        <? the_title(); ?>
                                    </h4>
                                </div>

                                <? if(!empty(get_the_date())){ ?>
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                <?}?>

                                
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                
                                <div class="card-excerpt">
                                    <p class="card-text"><? the_excerpt(); ?></p>
                                </div>

                            </div>

                            <div class="card-footer">                              
                                <a class="btn card-link" href="<? the_permalink(); ?>">
                                    Read now ...
                                </a>
                            </div>

                            <?if ( is_product_on_sale ($product) ) {?>
                                <div class="card-ribbon onsale">
                                    <b>SALE!</b>
                                </div>
                            <?} else if ( is_product_new ($product) ) {?>
                                <div class="card-ribbon new">
                                    <b>NEW!</b>
                                </div>
                            <?}?>
                            
                        </div>

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

                        <div class="post-box card">

                            <div class="card-header p-0" onclick="window.location='<?= $link; ?>'">
                                <div style="<?= get_banner_background(get_the_ID()); ?>"></div>
                            </div>

                            <div class="card-body">

                                <div class="card-title">
                                    <h4>
                                        <? the_title(); ?>
                                    </h4>
                                </div>

                                <? if(!empty(get_the_date())){ ?>
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                <?}?>

                                
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                
                                <div class="card-excerpt">
                                    <p class="card-text"><? the_excerpt(); ?></p>
                                </div>

                            </div>

                            <div class="card-footer">                              
                                <a class="btn card-link" href="<? the_permalink(); ?>">
                                    Read now ...
                                </a>
                            </div>

                            <?if ( is_product_on_sale ($product) ) {?>
                                <div class="card-ribbon onsale">
                                    <b>SALE!</b>
                                </div>
                            <?} else if ( is_product_new ($product) ) {?>
                                <div class="card-ribbon new">
                                    <b>NEW!</b>
                                </div>
                            <?}?>
                        </div>

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

                        <div class="post-box card">

                            <div class="card-header p-0" onclick="window.location='<?= $link; ?>'">
                                <div style="<?= get_banner_background(get_the_ID()); ?>"></div>
                            </div>

                            <div class="card-body">

                                <div class="card-title">
                                    <h4>
                                        <? the_title(); ?>
                                    </h4>
                                </div>

                                <? if(!empty(get_the_date())){ ?>
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                <?}?>

                                
                                <p class="card-date">
                                    <? get_the_date(); ?>
                                </p>
                                
                                <div class="card-excerpt">
                                    <p class="card-text"><? the_excerpt(); ?></p>
                                </div>

                            </div>
                            <div class="card-footer">                              
                                <a class="btn card-link" href="<? the_permalink(); ?>">
                                    Read now ...
                                </a>
                            </div>
                        </div>

                    </div>

                <?

            }

        }

    ?></div><?

?>