<? defined( 'ABSPATH' ) || exit; ?>

    <div class="p-4 border border-clear">

        <table class="table align-middle">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">SKU</th>
                <th scope="col">price</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?

                    $paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $per_page       = 18;

                    $query = new WP_Query([
                        'post_type'      => 'product',
                        'posts_per_page' => $per_page,
                        'paged' => $paged
                    ]);

                    if( $query->have_posts() ) {

                        while( $query->have_posts() ) {
                
                            $query->the_post();

                            if ( ! post_password_required() ) {

                                global $product;

                                $productdata = $product->get_data();

                                ?>
                                    <tr>
                                        <td><?= $productdata['id']; ?></td>
                                        <td><div style="width:40px; height:40px; <?= get_banner_background($productdata['id']); ?>"></td>
                                        <td><b><?= $productdata['name']; ?></b></td>
                                        <td><?= $productdata['sku']; ?></td>
                                        <td><?= $productdata['price'].' '.get_woocommerce_currency_symbol(); ?></td>
                                        <td style="text-align:right"><?= '<a class="btn btn-secondary" href="'.get_permalink().'">'.print_theme_lang("shopcatalog","Open").' <i class="bi bi-arrow-up-right-square"></i></a>'; ?></td>
                                    </tr>
                                <?

                            } else { 
                                ?>
                                    <tr>
                                        <td><?= $productdata['id']; ?></td>
                                        <td><div style="width:40px; height:40px; <?= get_banner_background($productdata['id']); ?>"></td>
                                        <td><b><?= $productdata['name']; ?></b></td>
                                        <td colspan="3"><b><?= print_theme_lang("shopcatalog","protected resource"); ?></b></td>
                                    </tr>
                                <?
                            }
                        }

                    } else { 
                        ?>
                            <tr>
                                <td><b><?= print_theme_lang("shopcatalog","no resources found"); ?></b></td>
                            </tr>
                        <?
                    }
                    

                ?>

            </tbody>
        </table>

    </div>

    <div class="mt-3"></div>

    <?

    $pages = paginate_links( [
        'base'      => str_replace( 9999, '%#%', esc_url( get_pagenum_link( 9999 ) ) ),
        'total'     => $query->max_num_pages,
        'current'   => max( 1, get_query_var('paged') ),
        'format'    => '?paged=%#%',
        'type'      => 'array',
    ] );

    if( is_array( $pages ) ) {

        echo '<div class="d-flex justify-content-center mt-4"><nav aria-label="Page navigation"><ul class="pagination">';

        foreach ( $pages as $page )
        echo '<li class="page-item">'.preg_replace('/page-numbers/','page-numbers page-link',$page).'</li>';

        echo '</ul></nav></div>';
    }

?>
