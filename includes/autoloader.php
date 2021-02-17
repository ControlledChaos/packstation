<?php
/**
 * Register plugin classes
 *
 * The autoloader registers plugin classes for later use.
 *
 * @package    Pack_Station
 * @subpackage Includes
 * @category   Classes
 * @since      1.0.0
 */

namespace PackStation;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class files
 *
 * Defines the class directories and file prefixes.
 *
 * @since 1.0.0
 * @var   array Defines an array of class file paths.
 */
define( 'APS_CLASS', [
	'core'     => APS_PATH . 'includes/classes/core/class-',
	'settings' => APS_PATH . 'includes/classes/settings/class-',
	'tools'    => APS_PATH . 'includes/classes/tools/class-',
	'media'    => APS_PATH . 'includes/classes/media/class-',
	'users'    => APS_PATH . 'includes/classes/users/class-',
	'vendor'   => APS_PATH . 'includes/classes/vendor/class-',
	'admin'    => APS_PATH . 'includes/classes/backend/class-',
	'front'    => APS_PATH . 'includes/classes/frontend/class-',
	'general'  => APS_PATH . 'includes/classes/class-',
] );

/**
 * Classes namespace
 *
 * @since 1.0.0
 * @var   string Defines the namespace of class files.
 */
define( 'APS_CLASS_NS', __NAMESPACE__ . '\Classes' );

/**
 * Array of classes to register
 *
 * When you add new classes to your version of this plugin you may
 * add them to the following array rather than requiring the file
 * elsewhere. Be sure to include the precise namespace.
 *
 * @since 1.0.0
 * @var   array Defines an array of class files to register.
 */
define( 'APS_CLASSES', [

	// Base class.
	APS_CLASS_NS . '\Base' => APS_CLASS['general'] . 'base.php',

	// Core classes.
	APS_CLASS_NS . '\Core\Editor_Options'     => APS_CLASS['core'] . 'editor-options.php',
	APS_CLASS_NS . '\Core\Type_Tax'           => APS_CLASS['core'] . 'type-tax.php',
	APS_CLASS_NS . '\Core\Register_Type'      => APS_CLASS['core'] . 'register-type.php',
	APS_CLASS_NS . '\Core\Register_Admin'     => APS_CLASS['core'] . 'register-admin.php',
	APS_CLASS_NS . '\Core\Register_Site_Help' => APS_CLASS['core'] . 'register-site-help.php',
	APS_CLASS_NS . '\Core\Register_Tax'       => APS_CLASS['core'] . 'register-tax.php',
	APS_CLASS_NS . '\Core\Types_Taxes_Order'  => APS_CLASS['core'] . 'types-taxes-order.php',
	APS_CLASS_NS . '\Core\Taxonomy_Templates' => APS_CLASS['core'] . 'taxonomy-templates.php',
	APS_CLASS_NS . '\Core\Remove_Blog'        => APS_CLASS['core'] . 'remove-blog.php',
	APS_CLASS_NS . '\Core\Remove_Customizer'  => APS_CLASS['core'] . 'remove-customizer.php',

	// Settings classes.
	APS_CLASS_NS . '\Settings\Settings'     => APS_CLASS['settings'] . 'settings.php',
	APS_CLASS_NS . '\Settings\Settings_API' => APS_CLASS['settings'] . 'settings-api.php',

	// Tools classes.
	APS_CLASS_NS . '\Tools\Tools'            => APS_CLASS['tools'] . 'tools.php',
	APS_CLASS_NS . '\Tools\RTL_Test'         => APS_CLASS['tools'] . 'rtl-test.php',
	APS_CLASS_NS . '\Tools\Customizer_Reset' => APS_CLASS['tools'] . 'customizer-reset.php',

	// Media classes.
	APS_CLASS_NS . '\Media\Media'               => APS_CLASS['media'] . 'media.php',
	APS_CLASS_NS . '\Media\Register_Media_Type' => APS_CLASS['media'] . 'register-media-type.php',

	// Users classes.
	APS_CLASS_NS . '\Users\Users'           => APS_CLASS['users'] . 'users.php',
	APS_CLASS_NS . '\Users\User_Roles_Caps' => APS_CLASS['users'] . 'user-roles-caps.php',
	APS_CLASS_NS . '\Users\User_Toolbar'    => APS_CLASS['users'] . 'user-toolbar.php',
	APS_CLASS_NS . '\Users\User_Avatars'    => APS_CLASS['users'] . 'user-avatars.php',

	// Vendor classes.
	APS_CLASS_NS . '\Vendor\Plugins'     => APS_CLASS['vendor'] . 'plugins.php',
	APS_CLASS_NS . '\Vendor\ACF'         => APS_CLASS['vendor'] . 'acf.php',
	APS_CLASS_NS . '\Vendor\ACF_Columns' => APS_CLASS['vendor'] . 'acf-columns.php',
	APS_CLASS_NS . '\Vendor\Register_ACF_Options'     => APS_CLASS['vendor'] . 'register-acf-options.php',
	APS_CLASS_NS . '\Vendor\Register_ACF_Sub_Options' => APS_CLASS['vendor'] . 'register-acf-sub-options.php',

	// Backend/admin classes,
	APS_CLASS_NS . '\Admin\Admin'                   => APS_CLASS['admin'] . 'admin.php',
	APS_CLASS_NS . '\Admin\Add_Page'                => APS_CLASS['admin'] . 'add-page.php',
	APS_CLASS_NS . '\Admin\Add_Subpage'             => APS_CLASS['admin'] . 'add-subpage.php',
	APS_CLASS_NS . '\Admin\Admin_Settings_Page'     => APS_CLASS['admin'] . 'admin-settings-page.php',
	APS_CLASS_NS . '\Admin\Add_Settings_Page'       => APS_CLASS['admin'] . 'add-settings-page.php',
	APS_CLASS_NS . '\Admin\Admin_ACF_Settings_Page' => APS_CLASS['admin'] . 'admin-acf-settings-page.php',
	APS_CLASS_NS . '\Admin\Content_Settings'        => APS_CLASS['admin'] . 'content-settings.php',
	APS_CLASS_NS . '\Admin\Manage_Website_Page'     => APS_CLASS['admin'] . 'manage-website-page.php',
	APS_CLASS_NS . '\Admin\User_Colors'             => APS_CLASS['admin'] . 'user-colors.php',
	APS_CLASS_NS . '\Admin\Dashboard'               => APS_CLASS['admin'] . 'dashboard.php',
	APS_CLASS_NS . '\Admin\Posts_List_Table'        => APS_CLASS['admin'] . 'posts-list-table.php',

	// Frontend classes.
	APS_CLASS_NS . '\Front\Frontend' => APS_CLASS['front'] . 'frontend.php',

	// General/miscellaneos classes.

] );

/**
 * Autoload class files
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
spl_autoload_register(
	function ( string $class ) {
		if ( isset( APS_CLASSES[ $class ] ) ) {
			require APS_CLASSES[ $class ];
		}
	}
);