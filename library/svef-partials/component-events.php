
<section class="section section--events section--margin-bottom section__bg-color--dark grid-container full ">
	<?php $a_intro_text = array('full_grid_off' => false, 'title' => 'SVEF viðburðir', 'paragraph' => 'Markmið morgunverðarfunda SVEF eru miðlun sérfræðiþekkingar innan vébanda vefiðnaðarins, fengnir eru aðilar sem starfa innan vefgeirans og haldin eru erindi um ýmis mál tengd vefjum og verkefnum tengd þeim.'); ?>
	<?php svef_partial("library/svef-partials/component-introtext", $a_intro_text); ?>
	<div class="section__inner large-10 large-offset-2 grid-container grid-x">
		<div class="grid-x">
		<?php
			$args = array (
				'post_type'          	 => 'events',
				'posts_per_page'		 => 3,
				'order'		=> 'ASC',

				);
				$the_query = new WP_Query( $args ); ?>

				<?php
					$event_count = 0;
					$a_link_arrow = array('link_arrow' => 'link-arrow--white');
					if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
						$image_gallery = get_field('image_gallery');
						$direct_link_isset = get_field('direct_link_off_page');
						$direct_link = get_field('direct_link');
						$location_name = get_field('event_location_name');
						$location = get_field('event_location');

						$link_is_external = $direct_link_isset ? $direct_link['url'] : get_the_permalink();
						$link_target = $direct_link_isset ? $direct_link['target'] : '' ;

						$event_count++;
						$event_offset = $event_count % 2 ? 6 : 1;

				?>
						<div class="section__event small-10 small-offset-1 medium-5 medium-offset-<?php echo $event_offset; ?> large-4 large-offset-<?php echo $event_offset; ?>">
							<a href="<?php echo $link_is_external; ?>" target="<?php echo $link_target; ?>">
								<span class="link-text--menu link-text--dull"><?php the_time('j M Y') ?></span>
								<h2 class="less-margin--top less-margin--bottom"><?php the_title(); svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></h2>
								<h3 class="less-margin--top less-margin--bottom"><?php echo $location_name; ?></h3>
								<p class="section__event--border link-text--menu link-text--menu--normal-case">
									<?php echo get_the_excerpt(); ?>
								</p>
							</a>
						</div>

				<?php endwhile; endif; ?>

			<div class="section__link small-10 small-offset-1 medium-10 medium-offset-1 large-2 large-offset-8">
				<a href="<?php echo get_permalink( get_page_by_path( 'vidburdir' ) ) ?>" class="section--events__page ">Skoða alla viðburði <?php svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></a>

			</div>
		</div>
	</div>
</section>
