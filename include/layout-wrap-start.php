<div class="container">

    <div class="row">

        <?php if ( is_active_sidebar('page_side_left') ){ ?>
        
            <aside class="col-1 d-none d-md-block">
                <?php dynamic_sidebar('page_side_left'); ?>
            </aside>

        <?php } ?>

        <main class="col col-sm">

            