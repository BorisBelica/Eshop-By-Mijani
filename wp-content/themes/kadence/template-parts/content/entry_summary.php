<?php
/**
 * Template part for displaying a post's summary
 *
 * @package kadence
 */

namespace Kadence;

use function get_post_type;
use function the_content;
use function the_excerpt;

$excerpt_element = kadence()->option( 'post_archive_element_excerpt' );
if ( isset( $excerpt_element ) && is_array( $excerpt_element ) && true === $excerpt_element['enabled'] ) {
	?>
	<div class="entry-summary">
		<?php
		if ( 'post' === get_post_type() && true === kadence()->sub_option( 'post_archive_element_excerpt', 'fullContent' ) ) {
			global $more; $more = 0;
			the_content( esc_html__( 'Read More', 'kadence' ) );
		} else {
			the_excerpt();
		}
		?>
	</div><!-- .entry-summary -->
	<?php
}
