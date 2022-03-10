<?

    global $post; $product = wc_get_product( $post->ID );

    ?><pre><code>ATTR OF STARTS<?= var_dump($product); ?></code></pre><hr><?
    ?><!--<pre><code>ATTR OF STARTS<?//= var_dump($product->attributes); ?></code></pre>--><?
    ?><!--<pre><code>ATTR OF STARTS<?//= var_dump($product->default_attributes); ?></code></pre>--><?
    $variations = $product->get_available_variations();

    ?><pre><code>ATTR OF STARTS<?= var_dump($variations); ?></code></pre><hr><?
     
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
                    <?
                        //https://www.forumming.com/question/19169/woocommerce-variable-product-get-variation-name
                        //https://stackoverflow.com/questions/41393797/get-and-display-the-values-for-product-attribute-in-woocommerce

                        // need to loop the variant. that abstract is necessary for connect options with product view.

                        if( ! empty( $product->attributes ) ) {
                
                            echo '<ul class="product_attributes">';
 
                            foreach ( $product->attributes as $attribute_label => $attribute_contents ) {
                                    
                                echo '<li>'.$attribute_label;

                                    $attribute_data = $attribute_contents->get_data();

                                    $default = $product->default_attributes[$attribute_label];

                                    if($attribute_data['visible']) {

                                        echo'<p><b> ID:'.$attribute_data['id'].'</b> is variation: '.($attribute_data['is_variation']?'true':'false').'<br>';

                                        $thumb_id = get_term_meta($attribute_data['id']);
                                        $img_src = wp_get_attachment_url($thumb_id);
                                        var_dump($img_src);

                                        // echo 'the thumb is:'.$thumbnail_id.'<br>';
                                        foreach ( $attribute_data['options'] as $attr_value ) {

                                            if( $attr_value == $default )
                                            echo '<b>'.$attr_value.';</b>&nbsp;';
                                            else
                                            echo $attr_value.';&nbsp;';

                                        }

                                        echo'</p>';
                                    }
                    
                                echo '</li>';

                            }
                            echo '</ul>';
                        }


                        // if(!empty($product->attributes)) {
                        //     foreach ( $product->attributes as $attribute ){

                        //         $attribute = $attribute->get_data();

                        //         echo '<b> type of mod: "'.$attribute['name'].'"</b><ul>';
                        //         foreach ( $attribute['options'] as $loop_list => $term_id )
                        //         {
                        //             $attribute = get_term($term_id);
                        //             if($attribute->term_id){

                        //                 // var_dump($attribute);
                        //                 echo '<li>
                        //                     <p>terms Id: '.$attribute->term_id.'</p>
                        //                     <p>terms name: '.$attribute->name.'</p>
                        //                     <p>terms slug: '.$attribute->slug.'</p>
                        //                     <p>terms taxonomy id: '.$attribute->term_taxonomy_id.'</p>
                        //                     <p>terms taxonomy: '.$attribute->taxonomy.'</p>
                        //                 </li>';
                        //             }

                        //         } 
                        //         echo '</ul>';

                        //     }
                        // }
                    ?>
                </div>

                <div class="btn-group" style="width:150px">
                    <a class="btn btn-dark" ><i class="bi bi-dash-circle"></i></a>
                    <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                    <a class="btn btn-dark" ><i class="bi bi-plus-circle"></i></a>
                </div>
                &nbsp;&nbsp;⋮&nbsp;&nbsp;
                <a class="btn btn-primary" href="'<?= get_home_url().'?add-to-cart='.$product->term_id.'&quantity=1'?>">Add to cart <i class="bi bi-cart-check"></i></a>

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
                print '<span><b>id:'.$img_id.'<b><img id="'.$img_id.'" width="200" src="'.$imgurl.'" alt=" ... "/></span>';
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