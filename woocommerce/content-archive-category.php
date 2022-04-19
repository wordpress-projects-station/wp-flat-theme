<?

    $ID = get_the_id();
    $bannerid = get_term_meta( $ID, 'thumbnail_id', true );
    $title = $wp_query_data->name;

    bootsrapped_breadcrumb().'<hr class="mb-5">';

    ?>

        <header class="row">

            <div class="col-lg-6 col-md-12">

                <?$banner = (wp_get_attachment_url( $bannerid ))?:(get_template_directory_uri().'/adds/404IMAGE.PNG');?>
                <img style="height:15vw;object-fit:cover;" class="card-img-top" src="<?=$banner?>" alt=" ... " />

            </div>

            <div class="col-lg-6 col-md-6 d-flex align-items-center ">

                <div>
                    <? if ( apply_filters( 'woocommerce_show_page_title', true ) ) { ?>
                        <h1 class="display-2"><?=$title;?></h1>
                    <? } ?>
                    <? do_action( 'woocommerce_archive_description' ); ?>
                </div>

            </div>

        </header>
        
        <hr class="mt-5 mb-5">
    
    <?

        if ( woocommerce_product_loop() ) {

            ?>
                <div class="d-flex justify-content-between mb-4">
                    <? do_action( 'woocommerce_before_shop_loop' ); ?>
                    <style>.woocommerce-notices-wrapper:empty{display:none;}</style>
                </div>
            <?

            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {

                    the_post();

                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );

                }
            }

            woocommerce_product_loop_end();

            do_action( 'woocommerce_after_shop_loop' );

        }
        
        else {

            do_action( 'woocommerce_no_products_found' );

        }

?>
