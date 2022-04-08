<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<? global $post; ?>

<article>

    <!-- 
    ---- MAIN CONTENS BOX
    --->
    <main>

        <h2 class="h2">
            <?= $post->post_title ?>
        </h2>

        <? 
            if( $mods->header_banner_mode == 'in-body' )
            echo '<div style="height:40vh; '.get_banner_background(get_the_ID()).'"></div>';
        ?>

        <?= get_post_field('post_content', $post->ID); ?>

    </main>

    <!-- 
    ---- AUTHOR BOX
    --->

    <section class="mt-20 mb-20">

        <?

            $pa = $post->post_author;

            $display_name = get_the_author_meta( 'display_name', $pa ).' '.get_the_author_meta( 'display_surname', $pa );
            if ( empty( $display_name ) ) $display_name = get_the_author_meta( 'nickname', $pa );

            $user_avatar = get_avatar_url( get_the_author_meta('user_email'), $size = '200');
            if ( empty( $user_avatar ) || str_contains($user_avatar,'d=blank') ) $user_avatar = 'https://source.unsplash.com/200x200';

            $user_description = get_the_author_meta( 'user_description', $pa );
            $user_website = get_the_author_meta('url', $pa);
            $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $pa));

            $user_youtube = get_the_author_meta('youtube_link', $pa);
            $user_facebook = get_the_author_meta('facebook_link', $pa);
            $user_twitter = get_the_author_meta('twitter_link', $pa);
            $user_pinterest = get_the_author_meta('pinterest_link', $pa);
            $user_linkedin = get_the_author_meta('linkedin_link', $pa);
            $user_instagram = get_the_author_meta('instagram_link', $pa);
            $user_whatsapp = get_the_author_meta('whatsapp_link', $pa);
            $user_rss = get_the_author_meta('rss_url_link', $pa);

        ?>

        <div class="border rounded">

            <p class="h2 p-3" style="margin:0">
                <img class="rounded-circle" src="<?= $user_avatar?>" style="height:50px; aspect:1/1;" alt="..." />&nbsp; 
                <b><?= $display_name; ?></b>
            </p>
            <? if(!empty( $user_description )){?>
            <div class="border-top p-3">
                <p style="margin:0"><?= $user_description; ?></p>
            </div>
            <? } ?>
            <div class="border-top p-2">
                <a class="btn link" rel="follow" href="<?= $user_posts; ?>">BIO</a>&nbsp;⋮&nbsp; 
                <a class="btn link" rel="follow" href="<?= $user_website; ?>">WEBSITE</a>&nbsp;⋮&nbsp;
                <? if(!empty($user_youtube) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_youtube; ?>"><i class="bi bi-youtube"></i></a>
                <? if(!empty($user_facebook) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_facebook; ?>"><i class="bi bi-facebook"></i></a>
                <? if(!empty($user_twitter) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_twitter; ?>"><i class="bi bi-twitter"></i></a>
                <? if(!empty($user_pinterest) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_pinterest; ?>"><i class="bi bi-pinterest"></i></a>
                <? if(!empty($user_linkedin) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_linkedin; ?>"><i class="bi bi-linkedin"></i></a>
                <? if(!empty($user_instagram) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_instagram; ?>"><i class="bi bi-instagram"></i></a>
                <? if(!empty($user_whatsapp) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_whatsapp; ?>"><i class="bi bi-whatsapp"></i></a>
            </div>

        </div>

    </section>

    <!-- 
    ---- META BOX
    --->

    <section>

        <div class="mt-4 mb-4">
            <b>In date : <?= get_post_field('post_date', $post->ID); ?></b>&nbsp;&nbsp;<?$categories = get_the_category(); if($categories){ ?>⋮&nbsp;&nbsp;<b>Categories :&nbsp;&nbsp;</b> <? foreach ($categories as $cat) {echo '<span class="car"><a class="btn btn-outline-info btn-sm" href="'.get_category_link($cat->term_id).'"> '.$cat->name.' </a></span>&nbsp; ';}} $tags = get_the_tags(); if($tags) {?> &nbsp;&nbsp;⋮&nbsp;&nbsp;<b>Arguments :&nbsp;</b> <? foreach ($tags as $tag) {echo '<span class="category"><a class="btn btn-info btn-sm" href="'.get_tag_link($tag->term_id).'"> '.$tag->name.' </a></span>&nbsp; ';}}?>
        </div>

    </section>

    <!-- 
    ---- COMMENTS BOX
    --->

    <section>

        <h3>
            <?= ($post->comment_count>0) ? "{$post->comment_count} Commenti":null; ?>
        </h3>

        <ol class="list-unstyled border border-2 p-3">

            <? 

                $comments = get_comments([
                    'post_id' => $post->ID,
                    'status' => 'approve'
                ]);

                wp_list_comments( [
                    'style'      => 'ul',
                    'classes'   => 'list-unstyled pl-3',
                    'short_ping' => true,
                    'callback' => 'bootstrap_comments'
                ], $comments );

                // echo'<li>';

            ?>

        </ol>

        <? the_comments_navigation(); ?>

        <? if ( $post->comment_status == 'closed' ) { ?>

            <p class="no-comments">
                <? esc_html_e( 'Comments are closed.', 'msbdtcp' ); ?>
            </p>

        <? } else { ?>

            <? 
                $commenter = wp_get_current_commenter();

                $html_req  = " required='required'";
                $custom_fields = [
                    'author'    => '<div class="row mb-3 comment-input-wrap"><div class="col-sm-4 comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" placeholder="' . __("Name", "msbdtcp") . '" class="form-control"' . $html_req . '></div>',
                    'email'     => '<div class="col-sm-4 comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes" placeholder="' . __("Email", "msbdtcp") . '" class="form-control"' . $html_req . '></div>',
                    'url'       => '<div class="col-sm-4 comment-form-url"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="form-control" size="30" maxlength="200" placeholder="' . __("Website", "msbdtcp") . '"></div></div>',
                ];
                
                $args = [
                    'fields' => $custom_fields,
                    'comment_field' =>  '<div class="row mb-3"><div class="col comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="' . __("Comment", "msbdtcp") . '"></textarea></div></div>',
                    'class_submit'  => 'submit btn btn-primary'
                ];

                comment_form($args);
            ?>

        <? } ?>

    </section>

</article>

<!-- 
---- COMMENTS BOX
--->