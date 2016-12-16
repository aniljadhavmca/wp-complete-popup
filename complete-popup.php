<?php 
/**
* @wordpress-plugin
 * Plugin Name:       WP Complete Popup
 * Plugin URI:        aniljadhav.in
 * Description:       WP Complete Popup pligin is usefull to show wordpress post in poppup
 * Version:           1.0.0
 * Author:            Anil
 * Plugin URI:        aniljadhav.ani
 * Text Domain:       complete-popup
 * License:           GPL-2.0+
 **/

/**********************************
* Constants and globals
**********************************/

if(!defined('WPCP_BASE_URL')) {
	define('WPCP_BASE_URL', plugin_dir_url(__FILE__));
}

if(!defined('WPCP_BASE_DIR')) {
	define('WPCP_BASE_DIR', dirname(__FILE__));
}

/*******************************************
* Plugin text domain for translations
*******************************************/

load_plugin_textdomain( 'complete-popup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**********************************
* includes
**********************************/

include(WPCP_BASE_DIR . '/inc/template.php');
include(WPCP_BASE_DIR . '/inc/script.php');
 
