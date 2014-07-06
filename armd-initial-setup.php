<?php
/*
Plugin Name: AndrewRMinion Design Initial Setup
Plugin URI: http://code.andrewrminion.com/plugins/initial-setup/
Description: Basic initial setup for new sites
Version: 1.1
Author: Andrew Minion
Author URI: http://andrewrminion.com
License: GPL2
*/

function ARMD_initial_setup() {
	// start the week with Sunday
	update_option( 'start_of_week', 0 );
	
	// time format 5:47 AM
	update_option( 'time_format', 'g:i A' );
	update_option( 'links_updated_time_format', 'F j, Y g:i a' );
	
	// timezone
	update_option( 'timezone_string', 'America/New_York' );
	
	// comments disabled by default
	update_option( 'default_comment_status', 'closed' );
	
	// set permalink structure
	update_option( 'permalink_structure', '/%postname%/' );
	
	// show page instead of posts on front
	$new_home_page_array = array (
		'post_author' => 1,
		'post_content' => 'Created on ' . date('r') . ' as part of initial setup by AndrewRMinion Design.',
		'post_name' => 'home',
		'post_status' => 'publish',
		'post_title' => 'Home',
		'post_type' => 'page'
	);
	$home_id = wp_insert_post( $new_home_page_array );
	
	$new_post_page_array = array (
		'post_author' => 1,
		'post_content' => 'Created on ' . date('r') . ' as part of initial setup by AndrewRMinion Design.',
		'post_name' => 'updates',
		'post_status' => 'publish',
		'post_title' => 'Updates',
		'post_type' => 'page'
	);
	$post_id = wp_insert_post( $new_post_page_array );
	
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home_id );
	update_option( 'page_for_posts', $post_id );
	
	// remove default post and page
	wp_trash_post( 1 );
	wp_trash_post( 2 );
	
	// update default user
	update_user_meta( 1, 'first_name', 'Andrew' );
	update_user_meta( 1, 'last_name', 'Minion' );
	wp_update_user( array (
		'ID' => 1,
		'display_name' => 'Andrew Minion',
		'website' => 'http://andrewrminion.com'
	) );
	
	// enable XML-RPC
	
	// install WP Remote plugin
	// install Audit Trail plugin
	// install Google Analytics for WP plugin
	// install Peter's Login Redirect plugin
	// use curl? use reminders at top (similar to WP Remote or Akismet) with links to install?
	
	// delete twentyten theme
	// delete Hello Dolly plugin
	// use shell script?
	
	// show reminder to deactivate/delete self
	
}

register_activation_hook( __FILE__, 'ARMD_initial_setup' );
?>