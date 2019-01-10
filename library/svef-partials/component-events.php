
<section class="section section--events section--margin-bottom section__bg-color--dark">
	<?php $a_intro_text = array(
		'full_grid_off' => false,
		'title' => $title,
		'paragraph' => $paragraph,
		'margin_bottom' => false,
		'margin_bottom_inner' => true
		);
	?>
	<?php svef_partial("library/svef-partials/component-introtext", $a_intro_text); ?>
	<div class="section__inner grid-container">
		<div class="grid-x events-container">
		<?php
			// var_dump($paged);
			$args = isset($events_page) ?
			array (
				'post_type'       => 'events',
				'posts_per_page'	=>    5,
				'order'						=> 'DESC',
				'paged' 					=> $paged,
				'meta_key'		=> 'event_start_date',
				'orderby'			=> 'meta_value',
			) :
			array (
					'post_type'       => 'events',
					'posts_per_page'	=>    3,
					'order'						=> 'DESC',
					'meta_key'		=> 'event_start_date',
					'orderby'			=> 'meta_value',
				);
				$the_query = new WP_Query( $args );

				$event_count = 0;
				$a_link_arrow = array('link_arrow' => 'link_arrow link-arrow--white');
				if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
					$image_gallery = get_field('image_gallery');
					$event_date = get_field('event_start_date');
					// $direct_link_isset = get_field('direct_link_off_page');
					// $direct_link = get_field('direct_link');
					$location_name = get_field('event_location_name');
					$location = get_field('event_location');
					// $link_is_external = $direct_link_isset ? $direct_link  : get_permalink();
					// $link_target = $direct_link_isset ? '_blank' : '' ;
					$event_is_over = strtotime($event_date) < time() ? true : false;
					$local_date = date_i18n("d M Y", strtotime($event_date));

					$event_is_over_class = $event_is_over ? ' section__event--passed ' : '';
					$event_count++;
					$event_offset = $event_count % 2 ? 7 : 2;
					// $render_link = $event_is_over ? '' : $link_is_external;
				?>
						<div class="section__event <?php echo $event_is_over_class; ?> small-10 small-offset-1 medium-5 medium-offset-<?php echo $event_offset; ?> large-5 large-offset-<?php echo $event_offset; ?> ">
							<?php if(!$event_is_over): ?>
							<a href="<?php the_permalink(); ?>">
						  <?php endif; ?>
								<span class="link-text--menu link-text--dull"><?php echo $local_date; ?></span>
								<h2 class="less-margin--top less-margin--bottom"><?php the_title(); svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></h2>
								<h3 class="less-margin--top less-margin--bottom"><?php echo $location_name; ?></h3>
								<p class="section__event--border link-text--menu link-text--menu--normal-case">
									<?php echo get_the_excerpt(); ?>
								</p>
							<?php if(!$event_is_over): ?>
							</a>
							<?php endif; ?>
						</div>

				<?php endwhile; endif; wp_reset_query(); ?>
					</div> <!-- grid-x -->
				</div> <!-- enter section inner -->
			<?php if(!isset($events_page)) : ?>
			<div class="section__inner grid-container">
				<div class="grid-x">
					<div class="section__link section__link--event small-8 small-offset-2 medium-10 medium-offset-1 large-2 large-offset-10">
						<a href="<?php echo get_permalink( get_page_by_path( 'vidburdir' ) ) ?>" class="section--events__page "><?php  pll_e('Skoða alla viðburði'); svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></a>
					</div>
				</div>
			</div>
			<?php elseif($the_query->max_num_pages > 1) : ?>
			<div class="section__inner grid-container">
				<div class="grid-x">
					<div class="section__link section__link--event small-8 small-offset-2 medium-10 medium-offset-1 large-2 large-offset-10">
						<button id="btnGetMoreEvents" data-current-page="<?php echo $paged; ?>" class="section--events__page btnShowMore text-color--blue"><?php pll_e('Sjá fleiri');  svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></button>
					</div>
				</div>
			</div>

			<?php endif; ?>

</section>
