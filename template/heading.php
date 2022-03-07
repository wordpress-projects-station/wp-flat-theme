<? 
    print get_theme_mod( 'site_debug_line_settings' ) && isset( $wp_customize ) ? '<p style="background:#8b8b8b;font-size:10px;margin:0;padding:2px 5px;">you are in : <b>'.basename($template).'</b> / option type : <b>'.$pagetype.'</b> / type post data: <b>'.get_post_type().'</b>  / ...</p></div>':null;
?>

<? if (get_theme_mod( 'site_warning_status_settings' )){ ?>
    <div class="bg-warning text-center">
        <p class="p-2 m-0"><?= get_theme_mod( 'site_warning_message_settings' ); ?></p>
    </div>
<? } ?>

<header class="bg-light">

    <?

        // top menu options

        $topmenu_status_settings = get_theme_mod( 'topmenu_status_settings' );
        $topmenu_status   = $topmenu_status_settings == 'true' ? true : false;

        $topmenu_search_settings = get_theme_mod( 'topmenu_search_settings' );
        $topmenu_searcher = $topmenu_search_settings=='true' ? true : false;

        $topmenu_layout_settings = get_theme_mod( 'topmenu_layout_settings' );
        $topmenu_layout   = $topmenu_layout_settings=='relative' ? false : $topmenu_layout_settings;

        $topmenu_alignment_settings = get_theme_mod( 'topmenu_alignment_settings' );
        $topmenu_widerow = $topmenu_alignment_settings=='left' || $topmenu_alignment_settings=='center' ? 'style="width:100%"':'';
        if($topmenu_alignment_settings=='right')          $justifycontentmenu = "justify-content-end";
        elseif($topmenu_alignment_settings=='center')     $justifycontentmenu = "justify-content-center";
        else                                              $justifycontentmenu = "justify-content-start";

        $header_style_settings = get_theme_mod( $pagetype.'_header_style_settings');
        $heading_status = str_contains( $header_style_settings,'off' ) ? false : true;
        $heading_frame  = str_contains( $header_style_settings,'framed' ) ? 'container' : '';
        $heading_size   = str_contains( $header_style_settings,'big' ) ? 'height:33vh;' : '';

        $header_banner_settings = get_theme_mod( $pagetype.'_banner_settings' );
        $heading_banner = str_contains( $header_banner_settings ,'in-head' ) ? true : false;

    ?>

    <div class="navbar navbar-expand-lg bg-dark" role="navigation">

        <div class="<?= !$topmenu_layout ? $heading_frame : $topmenu_layout!='framed' ?: 'container'; ?>" style="display:flex;justify-content:space-between;width:100%;padding:0 15px;">

            <button class="navbar-toggler bg-light rounded-3" type="button" data-toggle="collapse" data-target="#navbar_collapse_main_menu" aria-controls="navbar_collapse_main_menu" aria-expanded="false">
                <span class="navbar-toggler-icon">
                    <i class="bi bi-list"></i>
                </span>
            </button>

            <a class="navbar-brand" href="<?= home_url();?>">HELLO!</a>

            <div class="row" <?= $topmenu_widerow; ?>>

                <div class="col">
                    <nav>
                        <?

                            // original wp:
                            // wp_nav_menu( [
                            //    'theme_location' => 'desktop-site-menu',
                            //    'menu_id' => 'primary-menu',
                            //    'container_class'=> 'ms-auto ',
                            //    'menu_class'=>'navbar-nav']
                            // );

                            //bootstrap
                            wp_nav_menu([

                                'theme_location'  => 'desktop-site-menu',
                                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container'       => 'div',
                                'container_class' => 'collapse navbar-collapse '.$justifycontentmenu,
                                'container_id'    => 'navbar_collapse_main_menu',
                                'menu_class'      => 'navbar-nav mr-auto',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),

                            ]);

                        ?>
                    </nav>
                </div>

                <? if( $topmenu_searcher ) { ?>

                    <div class="col d-none d-sm-none d-md-block" style="max-width: 300px;">
                        <form class="form-inline my-2 my-lg-0" style="display:flex;gap:10px;" role="search" method="get" id="searchform" action="<?= get_bloginfo('url').'/search/'.get_search_query(); ?>" >
                            <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" value="<?= get_search_query(); ?>" name="s" id="s" />
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchsubmit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>

                <? } ?> 

            </div>

        </div>
    </div>

    <? if($heading_status) { ?>

        <? if($heading_banner){ $banner = ' background: url('. ( get_the_post_thumbnail_url( get_the_ID() ) ?: bloginfo("template_directory").'/adds/404IMAGE.PNG').') center/cover; '; } ?>
        

        <div class="bg-light" id="page-heading-title">
            <div style="<?= $heading_size.''.$banner; ?>">
                <div class="<?= $heading_frame; ?>">

                    <? 
                        $logo = wp_get_attachment_image_src( get_theme_mod( 'custom-logo' ) , 'full' );
                        has_custom_logo() ? print '<img src="'.esc_url( $logo[0] ).'" alt=" ... ">':null;
                    ?>

                    <h1>
                        <?= ! empty(get_option('blogname')) ? get_option( 'blogname' ) : get_the_title() ?>
                    </h1>

                    <?= ! empty(get_option( 'blogdescription' )) ? '<h2>'.get_option( 'blogdescription' ).'</h2>':null; ?>

                </div>
            </div>
        </div>

    <? } ?>

</header>