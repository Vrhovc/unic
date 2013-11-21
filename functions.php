<?php
/**
 * unic functions and definitions
 *
 * @package unic
 */

/* Hide Option Tree Admin Pages From WP Admin (Only When Development Is Complete!!) */ 
#add_filter( 'ot_show_pages', '__return_false' );
 
if ( ! function_exists( 'unic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function unic_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on unic, use a find and replace
	 * to change 'unic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'unic', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Setup Menus.
	 */
	require get_template_directory() . '/inc/menus.php';	

}
endif; // unic_setup
add_action( 'after_setup_theme', 'unic_setup' );


/**
 * Register Third Party Libraries
 */
require get_template_directory() . '/inc/third-party.php';	


/**
 * Register Sidebars and Widgets.
 */
require get_template_directory() . '/inc/sidebars.php';	


/**
 * Enqueue scripts and styles
 */
require get_template_directory() . '/inc/styles-scripts.php';	

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Dropdown Select Menu Function
 */
require get_template_directory() . '/inc/select-menu.php';
require get_template_directory() . '/inc/select-menu-widget.php';

/**
 * Load Shortcode Functions
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load WooCommerce Features
 */
require get_template_directory() . '/inc/woocommerce.php';