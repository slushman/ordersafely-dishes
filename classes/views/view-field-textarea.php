<?php

/**
 * Provides the markup for any textarea field
 *
 * @link       http://ordersafe.ly
 * @since      1.0.0
 *
 * @package    OrderSafely_Dishes
 * @subpackage OrderSafely_Dishes/classes/views
 */

if ( ! empty( $atts['label'] ) ) {

	?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php echo wp_kses( $atts['label'], array( 'code' => array() ) ); ?>: </label><?php

}

?><textarea
	class="<?php echo esc_attr( $atts['class'] ); ?>"
	cols="<?php echo esc_attr( $atts['cols'] ); ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"
	rows="<?php echo esc_attr( $atts['rows'] ); ?>"><?php

	echo esc_textarea( $atts['value'] );

?></textarea>
<span class="description"><?php echo wp_kses( $atts['description'], array( 'code' => array() ) ); ?></span>
