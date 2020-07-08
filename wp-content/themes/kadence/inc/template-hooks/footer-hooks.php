<?php
/**
 * Calls in Templates using theme hooks.
 *
 * @package kadence
 */

namespace Kadence;

use function Kadence\kadence;
use function get_template_part;
use function add_action;
/**
 * Main Call for Kadence footer
 */
function footer_markup() {
	if ( kadence()->has_footer() ) {
		get_template_part( 'template-parts/footer/base' );
	}
}
add_action( 'kadence_footer', 'Kadence\footer_markup', 10 );

/**
 * Footer Top Row
 */
function top_footer() {
	if ( kadence()->display_footer_row( 'top' ) ) {
		kadence()->get_template( 'template-parts/footer/footer', 'row', array( 'row' => 'top' ) );
	}
}
add_action( 'kadence_top_footer', 'Kadence\top_footer', 10 );

/**
 * Footer Middle Row
 */
function middle_footer() {
	if ( kadence()->display_footer_row( 'middle' ) ) {
		kadence()->get_template( 'template-parts/footer/footer', 'row', array( 'row' => 'middle' ) );
	}
}
add_action( 'kadence_middle_footer', 'Kadence\middle_footer', 10 );

/**
 * Footer Bottom Row
 */
function bottom_footer() {
	if ( kadence()->display_footer_row( 'bottom' ) ) {
		kadence()->get_template( 'template-parts/footer/footer', 'row', array( 'row' => 'bottom' ) );
	}
}
add_action( 'kadence_bottom_footer', 'Kadence\bottom_footer', 10 );

/**
 * Footer Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function footer_column( $row, $column ) {
	kadence()->render_footer( $row, $column );
}
add_action( 'kadence_render_footer_column', 'Kadence\footer_column', 10, 2 );


/**
 * Footer HTML
 */
function footer_html() {
	$content = kadence()->option( 'footer_html_content' );
	if ( $content || is_customize_preview() ) {
		echo '<div class="footer-html">';
		if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
		}
		echo '<div class="footer-html-inner">';
		$content = str_replace( '{copyright}', '&copy;', $content );
		$content = str_replace( '{year}', date( 'Y' ), $content );
		$content = str_replace( '{site-title}', get_bloginfo( 'name' ), $content );
		$content = str_replace( '{theme-credit}', '- WordPress Theme by <a href="https://www.kadencewp.com/" rel="nofollow noopener" target="_blank">Kadence WP</a>', $content );
		echo do_shortcode( wpautop( $content ) );
		echo '</div>';
		echo '</div>';
	}
}
add_action( 'kadence_footer_html', 'Kadence\footer_html', 10 );

/**
 * Desktop Navigation
 */
function footer_navigation() {
	?>
	<nav id="footer-navigation" class="footer-navigation" aria-label="<?php esc_attr_e( 'Menu', 'kadence' ); ?>">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<div class="footer-menu-container">
			<?php
			if ( kadence()->is_footer_nav_menu_active() ) {
				kadence()->display_footer_nav_menu( array( 'menu_id' => 'footer-menu' ) );
			} else {
				kadence()->display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #footer-navigation -->
	<?php
}
add_action( 'kadence_footer_navigation', 'Kadence\footer_navigation', 10 );

/**
 * Desktop Social
 */
function footer_social() {
	$items      = kadence()->sub_option( 'footer_social_items', 'items' );
	$show_label = kadence()->option( 'footer_social_show_label' );
	echo '<div class="footer-social-wrap">';
	if ( is_customize_preview() ) {
		?>
		<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
			<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
		</div>
		<?php
	}
	echo '<div class="footer-social-inner-wrap social-show-label-' . ( $show_label ? 'true' : 'false' ) . ' social-style-' . esc_attr( kadence()->option( 'footer_social_style' ) ) . '">';
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['enabled'] ) {
				$link = kadence()->option( $item['id'] . '_link' );
				if ( 'phone' === $item['id'] ) {
					$link = 'tel:' . str_replace( 'tel:', '', $link );
				} elseif ( 'email' === $item['id'] ) {
					$link = 'mailto:' . str_replace( 'mailto:', '', $link );
				}
				echo '<a href="' . esc_attr( $link ) . '"' . esc_attr( $show_label ? '' : ' aria-label="' . $item['label'] . '"' ) . ' ' . ( 'phone' === $item['id'] || 'email' === $item['id'] ? '' : 'target="_blank" rel="noopener noreferrer"  ' ) . 'class="social-button footer-social-item' . esc_attr( 'image' === $item['source'] ? ' has-custom-image' : '' ) . '">';
				if ( 'image' === $item['source'] ) {
					if ( $item['imageid'] && wp_get_attachment_image( $item['imageid'], 'full', true ) ) {
						echo wp_get_attachment_image( $item['imageid'], 'full', true, array( 'class' => 'social-icon-image', 'style' => 'max-width:' . esc_attr( $item['width'] ) . 'px' ) );
					} elseif ( ! empty( $item['url'] ) ) {
						echo '<img src="' . esc_attr( $item['url'] ) . '" alt="' . esc_attr( $item['label'] ) . '" class="social-icon-image" style="max-width:' . esc_attr( $item['width'] ) . 'px"/>';
					}
				} else {
					kadence()->print_icon( $item['icon'], '', false );
				}
				if ( $show_label ) {
					echo '<span class="social-label">' . esc_html( $item['label'] ) . '</span>';
				}
				echo '</a>';
			}
		}
	}
	echo '</div>';
	echo '</div>';
}
add_action( 'kadence_footer_social', 'Kadence\footer_social', 10 );

/**
 * Scroll To Top.
 */
function scroll_up() {
	if ( kadence()->option( 'scroll_up' ) ) {
		echo '<a id="kt-scroll-up" href="#wrapper" aria-label="' . esc_attr__( 'Scroll to top', 'kadence' ) . '" class="scroll-up-wrap scroll-up-side-' . esc_attr( kadence()->option( 'scroll_up_side' ) ) . ' scroll-up-style-' . esc_attr( kadence()->option( 'scroll_up_style' ) ) . ' vs-lg-' . ( kadence()->sub_option( 'scroll_up_visiblity', 'desktop' ) ? 'true' : 'false' ) . ' vs-md-' . ( kadence()->sub_option( 'scroll_up_visiblity', 'tablet' ) ? 'true' : 'false' ) . ' vs-sm-' . ( kadence()->sub_option( 'scroll_up_visiblity', 'mobile' ) ? 'true' : 'false' ) . '">';
		kadence()->print_icon( kadence()->option( 'scroll_up_icon' ), esc_attr__( 'Scroll to top', 'kadence' ), false );
		echo '</a>';
	}
}
add_action( 'wp_footer', 'Kadence\scroll_up', 10 );
