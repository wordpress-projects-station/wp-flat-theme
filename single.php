<?php get_header();?>

<h3>SINGLE.PHP</h3>

<?php get_template_part('include/component','contents-before'); ?>

    <?php if ( have_posts() ) { $postid = get_the_ID(); ?>


        <h2 class="h2"><?php echo get_post_field('post_title', $postid); ?></h2>

        <?php $bkgUrl = get_the_post_thumbnail_url( $postid ); ?>
        <?php if($bkgUrl!=''){ ?>
            <div style="height:40vh; background: url(<?php echo $bkgUrl;?>) center/cover;"></div>
        <?php } else { ?>
            <div style="height:40vh; background: url(<?php bloginfo('template_directory'); ?>/adds/404IMAGE.PNG) center/cover;"></div>
        <?php } ?>

        <?php echo get_post_field('post_content', $postid); ?>

        <hr>

        <div class="mt-4 mb-4">
            <b>In date : <?php echo get_post_field('post_date', $postid); ?></b>  &nbsp;&nbsp;⋮&nbsp;&nbsp;<b>Categories :&nbsp;&nbsp;</b> <?php $categories = get_the_category(); foreach ($categories as $cat) {echo '<span class="car"><a class="btn btn-outline-info btn-sm" href="'.get_category_link($cat->term_id).'"> '.$cat->name.' </a></span>&nbsp; ';}?> &nbsp;&nbsp;⋮&nbsp;&nbsp;<b>Arguments :&nbsp;</b> <?php $tags = get_the_tags(); foreach ($tags as $tag) {echo '<span class="category"><a class="btn btn-info btn-sm" href="'.get_tag_link($tag->term_id).'"> '.$tag->name.' </a></span>&nbsp; ';}?>
        </div>

        <hr>

        <div class="mt-20 mb-20">

            <?php

                $a = $post->post_author;

                $display_name = get_the_author_meta( 'display_name', $a ).' '.get_the_author_meta( 'display_surname', $a );
                if ( empty( $display_name ) ) $display_name = get_the_author_meta( 'nickname', $a );

                $user_avatar = get_avatar_url( get_the_author_meta('user_email'), $size = '200');
                if ( empty( $user_avatar ) ) $user_avatar = 'https://source.unsplash.com/200x200';

                $user_description = get_the_author_meta( 'user_description', $a );
                $user_website = get_the_author_meta('url', $a);
                $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $a));

                $user_youtube = get_the_author_meta('youtube_link', $a);
                $user_facebook = get_the_author_meta('facebook_link', $a);
                $user_twitter = get_the_author_meta('twitter_link', $a);
                $user_pinterest = get_the_author_meta('pinterest_link', $a);
                $user_linkedin = get_the_author_meta('linkedin_link', $a);
                $user_instagram = get_the_author_meta('instagram_link', $a);
                $user_whatsapp = get_the_author_meta('whatsapp_link', $a);
                $user_rss = get_the_author_meta('rss_url_link', $a);

            ?>

            <div class="border rounded">

                <p class="h2 p-3" style="margin:0">
                    <img class="rounded-circle" src="<?php echo $user_avatar?>" style="height:50px; aspect:1/1;" alt="..." />&nbsp; 
                    <b><?php echo $display_name; ?></b>
                </p>
                <?php if(!empty( $user_description )){?>
                <div class="border-top p-3">
                    <p style="margin:0"><?php echo $user_description; ?></p>
                </div>
                <?php } ?>
                <div class="border-top p-2">
                    <a class="btn link" rel="follow" href="<?php echo $user_posts; ?>">BIO</a>&nbsp;⋮&nbsp; 
                    <a class="btn link" rel="follow" href="<?php echo $user_website; ?>">WEBSITE</a>&nbsp;⋮&nbsp;
                    <?php if(!empty($user_youtube) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?php echo $user_youtube; ?>"><i class="bi bi-youtube"></i></a>
                    <?php if(!empty($user_facebook) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?php echo $user_facebook; ?>"><i class="bi bi-facebook"></i></a>
                    <?php if(!empty($user_twitter) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?php echo $user_twitter; ?>"><i class="bi bi-twitter"></i></a>
                    <?php if(!empty($user_pinterest) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?php echo $user_pinterest; ?>"><i class="bi bi-pinterest"></i></a>
                    <?php if(!empty($user_linkedin) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?php echo $user_linkedin; ?>"><i class="bi bi-linkedin"></i></a>
                    <?php if(!empty($user_instagram) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?php echo $user_instagram; ?>"><i class="bi bi-instagram"></i></a>
                    <?php if(!empty($user_whatsapp) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?php echo $user_whatsapp; ?>"><i class="bi bi-whatsapp"></i></a>
                </div>
    
            </div>

        </div>


    <?php } else { ?>

        <p><?php esc_html_e( 'Sorry, no posts finded.' ); ?></p>

    <?php } ?>

<?php get_template_part('include/component','contents-after'); ?>


<?php get_footer();?>