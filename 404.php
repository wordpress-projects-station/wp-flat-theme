<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">

        <title>

            <? 
                $titles = explode(',', get_option( 'blogname' ).' - 404');
                echo implode(' : ',$titles);
            ?>
            
        </title>

        <meta name="description" content="kindness page - 404 - Sorry, What you are looking for does not exist or is no longer available" />

        <? if( ! has_site_icon() ) { ?>

            <link rel="apple-touch-icon" href="<?= get_template_directory_uri(); ?>/favicon.png">
            <link rel="shortcut icon"  type="image/x-icon" href="<?= get_template_directory_uri().'/favicon.png'; ?>" />

        <? } else { ?>

            <link rel="apple-touch-icon" href="<?= wp_get_attachment_image_url(get_option('site_icon'),'full'); ?>">
            <link rel="shortcut icon"  type="image/x-icon" href="<?= wp_get_attachment_image_url(get_option('site_icon'),'full'); ?>" />

        <? } ?>

    </head>

    <body>
        <div>
            <img src="<?= get_template_directory_uri().'/adds/404PAGE.PNG'; ?>">
            <h1>OPS! YOUR CONTENT HAS LOST!</h1>
            <p>Sorry, What you are looking for does not exist or is no longer available</p>
            <p><button onclick="history.back()">Go Back</button></p>
        </div> 
    </body>

    <style>
        html,body{
            display:grid;
            margin:0;
            padding:0;
            align-content:center;
            text-align:center;
        }
        body>div{
            text-align:center;
        }
        body>div>img{
            margin-bottom:20px;
            max-width:80%;
        }
        button{
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>

</html>