<?php
/*
Template Name: Events
*/
get_header(); ?>
<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php


	$a_events = array(
		'title' => get_field('intro_title_event_inner'),
		'paragraph' => get_field('intro_text_event_inner'),
		'margin_bottom' => false,
		'margin_bottom_inner' => true,
		'events_page' => true,
		'paged' => $paged
	);
	svef_partial("library/svef-partials/component-events" , $a_events);
	svef_partial('library/svef-partials/component-logowall');
?>



</article>
<?php endwhile; ?>
<?php get_footer();
