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
<section class="section section--margin-bottom section--c2a grid-container full">
	<div class="c2a grid-x">
		<!-- <div class="cell small-12 large-2"></div> -->
		<div class="section__bg-color--<?php echo $c2a_bg_color['label']; ?> section__bg-height--normal align-center cell small-12 medium-12 large-10 large-offset-2">

			<div class="section__c2a-inner grid-container grid-x ">
				<div class="section__image cell small-8 small-offset-2 medium-7 medium-offset-1 large-7 large-offset-0">
					<div class="c2a-image<?php echo $mask; ?>" style="background-image: url(<?php echo $c2a_image['sizes']['large']; ?>);">
						<?php svef_partial('library/svef/icons/maskTwoSqrs.svg'); ?>
					</div>
				</div>
				<div class="section__info cell medium-7 medium-offset-1 large-5 large-offset-0 extra-large-padd-left-10" >
					<h2 class="section__title less-margin--top small-8 small-offset-2 medium-offset-0 large-offset-0"><?php echo $c2a_title; ?></h2>
					<p class="section__pragraphTall small-6 small-offset-2 medium-10 medium-offset-1 large-offset-0"><?php echo $c2a_text; ?></p>
				</div>
				<div class="section__link section__link--absolute cell small-2 small-offset-5 medium-2 medium-offset-9 large-2 large-offset-7 grid-margin-x">
					<a href="<?php echo $c2a_action['url']; ?>" target="<?php echo $c2a_action['target'] ?>" ><?php echo $c2a_action['title'] ?></a>
					<?php svef_partial('library/svef/icons/linkarrow.svg'); ?>
				</div>
			</div>
		</div>
	</div>



</section>
