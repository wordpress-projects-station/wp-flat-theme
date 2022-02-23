<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="shortcut icon"  type="image/x-icon" href="<?php //echo get_template_directory_uri();?>/favicon.png" /> -->

    <?php wp_head();?>


</head>
<body>

    <?php
        if( is_single() )           $layout_target = 'post';
        elseif ( is_archive() )     $layout_target = 'archive';
        else                        $layout_target = 'page';
    ?>

    <?php get_template_part('include/model','heading');?>
