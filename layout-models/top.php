<div class="bg-light">

    <? if( $mods->top_menu_status ) { ?>

        <nav class="navbar navbar-expand-lg bg-dark" role="navigation">

            <div class="<?= ($mods->top_menu_layout == 'framed' ? 'container' : 'wide'); ?>" style="display:flex;justify-content:space-between;width:100%;padding:0 15px;">

                <button class="navbar-toggler bg-light rounded-3" type="button" data-toggle="collapse" data-target="#navbar_collapse_main_menu" aria-controls="navbar_collapse_main_menu" aria-expanded="false">
                    <span class="navbar-toggler-icon">
                        <i class="bi bi-list"></i>
                    </span>
                </button>

                <a class="navbar-brand" href="<?= home_url();?>">HELLO!</a>

                <div class="row" <?= $mods->top_menu_row_type; ?>>

                    <div class="col">
                        <div>
                            <?

                                // original wp:
                                // wp_nav_menu( [
                                //    'theme_location' => 'desktop-site-menu',
                                //    'menu_id' => 'primary-menu',
                                //    'container_class'=> 'ms-auto ',
                                //    'menu_class'=>'navbar-nav']
                                // );

                                wp_nav_menu([
                                    'theme_location'  => 'desktop-site-menu',
                                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                    'container'       => 'nav',
                                    'container_class' => 'collapse navbar-collapse '.$mods->top_menu_position,
                                    'container_id'    => 'navbar_collapse_main_menu',
                                    'menu_class'      => 'navbar-nav mr-auto',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                ]);

                            ?>
                        </div>
                    </div>

                    <? if( $mods->top_finder_status ) { ?>

                        <div class="col d-none d-sm-none d-md-block" style="max-width: 300px;">
                            <form class="form-inline my-2 my-lg-0" style="display:flex;gap:10px;" role="search" method="get" id="searchform" action="<?= get_bloginfo('url').'/search/'.get_search_query(); ?>" >
                                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" value="<?= get_search_query(); ?>" name="s" id="s" />
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchsubmit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>

                    <? } ?> 

                </div>

            </div>

        </nav>
    <? } ?>


    <? if( $mods->heading_status ) { ?>

        <? 
            if( $mods->header_banner_mode == 'in-head' )
            $banner = get_banner_background(get_the_ID());
        ?>
        
        <div class="bg-light" id="page-heading-title">
            <div style="<?= $mods->heading_size.' '.$banner; ?>">
                <div class="<?= $mods->heading_frame; ?>">

                    <?
                        $logo = wp_get_attachment_image_src( $mods->custom_site_logo , 'full' );
                        echo $logo /*has_custom_logo()*/ ? '<img src="'.esc_url( $logo[0] ).'" alt=" ... ">':null;
                    ?>

                    <h1>
                        <?= ! empty(get_option('blogname')) ? get_option( 'blogname' ) : get_the_title() ?>
                    </h1>

                    <?= ! empty(get_option( 'blogdescription' )) ? '<h2>'.get_option( 'blogdescription' ).'</h2>':null; ?>

                </div>
            </div>
        </div>

    <? } ?>

</div>