<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('news article'); ?>>

<div class="grid-container section--margin-bottom">
	<div class="article__header">
		<h2 class="grid-x large-10 large-offset-1"><?php the_title(); ?></h2>

	</div>
	<div class="grid-x article__content">
		<?php the_content(); ?>
	</div>
</div>
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
