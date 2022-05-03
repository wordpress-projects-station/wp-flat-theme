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

            ?><div class="row g-4"><?

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

    <? 
        if ( have_posts() ) { while ( have_posts() ) { the_post();
        
        $link       = get_the_permalink(get_the_ID());
        $banner     = get_banner_background(get_the_ID());
        $title      = get_the_title();
        $date       = get_the_date();
        $excerpt    = get_the_excerpt();

    ?>

        <? if ( ! post_password_required() ) { ?>

            <div class="col-xs-12 col-sm-6 col-md-4 mb-4">

                <? include get_template_directory().'/elements/box-contents.php' ?>

            </div>

        <? } else { include get_template_directory().'/elements/box-not-accessible.php'; } ?>

    <? } } else { include get_template_directory().'/elements/box-not-in-database.php'; } ?>

</div>

<? //loop_pagination($wp_query); ?>
