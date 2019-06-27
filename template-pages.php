<?php
/*
 * Template Name: Pages : Breadcrumb
 */
?>
<?php

get_header();
get_template_part( 'partial/breadcrumb' );
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class='pt68 sd-full-width clearfix'> 

			<?php the_content(); ?>

	</div>
	<!-- sd-full-width -->
<?php endwhile; else: ?>
	<p><?php _e( 'Sorry, no posts matched your criteria', 'hostingpress' ) ?>.</p>
<?php endif; ?>
<?php get_footer(); ?>
