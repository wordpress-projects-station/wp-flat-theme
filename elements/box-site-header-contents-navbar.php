<div class="mainnav" <? if( ! $mods->heading_status ) echo 'style="position:relative;"'; ?>>

    <div class="navwrap <?= $mods->top_menu_layout ? 'container' : 'wide'; ?> g-4">

        <nav class="navbar" role="navigation">

            <div>

                <button class="navbar-toggler d-sx-block d-sm-block d-md-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#mobile-toggle-menu"
                    aria-controls="mobile-toggle-menu" aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>

                <span class="p-3">

                    <?

                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if(has_custom_logo()){
                            echo $mods->custom_logo_flyout
                                    ? '<a class="navbar-brand" style="float:left; padding:0; width:'.$mods->custom_logo_ratio.'px; position:absolute;aspect-ratio:1;top:0;" href="<?= home_url();?>"><img style="height:100%;" src="'.esc_url( $logo[0] ).'" alt=" ... "></a>'
                                    : '<a class="navbar-brand" style="float:left; padding:0;" href="<?= home_url();?>"><img style="width:'.$mods->custom_logo_ratio.'px; aspect-ratio: 1; display:flex;" src="'.esc_url( $logo[0] ).'" alt=" ... "></a>';
                        }

                    ?>

                    <? if($mods->custom_logo_title || $mods->custom_logo_slogan) { ?>
                        <span class="titles" style="float:left; clear: right;  <?=  $mods->custom_logo_flyout ? 'position:relative; left:'.(intval($mods->custom_logo_ratio)+20).'px;' : 'transform: translate(0, -50%); top: 50%; position: absolute;'; ?>">
                            <?

                                if( $mods->custom_logo_title )
                                echo '<p class="m-0"><strong>'.$mods->custom_logo_title.'</strong></p>';

                                if( $mods->custom_logo_slogan )
                                echo '<p class="m-0">'.$mods->custom_logo_slogan.'</p>';

                            ?>
                        </span>
                    <?}?>
                </span>

            </div>

            <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block p-3">
                <div class="row <?= $mods->top_menu_row_type; ?>">

                    <?

                            wp_nav_menu([
                                'theme_location'  => 'desktop-site-menu',
                                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container'       => 'div',
                                'container_id'    => 'navbar_main_menu',
                                'container_class' => 'col '.$mods->top_menu_position,
                                'menu_class'      => 'desktop-links',
                                // 'add_a_class'     => 'text-white',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            ]);

                        ?>

                    <? if( $mods->top_menu_finder_status ) { ?>

                        <div class="col d-none d-sm-none d-md-block" style="max-width: 300px;">
                            <form class="form-inline my-2 my-lg-0" style="display:flex;gap:10px;" role="search"
                                method="get" id="searchform"
                                action="<?= get_bloginfo('url').'/search/'.get_search_query(); ?>">
                                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search"
                                    type="text" value="<?= get_search_query(); ?>" name="s" id="s" />
                                <button class="btn btn-primary my-2 my-sm-0" type="submit" id="searchsubmit"><i
                                        class="bi bi-search"></i></button>
                            </form>
                        </div>

                    <? } ?>

                </div>
            </div>

        </nav>

        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
            <?

                    $html = ob_start();

                    wp_nav_menu([
                        'theme_location'  => 'mobile-site-menu',
                        'depth'           => 2,
                        'container'       => 'div',
                        'container_id'    => 'mobile-toggle-menu',
                        'container_class' => 'mobile-links collapse'
                    ]);

                    $html = ob_get_clean();

                    $html = preg_replace('/<ul class="sub-menu">/', '', $html);
                    $html = preg_replace('/<\/ul>/', '', $html);
                    $html = preg_replace('/<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children (.*?)"><a href="#wrapper">(.*?)<\/a>/', '<li class="menu-separator"> <hr/> </li>', $html);

                    echo $html.'</ul>';

                ?>

        </div>

    </div>

</div>