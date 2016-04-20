<?php

/**
 * Displays a metabox
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    OrderSafely_Dishes
 * @subpackage OrderSafely_Dishes/classes/views
 */

wp_nonce_field( $this->OrderSafely_Dishes, 'nonce_ordersafely_dishes_subtitle' );

$atts 					= array();
$atts['class'] 			= 'widefat';
$atts['description'] 	= '';
$atts['id'] 			= 'subtitle';
$atts['label'] 			= __( 'Subtitle', 'plugin-name' );
$atts['name'] 			= 'subtitle';
$atts['placeholder'] 	= __( 'Enter the subtitle', 'plugin-name' );
$atts['type'] 			= 'text';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->OrderSafely_Dishes . '-field-subtitle', $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . 'view-field-text.php' );

?></p>
