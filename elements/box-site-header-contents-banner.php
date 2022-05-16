<? if( $mods->titles_position == 'in-head' ) { ?>

    <div style=" background:rgba(0,0,0,.5); width:100%; height:inherit; display:grid; align-items:center; padding-top:4vh; ">

        <div class="text-white text-center">

            <?

                if( $mods->title_status ) {

                    if(is_tax('product_cat'))
                    $title = single_cat_title('', false);

                    else
                    $title = get_the_title($page_id)?:get_the_title(); //$wp_query->get_queried_object()->name;

                    if($title)
                    echo '<h1>'.$title.'</h1>';

                    elseif( !$title && ! empty(get_option('blogname')) )
                    echo '<h1>'.get_option( 'blogname' ).'</h1>';


                }
                
                if( $mods->subtitle_supported && $mods->subtitle_status && get_post_meta( $post->ID, 'subtitle_key', true)) {

                    echo get_post_meta( $post->ID, 'subtitle_key', true);

                }

                $target_excerpt = get_post_type() === 'post' ? '' : $page_id;
                if( $mods->excerpt_status && strlen(get_the_excerpt($target_excerpt)) ) {

                    echo '<p style="max-width:450px;margin:0 auto;">'.the_excerpt($target_excerpt).'</p>';

                }
            
            ?>

        </div>

    </div>

<? } ?>