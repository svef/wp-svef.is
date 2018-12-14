<?php
	$sectionHeight = $is_slide_show ? 'style="min-height:70vh"' : '';
	$arrow_class = $hero_background_color['value'] == 'default' ? 'link-arrow' : 'link-arrow link-arrow--white'
?>
<section class="section section--margin-bottom section--hero" >
	<div class="section__hero--relative grid-container" >
		<div class="grid-x grid-margin-x">
			<div class="section__bg-color--<?php echo $hero_background_color['value'];?> section__bg-color--absolute section__bg-height--slide-show back-col-1 small-12 small-offset-0 medium-11 medium-offset-1 large-11 large-offset-1 xlarge-11 xlarge-offset-1" >
				<div class="section__bg-fix back-col-2 section__bg-fix--right section__bg-fix--<?php echo $hero_background_color['value'];?>" aria-hidden="true"></div>
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

		?>
	<div class="hero grid-container-fluid" >
				<div class="grid-x" >
					<div class="section__image cell small-12 small-offset-0 medium-12 medium-offset-0 large-7 large-offset-0">
						<div class="hero-image" data-interchange="[<?php echo $hero_slider_img['sizes']['medium'];  ?>, small], [<?php echo $hero_slider_img['sizes']['medium_large'];  ?>, medium], [<?php echo $hero_slider_img['sizes']['large'];  ?>, large]"></div>
					</div>
					<div class="cell small-12 medium-12 large-5 grid-x ">
						<div class="section__info section__info--center cell small-10 small-offset-1 medium-9 medium-offset-1 large-10 large-offset-1 ">
							<div aria-hidden="true"></div>
							<div class="section__info--text">
								<h2 class="section__title text-color--<?php echo $hero_background_color['value'];?>"><?php echo $hero_slider_title; ?></h2>
								<p class="section__paragraphTall--off text-color--<?php echo $hero_background_color['value'];?> small-10 small-offset-0 medium-offset-1 large-offset-0"><?php echo $hero_slider_text; ?></p>
							</div>
							<?php if($hero_slider_link) : ?>
								<div class="section__link section__link--hero cell small-5 small-offset-0 medium-5 medium-offset-1 large-5 large-offset-0">
									<a href="<?php echo $hero_slider_link['url'] ?>" aria-lable="<?php echo $hero_slider_title; ?>" target="<?php echo $hero_slider_link['target'] ?>" class="text-color--<?php echo $hero_background_color['value'];?>"><?php echo pll__('Lesa grein'); ?></a>
									<?php svef_partial('library/svef/icons/linkarrow.svg', ['link_arrow' => $arrow_class]); ?>
								</div>
							<?php else: ?>
								<div aria-hidden="true"></div>
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
				<div class="hero-image" data-interchange="[<?php echo $hero_img['sizes']['medium'];  ?>, small], [<?php echo $hero_img['sizes']['medium_large'];  ?>, medium], [<?php echo $hero_img['sizes']['large'];  ?>, large]">
				</div>
			</div>
			<div class="cell small-12 medium-12 large-5 grid-x ">
				<div class="section__info section__info--center cell small-10 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1">
					<div aria-hidden="true"></div>
					<div>
						<h2 class="section__title text-color--<?php echo $hero_background_color['value'];?>"><?php echo $hero_title; ?></h2>
						<p class="section__paragraphTall--off text-color--<?php echo $hero_background_color['value'];?> small-10 small-offset-0 medium-offset-1 large-offset-0"><?php echo $hero_text; ?></p>
				</div>
				<?php  if($hero_link) : ?>
					<div class="section__link section__link--hero cell small-5 small-offset-0 medium-5 medium-offset-1 large-5 large-offset-0">
						<a href="<?php echo $hero_link['url'] ?>" aria-lable="<?php echo $hero_title; ?>" target="<?php echo $hero_link['target'] ?>" class="text-color--<?php echo $hero_background_color['value'];?>"><?php echo pll__('Lesa grein'); ?></a>
						<?php svef_partial('library/svef/icons/linkarrow.svg', ['link_arrow' => $arrow_class]); ?>
					</div>
				<?php  else: ?>
					<div aria-hidden="true"></div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>

