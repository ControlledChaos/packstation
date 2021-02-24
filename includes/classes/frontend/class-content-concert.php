<?php
/**
 * Concert post type content filter
 *
 * @package    Pack_Station
 * @subpackage Classes
 * @category   Front
 * @since      1.0.0
 */

namespace PackStation\Classes\Front;

// Alias namespaces.
use PackStation as PackStation;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Content_Concert extends Content_Filter {

	/**
	 * Post types
	 *
	 * Array of the post types to be filtered,
	 * as they are registered.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    array Array of the post types to be filtered.
	 */
	private $post_types = [
		'concert'
	];

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
	 * Filter content
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $content The value of the content field.
	 * @return mixed Returns the content to be filtered or
	 *               returns the unfiltered content if post types don't match.
	 */
	public function the_content( $content ) {

		/**
		 * Stop here and return default content if the
		 * Advanced Custom Fields Pro plugin is not
		 * active. This will likely return empty because
		 * the content editor is disabled in the field
		 * group for this post type but this will allow
		 * the use of the default editor should ACF Pro
		 * need to be disabled.
		 */
		if (
			function_exists( 'PackStation\active_acf_pro' ) &&
			! PackStation\active_acf_pro()
		) {
			return $content;
		}

		// Get the array of post types to be filtered.
		$types = $this->post_types;

		// Default content for post types not modified.
		$content = $content;

		// Modify the content for each post type in the post_types property.
		foreach ( $types as $type ) {

			$id = get_the_ID();

			// If the post type matches one in the loop.
			if ( $type == get_post_type( $id ) ) {

				if ( is_singular( $type ) && in_the_loop() && is_main_query() ) {
					$content = $this->single_content();
				} elseif ( is_archive( $type ) && in_the_loop() && is_main_query() ) {
					$content = $this->archive_content();
				} elseif ( is_tax( 'season' ) && in_the_loop() && is_main_query() ) {
					$content = $this->archive_content();
				}
			}
		}

		// Return the modified or unmodified content.
		return $content;
	}

	/**
	 * Single concert content
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function single_content() {

		// Look for a single content template in the active theme.
		$template = locate_template( 'template-parts/content/partials/single-concert.php' );

		// If the active theme has a template, use that.
		if ( ! empty( $template ) ) {
			get_template_part( 'template-parts/content/partials/single-concert' );

		// Use the plugin template if no theme template is found.
		} else {
			include APS_PATH . '/views/frontend/single-concert.php';
		}
	}

	/**
	 * Archive concert content
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function archive_content() {

		// Look for a archive content template in the active theme.
		$template = locate_template( 'template-parts/content/partials/archive-concert.php' );

		// If the active theme has a template, use that.
		if ( ! empty( $template ) ) {
			get_template_part( 'template-parts/content/partials/archive-concert' );

		// Use the plugin template if no theme template is found.
		} else {
			include APS_PATH . '/views/frontend/archive-concert.php';
		}
	}
}
