<?php
/*
Template Name: Front
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php

		$hero_is_slider = get_field('is_slide_show');

		$a_hero_options = $hero_is_slider ? array(
			'hero_slider' => get_field('hero_slider'),
			'hero_background_color' => get_field('hero_background_color'),
			'is_slide_show' => get_field('is_slide_show')
			) : array(
			'hero_img' => get_field('hero_img'),
			'hero_title' => get_field('hero_title'),
			'hero_text' => get_field('hero_text'),
			'hero_link' => get_field('hero_link'),
			'hero_background_color' => get_field('hero_background_color'),
			'is_slide_show' => get_field('is_slide_show')
		);

		svef_partial("library/svef-partials/component-hero", $a_hero_options); ?>


		<?php

		$a_intro = array('title' => get_field('intro_title'),
		'paragraph' => get_field('intro_text'),
		'is_ticker' => true,
		'a_ticker_repeater' => get_field('text_ticker'),
		'margin_bottom' => true,
		'margin_bottom_inner' => false);
		svef_partial("library/svef-partials/component-introtext", $a_intro); ?>

		<?php

			svef_partial("library/svef-partials/component-statistics"); ?>


		<?php
			$a_events = array(
				'title' => get_field('intro_title_event_inner'),
				'paragraph' => get_field('intro_text_event_inner'),
				'margin_bottom' => false,
				'margin_bottom_inner' => true
			);
			svef_partial("library/svef-partials/component-events" , $a_events);
		?>

		<?php
			$show_c2a = get_field('show_c2a');
			if($show_c2a) {
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
				svef_partial("library/svef-partials/component-c2a", $a_c2a);
			}


		?>

		<?php
			$a_image_slider = array(
				'show_slider' => get_field('show_slider'),
				'image_gallery' => get_field('image_gallery')
			);
			svef_partial("library/svef-partials/component-imagegallery", $a_image_slider);
		?>

		<?php

			$a_jobfeed = array(
				'jobfeed_title' => get_field('jobfeed_title'),
				'jobfeed_text' => get_field('jobfeed_text'),
				'jobfeed_image' => get_field('jobfeed_image')
			);
		?>


		<?php svef_partial("library/svef-partials/component-jobfeed", $a_jobfeed ); ?>

		<?php svef_partial('library/svef-partials/component-winners-slider', ['winners_title' => get_field('winners_title')]); ?>


		<?php
			if(get_field('add_second_c2a')):
				$a_c2a_2nd = array(
					'intro_title' 	=> get_field('intro_title_inner-2'),
					'intro_text' 		=> get_field('intro_text_inner-2'),
					'c2a_title' 		=> get_field('c2a_title-2'),
					'c2a_text' 			=> get_field('c2a_text-2'),
					'c2a_cool_mask' => get_field('c2a_cool_mask-2'),
					'c2a_image' 		=> get_field('c2a_image-2'),
					'c2a_action' 		=> get_field('c2a_action-2'),
					'c2a_bg_color'  => get_field('c2a_bg_color-2')
				);

				svef_partial("library/svef-partials/component-c2a", $a_c2a_2nd);
			endif;
		?>

	</article>

<?php endwhile; ?>
<?php get_footer();
