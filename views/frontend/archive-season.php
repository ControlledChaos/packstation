<?php
/**
 * Content for season taxonomy archive
 *
 * @package    Pack_Station
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

// Get the featured image for the concert.
$featured = get_field( 'featured_concert_image' );

// If a featured image is set.
if ( $featured ) {

	// Image details.
	$title = $featured['title'];
	$alt   = $featured['alt'];

	if ( has_image_size( 'concert-act-medium' ) && has_image_size( 'concert-act-small' ) ) {
		$size     = 'concert-act-medium';
		$sizes_w  = $featured['sizes'][ $size . '-width' ] . 'px';
		$sizes_sm = $featured['sizes'][ 'concert-act-small-width' ] . 'px';
	} elseif ( has_image_size( 'concert-act' ) ) {
		$size     = 'concert-act';
		$sizes_w  = $featured['sizes'][ $size . '-width' ] . 'px';
		$sizes_sm = get_option( 'medium_size_w' ) . 'px';
	} else {
		$size     = 'medium';
		$sizes_w  = $featured['sizes'][ $size . '-width' ] . 'px';
		$sizes_sm = get_option( 'medium_size_w' ) . 'px';
	}

	$src    = wp_get_attachment_image_src( $featured, $size );
	$srcset = wp_get_attachment_image_srcset( $featured, $size );

// Defaults if no featured image is set.
} else {

	// Image details.
	$title = __( 'No image available for this concert', APS_DOMAIN );
	$alt   = __( 'Placeholder image for this concert', APS_DOMAIN );

	// Adjust the following according to fallback image in this plugin.
	$src      = APS_URL . '/assets/images/concert-placeholder.jpg';
	$srcset   = '';
	$sizes_w  = '640px';
	$sizes_sm = '320px';
}

?>
<ul class="concert-list concert-list-archive">
	<li id="concert-<?php echo get_the_ID(); ?>">
		<figure>
			<a
				href="<?php echo get_permalink(); ?>"
				title="<?php echo __( 'Get details for ', APS_DOMAIN ) . get_field( 'show_date' ); ?>">
				<img
					src="<?php echo $src; ?>"
					srcset="<?php echo $srcset; ?>"
					sizes="(max-width: 320px) <?php echo $sizes_sm; ?>,
						   (max-width: 640px) <?php echo $sizes_w; ?>,
						   <?php echo $sizes_w; ?>"
					alt="<?php echo $alt; ?>"
					description="<?php echo $title; ?>"
					width="<?php echo $width; ?>"
					height="<?php echo $height; ?>" />
			</a>
			<figcaption><?php echo get_field( 'show_date' ); ?></figcaption>
		</figure>
	</li>
</ul>
