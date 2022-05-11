
<? if( !$mods->woocommerce_filters_bug_warning) { ?>

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

<?}?>

<div class="row g-4">
    <?


        $paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $per_page       = 18;

        // more info on : https://www.smashingmagazine.com/2016/03/advanced-wordpress-search-with-wp_query/
        // more info on : https://developer.wordpress.org/reference/classes/wp_query/
        // more info on : https://code.tutsplus.com/tutorials/wp_query-arguments-categories-and-tags--cms-23070
        // more info on : https://stackoverflow.com/a/27898435
        // the url query: ?=min_price=N &max_price=N &filter_NAME=a,b,c &product-categories=a,b,c &product-tag=a,b,c

        $finder = [

            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'paged' => $paged,

            'orderby' => isset($_GET["orderby"])?$_GET["orderby"]:'_price', //id
            'order' => isset($_GET["order"])?$_GET["order"]:'desc', //asc, //rand, //id

            'product_cat' => '',

            'meta_query' => [],
            'tax_query' => [],

        ];

        if(!empty($_SERVER["QUERY_STRING"])){


            $querysplit = explode('&',$_SERVER["QUERY_STRING"]);

            if(count($querysplit)>0){

                foreach ($querysplit as $index => $query) {

                    $key = explode('=',$query)[0];
                    $values = explode('=',$query)[1];

                    // set finder tag categories and tags
                    if ( str_contains($key, 'category_') ) {
                        $finder['category_name'] = $values;
                    }

                    // set finder tag filter
                    elseif ( str_contains($key, 'tag_') ) {
                        $finder['tag_slug__and'] = $values;
                    }

                    // set finder level filter
                    elseif ( str_contains($key, 'filter_') ) {

                        array_push( $finder['tax_query'], [
                            'relation' => 'AND',
                            [
                                'taxonomy' 		=> 'pa_'.explode('filter_',$key)[1],
                                'terms' 		=> explode(',',$values),
                                'field' 		=> 'slug',
                                'operator' 		=> 'IN'
                            ],
                        ]);

                    }

                    // set finder min price
                    elseif ( $key == 'min_price' ) {

                        array_push( $finder['meta_query'], [
                            'key' => '_price',
                            'value' => $values?$values:0,
                            'compare' => '>='
                        ]);

                    }

                    // set finder max price
                    elseif ( $key == 'max_price' ) {

                        array_push( $finder['meta_query'], [
                            'key' => '_price',
                            'value' => $values?$values:999999,
                            'compare' => '<='
                        ]);

                    }

                    elseif( $key == 'in_categories') {

                        $finder['product_cat'] = $values;

                    }
                    
                    // set finder visibility
                    // elseif ( $key == 'visibility' ) {
                    //  array_push( $finder['meta_query'], [
                    //      'key' 			=> '_visibility',
                    //      'value' 		=> ['catalog', 'visible'],
                    //      'compare' 		=> 'IN'
                    //  ]);
                    // }
                }
            }

        }

        $query = new WP_Query($finder);

        if( $query->have_posts() ) {

            while( $query->have_posts() ) { $query->the_post();

                if ( ! post_password_required() ) {

                    // global $product; // echo '<pre><code>'; print_r($query); echo '</code></pre>';

                    $data = $product->get_data();

                    $link = get_post_permalink($data['id']);
                    $title = $data['name'];
                    $price = $data['price'];
                    $excerpt = isset($data['excerpt']) ? $data['excerpt'] : $data['short_description'];
                    $banner = get_banner_background($data['id']);

                    ?>

                        <div class="product-box col-sm-12 col-md-4">

                            <? include get_template_directory().'/elements/box-card.php' ?>

                        </div>

                    <?

                }
            }

        } else {

            ?>
                <div>
                    <p><b><?= print_theme_lang("shoppage","OPS! NOTHING TO SEE..."); ?></b></p>
                    <p><?= print_theme_lang("shoppage","Try to change parameters of your search."); ?></p>
                </div>
            <?

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

        echo '<div class="d-flex justify-content-center"><nav aria-label="Page navigation mt-4"><ul class="pagination">';

        foreach ( $pages as $page )
        echo '<li class="page-item">'.preg_replace('/page-numbers/','page-numbers page-link',$page).'</li>';

        echo '</ul></nav></div>';
    }

    // wp_reset_postdata();
    // wp_reset_query();

?>