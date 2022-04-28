<? defined( 'ABSPATH' ) || exit; ?>

<? do_action( 'woocommerce_widget_price_filter_start', $args ); ?>

<form id="price_widget" method="get" action="<?= esc_url( $form_action ); ?>">

    <div class="price_slider_wrapper">

        <div class="price_slider" style="display:none;"></div>

        <div class="price_slider_amount" data-step="1<?//= esc_attr( $step ); ?>">

            <input type="text" id="min_price" name="min_price" value="<?= esc_attr( $current_min_price ); ?>" data-min="<?= esc_attr( $min_price ); ?>" placeholder="<?= esc_attr__( 'Min price', 'woocommerce' ); ?>" />
			<input type="text" id="max_price" name="max_price" value="<?= esc_attr( $current_max_price ); ?>" data-max="<?= esc_attr( $max_price ); ?>" placeholder="<?= esc_attr__( 'Max price', 'woocommerce' ); ?>" />
	
            <? /* translators: Filter: verb "to filter" */ ?>
			<button type="submit" class="button btn btn-secondary"><?= esc_html__( 'Filter', 'woocommerce' ); ?></button>

            <div class="price_label" style="display:none;">
				<?= esc_html__( 'Price:', 'woocommerce' ); ?> <span class="from"></span> &mdash; <span class="to"></span>
			</div>
	
            <?= wc_query_string_form_fields( null, array( 'min_price', 'max_price', 'paged' ), '', true ); ?>
	
            <div class="clear"></div>
	
        </div>

    </div>

</form>

<div class="py-2 pb-2"><hr></div>

<?

    $categories = get_terms(
        'product_cat',
        [
            'orderby' => 'id',
            'order' => 'DESC',
            'hide_empty' => true,
            'parent' => 0
        ]
    );

?>

<div id="filter_category">
    <? foreach ($categories as $key => $category) { ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?=$category->slug?>" id="category_selector_<?=$category->slug?>">
            <label label class="form-check-label" for="category_selector_<?=$category->slug?>">
                <?= $category->name; ?>
            </label>
        </div>
    <? } ?>
</div>

<div class="py-2 pb-2"><hr></div>

<style>
.price_slider{ 
    margin-bottom: 1em;
}

.price_slider_amount {
    text-align: right;
    line-height: 2.4em;
    font-size: 0.8751em;
}

.price_slider_amount .button {
    font-size:1.15em;
}

.price_slider_amount .button {
    float: left;
}

.ui-slider {
    position: relative;
    text-align: left;
}

.ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 0.9em;
    height: 0.9em;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    border: 1px solid rgba(0, 0, 0, 0.25);
    cursor: pointer;
    background: #e7e7e7;
    background: -webkit-gradient(linear,left top,left bottom,from(#FEFEFE),to(#e7e7e7));
    background: -webkit-linear-gradient(#FEFEFE,#e7e7e7);
    background: -moz-linear-gradient(center top,#FEFEFE 0%,#e7e7e7 100%);
    background: -moz-gradient(center top,#FEFEFE 0%,#e7e7e7 100%);
    outline: none;
    top: -.3em;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.65) inset;
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.65) inset;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.65) inset;
}

.ui-slider .ui-slider-handle:last-child {
    margin-left: -.5em;
}

.ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    font-size:.7em;
    display: block;
    border: 0;
    background: none repeat scroll 0 0 #FF6B6B;
    box-shadow: 1px 1px 1px 0.5px rgba(0, 0, 0, 0.25) inset;
    -webkit-box-shadow: 1px 1px 1px 0.5px rgba(0, 0, 0, 0.25) inset;
    -moz-box-shadow: 1px 1px 1px 0.5px rgba(0, 0, 0, 0.25) inset
    -webkit-border-radius: 1em;
    -moz-border-radius: 1em;
    border-radius: 1em;
}

.price_slider_wrapper .ui-widget-content {
    -webkit-border-radius: 1em;
    -moz-border-radius: 1em;
    border-radius: 1em;
    background: #1e1e1e;
    background: -webkit-gradient(linear,left top,left bottom,from(#1e1e1e),to(#6a6a6a));
    background: -webkit-linear-gradient(#1e1e1e,#6a6a6a);
    background: -moz-linear-gradient(center top,#1e1e1e 0%,#6a6a6a 100%);
    background: -moz-gradient(center top,#1e1e1e 0%,#6a6a6a 100%);
}

.ui-slider-horizontal {
    height:.5em;
}

.ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%;
}

.ui-slider-horizontal .ui-slider-range-min {
    left: -1px;
}

.ui-slider-horizontal .ui-slider-range-max {
    right: -1px;
}

.price_slider_wrapper .button{
    font-size: 1em;
    padding: 2px 8px;
    margin-top: 3px;
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        
        if ( document.readyState === "complete" || document.readyState === "interactive" ) {


            //get query
            const query = new URLSearchParams(window.location.search)

            //set Price Slider
            let min = query.get('min_price')
            let max = query.get('max_price')

            if(max>0) {

                document.querySelectorAll('#min_price')[0].setAttribute('value',min)
                document.querySelectorAll('#max_price')[0].setAttribute('value',max)

                document.querySelectorAll('.price_label>.from')[0].innerText = min
                document.querySelectorAll('.price_label>.from')[0].innerText = max

            }

            //set Categories Selector

            
            let categories = query.get('in_categories');

            document.querySelectorAll('.form-check>.form-check-input')
            .forEach( checkbox => {
                checkbox.addEventListener('click',()=>{

                    ! checkbox.checked
                        ? checkbox.setAttribute('checked','true')
                        : checkbox.removeAttribute('checked')


                    let query_add = '&in_categories='

                    document.querySelectorAll('.form-check>.form-check-input')
                    .forEach( checkbox => {

                        if( checkbox.checked )
                        query_add+= checkbox.value+'+'

                    })

                    query_add = query_add.replace(/\+$/, '')

                    console.log(query_add);

                },false)
            })

        }
    
    },false)
</script>

<? do_action( 'woocommerce_widget_price_filter_end', $args ); ?>
