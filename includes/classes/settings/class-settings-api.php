<?php
/**
 * Settings API class
 *
 * Adds settings via the native ClassicPress, WordPress, and
 * antibrand system settings API rather than using ACF.
 *
 * @todo Integrate into settings page class.
 *
 * @package    Pack_Station
 * @subpackage Classes
 * @category   Settings
 * @since      1.0.0
 */

namespace PackStation\Classes\Settings;
use
PackStation\Classes as Classes,
PackStation\Classes\Admin as Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Define forms directory.
if ( ! defined( 'APS_FORMS' ) ) {
	define( 'APS_FORMS', [
		'forms'    => APS_PATH . 'views/backend/forms/',
		'partials' => APS_PATH . 'views/backend/forms/partials'
	] );
}

class Settings_API extends Classes\Base {

	/**
	 * Constructor method
	 *
	 * Calls the parent constructor.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {
		parent :: __construct();

		// Register settings.
		add_action( 'admin_init', [ $this, 'settings' ] );
	}

	/**
	 * Register settings via the WordPress/ClassicPress Settings API.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings() {}
}
