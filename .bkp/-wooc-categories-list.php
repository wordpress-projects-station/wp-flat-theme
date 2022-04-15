<div class="row">

    <?

        $categories = get_categories([
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => false
        ]);
    
    
        // if your first category is main category:
        // foreach( $categories as $category ) $category->parent==0 ? $shopid = $category->term_id : null ;
        // and set if: $category->parent!=0

        // loop all first cat of shop (no sub cat)

        foreach( $categories as $category ){ if( $category->parent==0 && $category->name!='Uncategorized' ) { ?>

            <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

                <div class="archivie-post card mx-auto">

                    <?
                        $bkgId = get_term_meta( $category->term_id, 'thumbnail_id', true );
                        print ! $bkgId ?: '<div style="height:200px; background: url('.( wp_get_attachment_url( $bkgId, 'thumbnail' ) ?: bloginfo('template_directory').'/adds/404IMAGE.PNG' ).') center/cover;"></div>';
                    ?>

                    <div class="card-body">

                        <h2 class="card-title"><?= $category->name; ?></h2>

                        <div class="card-text" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                            <p>
                                <?
                                    $abstract = $category->description;
                                    print strlen($abstract)>=150 ? substr($abstract,0,150) : $abstract;
                                ?>
                            </p>
                        </div>

                        <a class="btn card-link" href="<?= get_category_link($category->term_id); ?>">Read now ...</a>

                    </div>

                </div>

            </div>

    <?}}?>

</div>