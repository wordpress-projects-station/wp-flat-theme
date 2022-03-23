<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<div class="card"<? //comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

	<div id="comment-<?php comment_ID(); ?>" class="row comment_container">

		<div class="col-2">
			<? do_action( 'woocommerce_review_before', $comment ); ?>
		</div>
		
		<div class="col comment-text">

			<? 	
				do_action( 'woocommerce_review_before', $comment );
				do_action( 'woocommerce_review_before_comment_meta', $comment );
				do_action( 'woocommerce_review_meta', $comment );
				do_action( 'woocommerce_review_before_comment_text', $comment );
				do_action( 'woocommerce_review_comment_text', $comment );
				do_action( 'woocommerce_review_after_comment_text', $comment );
			?>

		</div>

	</div>
