
<header id="page-heading-standard bg-light">

    <nav class="navbar navbar-expand-lg navbar-light " role="navigation">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#">Navbar</a>

            <?php

                wp_nav_menu([

                    'theme_location'  => 'desktop-site-menu',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'bs-example-navbar-collapse-1',
                    'menu_class'      => 'navbar-nav mr-auto',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),

                ]);

                // original wp:
                // wp_nav_menu( [
                //    'theme_location' => 'desktop-site-menu',
                //    'menu_id' => 'primary-menu',
                //    'container_class'=> 'ms-auto ',
                //    'menu_class'=>'navbar-nav']
                // );

            ?>

            <form class="form-inline my-2 my-lg-0" style="display:flex;gap:10px;" role="search" method="get" id="searchform" action="<?php home_url( '/' ) ?>" >
                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" value="<?php get_search_query(); ?>" name="s" id="s" />
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchsubmit"><i class="bi bi-search"></i></button>
            </form>

        </div>
    </nav>

    <div id="page-heading-title">
        <div class="container">

            <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) echo '<img src="'.esc_url( $logo[0] ).'" alt=" ... ">';
            ?>
                <!-- <img src="<?php// echo the_custom_logo(); ?>" alt="..." > -->

            <h1>
                <?php
                    if( !empty(get_option('blogname')) ) echo get_option( 'blogname' ); else get_the_title();
                ?>
            </h1>

            <?php
                if( !empty(get_option( 'blogdescription' )) ) echo '<h2>'.get_option( 'blogdescription' ).'</h2>'; 
            ?>

        </div>
    </div>

</header>