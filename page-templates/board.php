<?php
/*
Template Name: Board
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			svef_partial("library/svef-partials/component-boardmembers-page");
			svef_partial('library/svef-partials/component-logowall');
		?>

	</article>
<?php endwhile; ?>
<?php get_footer();
