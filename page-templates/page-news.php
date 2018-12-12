<?php
/*
Template Name: News
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('news-page'); ?>>

		<?php

			$a_intro_text = array(
				'title' => get_field('intro_title'),
				'paragraph' => get_field('intro_text'),
				'margin_bottom' => false,
				'margin_bottom_inside' => true
			);
			svef_partial('library/svef-partials/component-introtext', $a_intro_text);

			svef_partial('library/svef-partials/component-news-items');

			svef_partial('library/svef-partials/component-logowall');
		?>




	</article>
<?php endwhile; ?>
<?php get_footer();
