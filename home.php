<?php

    $pagetype='home';

    get_header();

    if( contents_access($post) ) {

        while ( have_posts() ) {

            the_post();

            echo get_post_field('post_content', $post->ID);

            $tags = get_the_tags();
            foreach ($tags as $tag)
            echo '<a class="tag_link badge" href="'. get_tag_link($tag->term_id) .'">'.$tag->term_name-'</a>';

            $categories = get_the_category();
            foreach ($categories as $cat)
            echo '<a class="category_link badge" href="'.get_cat_link($cat->term_id).'">'.$cat->term_name.'</a>';

        }
    }

    get_footer();

?>