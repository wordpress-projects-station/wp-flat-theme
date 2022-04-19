<? defined( 'ABSPATH' ) || exit; ?>

<div class="p-3 border border-clear">

    <table class="table align-middle">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">SKU</th>
            <th scope="col">price</th>
            <th scope="col">...</th>
            </tr>
        </thead>
        <tbody>

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
                        <tr>
                            <td><?= $p['id']; ?></td>
                            <td><div style="width:40px; height:40px; <?= get_banner_background($p['id']); ?>"></td>
                            <td><b><?= $p['name']; ?></b></td>
                            <td><?= $p['sku']; ?></td>
                            <td><?= $p['price'].' '.$currency; ?></td>
                            <td><?= '<a class="btn btn-secondary" href="'.get_permalink().'">Open <i class="bi bi-arrow-up-right-square"></i></a>'; ?></td>
                        </tr>
                    <?

                };

                wp_reset_query();

            ?>

        </tbody>
    </table>

</div>
