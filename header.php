<?

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    wc_print_notices();

?>

<? global $mods; ?>

<!DOCTYPE html>
<html lang="it">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">

        <title>

            <? 
                $titles = explode(',', get_option( 'blogname' ).','.get_the_title());
                echo implode(' : ',$titles);
            ?>
            
        </title>

        <meta name="description" content="<?= get_bloginfo( 'description' ); ?>" />
        <meta name="keywords" content="<?= generateKeywords(); ?>">

        <? if(!has_site_icon()){ ?>

            <link rel="apple-touch-icon" href="<?= get_template_directory_uri(); ?>/favicon.png">
            <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri().'/favicon.png'; ?>" />

        <? } else { ?>

            <link rel="apple-touch-icon" href="<?= wp_get_attachment_image_url(get_option('site_icon'),'full'); ?>">
            <link rel="shortcut icon" type="image/x-icon" href="<?= wp_get_attachment_image_url(get_option('site_icon'),'full'); ?>" />

        <? } ?>

        <? wp_head(); ?>
    
    </head>

    <body>

        <? if( $mods->debug_notices ) { ?>
            <div class="fixed-bottom m-2">
                <div class="m-0 alert alert-primary" role="alert">
                    <h5 class="alert-heading">Page Debug:</h5>
                    <hr>
                    <p><b>File path:</b> <?= $looptype['path'];?></p>
                </div>
            </div>
        <?}?>

        <div>

            <? require_once __DIR__.'/elements/box-site-header-contents.php'; ?>

        </div>

        <div class="container g-4 py-4">

            <div class="row <?= $mods->site_reverse_layout ? 'flex-column-reverse flex-lg-row' : ''; ?>">

                <? require_once __DIR__.'/elements/box-site-header-contents-bodymode.php'; ?>

                <? require_once __DIR__.'/elements/box-sidebar-selector-left.php'; ?>