<section class="section section--award-slider section--margin-bottom">
	<div id="winnercursor" class="show-for-mediu"></div>
	<div class="grid-container">
		<div class="grid-x">
			<?php
				$args = array (
					'post_type' => 'winners',
					'posts_per_page' =>  1,
					'order'	=> 'ASC',
				);
				$the_winners_query = new WP_Query( $args );
				$first_post_title = $the_winners_query->posts[0];
				$sliderMenuName = array('is' => 'winners-select', 'en' => 'winners-english');
			?>

		</div>
		<div class="grid-x ">
			<div class="small-10 small-offset-1 medium-6 large-6">
				<h2><?php echo $winners_title; ?></h2>
				<label for="selectYear" class="section__label">
					<?php echo get_menu_to_select($sliderMenuName[pll_current_language()]); ?>
					<?php svef_partial('library/svef/icons/down-caret.svg'); ?>
				</label>
			</div>


		</div>
	</div>

	<div class="section__winners-slider bg-col-partial bg-col-partial--75--blue">
		<div id="winnersSlider" class="section__winners-slider--inner owl-carousel">

			<?php
				if ($the_winners_query->have_posts()) : while ($the_winners_query->have_posts()) : $the_winners_query->the_post();
				$loop_of_winners = get_field('winners_slider');
				$year_of_winners = date('Y', strtotime(get_field('winning_year')));
				foreach ($loop_of_winners as $winner):
			?>
				<div class="winners-slide">
				<?php $site_url = $winner['winner_url'] ? $winner['winner_url'] : ''; echo $winner['winner_url'] ? '<a class="winners-slide__link" href="'.$site_url['url'].'" target="_blank" alt="open link in new tab">' : ''; ?>
				<div class="winners-slide__img" style="background-image: url(<?php echo $winner['winner_screenshot']['sizes']['medium_large']; ?>);"><?php if($winner['winner_url']) : ?><span class="winners-slide__link-indicator"><?php pll_e('Skoða vef'); ?></span><?php endif; ?></div>
					<div class="section__text-color--white winners-slide__category category-text"><?php echo $winner['winner_category']; ?></div>
					<h3 class="section__text-color--white winners-slide__heading"><?php echo $winner['winner_name']; ?></h3>
					<div class="section__text-color--white text--small winners-slide__text">
						<?php echo $winner['winner_notes']; ?>
					</div>
					<?php echo $winner['winner_url'] ? '</a>' : ''; ?>
				</div>
			<?php endforeach; endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
