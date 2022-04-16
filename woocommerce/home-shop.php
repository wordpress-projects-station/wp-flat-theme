<? defined( 'ABSPATH' ) || exit; ?>

THis is home!

<div class="row">
    <?

        $currency = get_woocommerce_currency_symbol();

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 45,
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) { $loop->the_post();

            global $product;

            $p = $product->get_data();
            // echo '<pre><code>'; print_r($p); echo '</code></pre>';

            ?>
            <div class="mb-3 col-sm-12 col-md-4">
                <div class="card <?//=$classes;?>" style="cursor:pointer" onclick="window.location='<?=$link?>'">

                    <div class="card-header p-0">
                        <div style="height:200px; <?= get_banner_background($p['id']); ?>"></div>
                    </div>

                    <div class="card-body text-center">
                        <p class="card-subtitle fs-5 text-muted"><?=$p['price'].' '.$currency;?></p>
                        <h5 class="card-title fs-3"><?=$p['name'];?></h5>
                        <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp:3;-webkit-box-orient: vertical;">
                            <p class="card-text"><?=$p['excerpt'];?></p>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="<?=get_permalink();?>" class="btn btn-primary">OPEN DETAILS <i class="bi bi-arrow-up-right-square"></i></a>
                    </div>

                </div>
            </div>
            <?

        };

        wp_reset_query();

    ?>
</div>