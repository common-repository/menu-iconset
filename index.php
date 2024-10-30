<?php
/**
* Plugin Name: Menu Iconset
* Plugin URI: https://rainastudio.com/wp-plugins/menu-iconset
* Description: Add icon and description to WordPress menu items.
* Author: RainaStudio
* Author URI: https://rainastudio.com/
* Version: 1.0.0
* Text Domain: menu-iconset
* License: GNU General Public License v2.0 (or later)
* License URI: http://www.opensource.org/licenses/gpl-license.php
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Define Basic Info
define( 'miset_v', '1.0.0');
define( 'miset_domain', 'menu-iconset');

// Plugin & Assets Path
define( 'miset_path', plugin_dir_path( __FILE__ ) );
define( 'miset_lib_path', plugin_dir_path( __FILE__ ) . 'library/' );
define( 'miset_inc_path', plugin_dir_path( __FILE__ ) . 'includes/' );
define( 'miset_css_path', plugins_url( 'assets/css/', __FILE__ ) );

// Include Plugin Parent
include( miset_path . 'menuiconset.php' );