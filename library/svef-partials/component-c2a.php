<?php
	$a_intro_options = array(
		'margin_bottom' => false,
		'margin_bottom_inside' => true,
		'title' => $intro_title,
		'paragraph' => $intro_text
	);

	$mask = $c2a_cool_mask ? ' c2a-image--mask ' : ' c2a-image--no-mask ';
	if($intro_title) {
		svef_partial('library/svef-partials/component-introtext', $a_intro_options);

	}
  ?>
<section class="section section--margin-bottom section--c2a section--animate">
		<div class="section__hero--relative grid-container ">
			<div class="grid-x section__bg-color--<?php echo $c2a_bg_color['label']; ?> section__bg-height--normal section__bg-color--absolute  cell small-12 small-offset-0 medium-11 medium-offset-1 large-11 large-offset-1 xlarge-11 xlarge-offset-1">
				<div class="section__bg-fix section__bg-fix--right section__bg-fix--<?php echo $c2a_bg_color['label']; ?>" aria-hidden="true"></div>
			</div>
		</div>

	<div class="c2a grid-container-fluid grid-x">
		<!-- <div class="cell small-12 large-2"></div> -->
		<div class="  align-center cell small-12 medium-12 large-10 large-offset-1">
			<div class="section__c2a-inner grid-x grid-margin-x">
				<div class="section__image section__image--c2a cell small-12 small-offset-0 medium-12 medium-offset-0 large-7 large-offset-0">
					<div class="c2a-image<?php echo $mask; ?>" style="background-image: url(<?php echo $c2a_image['sizes']['large']; ?>);">
						<?php svef_partial('library/svef/icons/maskTwoSqrs.svg'); ?>
					</div>
				</div>
				<div class="cell section__info section__info--center section__bg-color--<?php echo $c2a_bg_color['label']; ?> small-9 small-offset-1 medium-9 medium-offset-1 large-5 large-offset-0 ">
					<h2 class="section__title less-margin--top"><?php echo $c2a_title; ?></h2>
					<div class=" cell small-10 small-offset-1 medium-8 medium-offset-1 large-8 large-offset-0 "><?php echo $c2a_text; ?></div>
					<div class="section__link cell small-4 small-offset-1 medium-4 medium-offset-1 large-5 large-offset-0 ">
						<a class="" href="<?php echo $c2a_action['url']; ?>" target="<?php echo $c2a_action['target'] ?>" ><?php pll_e('Nánar'); ?></a>
						<?php svef_partial('library/svef/icons/linkarrow.svg'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
