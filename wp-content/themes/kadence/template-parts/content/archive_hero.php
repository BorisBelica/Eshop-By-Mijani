<?php
/**
 * Template part for displaying a post's Hero header
 *
 * @package kadence
 */

namespace Kadence;

$classes   = array();
$classes[] = 'entry-header';
$classes[] = get_post_type() . '-archive-title';
$classes[] = 'title-align-' . ( kadence()->sub_option( get_post_type() . '_archive_title_align', 'desktop' ) ? kadence()->sub_option( get_post_type() . '_archive_title_align', 'desktop' ) : 'inherit' );
$classes[] = 'title-tablet-align-' . ( kadence()->sub_option( get_post_type() . '_archive_title_align', 'tablet' ) ? kadence()->sub_option( get_post_type() . '_archive_title_align', 'tablet' ) : 'inherit' );
$classes[] = 'title-mobile-align-' . ( kadence()->sub_option( get_post_type() . '_archive_title_align', 'mobile' ) ? kadence()->sub_option( get_post_type() . '_archive_title_align', 'mobile' ) : 'inherit' );
?>
<section class="entry-hero <?php echo esc_attr( get_post_type() ) . '-archive-hero-section'; ?> <?php echo esc_attr( 'entry-hero-layout-' . kadence()->option( get_post_type() . '_archive_title_inner_layout' ) ); ?>">
	<div class="entry-hero-container-inner">
		<div class="hero-section-overlay"></div>
		<div class="hero-container site-container">
			<header class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<?php
				/**
				 * Kadence Entry Hero
				 *
				 * Hooked kadence_entry_archive_header 10
				 */
				do_action( 'kadence_entry_archive_hero', get_post_type() . '_archive', 'above' );
				?>
			</header><!-- .entry-header -->
		</div>
	</div>
</section><!-- .entry-hero -->
