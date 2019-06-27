<?php if ( is_single() || is_page() ): ?>
    <h3><?php the_title(); ?></h3>
<?php else: ?>
    <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
<?php endif; ?>