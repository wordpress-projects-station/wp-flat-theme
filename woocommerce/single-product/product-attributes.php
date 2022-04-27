<? defined( 'ABSPATH' ) || exit; ?>

<? if ( ! $product_attributes ) { return; } ?>

<table class="table table-borderless">
	<? foreach ( $product_attributes as $product_attribute_key => $product_attribute ) { ?>
		<tr>
			<th width="250"><?= preg_replace('/<p>/', '<p class="m-0">asdasd', wp_kses_post( $product_attribute['label'] )); ?></th>
			<td><?= preg_replace('/<p>/', '<p class="m-0">', wp_kses_post( $product_attribute['value'] )); ?></td>
		</tr>
	<? } ?>
</table>
