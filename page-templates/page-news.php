<?php
/*
Template Name: News
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('news-page article'); ?>>
		<div class="grid-container">
			<div class="article__header">
				<div class="grid-x section--margin-bottom-inside">

					<h2 class="small-10 small-offset-1 large-5 large-offset-1"><?php the_title(); ?></h2>
				</div>
			</div>
		</div>
		<?php
			svef_partial('library/svef-partials/component-news-items');

			svef_partial('library/svef-partials/component-logowall');
		?>

	</article>
<?php endwhile; ?>
<?php get_footer();
