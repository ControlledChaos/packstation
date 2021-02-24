<?php
/**
 * Content for singular concert post type
 *
 * @package    Pack_Station
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

/**
 * Concert information section
 */
$concert_info = get_field( 'concert_information' );
if ( $concert_info ) :

?>
	<section id="info-concert-<?php echo get_the_ID(); ?>" class="concert-section concert-section-single concert-section-info">
		<?php echo $concert_info; ?>
	</section>
<?php

endif;

/**
 * Concert scedule section
 */
if ( have_rows( 'time_slot' ) ) :

?>
	<section id="schedule-concert-<?php echo get_the_ID(); ?>" class="concert-section concert-section-single concert-section-schedule">

		<ul class="concert-schedule-acts">

		<?php while ( have_rows( 'time_slot' ) ) : the_row();
			$start_slot = get_sub_field( 'music_slot_start_time' );
			$end_slot   = get_sub_field( 'music_slot_end_time' );
			$available  = get_sub_field( 'music_slot_available' );

			?>
			<li class="concert-act">
			<?php if ( have_rows( 'act' ) && false == $available ) : while ( have_rows( 'act' ) ) : the_row();
				$act_name  = get_sub_field( 'act_name' );
				$act_site  = get_sub_field( 'act_website' );
				$act_bio   = get_sub_field( 'act_bio' );
				$get_thumb = get_sub_field( 'act_thumbnail' );

				// Image size for each act.
				if ( has_image_size( 'concert-act-small' ) ) {
					$size = 'concert-act-small';
				} elseif ( has_image_size( 'concert-act' ) ) {
					$size = 'concert-act';
				} else {
					$size = 'medium';
				}
				$thumb = wp_get_attachment_image( $get_thumb, $size );
				echo '<h3>';
					if ( $act_site ) { echo '<a href="' . $act_site . '" target="_blank">'; }
					if ( $thumb ) {
						echo $thumb;
					} else {
						echo '<img src="' . esc_url( plugins_url( '/concerts/images/concert-placeholder.jpg', dirname(__FILE__) ) ) . '" />';
					}
					if ( $act_site ) { echo '</a>'; }
				echo $start_slot . ' - ' . $end_slot . ': ' . $act_name . '</h3>';
				if ( $act_bio ) { echo $act_bio; } else { echo '<p>No description available</p>'; }
				if ( $act_site ) { echo '<p><a href="' . $act_site . '" target="_blank">Visit ' . $act_name . '\'s website <i class="fa fa-external-link"></i></a></p>'; }
				endwhile;
			else : ?>
				<h3><img src="<?php echo esc_url( plugins_url( '/concerts/images/concert-placeholder.jpg', dirname(__FILE__) ) ); ?>" /><?php echo $start_slot . ' - ' . $end_slot; ?> <span style="color: #d00;">Slot Available!</span></h3>
				<p>If you would like to apply for this slot, please fill out the form at the following link:</p>
				<p><a href="http://adamspackstation.com/musician-sign-up/">adamspackstation.com/musician-sign-up</a></p>
			<?php endif; ?>

			</li>
			<?php endwhile; ?>
		</ul>
	</section>
<?php

// End `have_rows( 'time_slot' )`.
endif;

/**
 * Seasons links section
 */
$terms = wp_get_post_terms( get_the_ID(), 'season' );
foreach ( $terms as $term ) {
	echo '<h4><a href="' . get_term_link( $term ) . '">' . get_field( 'prepend_post_season_link', 'option' ) . ' ' . $term->name . ' ' . get_field( 'append_post_season_link', 'option' ) . '</a></h4>';
}
