<ul class="blog_infos nav">
    <li><a href="#"><i class="fa fa-calendar"></i><?php the_time(esc_html(get_option('date_format'))); ?></a></li>
    <li><a href="<?php get_comments_link(); ?>"><i class="fa fa-comment"></i>(<?php echo hostingpress_get_number_of_comment(); ?>) <?php esc_html_e('comments', 'hostingpress'); ?></a></li>
</ul>