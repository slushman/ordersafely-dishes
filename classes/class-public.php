<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link 		http://ordersafe.ly
 * @since 		1.0.0
 *
 * @package 	OrderSafely_Dishes
 * @subpackage 	OrderSafely_Dishes/classes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package 	OrderSafely_Dishes
 * @subpackage 	OrderSafely_Dishes/classes
 * @author 		Your Name <email@example.com>
 */
class OrderSafely_Dishes_Public {

	/**
	 * The post meta data
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$meta    			The post meta data.
	 */
	private $meta;

	/**
	 * The plugin options.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$options 		The plugin options.
	 */
	private $options;

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $OrderSafely_Dishes    The ID of this plugin.
	 */
	private $OrderSafely_Dishes;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $OrderSafely_Dishes       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $OrderSafely_Dishes, $version ) {

		$this->OrderSafely_Dishes 	= $OrderSafely_Dishes;
		$this->version 		= $version;

		$this->set_options();
		$this->set_meta();

	} // __construct()

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->OrderSafely_Dishes, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/plugin-name-public.css', array(), $this->version, 'all' );

	} // enqueue_styles()

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->OrderSafely_Dishes, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/plugin-name-public.js', array( 'jquery' ), $this->version, true );

	} // enqueue_scripts()

	/**
	 * Sets the class variable $options
	 */
	public function set_meta() {

		global $post;

		if ( empty( $post ) ) { return; }
		if ( 'posttypename' !== $post->post_type ) { return; }

		$this->meta = get_post_custom( $post->ID );

	} // set_meta()

	/**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->OrderSafely_Dishes . '-options' );

	} // set_options()

	/**
	 * Processes shortcode shortcodename
	 *
	 * @param 	array 	$atts 		Shortcode attributes
	 *
	 * @return	mixed	$output		Output of the buffer
	 */
	public function shortcode_shortcodename( $atts = array() ) {

		ob_start();

		$defaults['taxonomyname'] 	= '';
		$defaults['loop-template'] 	= $this->OrderSafely_Dishes . '-loop';
		$defaults['order'] 			= 'ASC';
		$defaults['quantity'] 		= 100;
		$defaults['show'] 			= '';
		$args						= shortcode_atts( $defaults, $atts, 'shortcodename' );
		$shared 					= new OrderSafely_Dishes_Shared( $this->OrderSafely_Dishes, $this->version );
		$items 						= $shared->query( $args );

		if ( is_array( $items ) || is_object( $items ) ) {

			include OrderSafely_Dishes_get_template( $args['loop-template'], 'loop' );

		} else {

			echo $items;

		}

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	} // shortcode_shortcodename()

} // class
