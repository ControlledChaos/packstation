<?php
/**
 * Register menu type taxonomy
 *
 * @package    Pack_Station
 * @subpackage Classes
 * @category   Core
 * @since      1.0.0
 */

declare( strict_types = 1 );
namespace PackStation\Classes\Core;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Register_Menu_Type extends Register_Tax {

	/**
	 * Taxonomy
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The database name of the taxonomy.
	 */
	protected $tax_key = 'menu_type';

	/**
	 * Associated post types
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    array The array of associated post types.
	 */
	protected $post_types = [
		'menu'
	];

	/**
	 * Singular name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The singular name of the taxonomy.
	 */
	protected $singular = 'menu item type';

	/**
	 * Plural name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The plural name of the taxonomy.
	 */
	protected $plural = 'menu item types';

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Run the parent constructor method.
		parent :: __construct();

	}
}
