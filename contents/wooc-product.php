<?

    // TO DO:   https://www.sitoedominio.com/test/shop/elettronica/lexar-memory-sd/
    //          https://www.sitoedominio.com/test/wp-admin/post.php?post=1338&action=edit
    //          problem name vs slug if attrubute retriver
    //          change, if can, in the spitted "2Gb | 8Gb | 16Gb | 32Gb | 64Gb | 128gb | 256Gb | 500Gb"

    // TO DO:   https://www.sitoedominio.com/test/shop/elettronica/my-bundle/?add-to-cart=1232&quantity=1
    //          https://www.sitoedominio.com/test/wp-admin/post.php?post=2537&action=edit
    //          group whit variant product go in error

    /*
    // MADE PRODUCT ABSTACT
    // Atlas is the container list of all getted property and extra of this product.
    // Atlas[0] is the product, other index is the relative variations
    */


    $product_atlas = [];


    /*
    // MADE PRODUCT ABSTACT
    // is a summary of all product data getted.
    // on end, we clean mem relative to original product vars and use only the abstract.
    */

    global $post;

    $wc_product = wc_get_product( $post->ID );


    // echo'<pre> PRODUCT:';print_r($wc_product);echo'</pre>';

    

    // $isbundle = $wc_product->is_type('bundle');
    // echo'<pre> USPELLING:';print_r($wc_product);echo'</pre>';
    // echo'<pre> PRODUCT BUNDLE:';print_r($wc_product);echo'</pre>';

    class basedata {};

    $abstract = new basedata();

        $abstract->id             = $post->ID;
        $abstract->type           = get_the_terms( $post->ID,'product_type')[0]->slug;
        $abstract->pack           = $wc_product->children ?:'empty';
        $abstract->actual_variant = null;
        $abstract->status         = $wc_product->status=='publish'&&$wc_product->catalog_visibility=='visible'?true:false;
        $abstract->name           = $wc_product->name;
        $abstract->excerpt        = $wc_product->short_description;
        $abstract->description    = $wc_product->description;
        $abstract->permalink      = get_post_permalink($post->ID);
        $abstract->normal_price   = $wc_product->regular_price;
        $abstract->sales_price    = $wc_product->sale_price;
        $abstract->standard_price = $wc_product->price;
        $abstract->stock_remain   = $wc_product->stock_quantity ;
        $abstract->stock_limit    = $wc_product->low_stock_amount;
        $abstract->is_virtual     = $wc_product->virtual;
        $abstract->down_limit     = $wc_product->download_limit;
        $abstract->downloadable   = $wc_product->downloadable;
        $abstract->gallery        = $wc_product->gallery_image_ids;
        $abstract->bannerid       = $wc_product->image_id; //_thumbnail_id
        $abstract->bannersrc      = wp_get_attachment_url( $wc_product->image_id ); 
        $abstract->date           = get_post_field('post_date', $post->ID);

        foreach ( $wc_product->tag_ids as $tid ) { $abstract->tags[] .= get_term($tid)->name; }


        $attributeslist=[]; foreach ($wc_product->attributes as $terms => $asset) {

            $indata = (object) $asset->get_data();

            if($indata->is_visible && $indata->is_variation) {

                $wca_terms = get_the_terms( $post->ID, $indata->name );

                $d = [];

                if( !empty($wca_terms->errors) ) { 

                    for ($i=1;$i<count($indata->options);$i++) array_push($d,[false,$indata->options[$i],false]);

                    array_push( $attributeslist, [
                        $indata->name,
                        'ca_'.$indata->name,
                        $d
                    ]);

                } else {

                    foreach($wca_terms as $t=>$v) array_push($d,[$v->term_id,$v->name,$v->slug]);

                    array_push( $attributeslist, [
                        $indata->name,
                        'attribute_'.$indata->name,
                        $d
                    ]);

                }

            }
            
        }

        $abstract->attributes = $attributeslist;

        $product_atlas[0] = $abstract;

        unset($abstract);



    /*
    // MADE PRODUCT GROUP ABSTACT
    // is a summary of all product inside a bundle.
    */

    if( $product_atlas[0]->pack != 'empty' ){

        class packdata {};

        $n=1; foreach ( $product_atlas[0]->pack as $in_pack_id ) { 

            $wc_product_in_pack = wc_get_product( $in_pack_id );

            $abstract = new packdata();

            $abstract->id        = $in_pack_id;
            $abstract->name      = $wc_product_in_pack->name;
            $abstract->excerpt   = $wc_product_in_pack->short_description;
            $abstract->price     = $wc_product_in_pack->price;
            $abstract->permalink = get_post_permalink($in_pack_id);
            $abstract->banner    = wp_get_attachment_url( $wc_product_in_pack->image_id );

            $product_atlas[$n] = $abstract; $n++;
 
            unset($abstract);

        }
    
    }


    /*
    // MADE PRODUCT VARIATION ABSTACT
    // is a summary of all product variation generated by woocommerce.
    // on end, we clean mem relative to original variantsion vars and use only the abstract.
    */

    if( $product_atlas[0]->pack == 'empty' && ! empty( $wc_product->attributes ) ) {

        class variationdata {};

        $wc_product_variants = $wc_product->get_available_variations();

        $n=1; foreach ( $wc_product_variants as $variants_index => $variant ) { 
 

            $abstract = new variationdata();
 
                $abstract->id = $variant["variation_id"];

                foreach ( $variant['attributes'] as $type => $name) { 
                    $abstract->label[] .= $name;
                    $abstract->name .= $name.'-';
                };  $abstract->name = rtrim($abstract->name,'-');

                $abstract->normal_price = $variant["display_regular_price"];
                $abstract->sales_price = $variant["display_sales_price"];
                $abstract->standard_price = $variant["display_price"];
                $abstract->bannersrc = $variant['image']['src'];
                $abstract->bannerid = $variant['image_id'];
                $abstract->permalink = get_the_permalink($variant["variation_id"]);

                $product_atlas[$n] = $abstract; $n++;

                unset($abstract);

        }

        unset($wc_product_variants);

    }

    unset($wc_product);


    /*
    // CLEAN ATTRIBUTE NOT IN VARIANTS
    // If attribute isn't usable, remove it from list.
    */

    if( ! empty( $product_atlas[0]->attributes ) ) {

        $labels = [];

        for ($i=1;$i<count($product_atlas);$i++) { 
            $var = $product_atlas[$i];
            foreach ( $var->label as $label ) $labels[].=$label;
            array_unique($labels);
        }

        foreach ( $product_atlas[0]->attributes as $asset ) {

            foreach ( $asset[2] as $datarow => $datavalue)
                if( ! in_array($datavalue[1],$labels) && ! in_array($datavalue[2],$labels) )
                    unset($asset[2][$datarow]);

            $product_atlas[0]->attributes = [$asset];

        }
        
    }



    /*
    // MADE PRODUCT VARIATED
    // Get params from url and override normal product with correct variation data.
    */


    $queryStrings = explode('&',$_SERVER['QUERY_STRING']);
    foreach ($queryStrings as $queryblock) str_contains($queryblock,'attribute_') || str_contains($queryblock,'ca_') ? $queryAttr[] .= explode('=',$queryblock)[1] : null;


    foreach ($product_atlas as $variation) {
        if( count(array_diff($queryAttr,$variation->label))==0 ) { 

            $product_atlas[0]->id               = $variation->id;
            $product_atlas[0]->actual_variant   = $variation->name;
            $product_atlas[0]->normal_price     = $variation->normal_price;
            $product_atlas[0]->sales_price      = $variation->sales_price;
            $product_atlas[0]->standard_price   = $variation->standard_price;
            $product_atlas[0]->bannersrc        = $variation->bannersrc;
            $product_atlas[0]->bannerid         = $variation->bannerid;
            $product_atlas[0]->permalink        = $variation->permalink;

        }
    }


    /*
    // now have a complete atlas:
    // print it in php: echo'<pre>';print_r($product_atlas);echo'</pre>';
    // use it in js: $json_atlas = json_encode($product_atlas);
    // use it in php: $MYVAR = $product_atlas[INDEX_ZERO_FOR_PRODUCT_OTHER_FOR_VARIATIONS_DATA];
    */

    // re assign product for ($bpd is abbreviation)
    $bpd = $baseproductdata = $product_atlas[0];

?>


<?
    // get quantity
    $queryqnt = str_contains($_SERVER['QUERY_STRING'],'quantity=') ? explode('quantity=',$_SERVER['QUERY_STRING'])[1] : 1;

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
            <? $IMAGE404 = get_template_directory_uri().'/adds/404IMAGE.PNG'; ?>
            <a class="img-magnifier-container" href="<?= ( $bpd->bannersrc ?: $IMAGE404  ); ?>" target="_blank">
                <?= '<img class="zoomed" id="'.$bpd->bannerid.'" src="'.( $bpd->bannersrc ?: $IMAGE404 ).'" alt=" ... " />'; ?>
            </a>
        </div>

        <div class="col-lg-7 col-md-6">
            <div>

                <h2 class="display-3 fw-bolder"><?= $bpd->name; ?></h2>

                <?= empty($bpd->actual_variant) ?: '<div class="mb-2 mt-2"><a class="class="display-7 fw-bold" href="'.$bpd->link.'" target="_blank">Actual variant selected: '.$bpd->id.' : '.$bpd->actual_variant.'</a></div>'; ?>

                <? if( $bpd->stock_status=='instock' && $bpd->stock_quantity>0) { ?>
                    <? if( (int)$bpd->stock_quantity <= (int)$bpd->low_stock_amount) {?>
                        <p><span class="border border-2 border-warning">Only <?= $bpd->stock_quantity; ?> left in stock.</span></p>
                    <? } else { ?>
                        <p class="border border-2">>The product is ready for shipment in our warehouses. (qnt: <?= $bpd->stock_quantity; ?>).</p>
                    <? } ?>
                <? } ?>
        
                <p><?= $bpd->excerpt; ?><br><a href="#productdetails"> ... More details <i class="bi bi-arrow-down-right-circle-fill"></i></a></p>
        
                <?
                    if( $product_atlas[0]->pack != 'empty' ){

                        echo '<hr class="mt-3 mb-3">';

                        foreach ($product_atlas as $inpack) {
                            if($inpack!=$product_atlas[0]){

                                ?>
                                <div>
                                    <div style=" background: url(<?= $inpack->banner; ?>) center/cover; height:45px; width:45px"></div>
                                    <p><?= $inpack->id; ?></p>
                                    <h3 class="display-6 fw-bold"><?= $inpack->name; ?></h3>
                                    <!-- <div>
                                        <?= $inpack->excerpt; ?>
                                    </div> -->
                                    <p> Price: <?= $inpack->price; ?> </p>
                                    <a href="<?= $inpack->permalink; ?>" target="_blank">[ see out of pack <i class="bi bi-arrow-up-right-square"></i> ]</a>
                                </div>
                                <?
                            }
                        }

                        echo '<hr class="mt-3 mb-3">';

                    }
                ?>

                <div>
                    <? if(!empty($bpd->sale_price)) { ?>
                        <p>FROM: <s><?= ($bpd->regular_price*$queryqnt); ?></s></p>
                        <div class="bd-light p-2">
                            <p class="fw-bold text-success"><?= ($bpd->sale_price*$queryqnt); ?> €</p>
                        </div>
                    <? } else { ?>
                        <div class="bd-light p-2">
                            <p class="display-5 text-info">Price: <b class="fw-bold"><?= ($bpd->standard_price*$queryqnt); ?> €</b></p>
                        </div>
                    <? } ?>
                </div>
                
                <div style="position:relative;">
                    <div class="spinner-loading d-none"></div>
                    <form name="product_customizator">
                        
                        <?
                        
                            // https://www.businessbloomer.com/woocommerce-custom-add-cart-urls-ultimate-guide/
                            // https://www.forumming.com/question/19169/woocommerce-variable-product-get-variation-name
                            // https://stackoverflow.com/questions/41393797/get-and-display-the-values-for-product-attribute-in-woocommerce
                            // https://stackoverflow.com/questions/33202678/woocommerce-how-to-link-to-product-variation

                            if( ! empty( $bpd->attributes ) ) {
        
                                //<input type="hidden" id="queryurl" value="?attribute_pa_color=white&attribute_pa_design=type-02"/>
                                echo '<p> AVAILABLE OPTIONS:</p>';

                                foreach ( $bpd->attributes as $asset ) {

                                    $type  = $asset[0];
                                    $query = $asset[1];

                                    if( $type=='pa_color' ) echo '<div><div class="btn-group" role="group" aria-label="Basic radio toggle button group">';
                                    else echo '<div><select name="'.$query.'" class="form-select" aria-label="Default select example">';
                                    
                                    foreach ( $asset[2] as $datarow => $datavalue) {

                                        $id    = $datavalue[0];
                                        $label = $datavalue[1];
                                        $slug  = $datavalue[2];

                                        $checked = in_array($slug,$queryAttr) || in_array($label,$queryAttr) ? true : false;

                                        if( $type=='pa_color' ) {

                                            $color = get_term_meta($id)['color'][0];
                                            echo '<input type="radio" autocomplete="off" class="btn-check" id="'.$id.'" name="'.$query.'" value="'.$slug.'" '.(!$checked?:'checked').'>
                                                    <label for="'.$id.'" style="height:40px;width:40px;margin:-7px 3px; border:2px solid gray; border-radius:5px; background:'.$color.';">
                                                 </label>';

                                        } else {

                                            echo '<option id="'.$id.'" value="'.($slug?:$label).'" '.(!$checked?:'selected').'>'.$label.'</option>';

                                        }

                                    }

                                    if( $type=='pa_color' ) echo '</div>';
                                    else echo '</select>';

                                    echo '</div><div class="m-3"></div>';

                                }

                                // echo '<input type="submit" value="test"/>';

                            }


                        ?>

                        <div class="btn-group" style="width:150px">
                            <a class="btn btn-dark quantity-minus"><i class="bi bi-dash-circle"></i></a>
                            <input type="text" name="quantity" data-standard="<?= $queryqnt; ?>" class="form-control input-number quantity-number" value="<?= $queryqnt; ?>" min="1" max="10">
                            <a class="btn btn-dark quantity-plus" ><i class="bi bi-plus-circle"></i></a>
                        </div>

                    </form>
                    <!-- preg_replace('/\?.*/','',$bpd->permalink). -->
                    <a class="btn btn-primary linktocart" href="<?= '?add-to-cart='.$bpd->id.'&quantity='.$queryqnt; ?>">Add to cart <i class="bi bi-cart-check"></i></a>

                </div>

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
        <p><?= $bpd->short_description; ?></p>
    </div>

    <div>
        <? 
            foreach( $bpd->gallery as $imgid ) {
                echo '<span><img id="'.$imgid.'" width="200" src="'.wp_get_attachment_url( $imgid ).'" alt=" ... "/></span>';
            }
        ?>
    </div>

    <?= $bpd->description; ?>

</section>

<!-- 
---- META BOX
--->

<section>

    <div class="mt-4 mb-4">
        <b>In date : <?= $bpd->date; ?></b> &nbsp;&nbsp;⋮&nbsp;&nbsp;<b>Arguments :&nbsp;</b> <? foreach ($bpd->tags as $tag) { echo '<span class="tag"><a class="btn btn-info btn-sm" href="'.home_url().'/search/?s='.$tag.'"> '.$tag.' </a></span>&nbsp; ';} ?>
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


<style>

    .img-magnifier-container {
        position: relative;
        overflow:hidden;
        display:grid;
        align-items:center;
        height:100%;
        width:100%;
    }
    .img-magnifier-container img{
        min-height:100%;
        min-width:100%;
        object-fit: cover
    }

    .img-magnifier-container:hover .img-magnifier-glass{
        opacity: 1;
        transition: opacity .5s;
    }
    
    .img-magnifier-glass {
        transition: opacity .25s;
        opacity: 0;
        position: absolute;
        border: 8px solid rgba(0,0,0,.3);
        border-radius: 50%;
        cursor: none;
        width: 200px;
        height: 200px;
    }

    .woocommerce-message{
        /* position: absolute;
        left: 50%;
        transform: translate3d(-50%,50%,0);
        top: 50%;
        z-index: 99999;
        border-radius: 5px; */
        box-shadow: 0 10px 20px rgb(0 0 0 / 30%);
        margin: 0;
    }

    .btn-check:checked+label{
        border: 8px solid rgba(0,0,0,.3) !important;
    }

    .spinner-loading{
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 9999;
        background: #fafafa66 url(<?=bloginfo('template_directory').'/adds/spinner.gif';?>) no-repeat center;
    }

</style>
<script>

window.addEventListener("load", () =>{

    var customizer = document.querySelectorAll('[name="product_customizator"]')[0],
        linktocart = document.querySelectorAll('.linktocart')[0],
        qnt_field = customizer.querySelectorAll('.quantity-number')[0],
        plus_trig = customizer.querySelectorAll('.quantity-plus')[0],
        minus_trig = customizer.querySelectorAll('.quantity-minus')[0];


        // new quantity

        const run_checks = setInterval( ()=>{ qnt_field.dataset.standard!=qnt_field.value && !qnt_field.classList.contains('underclick') ? refresh() : null }, 1000 );

        plus_trig.onclick = ()=> {
            qnt_field.classList.add('underclick');
            if ( qnt_field.value < <?= $bpd->stock_remain ? :'10'; ?> ) {
                qnt_field.setAttribute('value',qnt_field.value++)
                setTimeout( () => { 
                    qnt_field.classList.remove('underclick');
                }, 1100); 
            }else{
                alert("Non puoi ordinare più di quanto abbiamo in magazzino o più di 10 pezzi per ordine");
            }
        }

        minus_trig.onclick = ()=> {
            qnt_field.classList.add('underclick');
            if ( qnt_field.value>1 ) {
                qnt_field.setAttribute('value',qnt_field.value--);
                setTimeout( () => { 
                    qnt_field.classList.remove('underclick');
                }, 1100); 
            }
        }


        // customizator for update customization

        customizer.querySelectorAll('[type="radio"], [type="checkbox"], select')
        .forEach( el => { el.addEventListener('input',()=>{ refresh() },false); });

        function refresh(){
            clearTimeout(run_checks)
            document.querySelectorAll('.spinner-loading')[0].classList.remove('d-none');
            customizer.disabled = true
            linktocart.classList.add('disabled')
            linktocart.disabled = true
            linktocart.classList.add('disabled')
            customizer.submit()
        }

    //zoom featured

    function magnify(imgID, zoom) {

        var img, glass, w, h, bw;
        img = document.getElementById(imgID);

        /* Create magnifier glass: */
        glass = document.createElement("DIV");
        glass.setAttribute("class", "img-magnifier-glass");

        /* Insert magnifier glass: */
        img.parentElement.insertBefore(glass, img);

        /* Set background properties for the magnifier glass: */
        glass.style.backgroundImage = "url('" + img.src + "')";
        glass.style.backgroundRepeat = "no-repeat";
        glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
        bw = 3;
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight / 2;

        /* Execute a function when someone moves the magnifier glass over the image: */
        glass.addEventListener("mousemove", moveMagnifier);
        img.addEventListener("mousemove", moveMagnifier);

        /*and also for touch screens:*/
        glass.addEventListener("touchmove", moveMagnifier);
        img.addEventListener("touchmove", moveMagnifier);

        function moveMagnifier(e) {
            var pos, x, y;
            /* Prevent any other actions that may occur when moving over the image */
            e.preventDefault();
            /* Get the cursor's x and y positions: */
            pos = getCursorPos(e);
            x = pos.x;
            y = pos.y;
            /* Prevent the magnifier glass from being positioned outside the image: */
            if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
            if (x < w / zoom) {x = w / zoom;}
            if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
            if (y < h / zoom) {y = h / zoom;}
            /* Set the position of the magnifier glass: */
            glass.style.left = (x - w) + "px";
            glass.style.top = (y - h) + "px";
            /* Display what the magnifier glass "sees": */
            glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
        }

        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /* Get the x and y positions of the image: */
            a = img.getBoundingClientRect();
            /* Calculate the cursor's x and y coordinates, relative to the image: */
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /* Consider any page scrolling: */
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }
    var zoomer = document.querySelectorAll('.zoomed');
    for(let i=0; i<zoomer.length; i++) magnify( zoomer[i].id, 2)


});
</script>