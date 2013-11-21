<?php


/**
 * Unsemantic Columns
 */
function grid_shortcode( $atts=NULL, $content=NULL ) 
{
	# Usage: [grid 33]
	# WordPress does not discard attributes without values, rather they are passed as a value to an unnamed attribute.
	# So, in this case we should have $atts[0] = 33

		# If we have a number return the grid code
		if(is_numeric($atts[0]))
		{
		 return '<div class="grid-'.$atts[0].'">'.$content.'</div>';
		}
		# On error, we will just ignore the idea...
		else 
		{
			 return $content;
		}

}
add_shortcode( 'grid', 'grid_shortcode' );


/**
 * Add shortcodes functionality to widget text
 */
add_filter('widget_text', 'do_shortcode');

/**
 * Add a dropdown of all registered shortcodes to WYSIWYG Editor
 */
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
    global $shortcode_tags;
     /* ------------------------------------- */
     /* enter names of shortcode to exclude bellow */
     /* ------------------------------------- */
    $exclude = array("wp_caption", "embed");
    echo '&nbsp;<select id="sc_select"><option>Shortcode</option>';
    foreach ($shortcode_tags as $key => $val){
            if(!in_array($key,$exclude)){
            $shortcodes_list .= '<option value="['.$key.'][/'.$key.']">'.$key.'</option>';
            }
        }
     echo $shortcodes_list;
     echo '</select>';
}
add_action('admin_head', 'button_js');
function button_js() {
        echo '<script type="text/javascript">
        jQuery(document).ready(function(){
           jQuery("#sc_select").change(function() {
                          send_to_editor(jQuery("#sc_select :selected").val());
                          return false;
                });
        });
        </script>';
}

?>

