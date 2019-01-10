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
				$a_supporter_logos_count = count($a_supporter_logos);
				shuffle($a_supporter_logos);
				if($a_supporter_logos_count > 6) {
					$start_hidden = 5;
					$grid_size = '4';
				} elseif($a_supporter_logos_count > 5) {
					$start_hidden = 3;
					$grid_size = '6';
				} else {
					$start_hidden = 2;
					$grid_size = '4';
				}
				for( $i=0; $i < $a_supporter_logos_count; $i++ ) :
					$visability = $i>$start_hidden ? 'hidden_logo' : 'visible_logo';
				?>
				<div class="client-logo logo-each cell small-6 medium-6 large-<?php echo $grid_size; ?> <?php echo $visability; ?>">
					<img src="<?php echo $a_supporter_logos[$i]['sizes']['large']; ?>" alt="">
				</div>
				<?php endfor; ?>
				</div>
		</div>
	</div>
</section>
