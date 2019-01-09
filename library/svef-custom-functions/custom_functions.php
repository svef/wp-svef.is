<?php

// require_once('./acf-export-file.php');

if(!function_exists('svef_partial')){
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
}

if(!function_exists('get_menu_to_select')){
	function get_menu_to_select($current_menu) {
    $array_menu = wp_get_nav_menu_items($current_menu);
		$menu = array();
		$options = '';
		if($array_menu){
			foreach ($array_menu as $m) {
				if (empty($m->menu_item_parent)) {
					$menu_id  = get_page_by_title( $m->title, OBJECT, 'winners' )->ID;
					$menu_title = $m->title;
					$options .= "<option value=\"$menu_id\">$menu_title</option>";
				}
			}
			$select = '<select id="selectWinnerYear" name="selectYear" class="section__select section__select--winners" tabindex="0">';
			$select .= $options;
			$select .= '</select>';
			return $select;

		}
	}
}

// if(!function_exists('allow_svg')) {
// 	function allow_svg($mimes) {
// 		$mimes['svg'] = 'image/svg+xml';
// 		return $mimes;
// 	}
// 	add_filter('upload_mimes', 'allow_svg');
// }

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

if(!function_exists('revcon_change_post_label')){
	function revcon_change_post_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'News';
		$submenu['edit.php'][5][0] = 'News';
		$submenu['edit.php'][10][0] = 'Add News';
		$submenu['edit.php'][16][0] = 'News Tags';
	}
	add_action( 'admin_menu', 'revcon_change_post_label' );
}

if(!function_exists('revcon_change_post_object')){
	function revcon_change_post_object() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'News';
		$labels->singular_name = 'News';
		$labels->add_new = 'Add News';
		$labels->add_new_item = 'Add News';
		$labels->edit_item = 'Edit News';
		$labels->new_item = 'News';
		$labels->view_item = 'View News';
		$labels->search_items = 'Search News';
		$labels->not_found = 'No News found';
		$labels->not_found_in_trash = 'No News found in Trash';
		$labels->all_items = 'All News';
		$labels->menu_name = 'News';
		$labels->name_admin_bar = 'News';
	}
	add_action( 'init', 'revcon_change_post_object' );
}



add_action('init', 'myStartSession', 1);
// add_action('wp_logout', 'myEndSession');
// add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

// function myEndSession() {
//     session_destroy ();
// }

add_filter('gform_init_scripts_footer', '__return_true');



?>
