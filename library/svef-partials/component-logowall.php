<?php
	$a_infotext = array(
		'title' => pll__(get_field('logo_intro_title', 'option')),
		'paragraph' => pll__(get_field('logo_intro_text', 'option')),
		'margin_bottom_inside' => true);
?>
<?php svef_partial('library/svef-partials/component-introtext', $a_infotext); ?>

<section class="section section--margin-bottom section--logowall">

	<div class="grid-container">
	<div class="supportors-logos grid-x grid-padding-x" >
		<div class="section__bg-fix section__bg-fix--right-logowall section__bg-fix--default" aria-hidden="true"></div>
		<div class="logos-all grid-x cell small-12 small-offset-0 medium-12 medium-offset-0 large-10 large-offset-2 ">
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
