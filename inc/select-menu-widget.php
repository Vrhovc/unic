<?php
/**
 * Select Navigation Menu widget class
 *
 * @since 3.0.0
 */
 class WP_Nav_Select_Menu_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __('Use this widget to create a select dropdown one of your custom menus as a widget.') );
		parent::__construct( 'select_nav_menu', __('Custom Select Menu'), $widget_ops );
	}

	function widget($args, $instance) {
		// Get menu
		$select_nav_menu = ! empty( $instance['select_nav_menu'] ) ? wp_get_nav_menu_object( $instance['select_nav_menu'] ) : false;

		if ( !$select_nav_menu )
			return;

		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		if ( !empty($instance['title']) )
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
			
		wp_nav_menu_select( array( 'theme_location' => $select_nav_menu ) );
		
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['select_nav_menu'] = (int) $new_instance['select_nav_menu'];
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['select_nav_menu'] ) ? $instance['select_nav_menu'] : '';

		// Get menus
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('select_nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
			<select id="<?php echo $this->get_field_id('select_nav_menu'); ?>" name="<?php echo $this->get_field_name('select_nav_menu'); ?>">
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $select_nav_menu, $menu->term_id, false )
					. '>'. $menu->name . '</option>';
			}
		?>
			</select>
		</p>
		<?php
	}
}

add_action( 'widgets_init', function(){
     register_widget('WP_Nav_Select_Menu_Widget');
});


?>
