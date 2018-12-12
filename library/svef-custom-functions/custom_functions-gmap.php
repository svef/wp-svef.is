<?php
	function my_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyAV31hWQmY3-HqsSQyKf7HxqMlCVoOwA0c');
	}
	add_action('acf/init', 'my_acf_init');
?>
