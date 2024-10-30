<?php
/** 
* @package menuiconset
* @version 1.0.0
* @author RainaStudio
* Text Domain: menu_iconset
*/

// menu iconset walker function
function miset_filter_walker( $walker ) {
	$walker = 'MI_CFields_Walker';
	if ( ! class_exists( $walker ) ) {
		require_once dirname( __FILE__ ) . '/walker-nav-menu-edit.php';
	}

	return $walker;
}

// walker-function load function
function miset_load_walker_function() {
	add_filter( 'wp_edit_nav_menu_walker', 'miset_filter_walker', 99 );
}
add_action( 'wp_loaded', 'miset_load_walker_function', 9 );