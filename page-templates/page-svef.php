<?php
/*
Template Name: common page
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('common-page'); ?>>

	<div class="grid-container">
		<div class="grid-x article__content">
			<h2 class="large-5 large-offset-1"><?php the_content(); ?></h2>
		</div>
	</div>




	</article>
<?php endwhile; ?>
<?php get_footer();
