<?php
/**
 * Register ACF options subpage
 *
 * @package    Pack_Station
 * @subpackage Classes
 * @category   Vendor
 * @since      1.0.0
 */

declare( strict_types = 1 );
namespace PackStation\Classes\Vendor;

// Alias namespaces.
use PackStation\Classes\Admin as Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Register_ACF_Sub_Options extends Admin\Add_Subpage {

	/**
	 * Menu position
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    integer The position in the menu order this item should appear.
	 */
	protected $position = 60;

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {
		parent :: __construct();

		// Register options page.
		add_action( 'acf/init', [ $this, 'add_options_page' ] );

		// Field groups.
		add_action( 'acf/init', [ $this, 'field_groups' ] );
	}

	/**
	 * Nullify parent class page
	 *
	 * The `options_page` method is used instead.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function add_page() {
		return null;
	}

	/**
	 * Register options page
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function add_options_page() {

		// Stop here if ACF Pro is not active.
		if ( ! function_exists( 'acf_add_options_sub_page' ) ) {
			return;
		}
		acf_add_options_sub_page( $this->options_page() );
	}

	/**
	 * Options page arguments
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of page arguments.
	 */
	public function options_page() {

		$options = [
			'page_title'  => $this->page_title(),
			'menu_title'  => $this->menu_title(),
			'parent_slug' => strtolower( $this->parent_slug ),
			'menu_slug'   => strtolower( $this->menu_slug ),
			'capability'  => strtolower( $this->capability ),
			'position'    => (integer)$this->position
		];
		return $options;
	}

	/**
	 * Field groups
	 *
	 * Register field groups for this options page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function field_groups() {

		/**
		 * Include from another file or use the
		 * `acf_add_local_field_group` function
		 * here, as exported.
		 */
	}
}
