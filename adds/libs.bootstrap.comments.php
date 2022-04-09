<? if( ! function_exists( 'bootstrap_comments' ) ){ function bootstrap_comments($comment, $args, $depth) { ?>

    <li <? comment_class(); ?> id="li-comment-<? comment_ID() ?>">

        <div class="comment row g-0 p-3 border">

            <?
                $avatarurl = get_profile_image($comment->user_id)?:get_avatar_url( $comment->user_id, 100 );
                if( empty( $avatarurl ) || str_contains($avatarurl,'d=blank') || str_contains($avatarurl,'s=96')  ) $avatarurl = 'https://source.unsplash.com/200x200';
            ?>

            <div class="rounded-circle" style="display: inline-block; vertical-align: middle; aspect-ratio:1/1; width:52px; height:52px; background: url(<?= $avatarurl;?>) center/cover;"></div>

            <div class="col pl-2">
                <div style="margin:0 0 0 20px;">

                    <p class="h5 m-0"><b><?= get_comment_author(); ?></b></p>
                    <p class="fs-7 m-0 mb-1"><?= $comment->comment_date ?></p>

                    <? if ($comment->comment_approved == '0') { ?>

                        <? esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?>

                    <? }else{ ?>

                        <p class="m-0"> 
                            <?= $comment->comment_content ?> <br>

                        </p>

                        <? 
                            ob_start();
                            comment_reply_link( array_merge( $args, [ 'depth' => $depth, 'max_depth' => $args['max_depth']]));
                            $html = ob_get_clean();

                            $html = str_replace( '<a', '<a class="text-decoration-none" rel="nofollow"', $html );
                            $html = str_replace( '>R', '><i class="bi bi-send-plus"></i> R', $html );

                            echo $html;

                        ?>

                    <?}?>

                </div>
            </div>
    
        </div>

<? }} ?>