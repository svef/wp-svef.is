<?php
	$a_intro_options = array(
		'margin_bottom' => false,
		'margin_bottom_inside' => true
	);
	svef_partial('library/svef-partials/component-introtext', $a_intro_options);
 ?>
<section class="section section--margin-bottom section--c2a grid-container full">
	<div class="c2a grid-x">
		<!-- <div class="cell small-12 large-2"></div> -->
		<div class="section__bg-color--default section__bg-height--normal align-center cell small-12 medium-12 large-10 large-offset-2">

			<div class="section__c2a-inner grid-container grid-x ">
				<div class="section__image cell small-12 large-7 ">
					<div class="c2a-image c2a-image--mask" style="">
						<img src="<?php echo get_stylesheet_directory_uri() . '/dist/assets/images/hero_image1.jpg' ?>;" alt="">
						<?php svef_partial('library/svef/icons/maskTwoSqrs.svg') ?>
					</div>
				</div>
				<div class="section__info cell medium-6 large-5 extra-padd-left-10" >
					<h2 class="section__title less-margin--top medium-offset-1 large-offset-0">Uppskeruhátíð vefiðnaðarins</h2>
					<p class="section__pragraphTall small-10 small-offset-1 medium-offset-0 large-offset-0">
					Samtök vefiðnaðarins eru fagsamtök þeirra er starfa að vefmálum á Íslandi. Samtökin hafa það að markmiði að miðla þekkingu og efla fagleg vinnubrögð í greininni.</p>
				</div>
				<div class="section__link section__link--absolute cell medium-5 medium-offset-5 large-4 large-offset-7 grid-margin-x">
							<a href="">Nánar</a>
							<?php svef_partial('library/svef/icons/linkarrow.svg'); ?>
				</div>
			</div>
		</div>
	</div>



</section>
