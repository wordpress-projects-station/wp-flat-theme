<? defined( 'ABSPATH' ) || exit; ?>

<? do_action( 'woocommerce_widget_price_filter_start', $args ); ?>

<form method="get" action="<?= esc_url( $form_action ); ?>">

    <div class="price_slider_wrapper">

        <div class="price_slider" style="display:none;"></div>

        <div class="price_slider_amount" data-step="<?= esc_attr( $step ); ?>">
			<input type="text" id="min_price" name="min_price" value="<?= esc_attr( $current_min_price ); ?>" data-min="<?= esc_attr( $min_price ); ?>" placeholder="<?= esc_attr__( 'Min price', 'woocommerce' ); ?>" />
			<input type="text" id="max_price" name="max_price" value="<?= esc_attr( $current_max_price ); ?>" data-max="<?= esc_attr( $max_price ); ?>" placeholder="<?= esc_attr__( 'Max price', 'woocommerce' ); ?>" />
			<? /* translators: Filter: verb "to filter" */ ?>
			<button type="submit" class="button"><?= esc_html__( 'Filter', 'woocommerce' ); ?></button>
			<div class="price_label" style="display:none;">
				<?= esc_html__( 'Price:', 'woocommerce' ); ?> <span class="from"></span> &mdash; <span class="to"></span>
			</div>
			<?= wc_query_string_form_fields( null, array( 'min_price', 'max_price', 'paged' ), '', true ); ?>
			<div class="clear"></div>
		</div>

    </div>

</form>
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
    margin-left: -1em;
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

</style>


<script>

</script>

<? do_action( 'woocommerce_widget_price_filter_end', $args ); ?>