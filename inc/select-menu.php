<?php

class Walker_Nav_Menu_Select extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth){
		$indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
	}
 
	function end_lvl(&$output, $depth){
		$indent = str_repeat("\t", $depth); // don't output children closing tag
	}
 
	function start_el(&$output, $item, $depth, $args) {
		$indent = str_repeat("-", $depth);
		$selected = ( in_array("current-menu-item", $item->classes) ) ? ' selected' : '';
 		$url = '#' !== $item->url ? $item->url : '';
 		$output .= '<option value="' . $url . '"'.$selected.'>' . $indent.$item->title;
		if( 0 == $depth ) $output .=  "</option>\n";
		
	}	
 
	function end_el(&$output, $item, $depth){
				
		//Since the walker function was designed to nest list items, we have to test to see if we are adding an unnecessary closing option.
		$test_string = trim(preg_replace('/\s+/', ' ', substr($output, -10)));
		if ($test_string != "</option>") {
			$output .= "</option>\n"; // replace closing </li> with the option tag
		}
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
