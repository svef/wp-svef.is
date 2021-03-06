<?php
	$arrow_class = $hero_background_color['value'] == 'default' ? 'link-arrow' : 'link-arrow link-arrow--white';
	$hero_link_has_title = isset($hero_link['title']) && !empty($hero_link['title']) ? $hero_link['title'] : pll__('Lesa grein');

?>
<section class="section section--margin-bottom-less section--hero" >
	<div class="section__hero--relative grid-container" >
		<div class="grid-x grid-margin-x">
			<div class="section__bg-color--<?php echo $hero_background_color['value'];?> section__bg-color--absolute section__bg-height--slide-show back-col-1 small-12 small-offset-0 medium-11 medium-offset-1 large-11 large-offset-1 xlarge-11 xlarge-offset-1" >
				<div class="section__bg-fix back-col-2 section__bg-fix--right section__bg-fix--<?php echo $hero_background_color['value'];?>" aria-hidden="true">
				</div>
			</div>
		</div>
	</div>
	<?php	if($is_slide_show && have_rows('hero_slider')) : ?>
		<div id="heroSlider" class="owl-carousel">
				<?php while(have_rows('hero_slider')) : the_row();
				$hero_slider_img = get_sub_field('hero_slider_img');
				$hero_slider_title = get_sub_field('hero_slider_title');
				$hero_slider_text = get_sub_field('hero_slider_text');
				$hero_slider_link = get_sub_field('hero_slider_link');

				$hero_slider_links_has_title = isset($hero_slider_link['title']) && !empty($hero_slider_link['title']) ? $hero_slider_link['title'] : pll__('Lesa grein');

		?>
			<div class="hero grid-container-fluid" >
				<div class="grid-x" >
					<div class="section__image cell small-12 small-offset-0 medium-12 medium-offset-0 large-7 large-offset-0">
						<div class="hero-image" data-interchange="[<?php echo $hero_slider_img['sizes']['medium'];  ?>, small], [<?php echo $hero_slider_img['sizes']['medium_large'];  ?>, medium], [<?php echo $hero_slider_img['sizes']['large'];  ?>, large], [<?php echo $hero_slider_img['sizes']['large'];  ?>, retina]">
						</div>
					</div>
					<div class="cell small-12 medium-12 large-5 xxxlarge-4 grid-x ">
						<div class="section__info section__info--center section__info--small-flex-start cell small-9 small-offset-1 medium-9 medium-offset-1 large-10 large-offset-1 xlarge-10 xlarge-offset-1">
							<div class="hide" aria-hidden="true">
							</div>
							<div class="section__info--text">
								<h2 class="section__title text-color--<?php echo $hero_background_color['value'];?>"><?php echo $hero_slider_title; ?></h2>
								<p class="section__paragraphTall--off text-color--<?php echo $hero_background_color['value'];?> small-12 small-offset-0 medium-10 medium-offset-1 large-offset-0"><?php echo $hero_slider_text; ?></p>
							</div>

							<?php if(isset($hero_slider_link) && !empty($hero_slider_link)) : ?>
								<div class="section__link section__link--hero cell small-10 small-offset-0 medium-5 medium-offset-1 large-5 large-offset-0">
									<a href="<?php echo $hero_slider_link['url'] ?>" aria-label="<?php echo $hero_slider_title; ?>" target="<?php echo $hero_slider_link['target'] ?>" class="text-color--<?php echo $hero_background_color['value'];?>">
									<?php echo $hero_slider_links_has_title; ?></a>
									<?php svef_partial('library/svef/icons/linkarrow.svg', ['link_arrow' => $arrow_class]); ?>
								</div>

							<?php else: ?>
							<div class="hide" aria-hidden="true">
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>

		<?php else : ?>
		<div class="grid-x">
			<div class="section__image cell small-12 small-offset-0 medium-12 medium-offset-0 large-7 large-offset-0">
				<div class="hero-image" data-interchange="[<?php echo $hero_img['sizes']['medium'];  ?>, small], [<?php echo $hero_img['sizes']['medium_large'];  ?>, medium], [<?php echo $hero_img['sizes']['large'];  ?>, large], [<?php echo $hero_img['sizes']['large'];  ?>, retina]">
				</div>
			</div>
			<div class="cell small-12 medium-12 large-5 xxxlarge-4 grid-x ">
				<div class="section__info section__info--center cell small-9 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 xlarge-10 xlarge-offset-1">
					<div class="hide" aria-hidden="true"></div>
					<div class="section__info--text">
						<h2 class="section__title text-color--<?php echo $hero_background_color['value'];?>"><?php echo $hero_title; ?></h2>
						<p class="section__paragraphTall--off text-color--<?php echo $hero_background_color['value'];?> small-12 small-offset-0 medium-10 medium-offset-1 large-offset-0"><?php echo $hero_text; ?></p>
						<?php  if(isset($hero_link) && !empty($hero_link)) : ?>
							<div class="section__link section__link--hero cell small-10 small-offset-0 medium-5 medium-offset-1 large-5 large-offset-0">
								<a href="<?php echo $hero_link['url'] ?>" aria-label="<?php echo $hero_title; ?>" target="<?php echo $hero_link['target'] ?>" class="text-color--<?php echo $hero_background_color['value'];?>"><?php echo $hero_link_has_title; ?></a>
								<?php svef_partial('library/svef/icons/linkarrow.svg', ['link_arrow' => $arrow_class]); ?>
							</div>
						<?php  else: ?>
							<div class="hide" aria-hidden="true"></div>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
		<?php endif; ?>
</section>

