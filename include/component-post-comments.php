<h3><?php echo ($post->comment_count>0) ? "{$post->comment_count} Comments" : "Very first comment";; ?></h3>

<ol>


    <?php 
        $comments = get_comments(array(
            'post_id' => $post->ID,
            'status' => 'approve'
        ));   
        wp_list_comments( array(
            'style'      => 'ul',
            'short_ping' => true,
            'callback' => 'bootstrap_comments'
        ),$comments );
    ?>

    
    </li>
</ol>

<?php the_comments_navigation(); ?>

<?php if ( $post->comment_status == 'closed' ) { ?>

    <p class="no-comments">
        <?php esc_html_e( 'Comments are closed.', 'msbdtcp' ); ?>
    </p>

<?php } else { ?>

    <?php 
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

<?php } ?>