<?php

	if(function_exists('pll_register_string')) {
		// Hero section
		pll_register_string( 'Hero section', 'Lesa grein', 'SVEF');

		// Events section
		pll_register_string( 'Events section', 'Skoða alla viðburði', 'SVEF');

		// c2a section
		pll_register_string('c2a', 'Nánar', 'SVEF');
		pll_register_string('c2a', 'Lesa meira', 'SVEF');

		// Header section
		pll_register_string('Header', 'valm', 'SVEF');

		// Show more button
		pll_register_string('Elements', 'Sjá fleiri', 'SVEF');
		// links
		pll_register_string('Elements', 'Skoða nánar', 'SVEF');
		// open form button
		pll_register_string('Elements', 'Skráning í svef', 'SVEF');
		// open award link page
		pll_register_string('Elements', 'Skoða vef', 'SVEF');

		// footer info text
		pll_register_string('Footer', get_field('footer_svef_introtext', 'option'), 'SVEF');

		// Logowall info text
		pll_register_string('Logowall', get_field('logo_intro_title', 'option'), 'SVEF');
		pll_register_string('Logowall', get_field('logo_intro_text', 'option'), 'SVEF');
		
		// cookie message
		pll_register_string('Cookie', get_field('cookie_message', 'option'), 'SVEF');
		pll_register_string('Cookie', 'Vefstefna SVEF', 'SVEF');
		pll_register_string('Cookie', 'OK takk', 'SVEF');
	
		// form acf info repeater we can regiseter the strings like so
		pll_register_string('Gform info header title', get_field('signup_title', 'option'), 'SVEF');
		$gForm_info_options = get_field('signup_options', 'option');
		foreach ($gForm_info_options as $key => $value) {
			pll_register_string('Gform info title-'.$key, $value['step_title'], 'SVEF');
			pll_register_string('Gform info text-'.$key, $value['step_text'], 'SVEF');
		}
	}
?>
