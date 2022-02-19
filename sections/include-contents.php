<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php endwhile; else : ?>

<p><?php esc_html_e( 'Sorry, no posts finded.' ); ?></p>

<?php endif; ?>