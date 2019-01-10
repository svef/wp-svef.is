<?php
/*
Template Name: Vefverðlaun
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


		svef_partial("library/svef-partials/component-hero", $a_hero_options);

		svef_partial("library/svef-partials/component-quotetext");

		$show_c2a = get_field('show_c2a');
			if($show_c2a) {
				$a_c2a = array(
					'intro_title'	=> get_field('intro_title_inner'),
					'intro_text' => get_field('intro_text_inner'),
					'c2a_title' => get_field('c2a_title'),
					'c2a_text' => get_field('c2a_text'),
					'c2a_cool_mask' => get_field('c2a_cool_mask'),
					'c2a_image'	=> get_field('c2a_image'),
					'c2a_action' => get_field('c2a_action'),
					'c2a_bg_color' => get_field('c2a_bg_color')
				);
				svef_partial('library/svef-partials/component-c2a', $a_c2a);
			}

		$a_intro_text = array(
			'title' => get_field('intro_title'),
			'paragraph' => get_field('intro_text'),
			'margin_bottom' => false,
			'margin_bottom_inside' => true
		);
		svef_partial('library/svef-partials/component-introtext', $a_intro_text);

		svef_partial('library/svef-partials/component-winners-slider', ['winners_title' => get_field('winners_title')]);

		$a_video = array(
			'title' => get_field('video_title'),
			'paragraph' => get_field('video_text'),
			'video' => get_field('video')
		);

		svef_partial('library/svef-partials/component-video', $a_video );

		svef_partial('library/svef-partials/component-logowall');

	?>



	</article>
<?php endwhile; ?>
<?php get_footer();
