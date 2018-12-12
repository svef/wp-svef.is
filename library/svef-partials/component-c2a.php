<?php
	$a_intro_options = array(
		'margin_bottom_inside' => false,
		'title' => $intro_title,
		'paragraph' => $intro_text
	);

	$mask = $c2a_cool_mask ? ' c2a-image--mask ' : ' c2a-image--no-mask ';
	if($intro_title) {
		svef_partial('library/svef-partials/component-introtext', $a_intro_options);
	}
  ?>
<section class="section section--margin-bottom section--c2a section--animate">
	<div class="section__hero--relative grid-container">
		<div class=" grid-x grid-margin-x">
			<div class="section__bg-color--<?php echo $c2a_bg_color['label']; ?> section__bg-color--absolute section__bg-height--slide-show small-12 small-offset-0 medium-11 medium-offset-1 large-11 large-offset-1">
					<div class="section__bg-fix section__bg-fix--right section__bg-fix--<?php echo $c2a_bg_color['label']; ?>" aria-hidden="true"></div>
			</div>
		</div>

	</div>
	<div class="c2a grid-container grid-x">
		<!-- <div class="cell small-12 large-2"></div> -->
		<div class="section__bg-height--normal align-center cell small-12 medium-12 large-12">
			<div class="section__c2a-inner grid-x grid-margin-x">
				<div class="section__image section__image--c2a c2a-image<?php echo $mask; ?> cell small-12 medium-12 large-7" style="background-image: url(<?php echo $c2a_image['sizes']['large']; ?>);">

				<?php svef_partial('library/svef/icons/maskTwoSqrs.svg'); ?>
				</div>
				<div class="cell section__info section__info--center section__bg-color--text-<?php echo $c2a_bg_color['label']; ?> small-10 small-offset-1 medium-9 medium-offset-1 large-5 large-offset-0 ">
					<h2 class="section__title less-margin--top"><?php echo $c2a_title; ?></h2>
					<div class="section__bg-color--text-<?php echo $c2a_bg_color['label']; ?> cell small-11 small-offset-0 medium-8 medium-offset-1 large-12 large-offset-0 "><?php echo $c2a_text; ?></div>
					<div class="section__link cell small-4 small-offset-0 medium-4 medium-offset-1 large-5 large-offset-0 ">
						<a class="section__bg-color--text-<?php echo $c2a_bg_color['label']; ?>" href="<?php echo $c2a_action['url']; ?>" target="<?php echo $c2a_action['target'] ?>" ><?php pll_e('Nánar'); ?></a>
						<?php svef_partial('library/svef/icons/linkarrow.svg'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
