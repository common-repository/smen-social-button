<?php
/*
Plugin Name: Smen Social Button
Plugin URI: http://smen.ro/wordpress-plugin.html
Description: Adds a button that enables users to vote your posts using smen.ro directly from your blog.
Version: 0.7
Author: Alexandru Dumencu
Author URI: http://www.ylipsis.com
License: GPL2
*/

add_filter( "the_content", "addSmenVoteButton");

add_option('smenVerticalPosition', 'top');
add_option('smenHorizontalPosition', 'right');
add_option('smenCustomPlacement', 'false');

function addSmenVoteButton($content) {
	if(get_option('smenCustomPlacement') != 'true') {
		if(get_option('smenVerticalPosition') == 'top') {
			if(get_option('smenHorizontalPosition') == 'right') {
				return '<div style="float:right; margin:0 0 10px 10px; z-index: 1; position: relative;">'.smenVoteTag().'</div>'.$content;
			}else {
				return '<div style="float:left; margin:0 10px 10px 0; z-index: 1; position: relative;">'.smenVoteTag().'</div>'.$content;
			}
		}else {
			if(get_option('smenHorizontalPosition') == 'right') {
				return $content.'<div style="text-align:right">'.smenVoteTag().'</div>';
			}else {
				return $content.'<div style="text-align:left">'.smenVoteTag().'</div>';
			}
		}
	}
	return $content;
}


function smenVoteTag() {
	return '<script type="text/javascript" src="http://smen.ro/wp-plugin.js?url='.urlencode(get_permalink()).'"></script>';
}

function displaySmenVote() {
	echo smenVoteTag();
}

// create custom plugin settings menu
add_action('admin_menu', 'smenCreateMenu');

function smenCreateMenu() {

	//create new top-level menu
	add_menu_page('Smen Settings', 'Șmen Settings', 'administrator', __FILE__, 'smenSettingsPage', plugins_url('/favicon.ico', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'smen-settings-group', 'smenVerticalPosition' );
	register_setting( 'smen-settings-group', 'smenHorizontalPosition' );
	register_setting( 'smen-settings-group', 'smenCustomPlacement' );
}

function smenSettingsPage() {
	require('settings_page.php');
}

?>
