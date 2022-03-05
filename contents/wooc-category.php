<?php global $wp_query; $category = $wp_query->get_queried_object(); ?>

<!--
---- MINI HEAD OF CATEOGRY
--->

<div class="row">

    <div class="col-lg-6 col-md-12">

        <?php
        
            $bkgId = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
            $bkgUrl = wp_get_attachment_url( $bkgId );

            if($bkgUrl)
            echo '<div style="height:250px; background: url('.$bkgUrl.') center/cover;"></div>';

            else
            echo '<div style="height:250px; background: url('.bloginfo('template_directory').'/adds/404IMAGE.PNG) center/cover;"></div>';
        
        ?>

    </div>

    <div class="col-lg-6 col-md-6">
        <div>
            <h2 class="display-2"><?php echo $category->name;?></h2>
            <p><?php echo $category->description;?></p>
        </div>
    </div>


</div>

<!--
---- BREADCRUMP AND SELECTORS
--->

<div class="row mt-4 mb-4">

    <div class="col-lg-9 col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].'/'; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].'/shop/'; ?>">Shop</a></li>
            <li class="breadcrumb-item"><a href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].'/shop/all-categories/'; ?>"> ... </a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].'/shop/all-categories/'.$category->name.'/'; ?>"> <?php echo $category->name?> </a></li>
        </ol>
    </nav>

    </div>

    <div class="col-lg-3 col-md-12">

            <form method="POST" class="btn-group" style="width:100%;">

                <?php

                    $selected = 'byid';
                    if($_POST['sortingtype'] == 'forprice') { $selected = 'forprice'; }
                    elseif($_POST['sortingtype'] == 'pricereverse') { $selected = 'pricereverse'; }
                    elseif($_POST['sortingtype'] == 'alphabetical') { $selected = 'alphabetical'; }

                ?>

                <select class="custom-select" name="sortingtype" style="width:70%;">
                    <option <?php if($selected=='byid') echo 'selected'; ?> value="byid">Classic</option>
                    <option <?php if($selected=='forprice') echo 'selected'; ?> value="forprice">For price</option>
                    <option <?php if($selected=='pricereverse') echo 'selected'; ?> value="pricereverse">Decreasing price</option>
                    <option <?php if($selected=='alphabetical') echo 'selected'; ?> value="alphabetical">Alphabetical</option>
                </select>
    
                <button name="sortselector" type="submit" class="btn btn-outline-secondary" >OK</button>
        
            </form>

    </div>

</div>

<!--
---- PRODUCT LIST
--->

<div class="row">

    <?php


        $category_products_ids = get_posts([
            'post_type' => 'product',
            'numberposts' => -1,
            'post_status' => 'publish',
            'fields' => 'ids',
            'tax_query' => [[
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $category->name, /*category name*/
                'operator' => 'IN',
            ]]
        ]);


        $productslist = [];

        class product_abstract 
        {
            public $id;
            public $status;
            public $name;
            public $excerpt;
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

        $c=0; foreach ( $category_products_ids as $product_id ) {
        
            $productdata = wc_get_product( $product_id );

            $abstract =  new product_abstract();

            $abstract->status         = $productdata->status=='publish'&&$productdata->catalog_visibility=='visible'?true:false;
            $abstract->id             = $product_id;
            $abstract->name           = $productdata->name;
            $abstract->excerpt        = $productdata->short_description;
            $abstract->link           = get_permalink($product_id);
            $abstract->normal_price   = $productdata->regular_price;
            $abstract->sales_price    = $productdata->sale_price;
            $abstract->standard_price = $productdata->price;
            $abstract->stock_remain   = $productdata->stock_quantity;
            $abstract->stock_limit    = $productdata->low_stock_amount;
            $abstract->is_virtual     = $productdata->virtual;
            $abstract->down_limit     = $productdata->download_limit;
            $abstract->downloadable   = $productdata->downloadable;
            $abstract->image          = wp_get_attachment_url( $productdata->image_id ) ; //_thumbnail_id
            $abstract->love           = "none";
            $abstract->cartlink       = "none";


            $productslist[$c] = $abstract;

            unset($productdata); // memory clean
            $c++;

        }

        unset($category_products_ids); // memory clean


        function byid($a, $b) { return strcmp($a->id, $b->id); }
        function forprice($a, $b) { return strcmp($a->normal_price, $b->normal_price); }
        function pricereverse($a, $b) { return strcmp($b->normal_price, $a->normal_price); }
        function alphabetical($a, $b) { return strcmp($a->name, $b->name); }

        switch ($selected) {

            case 'forprice':
                usort($productslist,'forprice');
                break;
            case 'pricereverse':
                usort($productslist,'pricereverse');
                break;
            case 'alphabetical':
                usort($productslist,'alphabetical');
                break;
            default:
                usort($productslist,'byid');
                break;
        }

        usort($productslist, );

        
        foreach ( $productslist as $product ) { if($product->status) { ?>


            <div class="col-lg-4 col-md-12">

                <div class="border border-2 mb-4">

                    <div style="height:250px; background: url(<?php if ($product->image) { echo $product->image; } else { echo bloginfo('template_directory').'/adds/404IMAGE.PNG'; }?> ) center/cover;">
                        <div class="badge position-absolute top-0 start-0 translate-middle">Hot</div>
                        <div class="badge position-absolute top-0 start-100 translate-middle"><?php// echo $id; ?></div>
                    </div>
                        
                    <div class="border-top border-2 p-2">

                        <h3 class="card-text display-6 text-center">
                            <?php echo $product->name; ?>
                        </h3>
            
                        <p class="card-text display-5 text-center">
                            <b><?php echo $product->normal_price; ?></b>
                        </p>
            
                        <p class="card-text text-justify" style="display:-webkit-box;-webkit-line-clamp: 3;-webkit-box-orient:vertical;overflow:hidden;">
                            <?php echo $product->excerpt; ?>
                        </p>

                    </div>

                    <div class="border-top border-2 p-2">

                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <a class="btn btn-secondary" href="<?php echo $product->link; ?>">DETAILS</a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <span class="btn-group" style="float:right">
                                    <a class="btn btn-info" href=""><i class="bi bi-bookmark-heart-fill"></i></a>
                                    <a class="btn btn-info" href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].'/shop/cart/?add-to-cart='.$product->id.'&quantity=1'; ?>"><i class="bi bi-cart-plus-fill"></i></a>
                                </span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        <?php }} ?>

</div>

<!--
---- PAGINATION
--->
ONLY HTML:
<div class="mt-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
