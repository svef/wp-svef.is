<?php
/*
Template Name: Board
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			$a_board_section_text = array(
				'board_title' => get_field('board_title'),
				'board_text' => get_field('board_text'),
				'board_link' => get_field('board_link')
			);
			svef_partial("library/svef-partials/component-boardmembers-page", $a_board_section_text); ?>


	</article>
<?php endwhile; ?>
<?php get_footer();
