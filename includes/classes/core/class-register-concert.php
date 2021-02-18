<?php
/**
 * Register concert post type
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

class Register_Concert extends Register_Type {

	/**
	 * Post type
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The database name of the post type.
	 */
	protected $type_key = 'concert';

	/**
	 * Singular name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The singular name of the post type.
	 */
	protected $singular = 'Concert';

	/**
	 * Plural name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The plural name of the post type.
	 */
	protected $plural = 'Concerts';

	/**
	 * Menu icon
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The dashicon class.
	 */
	protected $menu_icon = 'dashicons-format-audio';

	/**
	 * Supports
	 *
	 * The built in fields/metaboxes supported by the post type.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    array The array of support.
	 */
	protected $supports = [
		'title',
		'thumbnail',
		'excerpt',
		'page-attributes'
	];

	/**
	 * Supported taxonomies
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    array The array of supported taxonomies.
	 */
	protected $taxonomies = [
		'season'
	];

	/**
	 * Settings page
	 *
	 * Add a dettings page for the post type.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether to create a settings page for this post type.
	 */
	protected $settings_page = false;

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Run the parent constructor method.
		parent :: __construct();
	}

	/**
	 * Rewrite rules
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of rewrite rules.
	 */
	public function rewrite() {

		$rewrite = [
			'slug'       => 'concerts',
			'with_front' => true,
			'feeds'      => true,
			'pages'      => true
		];

		return $rewrite;
	}

	/**
	 * New post type options
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Array of arguments for registering a post type.
	 * @param  string $post_type Post type key.
	 * @return array Returns an array of new option arguments.
	 */
	public function post_type_options( $args, $post_type ) {

		// Only modify this post type.
		if ( $this->type_key != $post_type ) {
			return $args;
		}

		// Sample option.
		$args['menu_position'] = 5;

		return $args;
	}

	/**
	 * Filter post type labels
	 *
	 * @since  1.0.0
	 * @access public
	 * @return mixed Returns new values for array label arguments.
	 */
	public function filter_labels() {

		// New post type labels.
		$labels = [
			'all_items' => 'All Concerts',
			'add_new'   => 'New Concert'
		];

		return $labels;
	}
}
