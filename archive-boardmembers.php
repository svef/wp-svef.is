<?php
	$home_url = get_home_url();
	$a_lang_route = array('en' => 'about-svef/board/', 'is'=>'um-svef/stjorn');
	$redirect_to = $home_url.'/'.$a_lang_route[pll_current_language()];
	wp_redirect($redirect_to);

?>


