<section class="section section__news section--margin-bottom ">
	<div class="grid-container section__news__inner">

			<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$news_args = array(
					'post_type'       => 'post',
					'posts_per_page'	=>    5,
					'order'						=> 'DESC',
					'paged' 					=> $paged
				);
				$news_query = new WP_Query($news_args);
				if($news_query->have_posts()):  while($news_query->have_posts()) : $news_query->the_post();

				$news_image_gallery = get_field('news_image_gallery');
				$news_image = $news_image_gallery[0];
				$pub_date = date_i18n( 'j M Y', strtotime( get_the_date() ) );
				$content = get_the_content();
				$excerpt = wp_trim_words($content, 20, '...');

			?>
				<div class="grid-x">
					<a href="<?php echo get_the_permalink(); ?>" class="section__news--item grid-x small-10 small-offset-1  medium-10 medium-offset-2">
					<?php if($news_image): ?>

						<div class="img small-11 medium-4">
							<img data-interchange="[<?php echo $news_image['sizes']['medium'];  ?>, small], [<?php echo $news_image['sizes']['medium'];  ?>, medium], [<?php echo $news_image['sizes']['medium'];  ?>, large], [<?php echo $news_image['sizes']['large'];  ?>, retina]" alt="">

						</div>
				<?php endif;
					$info_container = $news_image ? 'small-12 medium-6' : 'small-12 medium-10';
				?>
						<div class="<?php echo $info_container ?>">
							<span class="text--date text-color--black-40"><?php echo $pub_date; ?></span>
							<h2 class="text--under-title text--collapse-top less-margin--bottom"><?php the_title(); svef_partial('library/svef/icons/linkarrow.svg'); ?></h2>
							<p class="text--padding-left section__news--p"><?php echo $excerpt; ?></p>
						</div>
				</a>
			</div>
			<?php endwhile; endif; ?>

	</div>
	<?php if($news_query->max_num_pages > 1): ?>
	<div class="section__inner grid-container">
		<div class="grid-x">
			<div class="section__link section__link--event small-8 small-offset-2 medium-10 medium-offset-1 large-2 large-offset-2">
				<button id="btnGetMoreNews" data-current-page="<?php echo $paged; ?>" class="section--events__page "><?php pll_e('Sjá fleiri');  svef_partial('library/svef/icons/linkarrow.svg'); ?></button>
			</div>
		</div>
	</div>
	<?php endif; ?>
</section>
