<?php

	if(function_exists('pll_register_string')) {
		// Hero section
		pll_register_string( 'Hero section', 'Lesa grein', 'SVEF');

		// Events section
		pll_register_string( 'Events section', 'Skoða alla viðburði', 'SVEF');

		// c2a section
		pll_register_string('c2a', 'Nánar', 'SVEF');

		// Header section
		pll_register_string('Header', 'valm', 'SVEF');

		// Show more button
		pll_register_string('Elements', 'Sjá fleiri'. 'SVEF');
		// links
		pll_register_string('Elements', 'Skoða nánar'. 'SVEF');
		// cookie message
		pll_register_string('Cookie', get_field('cookie_message', 'option'), 'SVEF');
		pll_register_string('Cookie', 'Vefstefna SVEF', 'SVEF');
		pll_register_string('Cookie', 'OK takk', 'SVEF');
	}
?>
