<?

    global $post; $product = wc_get_product( $post->ID );

    ?><pre>ATTR OF STARTS<?//= var_dump($product->attributes); ?></pre><?
    ?><pre>ATTR OF STARTS<?//= var_dump($product->default_attributes); ?></pre><?
    
    // if($product->status =='publish' && $product->catalog_visibility == 'visible' && !$product->post_password) { }

    $product_atlas = [];

    class product_abstract 
    {
        public $id;
        public $name;
        public $status;
        public $excerpt;
        public $description;
        public $link;
        public $normal_price;
        public $sales_price;
        public $standard_price;
        public $stock_remain;
        public $stock_limit;
        public $is_virtual;
        public $is_downloadable;
        public $down_limit;
        public $image;
        public $love;
        public $cartlink;
    }


    // make product abstract and and up it to atlas

    $abstract = new product_abstract();

    $abstract->id             = $product->ID;
    $abstract->status         = $product->status=='publish'&&$product->catalog_visibility=='visible'?true:false;
    $abstract->name           = $product->name;
    $abstract->excerpt        = $product->short_description;
    $abstract->link           = get_post_permalink($product_id);
    $abstract->normal_price   = $product->regular_price;
    $abstract->sales_price    = $product->sale_price;
    $abstract->standard_price = $product->price;
    $abstract->stock_remain   = $product->stock_quantity;
    $abstract->stock_limit    = $product->low_stock_amount;
    $abstract->is_virtual     = $product->virtual;
    $abstract->down_limit     = $product->download_limit;
    $abstract->downloadable   = $product->downloadable;
    $abstract->banner         = wp_get_attachment_url( $product->image_id ) ; //_thumbnail_id
    $abstract->love           = "none";
    $abstract->cartlink       = "none";

    $product_atlas[0] = $product;

    $variations = $product->get_available_variations();

    if (count($variations)>0) {

        // if product is variable, loop all variant and up to atlas

        $c=1; foreach ($variations as $list => $variant) { 
            
            foreach ($variant as $attr) { 

                $abstract = new product_abstract();

                $abstract->id             = $variant['variation_id'] ?: 'error';

                $abstract->status         = $variant>['variation_is_active']&&$varinant['variation_is_visible']?true:false;

                $abstract->excerpt        = $variant['short_description'];
                $abstract->description    = $variant['variation_description'];
                $abstract->link           = get_post_permalink($variant['variation_id']);

                $abstract->sales_price    = $variant['display_sale_price'];
                $abstract->normal_price   = $variant['display_regular_price'];
                $abstract->standard_price = $variant['display_price'];

                $abstract->stock_remain   = $product->stock_quantity;
                $abstract->stock_limit    = $product->low_stock_amount;

                $abstract->is_virtual     = $variant['is_virtual'];
                $abstract->down_limit     = $product->download_limit ;
                $abstract->downloadable   = $product->downloadable;

                $abstract->banner          = wp_get_attachment_url( $variant['image_id'] ) ; //_thumbnail_id

                $abstract->love           = "none";
                $abstract->cartlink       = "none";
                
                $product_atlas[$c] = $abstract; $c++;
            }
            
            unset($available_variations); // memclean
            
        }

        unset($category_products_ids); // memclean
        unset($product); // memclean

    }

    $product = $product_atlas[0];

    foreach ($product_atlas as $model) { 
        echo '<hr>';
        foreach ($model as $attrs => $value) { 
            echo '<p>'.$attrs.'->'.$value.'</p>';
        }
    }

?>


<!-- 
---- MAIN CONTENS BOX
--->
<section>


    <!--
    ---- MINI HEAD OF CATEOGRY
    --->

    <div class="row">

        <div class="col-lg-5 col-md-12">

            <? print '<div style="height:250px; min-height: 100%; background: url('.( wp_get_attachment_url( $product->get_image_id() ) ?: bloginfo('template_directory').'/adds/404IMAGE.PNG' ).') center/cover;"></div>'; ?>

        </div>

        <div class="col-lg-7 col-md-6">
            <div>

                <h2 class="display-3 fw-bolder"><?= $product->name; ?></h2>

                <? if( $product->stock_status=='instock' && $product->stock_quantity>0) { ?>
                    <? if( (int)$product->stock_quantity <= (int)$product->low_stock_amount) {?>
                        <p><span class="border border-2 border-warning">Only <?= $product->stock_quantity; ?> left in stock.</span></p>
                    <? } else { ?>
                        <p class="border border-2">>The product is ready for shipment in our warehouses. (qnt: <?= $product->stock_quantity; ?>).</p>
                    <? } ?>
                <? } ?>
        
                <p><?= $product->short_description; ?><br><a href="#productdetails"> ... More details <i class="bi bi-arrow-down-right-circle-fill"></i></a></p>
        
                <div>
                    <? if(!empty($product->sale_price)) { ?>
                        <p>FROM: <s><?= $product->regular_price; ?></s></p>
                        <div class="bd-light p-2">
                            <p class="fw-bold text-success"><?= $product->sale_price; ?> €</p>
                        </div>
                    <? } else { ?>
                        <div class="bd-light p-2">
                            <p class="display-5 text-info">Price: <b class="fw-bold"><?= $product->price; ?> €</b></p>
                        </div>
                    <? } ?>
                </div>

                <div>

                <div class="btn-group" style="width:150px">
                    <a class="btn btn-dark" ><i class="bi bi-dash-circle"></i></a>
                    <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                    <a class="btn btn-dark" ><i class="bi bi-plus-circle"></i></a>
                </div>
                &nbsp;&nbsp;⋮&nbsp;&nbsp;
                <a class="btn btn-primary" href="'<?= get_home_url().'?add-to-cart='.$product->term_id.'&quantity=1'?>">Add to cart <i class="bi bi-cart-check"></i></a>

                <script>
                </script>

            </div>
        </div>

    </div>

    <!--
    ---- BREADCRUMP AND SELECTORS
    --->

    <hr class="mt-4 mb-4">

    <div><? bootsrapped_breadcrumb(); ?></div>

    <hr class="mt-2 mb-4">

    <!--
    ---- PRODUCT CONTENTS
    --->


    <div id="productdetails">
        <p><?= $product->short_description; ?></p>
    </div>

    <div>
        <? 
            foreach( $product->gallery_image_ids as $img_id ) {
                $imgurl = wp_get_attachment_url( $img_id );
                print '<span><img width="200" src="'.$imgurl.'" alt=" ... "/></span>';
            }
        ?>
    </div>

    <?= $product->description; ?>

</section>

<!-- 
---- META BOX
--->

<section>

    <div class="mt-4 mb-4">
        <b>In date : <?= get_post_field('post_date', $post->ID); ?></b> &nbsp;&nbsp;⋮&nbsp;&nbsp;<b>Arguments :&nbsp;</b> <? foreach ($product->tag_ids as $tid) { $tag = get_term($tid); echo '<span class="tag"><a class="btn btn-info btn-sm" href="'.home_url().'/search/?s='.$tag->name.'"> '.$tag->name.' </a></span>&nbsp; ';} ?>
    </div>

</section>

<!-- 
---- COMMENTS BOX
--->

<section>

    <h3>
        <?= ($post->comment_count>0) ? "{$post->comment_count} Commenti":null; ?>
    </h3>

    <ol>

        <? 

            $comments = get_comments(array(
                'post_id' => $post->ID,
                'status' => 'approve'
            ));

            wp_list_comments( array(
                'style'      => 'ul',
                'short_ping' => true,
                'callback' => 'bootstrap_comments'
            ),$comments );

        ?>

    </ol>

    <!-- 
    ---- COMMENTS BOX
    --->

    <? the_comments_navigation(); ?>

    <? if ( $post->comment_status == 'closed' ) { ?>

        <p class="no-comments">
            <? esc_html_e( 'Comments are closed.', 'msbdtcp' ); ?>
        </p>

    <? } else { ?>

        <? 
            $commenter = wp_get_current_commenter();

            $html_req  = " required='required'";
            $custom_fields = [
                'author'    => '<div class="row mb-3 comment-input-wrap"><div class="col-sm-4 comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" placeholder="' . __("Name", "msbdtcp") . '" class="form-control"' . $html_req . '></div>',
                'email'     => '<div class="col-sm-4 comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes" placeholder="' . __("Email", "msbdtcp") . '" class="form-control"' . $html_req . '></div>',
                'url'       => '<div class="col-sm-4 comment-form-url"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="form-control" size="30" maxlength="200" placeholder="' . __("Website", "msbdtcp") . '"></div></div>',
            ];
            
            $args = [
                'fields' => $custom_fields,
                'comment_field' =>  '<div class="row mb-3"><div class="col comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="' . __("Comment", "msbdtcp") . '"></textarea></div></div>',
                'class_submit'  => 'submit btn btn-primary'
            ];

            comment_form($args);
        ?>

    <? }  ?>

</section>