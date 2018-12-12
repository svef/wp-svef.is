<?php
	$a_infotext = array(
		'title' => get_field('logo_intro_title', 'option'),
		'paragraph' => get_field('logo_intro_text', 'option'),
		'margin_bottom_inside' => true);

?>
<section class="section section--margin-bottom section--logowall">
	<div class="grid-container">
		<div class="introtext" >
			<div class="grid-x grid-padding-x">
				<?php svef_partial('library/svef-partials/component-introtext', $a_infotext); ?>
			</div>
		</div>
	</div>

	<div class="grid-container">
	<div class="supportors-logos grid-x" >
			<div class="section__bg-fix section__bg-fix--right section__bg-fix--default" aria-hidden="true"></div>
			<div class="logos-all grid-x grid-padding-x medium-8 medium-offset-2 cell large-10 large-offset-2">
			<?php
				$a_supporter_logos = get_field('supporter_logo', 'option');
				shuffle($a_supporter_logos);
				for( $i=0; $i < count($a_supporter_logos); $i++ ) :
					$visability = $i>5 ? 'hidden_logo' : 'visible_logo';
				?>
				<div class="client-logo logo-each cell small-6 medium-6 large-4 <?php echo $visability; ?>">
					<img src="<?php echo $a_supporter_logos[$i]['sizes']['large']; ?>" alt="">
				</div>
				<?php endfor; ?>
				</div>
		</div>
	</div>
</section>
