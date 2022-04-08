<? if( ! function_exists( 'bootstrap_comments' ) ){ function bootstrap_comments($comment, $args, $depth) { ?>
    <li <? comment_class(); ?> id="li-comment-<? comment_ID() ?>">
        <div class="comment">
            <div class="img-thumbnail d-none d-sm-block">
                <?= get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
            </div>
            <div class="comment-block">
                <div class="comment-arrow"></div>
                    <? if ($comment->comment_approved == '0') : ?>
                        <em><? esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?></em>
                        <br />
                    <? endif; ?>
                    <span class="comment-by">
                        <strong><?= get_comment_author() ?></strong>
                        <span class="float-right">
                            <span> <a href="#"><i class="fa fa-reply"></i> <? comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></span>
                        </span>
                    </span>
                <p> <? comment_text() ?></p>
                <span class="date float-right"><? printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , '5balloons_theme'), get_comment_date(),  get_comment_time()) ?></span>
            </div>
        </div>
<? }} ?>