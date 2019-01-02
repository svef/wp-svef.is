<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<article <?php post_class('article 404'); ?>>
	<div class="grid-container">
		<div class="article__header">
			<div class="grid-x">
				<h2 class="small-10 small-offset-1 large-5 large-offset-1"><?php _e( 'File Not Found', 'foundationpress' ); ?></h2>
			</div>
		</div>
	</div>
	<div class="grid-container section--margin-bottom">
		<div class="grid-x article__content">
		<div class="entry-content">
			<div class="error">
				<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'foundationpress' ); ?></p>
			</div>
			<p><?php _e( 'Please try the following:', 'foundationpress' ); ?></p>
			<ul>
				<li>
					<?php _e( 'Check your spelling', 'foundationpress' ); ?>
				</li>
				<li>
					<?php
						/* translators: %s: home page url */
						printf(
							__( 'Return to the <a href="%s">home page</a>', 'foundationpress' ),
							home_url()
						);
					?>
				</li>
				<li>
					<?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'foundationpress' ); ?>
				</li>
			</ul>
		</div>
		</div>
	</div>
</article>
<?php get_footer();
