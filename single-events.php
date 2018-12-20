<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
	$show_map = get_field('show_map');
	$map_obj = get_field('event_location');
	$s_where = get_field('event_location_name');
	$s_event_date = get_field('event_start_date');
	$local_date = date_i18n("d M Y", strtotime($s_event_date));
	// var_dump($local_date);
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('events article'); ?>>

		<div class="grid-container section--margin-bottom">
			<div class="article__header">
				<h2 class="grid-x large-10 large-offset-1"><?php the_title(); ?></h2>
				<p class="grid-x large-4 large-offset-2"><?php echo $local_date; ?></p>
				<h3 class="grid-x large-4 large-offset-2"><?php echo $s_where; ?></h3>
			</div>
			<div class="grid-x article__content">
				<?php the_content(); ?>

			</div>
		</div>

	<?php
			$a_image_slider = array(
				'show_slider' => get_field('show_slider'),
				'image_gallery' => get_field('image_gallery')
			);
			svef_partial("library/svef-partials/component-imagegallery", $a_image_slider);
			svef_partial("library/svef-partials/component-map", ['location' => $map_obj, 'show_map' => $show_map]);
			?>


	</article>
<?php endwhile; ?>
<?php get_footer();

