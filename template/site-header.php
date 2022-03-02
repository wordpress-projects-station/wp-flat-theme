<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="shortcut icon"  type="image/x-icon" href="<?php //echo get_template_directory_uri();?>/favicon.png" /> -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <?php 
    
        wp_head();

        $filename = basename($template);

        if(is_woocommerce() && !is_shop() || is_product())  $pagetype = 'shop-product';
        else if(is_woocommerce() || is_shop() )             $pagetype = 'shop-page';
        else if(is_archive() || is_category() )             $pagetype = 'archive';
        else                                                $pagetype = get_post_type();

    ?>

</head>
<body>
