<section class="section section__video section--margin-bottom">
	<?php
		svef_partial('library/svef-partials/component-introtext', ['title' => $title, 'paragraph' => $paragraph, 'margin_bottom_inside' => true]);
	?>
	<div class="grid-container">
		<div class="grid-x">
			<div class="responsive-embed widescreen small-12 medium-10 medium-offset-2">
			<?php echo $video; ?>
			</div>

		</div>

	</div>

</section>
