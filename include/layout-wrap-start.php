<div class="container">

    <div class="row">

        <?php 

            echo '<h2> PAGE TYPE: '.$pagetype.'</h2>';

            if( str_contains(get_theme_mod( $pagetype.'_small_side_settings' ),'left') )
            echo '<aside class="'.( str_contains( get_theme_mod( $pagetype.'_small_side_settings' ), 'dynamic') ?'col-1 d-none d-md-block d-lg-none d-xl-none':'col-1' ).'">'.dynamic_sidebar('page_side_small').'</aside>';

            if( str_contains(get_theme_mod( $pagetype.'_big_side_settings' ),'left') )
            echo '<aside class="'.( str_contains( get_theme_mod( $pagetype.'_big_side_settings' ), 'dynamic') ?'col-3 d-none d-lg-block':'col-3' ).'">'.dynamic_sidebar('page_side_big').'</aside>';

        ?>

        <main class="col">

            