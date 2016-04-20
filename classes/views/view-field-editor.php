<?php

/**
 * Provides the markup for any WP Editor field
 *
 * @link       http://ordersafe.ly
 * @since      1.0.0
 *
 * @package    OrderSafely_Dishes
 * @subpackage OrderSafely_Dishes/classes/views
 */

// wp_editor( $content, $editor_id, $settings = array() );

wp_editor( $atts['value'], $atts['id'], $atts['settings'] );

?><span class="description"><?php echo wp_kses( $atts['description'], array( 'code' => array() ) ); ?></span>
