<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package kadence
 */

namespace Kadence;

$classes   = array();
$classes[] = 'entry-header';
$classes[] = 'page-header';
$classes[] = get_post_type() . '-archive-title';
$classes[] = 'title-align-' . ( kadence()->sub_option( get_post_type() . '_archive_title_align', 'desktop' ) ? kadence()->sub_option( get_post_type() . '_archive_title_align', 'desktop' ) : 'inherit' );
$classes[] = 'title-tablet-align-' . ( kadence()->sub_option( get_post_type() . '_archive_title_align', 'tablet' ) ? kadence()->sub_option( get_post_type() . '_archive_title_align', 'tablet' ) : 'inherit' );
$classes[] = 'title-mobile-align-' . ( kadence()->sub_option( get_post_type() . '_archive_title_align', 'mobile' ) ? kadence()->sub_option( get_post_type() . '_archive_title_align', 'mobile' ) : 'inherit' );

?>
<header class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php
	/**
	 * Kadence Entry Header
	 *
	 * Hooked kadence_entry_header 10
	 */
	do_action( 'kadence_entry_archive_header', get_post_type() . '_archive', 'normal' );
	?>
</header><!-- .entry-header -->
