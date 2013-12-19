<?php
function unic_scripts() {

	//CSS
	wp_enqueue_style( 'unic-style', get_stylesheet_uri() );

	//Javascripts
	wp_enqueue_script( 'unic-general', get_template_directory_uri() . '/js/general.js', array('jquery'), '20131202', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/third-party/magnific-popup.js', array('jquery','unic-general'), '20131202', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'unic-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20131202', true );
	}

	
}
add_action( 'wp_enqueue_scripts', 'unic_scripts' );

//Remove default gallery style in exchange for fluid gallery columns via scss
add_filter( 'use_default_gallery_style', '__return_false' );

?>
