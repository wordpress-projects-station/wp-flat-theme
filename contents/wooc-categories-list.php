
    <div class="row">

<?php

    $args = [
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => false
    ];

    $categories = get_categories( $args );

    // loop and find main cat of shop
    foreach( $categories as $category ) if($category->parent==0) $shopid = $category->term_id;

    // loop all first cat of shop (no sub cat)
    foreach( $categories as $category ){ if($category->parent==$shopid){ ?>

        <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

            <div class="archivie-post card mx-auto">

                <?php

                    $bkgId = get_term_meta( $category->term_id, 'thumbnail_id', true ); //get_the_post_thumbnail_url( $category->term_id );
                    $bkgUrl = wp_get_attachment_url( $bkgId );

                    if($bkgUrl)
                    echo '<div style="height:200px; background: url('.$bkgUrl.') center/cover;"></div>';

                    else
                    echo '<div style="height:200px; background: url('.bloginfo('template_directory').'/adds/404IMAGE.PNG) center/cover;"></div>';

                ?>

                <div class="card-body">

                    <h2 class="card-title"><?php echo $category->name;?></h2>
                    <div class="card-text" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                        <p>
                            <?php 
                                $abstract = $category->description;
                                if(strlen($abstract)>=150){ $abstract = substr($abstract,0,150); };
                                echo $abstract;
                            ?>
                        </p>
                    </div>
                    <a class="btn card-link" href="<?php echo get_category_link($category->term_id);?>">Read now ...</a>

                </div>

            </div>

        </div>

<?php }} ?>
