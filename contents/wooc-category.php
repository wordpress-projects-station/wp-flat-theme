<? global $wp_query; $category = $wp_query->get_queried_object(); ?>

<?


    // set session page id
    // $SID = $category->term_id;

    // save in session params

    // if( isset($_POST['page_size']) )                    { $_SESSION[$SID.'_page_size'] = $_POST['page_size']; }
    // if( isset($_POST['page_active']) )                  { $_SESSION[$SID.'_page_active'] = $_POST['page_active']; }
    // if($_POST['page_sorting'] == 'byprice')             { $_SESSION[$SID.'_page_sorting'] = 'byprice'; }
    // elseif($_POST['page_sorting'] == 'pricereverse')    { $_SESSION[$SID.'_page_sorting'] = 'pricereverse'; }
    // elseif($_POST['page_sorting'] == 'alphabetical')    { $_SESSION[$SID.'_page_sorting'] = 'alphabetical'; }
    // elseif($_POST['page_sorting'] == 'byid')            { $_SESSION[$SID.'_page_sorting'] = 'byid'; }

    // // transfer from session params

    // $page_active  =  $_SESSION[$SID.'_page_active'] ?: '1';
    // $page_size    =  $_SESSION[$SID.'_page_size'] ?: '24';
    // $page_sorting =  $_SESSION[$SID.'_page_sorting'] ?: 'byid';

    $page_active  =  $_POST['page_active'] ?: '1';
    $page_size    =  $_POST['page_size'] ?: '1';
    $page_sorting =  $_POST['page_sorting'] ?: 'byid';
    print '<p>page_active: '.$page_active.'</p>';
    print '<p>page_size:'.$page_size.'</p>';
    print '<p>page_sorting:'.$page_sorting.'</p>';

?>


<!--
---- MINI HEAD OF CATEOGRY
--->

<div class="row">

    <div class="col-lg-6 col-md-12">

        <?
        
            $bkgId  = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
            $bkgUrl = wp_get_attachment_url( $bkgId ) ?: bloginfo('template_directory').'/adds/404IMAGE.PNG';
            print '<div style="height:250px; background: url('.$bkgUrl.') center/cover;"></div>';

        ?>

    </div>

    <div class="col-lg-6 col-md-6">
        <div>
            <h2 class="display-2"><?= $category->name; ?></h2>
            <p><?= $category->description; ?></p>
        </div>
    </div>


</div>

<!--
---- BREADCRUMP AND SELECTORS
--->

<div class="row mt-4 mb-4">

    <div class="col-lg-8 col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <? $baseurl = 'https://'.$_SERVER['SERVER_NAME']; ?>
            <li class="breadcrumb-item"><a href="<?= $baseurl.'/'; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $baseurl.'/shop/'; ?>">Shop</a></li>
            <li class="breadcrumb-item"><a href="<?= $baseurl.'/shop/all-categories/'; ?>"> ... </a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?= $baseurl.'/shop/all-categories/'.$category->name.'/'; ?>"> <?= $category->name?> </a></li>
        </ol>
    </nav>

    </div>

    <div class="col-lg-4 col-md-12">

            <form method="post" class="btn-group" style="width:100%;">

                <select class="custom-select" name="page_size" style="width:35%;">
                    <option <? if($page_size=='1') echo 'selected'; ?> value="1">1 per page</option>
                    <option <? if($page_size=='2') echo 'selected'; ?> value="2">2 per page</option>
                    <option <? if($page_size=='12') echo 'selected'; ?> value="12">12 per page</option>
                    <option <? if($page_size=='24') echo 'selected'; ?> value="24">24 per page</option>
                    <option <? if($page_size=='48') echo 'selected'; ?> value="48">48 per page</option>
                    <option <? if($page_size=='96') echo 'selected'; ?> value="96">96 per page</option>
                    <option <? if($page_size=='192') echo 'selected'; ?> value="192">192 per page</option>
                </select>

                <select class="custom-select" name="page_sorting" style="width:45%;">
                    <option <? if($page_sorting=='byid') echo 'selected'; ?> value="byid">Classic order</option>
                    <option <? if($page_sorting=='byprice') echo 'selected'; ?> value="byprice">Ordered for price</option>
                    <option <? if($page_sorting=='pricereverse') echo 'selected'; ?> value="pricereverse">By decreasing price</option>
                    <option <? if($page_sorting=='alphabetical') echo 'selected'; ?> value="alphabetical">Alphabetical order</option>
                </select>

                <button type="submit" class="btn btn-outline-secondary" >OK</button>
        
            </form>

    </div>

</div>

<!--
---- PRODUCT LIST
--->

<div class="row">

    <?

        // query products id

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

        // query that id, make a product abstract inside a list

        $products_list = [];

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
        
            $product_data = wc_get_product( $product_id );

            $abstract =  new product_abstract();

            $abstract->status         = $product_data->status=='publish'&&$product_data->catalog_visibility=='visible'?true:false;
            $abstract->id             = $product_id;
            $abstract->name           = $product_data->name;
            $abstract->excerpt        = $product_data->short_description;
            $abstract->link           = get_permalink($product_id);
            $abstract->normal_price   = $product_data->regular_price;
            $abstract->sales_price    = $product_data->sale_price;
            $abstract->standard_price = $product_data->price;
            $abstract->stock_remain   = $product_data->stock_quantity;
            $abstract->stock_limit    = $product_data->low_stock_amount;
            $abstract->is_virtual     = $product_data->virtual;
            $abstract->down_limit     = $product_data->download_limit;
            $abstract->downloadable   = $product_data->downloadable;
            $abstract->image          = wp_get_attachment_url( $product_data->image_id ) ; //_thumbnail_id
            $abstract->love           = "none";
            $abstract->cartlink       = "none";


            $products_list[$c] = $abstract;

            unset($product_data); // memclean
            $c++;

        }

        unset($category_products_ids); // memclean

        // sort abstract list

        function byid($a, $b) { return strcmp($a->id, $b->id); }
        function byprice($a, $b) { return strcmp($a->normal_price, $b->normal_price); }
        function pricereverse($a, $b) { return strcmp($b->normal_price, $a->normal_price); }
        function alphabetical($a, $b) { return strcmp($a->name, $b->name); }

        switch ($selected) {

            case 'byprice':
                usort($products_list,'byprice');
                break;
            case 'pricereverse':
                usort($products_list,'pricereverse');
                break;
            case 'alphabetical':
                usort($products_list,'alphabetical');
                break;
            default:
                usort($products_list,'byid');
                break;
        }

        // paginate list

        function paginate($array, $size, $active) {
            $allpages = array_chunk($array, $size);
            return $active > sizeof($allpages) ? [] : $allpages[$active - 1];
        }


        $pagelist = paginate($products_list, $page_size, $page_active);

        // loop page

        foreach ( $pagelist as $product ) { if($product->status) { ?>


            <div class="col-lg-4 col-md-12">

                <div class="border border-2 mb-4">

                    <div style="height:250px; background: url(<? if ($product->image) { echo $product->image; } else { echo bloginfo('template_directory').'/adds/404IMAGE.PNG'; }?> ) center/cover;">
                        <div class="badge position-absolute top-0 start-0 translate-middle">Hot</div>
                        <div class="badge position-absolute top-0 start-100 translate-middle"><?// echo $id; ?></div>
                    </div>
                        
                    <div class="border-top border-2 p-2">

                        <h3 class="card-text display-6 text-center">
                            <?= $product->name; ?>
                        </h3>
            
                        <p class="card-text display-5 text-center">
                            <b><?= $product->normal_price; ?></b>
                        </p>
            
                        <p class="card-text text-justify" style="display:-webkit-box;-webkit-line-clamp: 3;-webkit-box-orient:vertical;overflow:hidden;">
                            <?= $product->excerpt; ?>
                        </p>

                    </div>

                    <div class="border-top border-2 p-2">

                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <a class="btn btn-secondary" href="<?= $product->link; ?>">DETAILS</a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <span class="btn-group" style="float:right">
                                    <a class="btn btn-info" href=""><i class="bi bi-bookmark-heart-fill"></i></a>
                                    <a class="btn btn-info" href="<?= 'https://'.$baseurl.'/shop/cart/?add-to-cart='.$product->id.'&quantity=1'; ?>"><i class="bi bi-cart-plus-fill"></i></a>
                                </span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        <? }} ?>

</div>

<!-- PAGINATION DISPLAY -->

<form method="post" class="mt-4"> 

    <? $page_count = (count($products_list)/$page_size); ?>
    
    <input type="hidden" name="page_size"  value="<?= $page_size; ?>" />
    <input type="hidden" name="page_sorting" value="<?= $page_sorting?>" />

    <nav>
        <ul class="pagination justify-content-center">

            <li class="page-item">
                <button name="page_active" type="submit" value="<?= $page_active-1; ?>" class="page-link" <?= $page_active==1?'style="opacity:.33" disabled':''; ?>>Previous</button>
            </li>
    
            <? for ($p=1; $p < $page_count+1; $p++) if( $page_active>=$page_active-3 && $page_active<=$page_active+3 ) print '<li class="page-item '.($p==$page_active?'active':'').'"><button name="page_active" type="submit" class="page-link" value="'.$p.'">'.$p.'</button></li>'; ?>
            <li class="page-item">
                <button style="color:gray" class="page-link" disabled> of <?= $page_count; ?></button>
            </li>
            <li class="page-item">
                <button name="page_active" type="submit" value="<?= $page_active+1; ?>" class="page-link" <?= $page_active==$page_count?'style="opacity:.33" disabled':''; ?>>Next</button>
            </li>

        </ul>
    </nav>

</form>
