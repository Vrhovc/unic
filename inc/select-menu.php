<?php

class Walker_Nav_Menu_Select extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
	}
 
	function end_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth); // don't output children closing tag
	}
 
	function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
		$indent = str_repeat("--", $depth);
		$selected = ( in_array("current-menu-item", $item->classes) ) ? ' selected' : '';
 		$url = '#' !== $item->url ? $item->url : '';
 		$output .= '<option value="' . $url . '"'.$selected.'>' . $indent.$item->title;
	}	
 
	function end_el(&$output, $item, $depth = 0, $args = array()){
		$output .= "</option>\n"; // replace closing </li> with the option tag
	}
}

function wp_nav_menu_select($args = array())
{
    $defaults = array(
        'theme_location' => '',
        'menu_class' 	 => 'select-menu',
		'walker'         => new Walker_Nav_Menu_Select(),
		'orderby' 		 => 'menu_order',
		'items_wrap'     => '<select id="menu-'.$args['theme_location'].'" class="'.$args['menu_class'].'" onchange="if (this.value) window.location.href=this.value">%3$s</select>'
    );
    $args     = wp_parse_args($args, $defaults);
	
	wp_nav_menu( $args );
}
?>