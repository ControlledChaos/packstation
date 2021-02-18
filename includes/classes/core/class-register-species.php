<?php
/**
 * Species taxonomy
 *
 * Supported by the family post type.
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

class Register_Species extends Register_Tax {

	/**
	 * Taxonomy
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The database name of the taxonomy.
	 */
	protected $tax_key = 'species';

	/**
	 * Associated post types
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    array The array of associated post types.
	 */
	protected $post_types = [
		'family'
	];

	/**
	 * Singular name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The singular name of the taxonomy.
	 */
	protected $singular = 'Species';

	/**
	 * Plural name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The plural name of the taxonomy.
	 */
	protected $plural = 'Species';

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
