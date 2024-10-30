<?php
/** 
* @package menuiconset
* @version 1.0.0
* @author RainaStudio
* Text Domain: menu_iconset
*
*/

$fields = array (
    'field-icon_url' => __( 'Icon URL', 'menu-item-custom-icon_url' ),
    //'field-02' => __( 'New Field', 'menu-item-custom-new_field' ),
);

// funtion to add fields to menu item
function menu_iconset_c_fields( $id, $item, $depth, $args ) {
    global $fields;
    foreach ( $fields as $_key => $label ) :
        $key   = sprintf( 'menu-item-%s', $_key );
        $id    = sprintf( 'edit-%s-%s', $key, $item->ID );
        $name  = sprintf( '%s[%s]', $key, $item->ID );
        $value = get_post_meta( $item->ID, $key, true );
        $class = sprintf( 'field-%s', $_key );
        ?>
            <p class="description description-wide <?php echo esc_attr( $class ) ?>">
                <?php printf(
                    '<label for="%1$s">%2$s<br /><input type="text" id="%1$s" class="widefat %1$s" name="%3$s" value="%4$s" /></label>',
                    esc_attr( $id ),
                    esc_html( $label ),
                    esc_attr( $name ),
                    esc_attr( $value )
                ) ?>
            </p>
        <?php
    endforeach;
}
add_action( 'wp_nav_menu_item_custom_fields', 'menu_iconset_c_fields', 10, 4 );

// function to save custom fields
function save_menu_iconset_c_fields( $menu_id, $menu_item_db_id, $menu_item_args ) {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        return;
    }
    
    global $fields;
    check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
    foreach ( $fields as $_key => $label ) {
        $key = sprintf( 'menu-item-%s', $_key );
		
		// Check if element is properly sent
		if ( is_array( $_REQUEST[ $key ]) ) {
			$value = sanitize_text_field( $_REQUEST[ $key ][$menu_item_db_id] );
			update_post_meta( $menu_item_db_id, $key, $value );
		}

    }
}
add_action( 'wp_update_nav_menu_item', 'save_menu_iconset_c_fields', 10, 3 );

// function to add them to screen
function columns_menu_iconset_c_fields( $columns ) {
    global $fields;
    $columns = array_merge( $columns, $fields );
    return $columns;
}
add_filter( 'manage_nav-menus_columns', 'columns_menu_iconset_c_fields', 99 );