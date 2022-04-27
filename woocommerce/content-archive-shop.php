

<div class="alert alert-warning" role="alert">

    <p>
        Original woocommerce widget warning:<br>
        <ul>
            <li>
                <b>FILTER VIA ATTRIBUTES BUG</b>:<br>
                THE BUG AND THE SOLUTION: <a target="_blank" href="https://github.com/woocommerce/woocommerce/issues/27419#issuecomment-1077565539">READ MORE ON GITHUB</a><br>
                in short go to <a target="_blank" href="<?=get_admin_url()?>admin.php?page=wc-settings&tab=products&section=advanced">admin page</a> and set <b>"Enable table usage"</b> OFF.
            </li>
        </ul>
    </p>

    <hr>

    <p>you can deactive this warning from <i>theme customization > site options > remove warning : filters</i></p>

</div>

<div class=""><hr></div>

<div class="row">
    <?

        $currency = get_woocommerce_currency_symbol();

        $paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $per_page       = 18;

        $query = new WP_Query([
            'post_type'      => 'product',
            'posts_per_page' => $per_page,
            'paged' => $paged,

            'post_status' => 'publish',
            'orderby' => '_price',
            'order' => 'DESC', //ASC

        ]);

        while( $query->have_posts() ) { $query->the_post();

            if ( ! post_password_required() ) {

                global $product; // echo '<pre><code>'; print_r($query); echo '</code></pre>';

                $p = $product->get_data();

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

            }
        }

        // wp_reset_query();

    ?>
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

    echo '<div class="d-flex justify-content-center"><nav aria-label="Page navigation"><ul class="pagination">';

    foreach ( $pages as $page )
    echo '<li class="page-item">'.preg_replace('/page-numbers/','page-numbers page-link',$page).'</li>';

    echo '</ul></nav></div>';
}

// wp_reset_postdata();
// wp_reset_query();

?>