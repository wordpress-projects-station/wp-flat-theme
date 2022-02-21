<?php
    function loop_contents(){

        if ( have_posts() ) {

            if( ! $post->post_password ) {

                return true;

            } else {

                include 'include/layout-no-accessible.php';
                return false;

            }

        } else {

            include 'include/layout-no-contents.php'; 
            return false;

        }
    }
?>