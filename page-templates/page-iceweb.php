<?php
/*
Template Name: Iceweb
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

		svef_partial('library/svef-partials/component-hero', $a_hero_options);

	?>
	<div class="grid-container">
		<div class="grid-x">
			<h2 class="large-5 large-offset-1"><?php the_title(); ?></h2>
		</div>
	</div>
	<div class="grid-container section--margin-bottom">
		<div class="grid-x article__content">
			<?php the_content(); ?>
		</div>
	</div>



	</article>
<?php endwhile; ?>
<?php get_footer();
