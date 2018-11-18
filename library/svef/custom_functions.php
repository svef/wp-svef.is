<?php
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

if(!function_exists('wp_get_menu_array')){
	function wp_get_menu_array($current_menu) {

    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {

            $menu[]->id      =   get_page_by_title( $m->title, OBJECT, 'winners' )->ID;
            $menu[]->title       =   $m->title;

        }
    }

    return $menu;

	}
}



?>
