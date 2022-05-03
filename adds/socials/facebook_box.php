<div class="card-facebook"  style="width:100%; position:relative">

    <? 
        $mods->facebook_fanpage_name = "Wordpress style";
        $mods->facebook_fanpage_link = "https://www.facebook.com/wordpress";
        $mods->facebook_cover_image = "https://scontent.fcia4-1.fna.fbcdn.net/v/t39.30808-6/275887836_10159764773607911_7325178757313942414_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=9267fe&_nc_ohc=cd-4kLpC8uwAX8gWNLX&_nc_ht=scontent.fcia4-1.fna&oh=00_AT92iqhhE7o0n_71EWAHitsNkUTo98c38EH4gH8EG0sNrA&oe=627410B3" ; 
        $mods->facebook_profile_image = "https://scontent.fcia4-1.fna.fbcdn.net/v/t39.30808-6/277104047_10159779877892911_3343161103863770986_n.jpg?_nc_cat=101&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=eShQtyx_abEAX-8bAAM&_nc_ht=scontent.fcia4-1.fna&oh=00_AT-ulH8YyTMV0Dg0MFmtG9EKQcp0898QoKwMStWZXPSCmw&oe=6275C0C9" ; 
    ?>

    <div style="background: url(<?=$mods->facebook_cover_image?>) center/cover no-repeat;">

        <div style=" position:absolute; width:100%; height:100%; background-color: #00000054; "></div>

        <div style="padding:30px;display: flex;flex-flow: row;gap: 20px; z-index: 1; position: relative;">

            <div>
                <div class="rounded" style="background: url(<?=$mods->facebook_profile_image?>) center/cover no-repeat; height: 70px; width: 70px; margin-top: 5px;"></div>
            </div>
            <div>
                <h5><?= $mods->facebook_fanpage_name; ?></h5>
                <small>Resta connesso con tutti noi nella community ufficile in facebook</small>
                <a style="margin-top: 10px;" class="btn btn-primary" href="<?=$mods->facebook_fanpage_link?>">Segui ora la nostra fanpage</a>
            </div>

        </div>

    </div>

</div>