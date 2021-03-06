<?php
/**
 * Initialize plugin functionality
 *
 * @package    Pack_Station
 * @subpackage Init
 * @category   Core
 * @since      1.0.0
 */

namespace PackStation;

// Alias namespaces.
use
PackStation\Classes          as Classes,
PackStation\Classes\Core     as Core,
PackStation\Classes\Settings as Settings,
PackStation\Classes\Tools    as Tools,
PackStation\Classes\Media    as Media,
PackStation\Classes\Users    as Users,
PackStation\Classes\Admin    as Admin,
PackStation\Classes\Front    as Front,
PackStation\Classes\Vendor   as Vendor;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Load plugin text domain
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function text_domain() {

	// Standard plugin installation.
	load_plugin_textdomain(
		APS_CONFIG['domain'],
		false,
		dirname( APS_BASENAME ) . '/languages'
	);

	// If this is in the must-use plugins directory.
	load_muplugin_textdomain(
		APS_CONFIG['domain'],
		dirname( APS_BASENAME ) . '/languages'
	);
}

/**
 * Core plugin function
 *
 * Loads and runs PHP classes.
 * Removes unwanted features.
 *
 * SAMPLES: Uncomment sample classes to run them.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( function_exists( 'pack_station' ) ) {
	return;
}
function pack_station() {

	// Access current admin page.
	global $pagenow;

	// Load text domain. Hook to `init` rather than `plugins_loaded`.
	add_action( 'init', __NAMESPACE__ . '\text_domain' );

	/**
	 * Class autoloader
	 *
	 * The autoloader registers plugin classes for later use,
	 * such as running new instances below.
	 */
	require_once APS_PATH . 'includes/autoloader.php';

	// Get compatibility functions.
	require APS_PATH . 'includes/vendor/compatibility.php';

	/**
	 * Instantiate core classes
	 *
	 * These include registering post types & taxonomies.
	 */
	new Core\Type_Tax;
	new Core\Register_Concert;
	new Core\Register_Family;
	new Core\Register_Menu;
	new Core\Register_Season;
	new Core\Register_Species;
	new Core\Register_Menu_Type;

	// If the Customizer is disabled in the system config file.
	if ( ( defined( 'APS_ALLOW_CUSTOMIZER' ) && false == APS_ALLOW_CUSTOMIZER ) && ! current_user_can( 'develop' ) ) {
		new Core\Remove_Customizer;
	}

	/**
	 * Editor options for WordPress
	 *
	 * Not run for ClassicPress and the default antibrand system.
	 * The `classicpress_version()` function checks for ClassicPress.
	 * The `APP_INC_PATH` constant checks for the default antibrand system.
	 *
	 * Not run if the Classic Editor plugin is active.
	 */
	if ( ! function_exists( 'classicpress_version' ) || ! defined( 'APP_INC_PATH' ) ) {
		if ( ! is_plugin_active( 'classic-editor/classic-editor.php' ) ) {
			new Core\Editor_Options;
		}
	}

	// Instantiate tools classes.
	new Tools\Tools;

	// Instantiate media classes.
	new Media\Media;

	// Instantiate third-party classes.
	new Vendor\Plugins;
	// new Vendor\Sample_ACF_Options;
	// new Vendor\Sample_ACF_Suboptions;
	new Vendor\Register_ACF_Concert_Options;
	new Vendor\Register_ACF_Family_Options;

	// Instantiate backend classes.
	if ( is_admin() ) {
		new Admin\Admin;
		new Admin\Posts_To_News();
	}

	// Instantiate users classes.
	new Users\Users;

	// Instantiate frontend classes.
	if ( ! is_admin() ) {
		new Front\Frontend;
		new Front\Content_Concert;
	}

	// Disable WordPress administration email verification prompt.
	add_filter( 'admin_email_check_interval', '__return_false' );

	// Disable Site Health notifications.
	if ( defined( 'APS_ALLOW_SITE_HEALTH' ) && ! APS_ALLOW_SITE_HEALTH ) {
		add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );
	}

	/**
	 * Allow links manager
	 *
	 * @todo Put into an option.
	 */
	if ( defined( 'APS_ALLOW_LINKS_MANAGER' ) && APS_ALLOW_LINKS_MANAGER ) {
		add_filter( 'pre_option_link_manager_enabled', '__return_true' );
	}

	// Remove the Draconian capital P filters.
	remove_filter( 'the_title', 'capital_P_dangit', 11 );
	remove_filter( 'the_content', 'capital_P_dangit', 11 );
	remove_filter( 'comment_text', 'capital_P_dangit', 31 );

	/**
	 * Disable emoji script
	 *
	 * Emojis will still work in modern browsers. This removes the script
	 * that makes emojis work in old browsers.
	 */
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// System email filters.
	add_filter( 'wp_mail_from_name', function( $name ) {
		return apply_filters( 'aps_mail_from_name', get_bloginfo( 'name' ) );
	});
}

// Run the plugin.
pack_station();
