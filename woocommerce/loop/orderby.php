<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<form class="d-inline-block woocommerce-ordering" method="get">

	<select name="orderby" class="form-select d-inline orderby" aria-label="<? esc_attr_e( 'Shop order', 'woocommerce' ); ?>">

		<? foreach ( $catalog_orderby_options as $id => $name ) { ?>
			<option value="<?= esc_attr( $id ); ?>" <? selected( $orderby, $id ); ?>>
				<?= esc_html( $name ); ?>
			</option>
		<? } ?>

	</select>

	<input type="hidden" name="paged" value="1" />

	<? wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>

</form>
