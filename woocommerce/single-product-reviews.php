<? defined( 'ABSPATH' ) || exit; ?>

<?

	global $product;

	if ( ! comments_open() ) { return; }

	$with_rating = wc_review_ratings_enabled();
	$reviews_count = $product->get_review_count();

?>

<div id="reviews" class="woocommerce-Reviews">

	<div id="comments">

		<h3 class="fs-7">
			<i class="bi bi-chat-right-quote"></i>&nbsp;&nbsp;<? esc_html_e( 'Reviews', 'woocommerce' ); ?>
		</h3>

		<div class="mt-3 mb-3 border border-1 border-clear"></div>

		<? if ( have_comments() ) { ?>

			<p><i>
				<?
					/* translators: 1: reviews count 2: product name */
					$reviews_title = sprintf( '<span>'.esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $reviews_count, 'woocommerce' ) ).'</span>', esc_html( $reviews_count ), '<span>' . get_the_title() . '</span>' );
					echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $reviews_count, $product );
				?>
			</i></p>

			<div class="commentlist">

				<? wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>

			</div>
			<div class="mt-3 mb-3 border border-1 border-clear"></div>

			<?

				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
					echo '<nav class="woocommerce-pagination">';
					paginate_comments_links(
						apply_filters(
							'woocommerce_comment_pagination_args',
							[
								'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
								'next_text' => is_rtl() ? '&larr;' : '&rarr;',
								'type'      => 'list',
							]
						)
					);
					echo '</nav>';
				}

			?>

		<? }else{ ?>

			<p class="woocommerce-noreviews"><i><? esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></i></p>

		<? } ?>

	</div>

	<? if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) { ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?

					$commenter = wp_get_current_commenter();

					$comment_form = [

						/* translators: %s is product title */
						'title_reply'         => have_comments() ? '<b>'.esc_html__( 'Add a review', 'woocommerce' ).'</b><br>' : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), '<b>'.get_the_title().'</b>' ).'<hr>',

						/* translators: %s is product title */
						'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),

						'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
						'title_reply_after'   => '</span>',

						'comment_notes_after' => '',

						'label_submit'        => esc_html__( 'Submit', 'woocommerce' ),
						'class_submit' 		  => 'btn btn-outline-primary',

						'logged_in_as'        => '',
						'comment_field'       => '',

					];

					$name_email_required = (bool) get_option( 'require_name_email', 1 );
	
					$fields = [

						'author' => [
							'label'    => __( 'Name', 'woocommerce' ),
							'type'     => 'text',
							'value'    => $commenter['comment_author'],
							'class'	   => 'form-control',
							'required' => $name_email_required,
						],

						'email'  => [
							'label'    => __( 'Email', 'woocommerce' ),
							'type'     => 'email',
							'value'    => $commenter['comment_author_email'],
							'class'	   => 'form-control',
							'required' => $name_email_required,
						],

					];

					$comment_form['fields'] = [];

					foreach ( $fields as $key => $field ) {

						$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
						$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

						if ( $field['required'] )
						$field_html .= '&nbsp;<span class="required">*</span>';

						$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

						$comment_form['fields'][ $key ] = $field_html;

					}

					$account_page_url = wc_get_page_permalink( 'myaccount' );

					if ( $account_page_url ) {
						/* translators: %s opening and closing link tags respectively */
						$comment_form['must_log_in'] = '
							<p class="must-log-in">'
								.sprintf(
									esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ),
									'<a href="' . esc_url( $account_page_url ) . '">', '</a>'
								).
							'</p>';
					}

					if ( $with_rating ) {

						$comment_form['comment_field'] = 
						'
							<div class="rating-system">
								<label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label>
								<input type="hidden" name="rating" value="3" />
								<fieldset>
									<i class="bi bi-star-fill" data-textflag="'.esc_html__( 'Very poor', 'woocommerce' ).'"></i>
									<i class="bi bi-star-fill" data-textflag="'.esc_html__( 'Not that bad', 'woocommerce' ).'"></i>
									<i class="bi bi-star-fill" data-textflag="'.esc_html__( 'Average', 'woocommerce' ).'"></i>
									<i class="bi bi-star" data-textflag="'.esc_html__( 'Good', 'woocommerce' ).'"></i>
									<i class="bi bi-star" data-textflag="'.esc_html__( 'Perfect', 'woocommerce' ).'"></i>
								</fieldset>
							</div>
						';

					}

					$comment_form['comment_field'] .= '
						<p class="mt-2 comment-form-comment">
							<label for="comment">
								' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span>
							</label>
							<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" required></textarea>
						</p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );

				?>

			</div>
		</div>

		<script>
			document.addEventListener("DOMContentLoaded", ()=>{
				var rating = document.querySelectorAll('.rating-system')
				rating.forEach( rating => {
					var field = rating.querySelectorAll('input')[0],
						stars = rating.querySelectorAll('fieldset>i')
					stars.forEach( (star,i) => {
						star.onclick = () =>{
							field.setAttribute('value',i+1)
							stars.forEach( (s,n) => {
								n>i ? s.classList.replace('bi-star-fill','bi-star')
									: s.classList.replace('bi-star','bi-star-fill')
							})
						}
					})
				})

			})
		</script>

	<?php } else { ?>

		<p class="woocommerce-verification-required"><? esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php }; ?>

</div>
