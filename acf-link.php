<?php

/*
Plugin Name: Advanced Custom Fields: Link
Plugin URI: PLUGIN_URL
Description: SHORT_DESCRIPTION
Version: 1.0.0
Author: AUTHOR_NAME
Author URI: AUTHOR_URL
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
//load_plugin_textdomain( 'acf-Link', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );

// 3. Include field type for ACF4
function register_fields_Link() {
	include_once(get_stylesheet_directory().'/fields/acf-field-type-link/acf-link-v4.php');
}
add_action('acf/register_fields', 'register_fields_Link');

?>
