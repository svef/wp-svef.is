<?php
/*
Template Name: Front
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php svef_partial("library/svef-partials/component-signup"); ?>
		<?php svef_partial("library/svef-partials/component-hero"); ?>
		<?php svef_partial("library/svef-partials/component-introtext"); ?>
		<?php svef_partial("library/svef-partials/component-statistics"); ?>
		<?php svef_partial("library/svef-partials/component-events"); ?>

		<?php
			$a_c2a = array(
				'intro_title' 	=> get_field('intro_title'),
				'intro_text' 		=> get_field('intro_text'),
				'c2a_title' 		=> get_field('c2a_title'),
				'c2a_text' 			=> get_field('c2a_text'),
				'c2a_cool_mask' => get_field('c2a_cool_mask'),
				'c2a_image' 		=> get_field('c2a_image'),
				'c2a_action' 		=> get_field('c2a_action'),
				'c2a_bg_color'  => get_field('c2a_bg_color')
			);


			svef_partial("library/svef-partials/component-c2a", $a_c2a);
		?>

		<?php 
			$a_image_slider = array(
				'show_slider' => get_field('show_slider'),
				'image_gallery' => get_field('image_gallery')
			);
		?>

		<?php svef_partial("library/svef-partials/component-imagegallery", $a_image_slider); ?>

	</article>
<?php endwhile; ?>
<?php get_footer();
