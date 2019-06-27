<?php

get_header();
get_template_part( 'partial/breadcrumb' );
?>
    <section class="row blog_content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blogs">
                    <?php
                    if (have_posts()) :
                        // Start the loop.
                        while (have_posts()) : the_post();
                            // Include the page content template.
                            $format = get_post_format( get_the_ID() );
                            if ( false === $format ) {
                                $format = 'standard';
                            } ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class("blog"); ?> >
                            <?php
                            // image, gallery or video based on format
                            if ( in_array( $format, array( 'standard', 'image', 'gallery', 'video', 'audio' ) ) ) :
                                get_template_part( 'partial/post/post-format', $format );
                                get_template_part( 'partial/post/post-meta');
                                get_template_part( 'partial/post/post-title');
                                get_template_part( 'partial/post/post-content');
                            endif;
                            if ( in_array( $format, array( 'quote'))) :
                                get_template_part( 'partial/post/post-format', $format );
                            endif;

                            // End the loop.
                            ?>
                            </article>
                            <hr class="blog_bottom_line">
                        <?php
                        endwhile;
                        global $wp_query;
                        hostingpress_pagination($wp_query);
                    else :
                        get_template_part('content', 'none');
                    endif;
                    ?>
                </div>
                <div class="col-sm-4 sidebar">
                    <?php get_sidebar('blog'); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>