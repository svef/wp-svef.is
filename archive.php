<?php
$home_url = get_home_url();
$a_lang_route = array('en' => 'news', 'is'=>'frettir');
$redirect_to = $home_url.'/'.$a_lang_route[pll_current_language()];
wp_redirect($redirect_to);
?>
