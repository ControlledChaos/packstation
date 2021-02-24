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
	APS_CLASS_NS . '\Core\Register_Concert'   => APS_CLASS['core'] . 'register-concert.php',
	APS_CLASS_NS . '\Core\Register_Family'    => APS_CLASS['core'] . 'register-family.php',
	APS_CLASS_NS . '\Core\Register_Menu'      => APS_CLASS['core'] . 'register-menu.php',
	APS_CLASS_NS . '\Core\Register_Tax'       => APS_CLASS['core'] . 'register-tax.php',
	APS_CLASS_NS . '\Core\Register_Season'    => APS_CLASS['core'] . 'register-season.php',
	APS_CLASS_NS . '\Core\Register_Species'   => APS_CLASS['core'] . 'register-species.php',
	APS_CLASS_NS . '\Core\Register_Menu_Type' => APS_CLASS['core'] . 'register-menu-type.php',
	APS_CLASS_NS . '\Core\Types_Taxes_Order'  => APS_CLASS['core'] . 'types-taxes-order.php',
	APS_CLASS_NS . '\Core\Taxonomy_Templates' => APS_CLASS['core'] . 'taxonomy-templates.php',
	APS_CLASS_NS . '\Core\Remove_Blog'        => APS_CLASS['core'] . 'remove-blog.php',
	APS_CLASS_NS . '\Core\Remove_Customizer'  => APS_CLASS['core'] . 'remove-customizer.php',

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
	APS_CLASS_NS . '\Vendor\Register_ACF_Concert_Options' => APS_CLASS['vendor'] . 'concert-options.php',
	APS_CLASS_NS . '\Vendor\Register_ACF_Family_Options'  => APS_CLASS['vendor'] . 'family-options.php',

	// Backend/admin classes,
	APS_CLASS_NS . '\Admin\Admin'            => APS_CLASS['admin'] . 'admin.php',
	APS_CLASS_NS . '\Admin\Posts_To_News'    => APS_CLASS['admin'] . 'posts-to-news.php',
	APS_CLASS_NS . '\Admin\Add_Page'         => APS_CLASS['admin'] . 'add-page.php',
	APS_CLASS_NS . '\Admin\Add_Subpage'      => APS_CLASS['admin'] . 'add-subpage.php',
	APS_CLASS_NS . '\Admin\User_Colors'      => APS_CLASS['admin'] . 'user-colors.php',
	APS_CLASS_NS . '\Admin\Dashboard'        => APS_CLASS['admin'] . 'dashboard.php',
	APS_CLASS_NS . '\Admin\Posts_List_Table' => APS_CLASS['admin'] . 'posts-list-table.php',

	// Frontend classes.
	APS_CLASS_NS . '\Front\Frontend'        => APS_CLASS['front'] . 'frontend.php',
	APS_CLASS_NS . '\Front\Title_Filter'    => APS_CLASS['front'] . 'title-filter.php',
	APS_CLASS_NS . '\Front\Content_Filter'  => APS_CLASS['front'] . 'content-filter.php',
	APS_CLASS_NS . '\Front\Content_Concert' => APS_CLASS['front'] . 'content-concert.php',

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
