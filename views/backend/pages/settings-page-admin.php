<?php
/**
 * Output of the Administration Settings page
 *
 * @package    Pack_Station
 * @subpackage Views
 * @category   Admin
 * @since      1.0.0
 */

$page = get_plugin_page_hook( APS_BASENAME, $this->parent_slug );

?>
<div class="wrap admin-settings">

	<?php
	printf(
		'<h1>%s</h1>',
		__( $this->heading(), APS_CONFIG['domain'] )
	);

	printf(
		'<p class="description">%s</p>',
		__( $this->description(), APS_CONFIG['domain'] )
	);

	?>
	<form method="post" action="options.php">

		<?php echo do_action( 'render_screen_tabs_' . $page ); ?>

		<p class="submit"><?php submit_button( __( 'Save Settings', APS_CONFIG['domain'] ), 'button-primary', '', false, [] ); ?></p>
	</form>
</div>
