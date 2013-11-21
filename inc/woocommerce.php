<?php
/* WooCommerce Specific Functionality */

//Declare WooCommerce Support to prevent message in admin
add_theme_support( 'woocommerce' );

//Hide annoying woothemes notices
remove_action( 'admin_notices', 'woothemes_updater_notice' );

?>