<?php 

    $pagetype='front-page';

    get_header();

    include 'include/contents-site-heading.php';

    include 'include/layout-wrap-start.php';

        the_post();

        $contents = get_post_field('post_content', $post->ID);

        ?><pre><?php print_r($contents) ?></pre><?php
        // ! $contents
        // ? echo '<div style="display:grid; width:100%; height:100%; align-self:center;align-items:center;><h3>MAKE YOU GUTENBERG HOMEPAGE</h3><p>You can build your own custom homepage thanks to the internal editor. Once you\'ve built some content, it will appear here.</p></div>';
        // : echo $contents;
        

    include 'include/layout-wrap-end.php';

    get_footer();

?>