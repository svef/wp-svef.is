<?php
	function my_acf_init() {

		acf_update_setting('google_api_key', 'AIzaSyDXmXhd0hbxYV8036AJqwgGdaDilwzhNFU');
	}

	add_action('acf/init', 'my_acf_init');

	add_filter('acf/settings/google_api_key', function () {
		return 'AIzaSyDXmXhd0hbxYV8036AJqwgGdaDilwzhNFU';
	});
?>
