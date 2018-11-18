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

if(!function_exists('get_menu_to_select')){
	function get_menu_to_select($current_menu) {

    $array_menu = wp_get_nav_menu_items($current_menu);
		$menu = array();
		$options = '';
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {

            $menu_id  = get_page_by_title( $m->title, OBJECT, 'winners' )->ID;
            $menu_title = $m->title;
						$options .= "<option value=\"$menu_id\">$menu_title</option>";
        }
		}
		$select = '<select id="selectWinnerYear" name="selectYear" class="section__select">';
		$select .= $options;
		$select .= '</select>';

    return $select;

	}
}



?>
