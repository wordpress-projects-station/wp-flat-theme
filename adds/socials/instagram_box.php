<? 
    global $mods;

    $mods->instagram_box_status         = get_theme_mod( 'instagram_box_sets' );
    $mods->instagram_box_show_logo      = get_theme_mod( 'instagram_box_logo_sets' );
    $mods->instagram_box_page_name      = get_theme_mod( 'instagram_box_page_name_sets' );
    $mods->instagram_box_page_link      = get_theme_mod( 'instagram_box_profile_link_sets' );
    $mods->instagram_box_cover_image    = get_theme_mod( 'instagram_box_profile_cover_sets' );
    $mods->instagram_box_profile_image  = get_theme_mod( 'instagram_box_profile_image_sets' ); 

    if($mods->instagram_box_status){

?>

    <div class="card-instagram"  style="width:100%; position:relative">

        <div style="background: url(<?=$mods->instagram_box_cover_image?>) center/cover no-repeat;">

            <div style=" position:absolute; width:100%; height:100%; background-color: #00000054; "></div>

            <? if( $mods->instagram_box_show_logo ){ ?>

                <div style="padding:30px; z-index: 1; position: relative;">

                    <div class="text-center">
                        <img style="height:45px;" src="<?= get_stylesheet_directory_uri().'/adds/socials/instagram_logo.svg'; ?>"> <img style="height:45px;" src="<?= get_stylesheet_directory_uri().'/adds/socials/instagram_logo_text.svg'; ?>" >
                    </div>

                    <div class="text-center">
                        <small><?= print_theme_lang('socialbox','Discover many interesting pills in our official profile'); ?></small><br>
                        <a style="margin-top: 10px;" class="btn btn-primary" href="<?=$mods->instagram_box_page_link?>"><?= print_theme_lang('socialbox','IG official profile'); ?></a>
                    </div>

                </div>

            <? } else { ?>

                <div style="padding:30px; display: flex;flex-flow: row;gap: 20px; z-index: 1; position: relative;">

                    <div>
                        <div class="rounded" style="background: url(<?=$mods->instagram_box_profile_image?>) center/cover no-repeat; height: 70px; width: 70px; margin-top: 5px;"></div>
                    </div>

                    <div>
                        <h5><?= $mods->instagram_box_page_name; ?></h5>
                        <small><?= print_theme_lang('socialbox','Discover many interesting pills in our official profile'); ?></small><br>
                        <a style="margin-top: 10px;" class="btn btn-primary" href="<?=$mods->instagram_box_page_link?>"><?= print_theme_lang('socialbox','IG official profile'); ?></a>
                    </div>

                </div>

            <? } ?>

        </div>

    </div>

<?}?>