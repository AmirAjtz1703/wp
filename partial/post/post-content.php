
<?php if ( is_single() || is_page() ): ?>
    <p><?php the_content(); ?></p>
<?php else: ?>
    <p><?php the_excerpt(); ?></p>
    <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-primary"><?php esc_html_e('read more', 'hostingpress'); ?></a>
<?php endif; ?>