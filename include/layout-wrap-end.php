

        </main>

        <?php 

            if( str_contains(get_theme_mod( $layout_target.'small_side_settings' ),'right') )
            echo '<aside class="'.(str_contains(get_theme_mod( 'small_side_settings'),'dynamic')?'col-1 d-none d-md-block d-lg-none d-xl-none':'col-1').'">'.dynamic_sidebar('page_side_small').'</aside>';
            if( str_contains(get_theme_mod( $layout_target.'big_side_settings' ),'right') )
            echo '<aside class="'.(str_contains(get_theme_mod( 'big_side_settings'),'dynamic')?'col-3 d-none d-lg-block':'col-3').'">'.dynamic_sidebar('page_side_big').'</aside>';

        ?>

    </div>

</div>