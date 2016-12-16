<?php 
function wpcp_scripts() {

	wp_enqueue_style('style', WPCP_BASE_URL . 'assets/css/style.css');
	//wp_enqueue_style('style', WPCP_BASE_URL . 'assets/css/admin-style.css');
	wp_enqueue_script('jquery');

	wp_register_script( 'wpcp_popup', WPCP_BASE_URL . 'assets/js/wpcp-modal.js');

    wp_enqueue_script( 'wpcp_popup' );
}

add_action('wp_enqueue_scripts', 'wpcp_scripts');
