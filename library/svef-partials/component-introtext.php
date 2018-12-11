<?php
	// determin if the section should have the margin bottom class
	// NOTE!!! margin_bottom and margin_bottom_inside can never have the same value
	$margin_bottom_class = $margin_bottom_inside ? ' section--margin-bottom-inside ' : ' section--margin-bottom ';
	// this will be nessisary when we do the front page ticker, for now switch like this
	$set_title = $title ? $title : 'missing title';
	// setup a way to change content dynamically (like above) but we have a fallback text
	$set_paragraph = $paragraph ? $paragraph : 'missing text';



	if($is_ticker) {
		// check if the repeater field has rows of data

		$first_ticker_title = $a_ticker_repeater[0]['ticker_title'];
		if( $a_ticker_repeater ):

			// loop through the rows of data
			foreach ( $a_ticker_repeater as $text_ticker_item ) :

			// display a sub field value
			$ticker_title = $text_ticker_item['ticker_title'];
			$s_ticker_item .= '<span class="ticker_item">'.$ticker_title.'</span>';

			endforeach;
			$first_ticker_title = $a_ticker_repeater[0]['ticker_title'];
			// var_dump($first_ticker_title);
		endif;
		$s_ticker = '<div class="scroller">';
		$s_ticker .= '<div class="inner">';
		$s_ticker .= '<span class="ticker">';
		$s_ticker .= '<span class="ticker_item first_ticker current_ticker">'.$first_ticker_title.'</span>';
		$s_ticker .= $s_ticker_item;
		$s_ticker .= '</span>';
		$s_ticker .= '</div>';
		$s_ticker .= '</div>';

		$h2TickerClass = 'h2TickerClass';
		$divTickerClass = 'divTickerClass';

	} else {
		$s_ticker = '';
		$h2TickerClass = '';
		$divTickerClass = '';
	}
?>


<section class="section<?php echo $margin_bottom_class ?>section--introtext grid-container">
    <div class="introtext grid-x" >
		<div class="<?php echo $divTickerClass; ?> section__title cell small-10 small-offset-1 medium-8 medium-offset-1 large-10 large-offset-1">
			<h2 class="<?php echo $h2TickerClass; ?>"><?php echo $set_title; ?></h2>
			<?php echo $s_ticker; ?>
		</div>
			<p class="section__paragraph small-10 small-offset-1 medium-8 medium-offset-2 large-8 large-offset-2"><?php echo $set_paragraph; ?></p>
	</div>
</section>

