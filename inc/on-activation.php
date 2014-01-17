<?php
//Operations to perform on theme activation


function unic_create_frontpage() {

	if(!get_page_by_title('Home')) 
	{
		//Add the home page
		$new_post = array(
			'post_title' => 'Home',
			'post_content' => 'Welcome to our new website! This is the homepage.',
			'post_status' => 'publish',
			'post_type' => 'page',
			'post_author' => 1,
			'ping_status' => 'closed',
			'comment_status' => 'closed',
		); 
		$home_id = wp_insert_post($new_post);

		//Set as static front page
		update_option( 'page_on_front', $home_id );
		update_option( 'show_on_front', 'page' );
	}
}

add_action( 'after_switch_theme', 'unic_create_frontpage' );




function unic_create_blogpage() {

	if(!get_page_by_title('Blog')) 
	{
		//Add the blog page
		$new_post = array(
			'post_title' => 'Blog',
			'post_content' => '',
			'post_status' => 'publish',
			'post_type' => 'page',
			'post_author' => 1,
			'ping_status' => 'closed',
			'comment_status' => 'closed',			
		); 
		$blog_id = wp_insert_post($new_post);

		//Set as blog page
		update_option( 'page_for_posts', $blog_id );
	}
}

add_action( 'after_switch_theme', 'unic_create_blogpage' );