<?php
	function svef_partial($path, $args = [], $echo = true) {
		if (!empty($args)) {
			extract($args);
		}
		if ($echo) {
			include(locate_template($path . '.php'));
			return;
		}
		ob_start();
		include(locate_template($path . '.php'));
		return ob_get_clean();
	}

	function my_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyAV31hWQmY3-HqsSQyKf7HxqMlCVoOwA0c');
	}

	add_action('acf/init', 'my_acf_init');


?>
