<?php
/*
Template Name: Q&A
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('article q-n-a'); ?>>
		<div class="grid-container">
			<div class="article__header">
				<div class="grid-x grid-margin-x">
					<h2 class="cell large-5 large-offset-1"><?php the_title(); ?></h2>
				</div>
			</div>
		</div>
		<div class="grid-container section--margin-bottom">
			<div class="grid-x grid-margin-x article__content">
			<?php if( have_rows('spurningar') ): ?>
			<?php while( have_rows('spurningar') ): the_row();
				$question = get_sub_field('spurning');
				$answer = get_sub_field('svar');

			?>
				<p class="less-margin--bottom text--bold "><?php echo $question; ?></p>
				<?php echo $answer; ?>
			<?php endwhile; ?>
			<?php endif; ?>

			</div>
		</div>

		<?php
			svef_partial('library/svef-partials/component-logowall');
		?>

	</article>
<?php endwhile; ?>
<?php get_footer();
