<?php
/**
 * Plugin Name: Helper WP
 * Plugin URI:
 * Description: Set of classes to assist in the development of plugins
 * Author: leobaiano
 * Author URI: https://github.com/leobaiano
 * Version: 1.0.0
 * License: GPLv2 or later
 * Text Domain: helper-wp
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Helper WP
 *
 * @author Leo Baiano <ljunior2005@gmail.com>
 */
class Helper_WP {
	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	private function __construct(){
		// Load Helpers
		add_action( 'init', array( $this, 'load_helper' ) );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Load auxiliary and third classes are in the class directory
	 *
	 */
	public function load_helper() {
		$class_dir = plugin_dir_path( __FILE__ ) . "/helper/";
		foreach ( glob( $class_dir . "*.php" ) as $filename ){
			include $filename;
		}
	}
}
add_action( 'plugins_loaded', array( 'Helper_WP', 'get_instance' ), 0 );
