<section class="section section--award-slider">
	<div class="grid-container">
		<div class="grid-x">
			<?php
					var_dump(wp_get_menu_array('winners-select'));
					$args_select = array (
						'post_type'       => 'winners',
						'posts_per_page'	=>  -1,
						'order'						=> 'ASC',
					);


					$options_query = new WP_Query( $args_select );

					$a_select_options = $options_query->posts;
					?>

			<h2 id="sliderHeading" class="small-6 small-offset-1"><?php echo $a_select_options[0]->post_title; ?></h2>
		</div>
		<div class="grid-x ">
			<label for="selectYear" class="section__label small-2 small-offset-2">
				<select id="selectWinnerYear" name="selectYear" class="section__select">
					<?php foreach ($a_select_options as $option): ?>
						<option value="<?php echo $option->ID?>"><?php echo $option->post_title; ?></option>
					<?php  endforeach; wp_reset_query(); ?>
				</select>
				<?php svef_partial('library/svef/icons/down-caret.svg'); ?>
			</label>
		</div>
	</div>

	<div class="section__winners-slider bg-col-partial bg-col-partial--75--blue">
		<div id="winnersSlider" class="section__winners-slider--inner owl-carousel">

			<?php
					$args = array (
						'post_type'       => 'winners',
						'posts_per_page'	=>  1,
						'order'						=> 'ASC',
					);
					$the_winners_query = new WP_Query( $args );

					if ($the_winners_query->have_posts()) : while ($the_winners_query->have_posts()) : $the_winners_query->the_post();
					$loop_of_winners = get_field('winners_slider');
					$year_of_winners = date('Y', strtotime(get_field('winning_year')));

					foreach ($loop_of_winners as $winner):
			?>

				<div class="winners-slide">
				<?php $site_url = $winner['winner_url'] ? $winner['winner_url'] : ''; echo $winner['winner_url'] ? '<a class="winners-slide__link" href="'.$site_url['url'].'" target="_blank">' : ''; ?>
					<div class="winners-slide__img" style="background-image: url(<?php echo $winner['winner_screenshot']['sizes']['large']; ?>);"></div>
					<div class="section__text-color--white winners-slide__category"><?php echo $winner['winner_category']; ?></div>
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
