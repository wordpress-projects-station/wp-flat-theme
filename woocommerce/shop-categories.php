<? if ( ! defined( 'ABSPATH' ) ) exit; ?>

<? bootsrapped_breadcrumb(); ?>

<hr class="mb-5">

<div class="row">

<?

    // pagination of terms : https://github.com/understrap/understrap/issues/610#issuecomment-375925026

    $paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $per_page       = 6;
    $offset         = ($per_page * $paged) - $per_page ;
    $allelements    = wp_count_terms( 'product_cat', ['hide_empty' => true] ); 
    $totalpages     = ceil( $allelements / $per_page );

    $categories = get_terms(
        'product_cat',
        [
            'orderby' => 'id',
            'order' => 'DESC',
            'hide_empty' => true,
            'number' => $per_page,
            'offset' => $offset,
        ]
    );
    
    // if your first category is main category:
    // foreach( $categories as $category ) $category->parent==0 ? $shopid = $category->term_id : null ;
    // and set if: $category->parent!=0

    foreach( $categories as $category ){

        if( $category->parent==0 && $category->name!='Uncategorized' ) {
            
            $link = get_category_link($category->term_id);
            $title = $category->name;
            $excerpt = isset($category->short_description)? $category->short_description : substr($category->description,0,150);
            $banner = get_banner_background($category->image_id);
            
            ?>

                <div class="category-box col-md-4 col-sm-6 col-xs-12 mb-4">

                	<? include get_stylesheet_directory().'/elements/box-contents.php' ?>

                </div>
            <?
        }
    }

    if($totalpages>1){

        $pages = paginate_links( [
            'base'      => str_replace( 999, '%#%', esc_url( get_pagenum_link( 999 ) ) ),
            'total'     => $totalpages,
            'current'   => max( 1, get_query_var('paged') ),
            'format'    => '?paged=%#%',
            'type'      => 'array',
        ] );

        if( is_array( $pages ) ) {

            echo '<div class="d-flex justify-content-center"><nav aria-label="Page navigation"><ul class="pagination">';

            foreach ( $pages as $page )
            echo '<li class="page-item">'.preg_replace('/page-numbers/','page-numbers page-link',$page).'</li>';

            echo '</ul></nav></div>';
        }

    }

?>

</div>
