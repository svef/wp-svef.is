<?php
/*
Template Name: About
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php
		$hero_is_slider = get_field('is_slide_show');

		$a_hero_options = $her_is_slider ? array(
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
			$a_about = array(
				'title' => get_field('intro_title'),
				'paragraph' => get_field('intro_text'),
				'margin_bottom' => true,
				'margin_bottom_inner' => false
			);
			svef_partial("library/svef-partials/component-introtext" , $a_about);
		?>

    <?php svef_partial("library/svef-partials/component-boardmembers"); ?>


	</article>
<?php endwhile; ?>
<?php get_footer();
