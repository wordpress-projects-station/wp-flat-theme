   
<? include_once __DIR__.'/header.php'; ?>

    <div class="contentsidebar col">

        <div class="row <?= $mods->site_reverse_layout ? 'pb-4':''; ?>">

            <?
                if( $mods->sidebar_small_position == 'left' )
                print_sidebar('sidebar_small');
            ?>

            <main class="col">

                <?
                    is_file($looptype['path'])
                        ? include_once $looptype['path']
                        : the_content();
                ?>

            </main>

            <?
                if( $mods->sidebar_small_position == 'right' )
                print_sidebar('sidebar_small');
            ?>

        </div>

    </div>
    
<? include __DIR__.'/footer.php'; ?>