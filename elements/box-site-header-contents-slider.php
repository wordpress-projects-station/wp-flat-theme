<?

    $page_id = is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();

    $css_banner ='';
    if( $mods->header_banner_mode == 'in-head' )
    $css_banner = get_banner_background( $page_id );

?>

<div <?= $mods->header_banner_frame ? 'class="container p-0" style="height:inherit; width:100%; '.$css_banner.'"':'style="height:inherit; width:100%;"'; ?>>

<div style=" background:rgba(0,0,0,.5); width:100%; height:inherit;">

    <div id="home_carousel" class="home_carousel carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            
            <button
                type="button"
                data-bs-target="#home_carousel" data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1">
            </button>
            
            <button
                type="button"
                data-bs-target="#home_carousel"
                data-bs-slide-to="1"
                aria-label="Slide 2">
            </button>
            
            <button
                type="button"
                data-bs-target="#home_carousel"
                data-bs-slide-to="2"
                aria-label="Slide 3">
            </button>

        </div>

        <div class="carousel-inner">

        <div class="carousel-item active" style="background:url(https://source.unsplash.com/random/900×1100) center/cover no-repeat;">
                
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>

            </div>

            <div class="carousel-item" style="background:url(https://source.unsplash.com/random/950×1000) center/cover no-repeat;">

                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>

            </div>

            <div class="carousel-item" style="background:url(https://source.unsplash.com/random/920×1110) center/cover no-repeat;">

                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>

            </div>

        </div>

        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#home_carousel"
            data-bs-slide="prev">

                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>

        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#home_carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>

</div>
