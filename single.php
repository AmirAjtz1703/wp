<?php

get_header();
get_template_part( 'partial/breadcrumb' );
?>
<?php while (have_posts()) : the_post(); ?>
<section class="row blog_content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 single-blog">
                <div class="blog row m0">
                    <?php
                    $format = get_post_format( get_the_ID() );
                    if ( false === $format ) {
                    $format = 'standard';
                    } ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

                    <?php
                    // image, gallery or video based on format
                    if ( in_array( $format, array( 'standard', 'image', 'gallery', 'video', 'audio' ) ) ) :
                        get_template_part( 'partial/post/post-format', $format );
                        get_template_part( 'partial/post/post-meta');
                        get_template_part( 'partial/post/post-title');
                        get_template_part( 'partial/post/post-content');
                     wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hostingpress' ),
								'after'  => '</div>',
							) );

                    endif;
                    if ( in_array( $format, array( 'quote'))) :
                        get_template_part( 'partial/post/post-format', $format );
                    endif;

                    the_tags('<div class="row m0 tags">Tags: ', ', ', '</div>');
                    echo '<hr class="blog_bottom_line">';
                    // End the loop.
                    ?>
                </div>


                <!--Related Post Start-->
                <?php
                $orig_post = $post;
                global $post;
                $tags = wp_get_post_tags($post->ID);

                if ($tags) :
                    $tag_ids = array();
                    foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                    $args = array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 3, // Number of related posts to display.
                        'ignore_sticky_posts' => 1,
                        'orderby' => 'rand',
                    );

                    $my_query = new wp_query($args);

                    if ($my_query->post_count > 0) :
                        ?>

                        <div class="related_posts row m0">
                            <h4><?php esc_html_e('Related Posts', 'hostingpress'); ?></h4>

                            <div class="row">
                                <?php
                                while ($my_query->have_posts()) {
                                    $my_query->the_post();
                                    ?>
                                    <div class="col-sm-4 post">
                                        <?php if(has_post_thumbnail()) { ?>
                                                <a href="<?php esc_url(the_permalink()); ?>" class="featured_img">
                                                    <?php the_post_thumbnail('hostingpress-thumb-related');?>
                                                </a>
                                        <?php } ?>
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="row m0 date"><i class="fa fa-calendar"></i><?php the_time(esc_html(get_option('date_format'))); ?></div>

                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    endif;
                endif;
                $post = $orig_post;
                wp_reset_postdata();
                ?>


                <!--Next previous post Link-->



                <ul class="pager">
                    <?php
                    $previous = get_previous_post_link('%link', '<i class="fa fa-long-arrow-left"></i> ' . esc_html__('Previous post', 'hostingpress') . '');
                    $next = get_next_post_link('%link', '' . esc_html__('Next post', 'hostingpress') . ' <i class="fa fa-long-arrow-right"></i>');
                    ?>
                    <?php if ($previous) : ?>
                        <li class="previous">
                            <?php echo $previous; ?><br>
                            <?php previous_post_link('%link', '<span class="post_title">%title</span>'); ?>

                        </li>
                    <?php endif; ?>
                    <?php if ($next) : ?>
                        <li class="next">
                            <?php echo $next; ?><br>
                            <?php next_post_link('%link', '<span class="post_title">%title</span>'); ?>
                        </li>
                    <?php endif; ?>
                </ul>

                <!--Author Info-->

                 <?php
                if ('0' != get_comments_number() )
                {
                    ?>
                    <div class="media post_author">
                        <div class="media-left">
                            <?php echo get_avatar(get_the_author_meta('ID'), 110); ?>
                        </div>
                        <div class="media-body">
                            <h5><i class="fa fa-user"></i><a
                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author_meta('display_name'); ?></a>
                            </h5>

                            <p><?php the_author_meta('description'); ?></p>
                            <ul class="nav nav-pills">
                                <li><a href="<?php get_user_meta(get_the_author_meta('ID'), 'fb_uid', true); ?>"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php get_user_meta(get_the_author_meta('ID'), 'twitter', true); ?>"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php get_user_meta(get_the_author_meta('ID'), 'googleplus', true); ?>"><i
                                            class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <!--Comment Section-->
                    <?php

                    comments_template();
                }
                ?>

            </div>

            <div class="col-sm-4 sidebar">
                <?php get_sidebar('blog'); ?>
            </div>

        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>