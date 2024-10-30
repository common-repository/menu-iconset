<?php
/** 
* @package menuiconset
* @version 1.0.0
* @author RainaStudio
* Text Domain: menu_iconset
*/

// Add Plugin Menu Item Custom Fields Example
require_once( miset_lib_path . 'mi-cfields-lib.php');
include( miset_inc_path . 'mi-cfields.php');

// Show Menu Items Description
function miset_nav_description( $item_output, $item, $depth, $args ) {

    $icon_url = get_post_meta( $item->ID, 'menu-item-field-icon_url', true );
    if ( !empty( $item->description ) ) {
      
	    	$item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output );
	    
	 } 
	 if ( !empty( $icon_url ) ){
	    
	            $item_output = str_replace( $args->link_after . '</a>', '<div class="icon-img-wrap"><img src="' . $icon_url . '"></div>' . $args->link_after . '</a>', $item_output );
	    
    } 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'miset_nav_description', 10, 4 );

// Add custom class to menu_item
function miset_menu_parent_class( $items ) {
 
    // Add class.
    foreach ( $items as $item ) {
        $icon_url = get_post_meta( $item->ID, 'menu-item-field-icon_url', true );
        if ( !empty( $item->description ) || !empty( $icon_url ) ) {
            $item->classes[] = 'has-des-or-icon';
        }
        
    }
    return $items;
}
add_filter( 'wp_nav_menu_objects', 'miset_menu_parent_class' );

// Add Styles
function miset_scripts() {

    wp_enqueue_style('menu_iconset_style', miset_css_path . 'style.css', array(), miset_v, 'all', true );
}
add_action('wp_enqueue_scripts', 'miset_scripts', 5);