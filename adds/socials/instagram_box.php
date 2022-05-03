<div class="card-instagram"  style="width:100%; position:relative">

    <? 
        $mods->instagram_page_name = "Wordpress Group";
        $mods->instagram_page_link = "https://www.instagram.com/wordpress";
        $mods->instagram_cover_image = "https://images.pexels.com/photos/2693212/pexels-photo-2693212.png?auto=compress&cs=tinysrgb&dpr=1&h=512" ; 
        $mods->instagram_profile_image = "https://png.pngtree.com/element_our/md/20180626/md_5b321ca31d522.png" ; 
        $mods->instagram_show_logo = true;
    ?>

    <div style="background: url(<?=$mods->instagram_cover_image?>) center/cover no-repeat;">

        <div style=" position:absolute; width:100%; height:100%; background-color: #00000054; "></div>

        <? if( !$mods->instagram_show_logo ){ ?>

            <div style="padding:30px; display: flex;flex-flow: row;gap: 20px; z-index: 1; position: relative;">

                <div>
                    <div class="rounded" style="background: url(<?=$mods->instagram_profile_image?>) center/cover no-repeat; height: 70px; width: 70px; margin-top: 5px;"></div>
                </div>

                <div>
                    <h5><?= $mods->instagram_page_name; ?></h5>
                    <small>Scopri tante pillole interessanti nel nostro profilo ufficiale</small><br>
                    <a style="margin-top: 10px;" class="btn btn-primary" href="<?=$mods->instagram_page_link?>">Seguici su instagram</a>
                </div>

            </div>

        <? } else { ?>

            <div style="padding:30px; z-index: 1; position: relative;">

                <div  class="text-center">
                    <img style="height:45px;" src="<?= get_stylesheet_directory_uri().'/adds/socials/Instagram_logo_2016.svg'; ?>" > <img style="height:55px;" src="<?= get_stylesheet_directory_uri().'/adds/socials/Instagram_logo_text.svg'; ?>" >
                </div>

                <div class="text-center">
                    <small>Scopri tante pillole interessanti nel nostro profilo ufficiale</small><br>
                    <a style="margin-top: 10px;" class="btn btn-primary" href="<?=$mods->instagram_page_link?>">Seguici su instagram</a>
                </div>

            </div>

        <? } ?>

    </div>

</div>