<? if( $mods->titles_position=='in-body' || $mods->header_banner_mode == 'in-body' ) { ?>

    <header class="col-12">

        <?

            $page_id = is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();
            $css_banner = get_banner_background( $page_id );

            if( $mods->titles_position=='in-body' ) {

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

                    echo '<h2 class="mt-2 mb-2 fs-4">'.get_post_meta( $post->ID, 'subtitle_key', true).'</h2>';

                }

                $target_excerpt = get_post_type() === 'post' ? '' : $page_id;
                if( $mods->excerpt_status && strlen(get_the_excerpt($target_excerpt)) ) {

                    echo '<p class="m-0">'.the_excerpt($target_excerpt).'</p>';

                }

                echo '<div class="py-3"><hr></div>';

            }

            if( $mods->header_banner_mode == 'in-body' ) {

                echo '<div style="height:33vh; width:100%; '. ($mods->header_banner_mode == 'in-body' ? $css_banner : null ) . '"></div>';
                echo '<div class="py-3"><hr></div>';

            }

        ?>

    </header>

<? } ?>