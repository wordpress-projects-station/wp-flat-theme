<? if( $mods->titles_position=='in-body' || $mods->header_banner_mode == 'in-body' ) { ?>

    <div class="col-12">

        <?

            $page_id = is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();
            $css_banner = get_banner_background( $page_id );

            if( $mods->titles_position=='in-body' ) {

                if( $mods->title_status ) {

                    $title =  get_the_title($page_id)?:get_the_title(); //$wp_query->get_queried_object()->name;

                    if($title)
                    echo '<h1>'.$title.'</h1>';

                    elseif( !empty(get_option('blogname')) )
                    echo '<h1>'.get_option( 'blogname' ).'</h1>';

                }

                if( $mods->subtitle_status && function_exists( 'get_the_subtitle' ) ) {

                    $subtitle = get_the_subtitle($page_id);
                    echo strlen($subtitle) ? '<h2 class="mt-2 mb-2 fs-4">'.$subtitle.'</h2>' : null;

                }

                if( $mods->excerpt_status && strlen(get_the_excerpt($page_id)) ) {

                    echo '<p class="m-0">'.get_the_excerpt($page_id).'</p>';

                }

                echo '<div class="py-3"><hr></div>';

            }

            if( $mods->header_banner_mode == 'in-body' ) {

                echo '<div style="height:33vh; width:100%; '. ($mods->header_banner_mode == 'in-body' ? $css_banner : null ) . '"></div>';
                echo '<div class="py-3"><hr></div>';

            }

        ?>

    </div>

<? } ?>