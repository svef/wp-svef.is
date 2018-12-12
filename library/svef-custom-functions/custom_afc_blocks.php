<?php

// Register a testimonial ACF Block
if( function_exists('acf_register_block') ) {

	$result = acf_register_block(array(
		'name'				=> 'testimonial',
		'title'				=> __('Testimonial'),
		'description'		=> __('A custom testimonial block.'),
		'render_callback'	=> 'my_testimonial_block_html'
		//'category'		=> '',
		//'icon'			=> '',
		//'keywords'		=> array(),
	));
}

// Callback to render the testimonial ACF Block
function my_testimonial_block_html() {

	// vars
	$testimonial = get_field('testimonial');
	$author = get_field('author');
	$avatar = get_field('avatar');

	?>
	<blockquote class="testimonial">
	    <p><?php echo $testimonial; ?></p>
	    <cite>
	    	<img src="<?php echo $avatar['url']; ?>" alt="<?php echo $avatar['alt']; ?>" />
	    	<span><?php echo $author; ?></span>
	    </cite>
	</blockquote>
	<?php
}
