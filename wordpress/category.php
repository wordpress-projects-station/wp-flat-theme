<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<?

    $queryed = the_search_query();
    if(!$queryed) $queryed = basename($_SERVER['REQUEST_URI']);

?>

<div class="mb-5 border-bottom border-dark">

    <? if ( is_category() ) { ?>
        
        <p class="h1">Posts in archive : <b><?=$queryed?></b></p>
            
    <? } else  { ?> 

        <p class="h1">All in Blog</p>

    <? } ?>

</div>

<?

    if(is_category()){

        $category = get_queried_object();

        $args = array('child_of' => $category->term_id);
        $categories = get_categories( $args );

        if(count($categories)){

            ?><h3 class="mt-2 mt-3">All sub categories:</h3><?

            ?><div class="row"><?

                foreach($categories as $subcategory) {
                    ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-4">
                            <?= '<a class="border border-2 border-secondary p-2" href="'.get_category_link( $subcategory->term_id ).'" title="' . sprintf( __( "View all posts in %s" ), $subcategory->name ) . '" ' . '>' . $subcategory->name.'</a>';?>
                        </div>
                    <?

                }

            ?></div><?

            ?><hr class="mt-2 mb-2"><?
        }

    }


?>

<div class="row">

    <? if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

        <? if ( ! post_password_required() ) { ?>

            <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                <div class="archivie-post card mx-auto">

                    <div style="height:200px; <?= get_banner_background(get_the_ID()); ?>"></div>

                    <div class="card-body">

                        <h2 class="card-title"><? the_title();?></h2>
                        <p class="card-date"><? get_the_date();?></p>
                        <div class="card-text" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                            <p><? the_excerpt();?></p>
                        </div>
                        <a class="btn card-link" href="<? the_permalink();?>">Read now ...</a>

                    </div>

                </div>

            </div>

        <? } else { include __DIR__.'contents/not-accessible.php'; } ?>

    <? } } else { include __DIR__.'contents/not-in-database.php'; } ?>

</div>

<? //loop_pagination($wp_query); ?>
