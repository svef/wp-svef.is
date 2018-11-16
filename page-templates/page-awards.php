<?php
/*
Template Name: Vefverðlaun
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		svef_partial('library/svef-partials/component-signup');
		svef_partial('library/svef-partials/component-hero');


		echo '<h3>eitthvað texta field sem kemur bara fyrir hér</h3>';


		$a_c2a = array(
			'intro_title' 	=> get_field('intro_title_inner'),
			'intro_text' 		=> get_field('intro_text_inner'),
			'c2a_title' 		=> get_field('c2a_title'),
			'c2a_text' 			=> get_field('c2a_text'),
			'c2a_cool_mask' => get_field('c2a_cool_mask'),
			'c2a_image' 		=> get_field('c2a_image'),
			'c2a_action' 		=> get_field('c2a_action'),
			'c2a_bg_color'  => get_field('c2a_bg_color')
		);


		svef_partial('library/svef-partials/component-c2a', $a_c2a);

		$a_intro_text = array(
			'title' => get_field('intro_title'),
			'paragraph' => get_field('intro_text'),
			'margin_bottom' => true,
			'margin_bottom_inside' => false
		);
		svef_partial('library/svef-partials/component-introtext', $a_intro_text);

		svef_partial('library/svef-partials/component-winners-slider');

	?>




	</article>
<?php endwhile; ?>
<?php get_footer();
