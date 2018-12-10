<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('events article'); ?>>

		<div class="grid-container">
			<div class="grid-x article__content">
				<h2 class="large-5 large-offset-1"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>




	</article>
<?php endwhile; ?>
<?php get_footer();

