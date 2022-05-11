<div class="mainnav" <? if( !$mods->top_menu_fixed_position && ! $mods->heading_status ) { echo 'style="position:relative;"'; } else if($mods->top_menu_fixed_position) { echo 'style="position: fixed; top: 0;"'; } ?>>

    <? if( $mods->top_site_warning ) { ?>

        <div class="bg-warning text-center">
            <p class="p-2 m-0">
                <?= $mods->top_site_warning; ?>
            </p>
        </div>

    <? } ?>

    <div class="navwrap <?= $mods->top_menu_layout ? 'container' : 'wide'; ?>">

        <?
            if($mods->top_menu_position == 'justify-content-center')
            $templatecols = '1fr auto 1fr;';
            
            elseif($mods->top_menu_position == 'justify-content-start')
            $templatecols = '1fr 1fr 8fr;';
            
            else
            $templatecols = '1fr;';
        ?>

        <nav role="navigation" style="position:relative; display: grid !important; align-items: center; grid-auto-flow: column; grid-template-columns: <?= $templatecols; ?>">

            <div class="d-flex justify-self-start" style="justify-self: start;">

                <button 
                    class="navbar-toggler d-sx-block d-sm-block d-md-block d-lg-none d-xl-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mobile-toggle-menu"
                    aria-controls="mobile-toggle-menu"
                    aria-expanded="false">

                    <i class="bi bi-list"></i>

                </button>

                <div style="display:flex; align-items:center; white-space:nowrap;">

                    <?

                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo $mods->custom_logo_flyout
                                    ? '<a class="navbar-brand" style="display:inline-flex; padding:0; width:'.$mods->custom_logo_ratio.'px; position:absolute;aspect-ratio:1;top:0;" href="<?= home_url();?>"><img style="height:100%;" src="'.esc_url( $logo[0] ).'" alt=" ... "></a>'
                                    : '<a class="navbar-brand" style="display:inline-flex; padding:0; width:'.$mods->custom_logo_ratio.'px;" href="<?= home_url();?>"><img style="width:'.$mods->custom_logo_ratio.'px; aspect-ratio: 1; display:flex;" src="'.esc_url( $logo[0] ).'" alt=" ... "></a>';
                        }

                    ?>

                    <? if($mods->custom_logo_title || $mods->custom_logo_slogan) { ?>

                        <div class="titles" style="margin-left: <?= has_custom_logo() && $mods->custom_logo_flyout ? (intval($mods->custom_logo_ratio)+15).'px' : ''; ?>">

                            <?

                                if( $mods->custom_logo_title )
                                echo '<p class="m-0"><strong>'.$mods->custom_logo_title.'</strong></p>';

                                if( $mods->custom_logo_slogan )
                                echo '<p class="m-0">'.$mods->custom_logo_slogan.'</p>';

                            ?>

                        </div>

                    <?}?>

                </div>

            </div>

            <?

                wp_nav_menu([
                    'theme_location'  => 'desktop-site-menu',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'div',
                    // 'style'           => $mods->top_menu_row_type,
                    'container_id'    => 'navbar_main_menu',
                    'container_class' => 'p-0 m-0 d-none d-sm-none d-md-none d-lg-grid d-xl-grid '.$mods->top_menu_position.' ', //$mods->top_menu_row_type
                    'menu_class'      => 'desktop-links',
                    // 'add_a_class'     => 'text-white',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ]);

            ?>

            <? if( $mods->top_menu_finder_status ) { ?>

                <div class="p-0 m-0 col d-none d-sm-none d-md-block justify-self-end" style="max-width: 300px; max-width: 300px; justify-self: end;">
                    <div class="ps-3">
                        <form class="form-inline pl-3" style=" display:flex; gap:10px;" role="search" method="get" id="searchform" action="<?= get_bloginfo('url').'/search/'.get_search_query(); ?>">

                            <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" value="<?= get_search_query(); ?>" name="s" id="s" />
                            <button class="btn btn-primary my-2 my-sm-0" type="submit" id="searchsubmit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>

            <? } ?>

            <? if( is_active_sidebar('langs-box') ) { ?>

                <div class="p-0 m-0 col" style="max-width: 100px; max-width: 100px; justify-self: end;">
                    <div class="ps-3 langs-box">
                        <? print_sidebar('langs-box'); ?>
                    </div>
                </div>

            <? } ?>

        </nav>

    </div>

    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none" >
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