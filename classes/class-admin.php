<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link 		http://ordersafe.ly
 * @since 		1.0.0
 *
 * @package 	OrderSafely_Dishes
 * @subpackage 	OrderSafely_Dishes/classes
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package 	OrderSafely_Dishes
 * @subpackage 	OrderSafely_Dishes/classes
 * @author 		Your Name <email@example.com>
 */
class OrderSafely_Dishes_Admin {

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
	 * @since    	1.0.0
	 * @access   	private
	 * @var      	string    		$OrderSafely_Dishes 		The ID of this plugin.
	 */
	private $OrderSafely_Dishes;

	/**
	 * The version of this plugin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$version 			The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @param 		string 		$OrderSafely_Dishes 		The name of this plugin.
	 * @param 		string 		$version 			The version of this plugin.
	 */
	public function __construct( $OrderSafely_Dishes, $version ) {

		$this->OrderSafely_Dishes 	= $OrderSafely_Dishes;
		$this->version 		= $version;

		$this->set_options();

	} // __construct()

	/**
	 * Adds a settings page link to a menu
	 *
	 * @link 		https://codex.wordpress.org/classesistration_Menus
	 * @since 		1.0.0
	 */
	public function add_menu() {

		// Top-level page
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

		// Submenu Page
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);

		add_submenu_page(
			'edit.php?post_type=posttypename',
			apply_filters( $this->OrderSafely_Dishes . '-settings-page-title', esc_html__( 'Plugin Name Settings', 'plugin-name' ) ),
			apply_filters( $this->OrderSafely_Dishes . '-settings-menu-title', esc_html__( 'Settings', 'plugin-name' ) ),
			'manage_options',
			$this->OrderSafely_Dishes . '-settings',
			array( $this, 'page_options' )
		);

		add_submenu_page(
			'edit.php?post_type=posttypename',
			apply_filters( $this->OrderSafely_Dishes . '-settings-page-title', esc_html__( 'Plugin Name Help', 'plugin-name' ) ),
			apply_filters( $this->OrderSafely_Dishes . '-settings-menu-title', esc_html__( 'Help', 'plugin-name' ) ),
			'manage_options',
			$this->OrderSafely_Dishes . '-help',
			array( $this, 'page_help' )
		);

	} // add_menu()

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->OrderSafely_Dishes, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/plugin-name-admin.css', array(), $this->version, 'all' );

	} // enqueue_styles()

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->OrderSafely_Dishes, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/plugin-name-admin.js', array( 'jquery' ), $this->version, true );

	} // enqueue_scripts()

	/**
	 * Creates a checkbox field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_checkbox( $args ) {

		$defaults['class'] 			= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->OrderSafely_Dishes . '-options[' . $args['id'] . ']';
		$defaults['value'] 			= 0;

		apply_filters( $this->OrderSafely_Dishes . '-field-checkbox-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-checkbox.php' );

	} // field_checkbox()

	/**
	 * Creates a set of radios field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_radios( $args ) {

		$defaults['class'] 			= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->OrderSafely_Dishes . '-options[' . $args['id'] . ']';
		$defaults['value'] 			= 0;

		apply_filters( $this->OrderSafely_Dishes . '-field-radios-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-radios.php' );

	} // field_radios()

	/**
	 * Creates a select field
	 *
	 * Note: label is blank since its created in the Settings API
	 *
	 * @param 	array 		$args 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_select( $args ) {

		$defaults['aria'] 			= '';
		$defaults['blank'] 			= '';
		$defaults['class'] 			= '';
		$defaults['context'] 		= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->OrderSafely_Dishes . '-options[' . $args['id'] . ']';
		$defaults['selections'] 	= array();
		$defaults['value'] 			= '';

		apply_filters( $this->OrderSafely_Dishes . '-field-select-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		if ( empty( $atts['aria'] ) && ! empty( $atts['description'] ) ) {

			$atts['aria'] = $atts['description'];

		} elseif ( empty( $atts['aria'] ) && ! empty( $atts['label'] ) ) {

			$atts['aria'] = $atts['label'];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-select.php' );

	} // field_select()

	/**
	 * Creates a text field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_text( $args ) {

		$defaults['class'] 			= 'text widefat';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->OrderSafely_Dishes . '-options[' . $args['id'] . ']';
		$defaults['placeholder'] 	= '';
		$defaults['type'] 			= 'text';
		$defaults['value'] 			= '';

		apply_filters( $this->OrderSafely_Dishes . '-field-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-text.php' );

	} // field_text()

	/**
	 * Creates a textarea field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_textarea( $args ) {

		$defaults['class'] 			= 'large-text';
		$defaults['cols'] 			= 50;
		$defaults['context'] 		= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->OrderSafely_Dishes . '-options[' . $args['id'] . ']';
		$defaults['rows'] 			= 10;
		$defaults['value'] 			= '';

		apply_filters( $this->OrderSafely_Dishes . '-field-textarea-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'views/view-field-textarea.php' );

	} // field_textarea()

	/**
	 * Returns an array of options names, fields types, and default values
	 *
	 * @return 		array 			An array of options
	 */
	public static function get_options_list() {

		$options = array();

		$options[] = array( 'text-field', 'text', '' );
		$options[] = array( 'select-field', 'select', '' );

		return $options;

	} // get_options_list()

	/**
	 * Adds a link to the plugin settings page
	 *
	 * @since 		1.0.0
	 *
	 * @param 		array 		$links 		The current array of links
	 *
	 * @return 		array 					The modified array of links
	 */
	public function link_settings( $links ) {

		$links[] = sprintf( '<a href="%s">%s</a>', admin_url( 'edit.php?post_type=posttypename&page=plugin-name-settings' ), esc_html__( 'Settings', 'plugin-name' ) );

		return $links;

	} // link_settings()

	/**
	 * Adds links to the plugin links row
	 *
	 * @since 		1.0.0
	 *
	 * @param 		array 		$links 		The current array of row links
	 * @param 		string 		$file 		The name of the file
	 *
	 * @return 		array 					The modified array of row links
	 */
	public function link_row_meta( $links, $file ) {

		if ( $file == ORDERSAFELY_DISHES_FILE ) {

			$links[] = '<a href="http://twitter.com/slushman">Twitter</a>';

		}

		return $links;

	} // link_row_meta()

	/**
	 * Includes the help page view
	 *
	 * @since 		1.0.0
	 *
	 * @return 		void
	 */
	public function page_help() {

		include( plugin_dir_path( __FILE__ ) . 'views/view-page-help.php' );

	} // page_help()

	/**
	 * Includes the options page view
	 *
	 * @since 		1.0.0
	 *
	 * @return 		void
	 */
	public function page_options() {

		include( plugin_dir_path( __FILE__ ) . 'views/view-page-settings.php' );

	} // page_options()

	/**
	 * Registers settings fields with WordPress
	 */
	public function register_fields() {

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		add_settings_field(
			'text-field',
			apply_filters( $this->OrderSafely_Dishes . '-label-text-field', esc_html__( 'Text Field', 'plugin-name' ) ),
			array( $this, 'field_text' ),
			$this->OrderSafely_Dishes,
			$this->OrderSafely_Dishes . '-settingssection',
			array(
				'description' 	=> __( 'Text field description.', 'plugin-name' ),
				'id' 			=> 'text-field',
				'value' 		=> '',
			)
		);

		add_settings_field(
			'select-field',
			apply_filters( $this->OrderSafely_Dishes . '-label-select-field', esc_html__( 'Select Field', 'plugin-name' ) ),
			array( $this, 'field_select' ),
			$this->OrderSafely_Dishes,
			$this->OrderSafely_Dishes . '-settingssection',
			array(
				'description' 	=> __( 'Select description.', 'plugin-name' ),
				'id' 			=> 'select-field',
				'selections'	=> array(
					array( 'label' => esc_html__( 'Label', 'plugin-name' ), 'value' => 'value' ),
				),
				'value' 		=> ''
			)
		);

		add_settings_field(
			'editor-field',
			apply_filters( $this->OrderSafely_Dishes . 'label-editor-field', esc_html__( 'Editor Field', 'plugin-name' ) ),
			array( $this, 'field_editor' ),
			$this->OrderSafely_Dishes,
			$this->OrderSafely_Dishes . '-messages',
			array(
				'description' 	=> __( 'Editor field description.',
				'id' 			=> 'howtoapply', 'plugin-name' )
		);

	} // register_fields()

	/**
	 * Registers settings sections with WordPress
	 */
	public function register_sections() {

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			$this->OrderSafely_Dishes . '-settingssection',
			apply_filters( $this->OrderSafely_Dishes . '-section-settingssection-title', esc_html__( 'Settings Section', 'plugin-name' ) ),
			array( $this, 'section_settingssection' ),
			$this->OrderSafely_Dishes
		);

	} // register_sections()

	/**
	 * Registers plugin settings
	 *
	 * @since 		1.0.0
	 */
	public function register_settings() {

		// register_setting( $option_group, $option_name, $sanitize_callback );

		register_setting(
			$this->OrderSafely_Dishes . '-options',
			$this->OrderSafely_Dishes . '-options',
			array( $this, 'validate_options' )
		);

	} // register_settings()

	/**
	 * Displays a settings section
	 *
	 * @since 		1.0.0
	 *
	 * @param 		array 		$params 		Array of parameters for the section
	 *
	 * @return 		mixed 						The settings section
	 */
	public function section_settingssection( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'views/view-section-settingssection.php' );

	} // section_settingssection()

	/**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->OrderSafely_Dishes . '-options' );

	} // set_options()

	/**
	 * Validates saved options
	 *
	 * @since 		1.0.0
	 *
	 * @param 		array 		$input 			array of submitted plugin options
	 *
	 * @return 		array 						array of validated plugin options
	 */
	public function validate_options( $input ) {

		$valid 		= array();
		$options 	= $this->get_options_list();

		foreach ( $options as $option ) {

			$sanitizer 			= new OrderSafely_Dishes_Sanitize();
			$valid[$option[0]] 	= $sanitizer->clean( $input[$option[0]], $option[1] );

			if ( $valid[$option[0]] != $input[$option[0]] ) {

				add_settings_error( $option[0], $option[0] . '_error', esc_html__( $option[0] . ' error.', 'plugin-name' ), 'error' );

			}

			unset( $sanitizer );

		}

		return $valid;

	} // validate_options()

} // class
