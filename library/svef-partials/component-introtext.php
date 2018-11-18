<?php
	// determin if the section should have the margin bottom class
	// NOTE!!! margin_bottom and margin_bottom_inside can never have the same value
	$margin_bottom_class = $margin_bottom && !$margin_bottom_inside ? ' section--margin-bottom ' : $margin_bottom_inside && !$margin_bottom ? ' section--margin-bottom-inside ' : '';
	// this will be nessisary when we do the front page ticker, for now switch like this
	$set_title = $title ? $title : 'missing title';
	// setup a way to change content dynamically (like above) but we have a fallback text
	$set_paragraph = $paragraph ? $paragraph : 'missing text';
?>

<section class="section<?php echo $margin_bottom_class ?>section--introtext grid-container">
    <div class="introtext grid-x" >
      <h2 class="section__title cell small-10 small-offset-1 medium-8 medium-offset-1 large-10 large-offset-1"><?php echo $set_title; ?></h2>
	    <p class="section__paragraph small-8 small-offset-2 medium-8 medium-offset-2 large-8 large-offset-2"><?php echo $set_paragraph; ?></p>
	</div>
</section>
