<?php
/**
 * ACF compatability class
 *
 * Includes the files of Advanced Custom Fields if
 * the Pro version is not available, the files of
 * ACF Extended if the ACF Pro version is available,
 * and ACF field groups & options pages registered
 * by this plugin.
 *
 * @package    Pack_Station
 * @subpackage Classes
 * @category   Vendor
 * @since      1.0.0
 */

namespace PackStation\Classes\Vendor;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Define path and URL to the ACF plugin.
define( 'APS_ACF_PATH', APS_PATH . 'includes/vendor/acf/' );
define( 'APS_ACF_URL', APS_URL . 'includes/vendor/acf/' );

class ACF {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$this->include();

		// Customize the url setting to fix incorrect asset URLs.
		add_filter( 'acf/settings/url', [ $this, 'acf_settings_url' ] );

		// (Optional) Hide the ACF admin menu item.
		add_filter( 'acf/settings/show_admin', [ $this, 'acf_settings_show_admin' ] );
	}

	/**
	 * Include ACF files
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function include() {

		// Include the ACF plugin.
		include_once( APS_ACF_PATH . 'acf.php' );
	}

	/**
	 * ACF settings URL
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $url
	 * @return string Returns the URL for ACF files.
	 */
	public function acf_settings_url( $url ) {
		return APS_ACF_URL;
	}

	/**
	 * Show ACF in admin menu
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  boolean $show_admin
	 * @return boolean ACF displays in menu if true.
	 */
	public function acf_settings_show_admin( $show_admin ) {
		return true;
	}
}
