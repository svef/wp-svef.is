<?php
/*
Template Name: Page-common
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
		<div class="grid-container">
			<div class="article__header">
				<div class="grid-x">
					<h2 class="small-10 small-offset-1 large-5 large-offset-1"><?php the_title(); ?></h2>
				</div>
		</div>
		<div class="grid-container section--margin-bottom">
			<div class="grid-x grid-margin-x article__content">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
<?php endwhile; ?>
<?php get_footer();
