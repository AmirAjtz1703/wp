<div class="row m0 blog">
    <?php get_template_part( 'partial/post/post-format' ); ?>
    <ul class="blog_infos nav">
        <li><a href="#"><i class="fa fa-calendar"></i><?php the_time(esc_html(get_option('date_format'))); ?></a></li>
        <li><a href="<?php get_comments_link(); ?>"><i class="fa fa-comment"></i>(<?php echo hostingpress_get_number_of_comment(); ?>) <?php esc_html_e('comments', 'hostingpress'); ?></a></li>
    </ul>
    <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>

    <p><?php the_excerpt(); ?></p>

    <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-primary"><?php esc_html_e('read more', 'hostingpress'); ?></a>
</div>
<hr class="blog_bottom_line">
