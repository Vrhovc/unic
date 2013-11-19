<?php

/**
 * Register widgetized area and update sidebar with default widgets
 * Do this in widgets_init so we can create a child theme if ever needed...
 */
function unic_sidebars_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'unic' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'unic_sidebars_init' );

?>