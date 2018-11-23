<?php $sectionHeight = $is_slide_show ? 'style="min-height:800px"' : ''; ?>
<section class="section section--margin-bottom section--hero2" <?php echo $sectionHeight; ?>>
	<div class="section__bg-fix section__bg-fix--<? echo $hero_background_color['value'];?>" aria-hidden="true"></div>
	<div class="hero grid-container" >
		<div class="grid-x">
			<div class="section__bg-color--<? echo $hero_background_color['value'];?> section__bg-color--absolute section__bg-height--normal small-12 small-offset-0 medium-10 medium-offset-1 large-10 large-offset-1 xlarge-10 xlarge-offset-1" ></div>
		</div>
	</div>
		<?php
		if($is_slide_show && have_rows('hero_slider')) : ?>

			<div id="heroSlider" class="owl-carousel">
				<?php while(have_rows('hero_slider')) : the_row();
				$hero_slider_img = get_sub_field('hero_slider_img');
				$hero_slider_title = get_sub_field('hero_slider_title');
				$hero_slider_text = get_sub_field('hero_slider_text');
				$hero_slider_link = get_sub_field('hero_slider_link');
				?>
	<div class="hero grid-container" >
				<div class="grid-x" >

						<div class="section__image cell small-10 small-offset-1 medium-6 medium-offset-0 large-7 large-offset-0">
							<div class="hero-image" style="background-image: url(<?php echo $hero_slider_img['sizes']['large'];  ?>)"></div>
						</div>
						<div class="cell small-12 medium-5 large-5 grid-x ">
							<div class="section__info cell small-10 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 top-text-padding">
								<div class="">
									<h2 class="section__title"><?php echo $hero_slider_title; ?></h2>
									<p class="section__paragraphTall small-10 small-offset-1 medium-offset-0 large-offset-0"><?php echo $hero_slider_text; ?></p>
								</div>
								<div class="section__link section__link--hero cell small-5 small-offset-1 medium-5 medium-offset-0 large-5 large-offset-0">
									<a href="<?php echo $hero_slider_link['url'] ?>" target="<?php echo $hero_slider_link['target'] ?>"><?php echo pll__('Lesa grein'); ?></a>
									<?php svef_partial('library/svef/icons/linkarrow.svg'); ?>
								</div>
							</div>
						</div>
				</div>
</div>

				<?php endwhile; ?>
			</div>

		<?php else : ?>
		<div class="grid-x">
			<div class="section__image cell small-10 small-offset-1 medium-6 medium-offset-0 large-7 large-offset-0">
				<div class="hero-image" style="background-image: url(<?php echo $hero_img['sizes']['large']; ?>)">
				</div>
			</div>
			<div class="cell small-12 medium-5 large-5 grid-x ">
				<div class="section__info cell small-10 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 top-text-padding">

						<h2 class="section__title"><?php echo $hero_title; ?></h2>
						<p class="section__paragraphTall small-10 small-offset-1 medium-offset-0 large-offset-0"><?php echo $hero_text; ?></p>

					<div class="section__link section__link--hero cell small-5 small-offset-1 medium-5 medium-offset-0 large-5 large-offset-0">
					<a href="<?php echo $hero_link['url'] ?>" target="<?php echo $hero_link['target'] ?>"><?php echo pll__('Lesa grein'); ?></a>
						<?php svef_partial('library/svef/icons/linkarrow.svg'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>


	</div>
</section>

