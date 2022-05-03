<div class="card content-box" style="cursor:pointer" onclick="window.location='<?= $link; ?>'">

    <div class="card-header p-0">
        <div style="<?= $banner; ?>"></div>
    </div>

    <div class="card-body text-center">

        <? if(isset($price)&&$price>0) { ?>
            <p class="card-subtitle fs-6 text-muted">
                <?= $price.' '.get_woocommerce_currency_symbol(); ?>
            </p>
        <? } ?>

        <div class="card-title">
            <h4>
                <?= $title; ?>
            </h4>
        </div>

        <? if(isset($date)){ ?>
            <p class="card-date">
                posted in date: <?= $date; ?>
            </p>
        <?}?>

        <div class="card-excerpt">
            <p class="card-text">
                <?= $excerpt; ?>
            </p>
        </div>

    </div>

    <div class="card-footer">

        <a href="<?= $link; ?>" class="btn btn-primary">
            OPEN DETAILS <i class="bi bi-arrow-up-right-square"></i>
        </a>

    </div>

    <?if ( isset($price)&&$price==0 ) {?>
        <div class="card-ribbon free">
            <b>FREE!</b>
        </div>
    <?}?>

    <?if(isset($product)){?>

        <?if ( is_product_on_sale ($product) ) {?>
            <div class="card-ribbon onsale">
                <b>SALE!</b>
            </div>
        <?} else if ( is_product_new ($product) ) {?>
            <div class="card-ribbon new">
                <b>NEW!</b>
            </div>
        <?}?>

    <?}?>

</div>