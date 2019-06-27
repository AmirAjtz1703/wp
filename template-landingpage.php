<?php
/*
 * Template Name: Landing Page
 */
?>
<?php

get_header("landing");
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class='sd-full-width clearfix'> 

			<?php the_content(); ?>

	</div>
	<!-- sd-full-width -->
<?php endwhile; else: ?>
	<p><?php _e( 'Sorry, no posts matched your criteria', 'hostingpress' ) ?>.</p>
<?php endif; ?>
<?php get_footer(); ?>
