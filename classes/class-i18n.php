<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link 		http://ordersafe.ly
 * @since 		1.0.0
 *
 * @package 	OrderSafely_Dishes
 * @subpackage 	OrderSafely_Dishes/classes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since 		1.0.0
 * @package 	OrderSafely_Dishes
 * @subpackage 	OrderSafely_Dishes/classes
 * @author 		Your Name <email@example.com>
 */
class OrderSafely_Dishes_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'plugin-name',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/assets/languages/'
		);

	} // load_plugin_textdomain()

} // class
