<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) );

?>

<? if ( $heading ) { ?>
	<h3 class="fs-7"><i class="bi bi-info-square"></i>&nbsp;&nbsp;<?= esc_html( $heading ); ?></h3>
	<div class="mt-3 mb-3 border border-1 border-clear"></div>
<? } ?>

    
<? 

	// read all prorety >> echo'<code><pre>'; print_r($product); echo'</pre></code>';
	echo '<table class="table table-borderless"><tbody>';
	echo '<tr> <th width="250"> Stock quantity: </th><td>'.($product->stock_quantity?$product->stock_quantity:'not in stock').'</td><tr>';
	echo '<tr> <th width="250"> Downlodable: </th><td>'.($product->downloadable==true?'yes':'not virtual').'</td><tr>';
	echo '<tr> <th width="250"> Tag list: </th><td>';
	foreach ( $product->tag_ids as $t ) { 
		$tag=get_term($t);
		echo '<span class="tag"><a class="btn btn-primary btn-sm" href="'.home_url().'/search/?s='.$tag->name.'"> '.$tag->name.' </a></span>&nbsp; ';
	}
	echo '</td></tr></tbody></table>';
	echo '<div class="mt-3 mb-3 border border-1 border-clear"></div>';

	do_action( 'woocommerce_product_additional_information', $product );

?>
