<? if( $mods->titles_position == 'in-head' ) { ?>

    <div style=" background:rgba(0,0,0,.5); width:100%; height:inherit; display:grid; align-items:center; padding-top:4vh; ">

        <div class="text-white text-center">

            <?

                if( $mods->title_status ) {

                    $title =  get_the_title($page_id)?:get_the_title(); //$wp_query->get_queried_object()->name;

                    if($title)
                    echo '<h1>'.$title.'</h1>';

                    elseif( !empty(get_option('blogname')) )
                    echo '<h1>'.get_option( 'blogname' ).'</h1>';


                }

                if( $mods->subtitle_status && function_exists( 'get_the_subtitle' ) ) {

                    $subtitle = get_the_subtitle($page_id);
                    echo strlen($subtitle) ? '<h3 class="mt-2 mb-2 fs-4">'.$subtitle.'</h3>' : null;

                }

                if( $mods->excerpt_status && strlen(get_the_excerpt($page_id)) ) {

                    echo '<p style="max-width:450px;margin:0 auto;">'.get_the_excerpt($page_id).'</p>';

                }
            
            ?>

        </div>

    </div>

    <? } ?>