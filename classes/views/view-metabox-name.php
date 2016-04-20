<?php

/**
 * Displays a metabox
 *
 * @link       http://ordersafe.ly
 * @since      1.0.0
 *
 * @package    OrderSafely_Dishes
 * @subpackage OrderSafely_Dishes/classes/views
 */

wp_nonce_field( $this->OrderSafely_Dishes, 'nonce_ordersafely_dishes_metabox_name' );

/*

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'phone-office';
$atts['label'] 			= 'Office Phone';
$atts['name'] 			= 'phone-office';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->OrderSafely_Dishes . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p><?php

*/
