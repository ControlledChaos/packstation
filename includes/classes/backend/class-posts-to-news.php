<?php
/**
 * Posts to News
 *
 * @package    Pack_Station
 * @subpackage Classes
 * @category   Admin
 * @since      1.0.0
 */

namespace PackStation\Classes\Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Post to news
 *
 * Changes the default post name to News
 * and replaces the Dashicon.
 *
 * @since  1.0.0
 * @access public
 */
final class Posts_To_News {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		add_action( 'admin_menu', [ $this, 'change_menu_labels' ] );
		add_action( 'init', [ $this, 'change_page_labels' ] );
		add_action( 'admin_menu', [ $this, 'change_menu_icon' ] );
		add_filter( 'post_updated_messages', [ $this, 'change_page_messages' ] );
		add_action( 'admin_head', [ $this, 'dashboard_icons' ] );
		add_action( 'admin_footer', [ $this, 'at_glance_text' ] );
	}

	/**
	 * Change post type labels in the admin menu
	 *
	 * @since  1.0.0
	 * @access public
	 * @global object $menu Gets the admin menu.
	 * @global object $submenu Gets the admin submenus.
	 * @return string Returns the various labels.
	 */
	public function change_menu_labels() {

		// Access global variables.
		global $menu, $submenu;

		// The "Posts" position in the admin menu.
		$menu[5][0] = __( 'News', APS_DOMAIN );

		// Submenus of the "Posts" position in the admin menu.
		$submenu['edit.php'][5][0]  = __( 'News', APS_DOMAIN );
		$submenu['edit.php'][10][0] = __( 'Add News', APS_DOMAIN );
		$submenu['edit.php'][15][0] = __( 'News Categories', APS_DOMAIN );
		$submenu['edit.php'][16][0] = __( 'News Tags', APS_DOMAIN );
	}

	/**
	 * Change post type labels on admin pages
	 *
	 * @since  1.0.0
	 * @access public
	 * @global array $wp_post_types Gets the array of admin page labels.
	 * @return string Returns the various labels.
	 */
	public function change_page_labels() {

		// Access global variables.
		global $wp_post_types;

		// The labels of the array.
		$labels = $wp_post_types['post']->labels;
		$labels->name               = __( 'News', APS_DOMAIN );
		$labels->singular_name      = __( 'News', APS_DOMAIN );
		$labels->add_new            = __( 'Add News', APS_DOMAIN );
		$labels->add_new_item       = __( 'Add News', APS_DOMAIN );
		$labels->edit_item          = __( 'Edit News', APS_DOMAIN );
		$labels->new_item           = __( 'News', APS_DOMAIN );
		$labels->view_item          = __( 'View News', APS_DOMAIN);
		$labels->search_items       = __( 'Search News', APS_DOMAIN );
		$labels->not_found          = __( 'No News found', APS_DOMAIN );
		$labels->not_found_in_trash = __( 'No News found in Trash', APS_DOMAIN );
		$labels->all_items          = __( 'All News', APS_DOMAIN  );
		$labels->menu_name          = __( 'News', APS_DOMAIN );
		$labels->name_admin_bar     = __( 'News', APS_DOMAIN );
	}

	/**
	 * Change the pin icon to a megaphone
	 *
	 * @since  1.0.0
	 * @access public
	 * @global object $menu Gets the admin menu.
	 * @return string Returns the various labels.
	 */
	public function change_menu_icon() {

		// Access global variables.
		global $menu;

		foreach ( $menu as $key => $val ) {

			if ( __( 'News', APS_DOMAIN ) == $val[0] ) {
				$menu[$key][6] = 'dashicons-megaphone';
			}
		}
	}

	/**
	 * Change post messages
	 *
	 * @since  1.0.0
	 * @access public
	 * @param array $messages Gets the array of messages.
	 * @global object $post Gets the post object.
	 * @global object $post_ID Gets the post ID.
	 * @return array Returns the array of messages.
	 */
	public function change_page_messages( $messages ) {

		// Access global variables.
		global $post, $post_ID;

		// Conditional message for revisions.
		if ( isset( $_GET['revision'] ) ) {
			$revision = sprintf(
				__( '%1s %2s' ),
				__( 'News post restored to revision from', APS_DOMAIN ),
				wp_post_revision_title( (int) $_GET['revision'], false )
			);
		} else {
			$revision = false;
		}

		// Updated message.
		$updated = sprintf(
			__( '%1s <a href="%2s">%3s</a>' ),
			__( 'News updated.', APS_DOMAIN ),
			esc_url( get_permalink( $post_ID ) ),
			__( 'View News Post', APS_DOMAIN )
		);

		// Published message.
		$published = sprintf(
			__( '%1s <a href="%2s">%3s</a>' ),
			__( 'News published.', APS_DOMAIN ),
			esc_url( get_permalink( $post_ID ) ),
			__( 'View News Post', APS_DOMAIN )
		);

		// Submitted message.
		$submitted = sprintf(
			__( '%1s <a target="_blank" href="%2s">%3s</a>' ),
			__( 'News submitted.', APS_DOMAIN ),
			esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ),
			__( 'Preview News Post', APS_DOMAIN )
		);

		// Scheduled message.
		$scheduled = sprintf(
			__( '%1s <strong>%2s</strong>. <a target="_blank" href="%3s">%4s</a>' ),
			__( 'News scheduled for:', APS_DOMAIN ),
			date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ),
			esc_url( get_permalink( $post_ID ) ),
			__( 'Preview News Post', APS_DOMAIN )
		);

		// Draft updated message.
		$draft = sprintf(
			__( '%1s <a target="_blank" href="%2s">%3s</a>' ),
			__( 'News draft updated.', APS_DOMAIN ),
			esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ),
			__( 'Preview News Post', APS_DOMAIN )
		);

		// The array of messages for the Posts post type.
		$messages['post'] = [

			// First is unused. Messages start at index 1.
			0  => null,
			1  => $updated,
			2  => __( 'Custom field updated.', APS_DOMAIN ),
			3  => __( 'Custom field deleted.', APS_DOMAIN ),
			4  => __( 'News updated.', APS_DOMAIN ),
			5  => $revision,
			6  => $published,
			7  => __( 'News saved.', APS_DOMAIN ),
			8  => $submitted,
			9  => $scheduled,
			10 => $draft
		];

		// Return the array of messages.
		return $messages;
	}

	/**
	 * News posts dashboard icon
	 *
	 * Changes the posts icon in the At a Glance dashboard widget.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the style block in the admin head.
	 */
	public function dashboard_icons() {

		// Get the screen ID to target the Dashboard.
        $screen = get_current_screen();

        // Bail if not on the Dashboard screen.
        if ( $screen->id != 'dashboard' ) {
			return;
		}

		// Minified style block.
		$style = '<style>#dashboard_right_now .post-count a[href="edit.php?post_type=post"]::before,#dashboard_right_now .post-count span::before{content:"\f488"!important;}</style>';

		// Print the style block.
		echo $style;
	}

	/**
	 * News posts dashboard text
	 *
	 * Changes the posts text in the At a Glance dashboard widget.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the script block in the admin head.
	 */
	public function at_glance_text() {

		// Get the screen ID to target the Dashboard.
        $screen = get_current_screen();

        // Bail if not on the Dashboard screen.
        if ( $screen->id != 'dashboard' ) {
			return;
		}

		?>
		<script>jQuery(document).ready(function(a){a('.post-count a[href="edit.php?post_type=post"]').text(function(){return a(this).text().replace('1 Post','1 News Post')}),a('.post-count a[href="edit.php?post_type=post"]').text(function(){return a(this).text().replace('Posts','News Posts')})});</script>
		<?php
	}
}
