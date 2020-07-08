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
 * Main Call for Kadence Header
 */
function header_markup() {
	if ( kadence()->has_header() ) {
		get_template_part( 'template-parts/header/base' );
	}
}
add_action( 'kadence_header', 'Kadence\header_markup', 10 );

/**
 * Header Top Row
 */
function top_header() {
	if ( kadence()->display_header_row( 'top' ) ) {
		kadence()->get_template( 'template-parts/header/header', 'row', array( 'row' => 'top' ) );
	}
}
add_action( 'kadence_top_header', 'Kadence\top_header', 10 );

/**
 * Header Main Row
 */
function main_header() {
	if ( kadence()->display_header_row( 'main' ) ) {
		kadence()->get_template( 'template-parts/header/header', 'row', array( 'row' => 'main' ) );
	}
}
add_action( 'kadence_main_header', 'Kadence\main_header', 10 );

/**
 * Header Bottom Row
 */
function bottom_header() {
	if ( kadence()->display_header_row( 'bottom' ) ) {
		kadence()->get_template( 'template-parts/header/header', 'row', array( 'row' => 'bottom' ) );
	}
}
add_action( 'kadence_bottom_header', 'Kadence\bottom_header', 10 );

/**
 * Header Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function header_column( $row, $column ) {
	kadence()->render_header( $row, $column );
}
add_action( 'kadence_render_header_column', 'Kadence\header_column', 10, 2 );

/**
 * Mobile Header
 */
function mobile_header() {
	get_template_part( 'template-parts/header/mobile' );
}
add_action( 'kadence_mobile_header', 'Kadence\mobile_header', 10 );

/**
 * Mobile Header Top Row
 */
function mobile_top_header() {
	if ( kadence()->display_mobile_header_row( 'top' ) ) {
		kadence()->get_template( 'template-parts/header/mobile-header', 'row', array( 'mobile_row' => 'top' ) );
	}
}
add_action( 'kadence_mobile_top_header', 'Kadence\mobile_top_header', 10 );

/**
 * Mobile Header Main Row
 */
function mobile_main_header() {
	if ( kadence()->display_mobile_header_row( 'main' ) ) {
		kadence()->get_template( 'template-parts/header/mobile-header', 'row', array( 'mobile_row' => 'main' ) );
	}
}
add_action( 'kadence_mobile_main_header', 'Kadence\mobile_main_header', 10 );

/**
 * Mobile Header Bottom Row
 */
function mobile_bottom_header() {
	if ( kadence()->display_mobile_header_row( 'bottom' ) ) {
		kadence()->get_template( 'template-parts/header/mobile-header', 'row', array( 'mobile_row' => 'bottom' ) );
	}
}
add_action( 'kadence_mobile_bottom_header', 'Kadence\mobile_bottom_header', 10 );

/**
 * Mobile Header Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function mobile_header_column( $row, $column ) {
	kadence()->render_header( $row, $column, 'mobile' );
}
add_action( 'kadence_render_mobile_header_column', 'Kadence\mobile_header_column', 10, 2 );

/**
 * Desktop Site Branding
 */
function site_branding() {
	$layout   = kadence()->option( 'logo_layout' );
	$includes = array();
	$layouts  = array();
	if ( is_array( $layout ) && isset( $layout['include'] ) ) {
		if ( isset( $layout['layout'] ) ) {
			if ( isset( $layout['layout']['desktop'] ) && ! empty( $layout['layout']['desktop'] ) ) {
				$layouts['desktop'] = $layout['layout']['desktop'];
			}
		}
		if ( isset( $layout['include']['desktop'] ) && ! empty( $layout['include']['desktop'] ) ) {
			if ( strpos( $layout['include']['desktop'], 'logo' ) !== false ) {
				if ( ! in_array( 'logo', $includes, true ) ) {
					$includes[] = 'logo';
				}
			}
			if ( strpos( $layout['include']['desktop'], 'title' ) !== false ) {
				if ( ! in_array( 'title', $includes, true ) ) {
					$includes[] = 'title';
				}
			}
			if ( strpos( $layout['include']['desktop'], 'tagline' ) !== false ) {
				if ( ! in_array( 'tagline', $includes, true ) ) {
					$includes[] = 'tagline';
				}
			}
		}
	}
	$layout_slug = isset( $layouts['desktop'] ) ? $layouts['desktop'] : 'standard';
	if ( 'title_logo' === $layout_slug || 'title_tag_logo' === $layout_slug ) {
		$layout_class = 'standard-reverse';
	} elseif ( 'top_logo_title' === $layout_slug || 'top_logo_title_tag' === $layout_slug ) {
		$layout_class = 'vertical';
	} elseif ( 'top_title_logo' === $layout_slug || 'top_title_tag_logo' === $layout_slug ) {
		$layout_class = 'vertical-reverse';
	} elseif ( 'top_title_logo_tag' === $layout_slug ) {
		$layout_class = 'vertical site-title-top';
	} elseif ( 'standard' === $layout_slug && ! in_array( 'title', $includes, true ) ) {
		$layout_class = 'standard site-brand-logo-only';
	} else {
		$layout_class = 'standard';
	}

	echo '<div class="site-branding branding-layout-' . esc_attr( $layout_class ) . '">';
	if ( is_customize_preview() ) {
		?>
		<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
			<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
		</div>
		<?php
	}
	echo '<a class="brand' . ( in_array( 'logo', $includes, true ) && 'no' !== kadence()->option( 'header_sticky' ) && kadence()->option( 'header_sticky_custom_logo' ) && kadence()->option( 'header_sticky_logo' ) ? ' has-sticky-logo' : '' ) . '" href="' . esc_url( home_url( '/' ) ) . '" rel="home" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
	foreach ( $includes as $include ) {
		switch ( $include ) {
			case 'logo':
				if ( kadence()->desk_transparent_header() && kadence()->option( 'transparent_header_custom_logo' ) && kadence()->option( 'transparent_header_logo' ) ) {
					render_custom_logo( 'transparent_header_logo', 'kadence-transparent-logo' );
				} else {
					custom_logo();
				}
				if ( 'no' !== kadence()->option( 'header_sticky' ) && kadence()->option( 'header_sticky_custom_logo' ) && kadence()->option( 'header_sticky_logo' ) ) {
					render_custom_logo( 'header_sticky_logo', 'kadence-sticky-logo' );
				}
				break;
			case 'title':
				echo '<div class="site-title-wrap">';
				echo '<div class="site-title">' . get_bloginfo( 'name' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				if ( in_array( 'tagline', $includes, true ) && ( ! isset( $layouts['desktop'] ) || ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' !== $layouts['desktop'] ) ) ) {
					echo '<div class="site-description">' . get_bloginfo( 'description' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				echo '</div>';
				break;
			case 'tagline':
				if ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' === $layouts['desktop'] ) {
					echo '<div class="site-description">' . get_bloginfo( 'description' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				break;
		}
	}
	echo '</a>';
	echo '</div>';
}
add_action( 'kadence_site_branding', 'Kadence\site_branding', 10 );

/**
 * Desktop Navigation
 */
function primary_navigation() {
	?>
	<nav id="site-navigation" class="main-navigation header-navigation nav--toggle-sub header-navigation-style-<?php echo esc_attr( kadence()->option( 'primary_navigation_style' ) ); ?> header-navigation-dropdown-animation-<?php echo esc_attr( kadence()->option( 'dropdown_navigation_reveal' ) ); ?>" aria-label="<?php esc_attr_e( 'Main menu', 'kadence' ); ?>">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<div class="primary-menu-container header-menu-container">
			<?php
			if ( kadence()->is_primary_nav_menu_active() ) {
				kadence()->display_primary_nav_menu( array( 'menu_id' => 'primary-menu' ) );
			} else {
				kadence()->display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #site-navigation -->
	<?php
}
add_action( 'kadence_primary_navigation', 'Kadence\primary_navigation', 10 );

/**
 * Desktop Navigation
 */
function secondary_navigation() {
	?>
	<nav id="secondary-navigation" class="secondary-navigation header-navigation nav--toggle-sub header-navigation-style-<?php echo esc_attr( kadence()->option( 'secondary_navigation_style' ) ); ?> header-navigation-dropdown-animation-<?php echo esc_attr( kadence()->option( 'dropdown_navigation_reveal' ) ); ?>" aria-label="<?php esc_attr_e( 'Menu', 'kadence' ); ?>">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<div class="secondary-menu-container header-menu-container">
			<?php
			if ( kadence()->is_secondary_nav_menu_active() ) {
				kadence()->display_secondary_nav_menu( array( 'menu_id' => 'secondary-menu' ) );
			} else {
				kadence()->display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #secondary-navigation -->
	<?php
}
add_action( 'kadence_secondary_navigation', 'Kadence\secondary_navigation', 10 );

/**
 * Output custom logo
 *
 * @param string $option_string the image option id string
 * @param string $custom_class the image custom class.
 */
function render_custom_logo( $option_string = '', $custom_class = 'extra-custom-logo' ) {
	$html = '';
	if ( empty( $option_string ) ) {
		return;
	}
	$custom_logo_id = kadence()->option( $option_string );

	// We have a logo. Logo is go.
	if ( $custom_logo_id ) {
		$custom_logo_attr = array(
			'class' => 'custom-logo ' . $custom_class,
		);

		/*
		* If the logo alt attribute is empty, get the site title and explicitly
		* pass it to the attributes used by wp_get_attachment_image().
		*/
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		/*
		* If the alt attribute is not empty, there's no need to explicitly pass
		* it because wp_get_attachment_image() already adds the alt attribute.
		*/
		$html = wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );
	} elseif ( is_customize_preview() ) {
		// If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
		$html = '<img class="custom-logo"/></a>';
	}
	/**
	 * Filters the custom logo output.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param string $option_string the ID of the logo option.
	 */
	echo apply_filters( 'kadence_extra_custom_logo', $html, $option_string ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
}

/**
 * Output custom logo
 *
 * @param integer $blog_id the site ID for multisites.
 */
function custom_logo( $blog_id = 0 ) {
	$html          = '';
	$switched_blog = false;

	if ( is_multisite() && ! empty( $blog_id ) && get_current_blog_id() !== (int) $blog_id ) {
		switch_to_blog( $blog_id );
		$switched_blog = true;
	}

	$custom_logo_id = kadence()->option( 'custom_logo' );

	// We have a logo. Logo is go.
	if ( $custom_logo_id ) {
		$custom_logo_attr = array(
			'class' => 'custom-logo',
		);

		/*
		* If the logo alt attribute is empty, get the site title and explicitly
		* pass it to the attributes used by wp_get_attachment_image().
		*/
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		/*
		* If the alt attribute is not empty, there's no need to explicitly pass
		* it because wp_get_attachment_image() already adds the alt attribute.
		*/
		$html = wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );
	} elseif ( is_customize_preview() ) {
		// If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
		$html = '<img class="custom-logo"/></a>';
	}

	if ( $switched_blog ) {
		restore_current_blog();
	}
	/**
	 * Filters the custom logo output.
	 *
	 * @since 4.5.0
	 * @since 4.6.0 Added the `$blog_id` parameter.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param int    $blog_id ID of the blog to get the custom logo for.
	 */
	echo apply_filters( 'kadence_custom_logo', $html, $blog_id ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
}

/**
 * Mobile Site Branding
 */
function mobile_site_branding() {
	$layout   = kadence()->option( 'logo_layout' );
	$includes = array();
	$layouts  = array();
	if ( is_array( $layout ) && isset( $layout['include'] ) ) {
		foreach ( array( 'mobile', 'tablet', 'desktop' ) as $device ) {
			if ( isset( $layout['layout'] ) ) {
				if ( isset( $layout['layout'][ $device ] ) && ! empty( $layout['layout'][ $device ] ) ) {
					$layouts[ $device ] = $layout['layout'][ $device ];
				}
			}
			if ( 'desktop' === $device && ! empty( $includes ) ) {
				continue;
			}
			if ( isset( $layout['include'][ $device ] ) && ! empty( $layout['include'][ $device ] ) ) {
				if ( strpos( $layout['include'][ $device ], 'logo' ) !== false ) {
					if ( ! in_array( 'logo', $includes, true ) ) {
						$includes[] = 'logo';
					}
				}
				if ( strpos( $layout['include'][ $device ], 'title' ) !== false ) {
					if ( ! in_array( 'title', $includes, true ) ) {
						$includes[] = 'title';
					}
				}
				if ( strpos( $layout['include'][ $device ], 'tagline' ) !== false ) {
					if ( ! in_array( 'tagline', $includes, true ) ) {
						$includes[] = 'tagline';
					}
				}
			}
		}
	}
	if ( isset( $layouts['tablet'] ) ) {
		if ( 'title_logo' === $layouts['tablet'] || 'title_tag_logo' === $layouts['tablet'] ) {
			$tab_layout_class = 'standard-reverse';
		} elseif ( 'top_logo_title' === $layouts['tablet'] || 'top_logo_title_tag' === $layouts['tablet'] ) {
			$tab_layout_class = 'vertical';
		} elseif ( 'top_title_logo' === $layouts['tablet'] || 'top_title_tag_logo' === $layouts['tablet'] ) {
			$tab_layout_class = 'vertical-reverse';
		} elseif ( 'top_title_logo_tag' === $layouts['tablet'] ) {
			$tab_layout_class = 'vertical site-title-top';
		} elseif ( 'standard' === $layouts['tablet'] && ! in_array( 'title', $includes, true ) ) {
			$tab_layout_class = 'standard site-brand-logo-only';
		} elseif ( 'standard' === $layouts['tablet'] ) {
			$tab_layout_class = 'standard';
		} else {
			$tab_layout_class = 'inherit';
		}
	} else {
		$tab_layout_class = 'inherit';
	}
	if ( isset( $layouts['mobile'] ) ) {
		if ( 'title_logo' === $layouts['mobile'] || 'title_tag_logo' === $layouts['mobile'] ) {
			$mobile_layout_class = 'standard-reverse';
		} elseif ( 'top_logo_title' === $layouts['mobile'] || 'top_logo_title_tag' === $layouts['mobile'] ) {
			$mobile_layout_class = 'vertical';
		} elseif ( 'top_title_logo' === $layouts['mobile'] || 'top_title_tag_logo' === $layouts['mobile'] ) {
			$mobile_layout_class = 'vertical-reverse';
		} elseif ( 'top_title_logo_tag' === $layouts['mobile'] ) {
			$mobile_layout_class = 'vertical site-title-top';
		} elseif ( 'standard' === $layouts['mobile'] && ! in_array( 'title', $includes, true ) ) {
			$mobile_layout_class = 'standard site-brand-logo-only';
		} elseif ( 'standard' === $layouts['mobile'] ) {
			$mobile_layout_class = 'standard';
		} else {
			$mobile_layout_class = 'inherit';
		}
	} else {
		$mobile_layout_class = 'inherit';
	}
	echo '<div class="site-branding mobile-site-branding branding-layout-' . esc_attr( isset( $layouts['desktop'] ) ? $layouts['desktop'] : 'standard' ) . ' branding-tablet-layout-' . esc_attr( $tab_layout_class ) . ' branding-mobile-layout-' . esc_attr( $mobile_layout_class ) . '">';
	echo '<a class="brand' . ( in_array( 'logo', $includes, true ) && 'no' !== kadence()->option( 'mobile_header_sticky' ) && ( kadence()->option( 'header_sticky_mobile_custom_logo' ) && kadence()->option( 'header_sticky_mobile_logo' ) || kadence()->option( 'header_sticky_custom_logo' ) && kadence()->option( 'header_sticky_logo' ) ) ? ' has-sticky-logo' : '' ) . '" href="' . esc_url( home_url( '/' ) ) . '" rel="home" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
	foreach ( $includes as $include ) {
		switch ( $include ) {
			case 'logo':
				if ( kadence()->mobile_transparent_header() && kadence()->option( 'transparent_header_custom_mobile_logo' ) && kadence()->option( 'transparent_header_mobile_logo' ) ) {
					render_custom_logo( 'transparent_header_mobile_logo', 'kadence-transparent-logo' );
				} elseif ( kadence()->mobile_transparent_header() && kadence()->option( 'transparent_header_custom_logo' ) && kadence()->option( 'transparent_header_logo' ) ) {
					render_custom_logo( 'transparent_header_logo', 'kadence-transparent-logo' );
				} else {
					if ( kadence()->option( 'use_mobile_logo' ) && kadence()->option( 'mobile_logo' ) ) {
						render_custom_logo( 'mobile_logo' );
					} else {
						custom_logo();
					}
				}
				if ( 'no' !== kadence()->option( 'mobile_header_sticky' ) && kadence()->option( 'header_sticky_custom_mobile_logo' ) && kadence()->option( 'header_sticky_mobile_logo' ) ) {
					render_custom_logo( 'header_sticky_mobile_logo', 'kadence-sticky-logo' );
				} elseif ( 'no' !== kadence()->option( 'mobile_header_sticky' ) && kadence()->option( 'header_sticky_custom_logo' ) && kadence()->option( 'header_sticky_logo' ) ) {
					render_custom_logo( 'header_sticky_logo', 'kadence-sticky-logo' );
				}
				break;
			case 'title':
				echo '<div class="site-title-wrap">';
				echo '<div class="site-title' . ( ( strpos( $layout['include']['mobile'], 'title' ) === false ) ? ' vs-sm-false' : '' ) . ( ( strpos( $layout['include']['tablet'], 'title' ) === false ) ? ' vs-md-false' : '' ) . '">' . get_bloginfo( 'name' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				if ( in_array( 'tagline', $includes, true ) && ( ! isset( $layouts['desktop'] ) || ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' !== $layouts['desktop'] ) ) ) {
					echo '<div class="site-description' . ( ( strpos( $layout['include']['mobile'], 'tagline' ) === false ) ? ' vs-sm-false' : '' ) . ( ( strpos( $layout['include']['tablet'], 'tagline' ) === false ) ? ' vs-md-false' : '' ) . '">' . get_bloginfo( 'description' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				echo '</div>';
				break;
			case 'tagline':
				if ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' === $layouts['desktop'] ) {
					echo '<div class="site-description' . ( ( strpos( $layout['include']['mobile'], 'tagline' ) === false ) ? ' vs-sm-false' : '' ) . ( ( strpos( $layout['include']['tablet'], 'tagline' ) === false ) ? ' vs-md-false' : '' ) . '">' . get_bloginfo( 'description' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				break;
		}
	}
	echo '</a>';
	echo '</div>';
}
add_action( 'kadence_mobile_site_branding', 'Kadence\mobile_site_branding', 10 );
/**
 * Mobile Navigation Popup Toggle
 */
function navigation_popup_toggle() {
	add_action( 'wp_footer', 'Kadence\navigation_popup', 10 );
	?>
	<div class="mobile-toggle-open-container">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<?php
		if ( kadence()->is_amp() ) {
			?>
			<amp-state id="siteNavigationMenu">
				<script type="application/json">
					{
						"expanded": false
					}
				</script>
			</amp-state>
			<?php
		}
		?>
		<button id="mobile-toggle" class="menu-toggle-open drawer-toggle menu-toggle-style-<?php echo esc_attr( kadence()->option( 'mobile_trigger_style' ) ); ?>" aria-label="<?php esc_attr_e( 'Open menu', 'kadence' ); ?>" data-toggle-target="#mobile-drawer" data-toggle-body-class="showing-popup-drawer" aria-expanded="false" data-set-focus=".menu-toggle-close"
			<?php
			if ( kadence()->is_amp() ) {
				?>
				[class]=" siteNavigationMenu.expanded ? 'menu-toggle-open drawer-toggle menu-toggle-style-<?php echo esc_attr( kadence()->option( 'mobile_trigger_style' ) ); ?> active' : 'menu-toggle-open drawer-toggle menu-toggle-style-<?php echo esc_attr( kadence()->option( 'mobile_trigger_style' ) ); ?>' "
				on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )"
				[aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'"
				<?php
			}
			?>
		>
			<?php
			$label = kadence()->option( 'mobile_trigger_label' );
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="menu-toggle-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			?>
			<span class="menu-toggle-icon"><?php popup_toggle(); ?></span>
		</button>
	</div>
	<?php
}
add_action( 'kadence_navigation_popup_toggle', 'Kadence\navigation_popup_toggle', 10 );
/**
 * Mobile Navigation Popup Toggle
 */
function popup_toggle() {
	$icon = kadence()->option( 'mobile_trigger_icon' );
	kadence()->print_icon( $icon, '', false );
}
/**
 * Mobile Navigation Popup Toggle
 */
function navigation_popup() {
	?>
	<div id="mobile-drawer" class="popup-drawer popup-drawer-layout-<?php echo esc_attr( kadence()->option( 'header_popup_layout' ) ); ?> popup-drawer-side-<?php echo esc_attr( kadence()->option( 'header_popup_side' ) ); ?>" data-drawer-target-string="#mobile-drawer"
		<?php
		if ( kadence()->is_amp() ) {
			?>
			[class]=" siteNavigationMenu.expanded ? 'popup-drawer popup-drawer-layout-<?php echo esc_attr( kadence()->option( 'header_popup_layout' ) ); ?> popup-drawer-side-<?php echo esc_attr( kadence()->option( 'header_popup_side' ) ); ?> show-drawer active' : 'popup-drawer popup-drawer-layout-<?php echo esc_attr( kadence()->option( 'header_popup_layout' ) ); ?> popup-drawer-side-<?php echo esc_attr( kadence()->option( 'header_popup_side' ) ); ?>' "
			<?php
		}
		?>
	>
		<div class="drawer-overlay" data-drawer-target-string="#mobile-drawer"></div>
		<div class="drawer-inner">
			<div class="drawer-header">
				<button class="menu-toggle-close drawer-toggle" aria-label="<?php esc_attr_e( 'Close menu', 'kadence' ); ?>"  data-toggle-target="#mobile-drawer" data-toggle-body-class="showing-popup-drawer" aria-expanded="false" data-set-focus=".menu-toggle-open"
				<?php
					if ( kadence()->is_amp() ) {
						?>
						on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )"
						[aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'"
						<?php
					}
				?>
			>
					<?php kadence()->print_icon( 'close', '', false ); ?>
				</button>
			</div>
			<div class="drawer-content">
				<?php kadence()->render_header( 'popup', 'content', 'mobile' ); ?>
			</div>
		</div>
	</div>
	<?php
}
/**
 * Mobile Navigation
 */
function mobile_navigation() {
	?>
	<nav id="mobile-site-navigation" class="mobile-navigation drawer-navigation drawer-navigation-style-<?php echo esc_attr( kadence()->option( 'mobile_navigation_style' ) ); ?>" aria-label="<?php esc_attr_e( 'Main menu', 'kadence' ); ?>">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<div class="mobile-menu-container drawer-menu-container">
			<?php
			if ( kadence()->is_mobile_nav_menu_active() ) {
				kadence()->display_mobile_nav_menu( array( 'menu_id' => 'mobile-menu' ) );
			} elseif ( kadence()->is_primary_nav_menu_active() ) {
				kadence()->display_primary_nav_menu( array( 'menu_id' => 'mobile-menu', 'show_toggles' => true ) );
			} else {
				kadence()->display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #site-navigation -->
	<?php
}
add_action( 'kadence_mobile_navigation', 'Kadence\mobile_navigation', 10 );

/**
 * Desktop HTML
 */
function header_html() {
	$content = kadence()->option( 'header_html_content' );
	if ( $content || is_customize_preview() ) {
		$link_style = kadence()->option( 'header_html_link_style' );
		echo '<div class="header-html inner-link-style-' . esc_attr( $link_style ) . '">';
		if ( is_customize_preview() ) {
			?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
		}
		echo '<div class="header-html-inner">';
		echo do_shortcode( wpautop( $content ) );
		echo '</div>';
		echo '</div>';
	}
}
add_action( 'kadence_header_html', 'Kadence\header_html', 10 );

/**
 * Mobile HTML
 */
function mobile_html() {
	$content = kadence()->option( 'mobile_html_content' );
	if ( $content || is_customize_preview() ) {
		echo '<div class="mobile-html">';
		if ( is_customize_preview() ) {
			?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
		}
		echo '<div class="mobile-html-inner">';
		echo do_shortcode( wpautop( $content ) );
		echo '</div>';
		echo '</div>';
	}
}
add_action( 'kadence_mobile_html', 'Kadence\mobile_html', 10 );
/**
 * Desktop Button
 */
function header_button() {
	$label = kadence()->option( 'header_button_label' );
	if ( $label || is_customize_preview() ) {
		echo '<div class="header-button-wrap">';
		if ( is_customize_preview() ) {
			?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
		}
		echo '<div class="header-button-inner-wrap">';
		echo '<a href="' . esc_attr( kadence()->option( 'header_button_link' ) ) . '" target="' . esc_attr( kadence()->option( 'header_button_target' ) ? '_blank' : '_self' ) . '"' . ( kadence()->option( 'header_button_target' ) ? ' rel="noopener noreferrer"' : '' ) . ' class="button header-button button-size-' . esc_attr( kadence()->option( 'header_button_size' ) ) . ' button-style-' . esc_attr( kadence()->option( 'header_button_style' ) ) . '">';
		echo esc_html( $label );
		echo '</a>';
		echo '</div>';
		echo '</div>';
	}
}
add_action( 'kadence_header_button', 'Kadence\header_button', 10 );

/**
 * Mobile Button
 */
function mobile_button() {
	$label = kadence()->option( 'mobile_button_label' );
	if ( $label || is_customize_preview() ) {
		echo '<div class="mobile-header-button-wrap">';
		if ( is_customize_preview() ) {
			?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
		}
		echo '<div class="mobile-header-button-inner-wrap">';
		echo '<a href="' . esc_attr( kadence()->option( 'mobile_button_link' ) ) . '" target="' . esc_attr( kadence()->option( 'mobile_button_target' ) ? '_blank' : '_self' ) . '"' . ( kadence()->option( 'mobile_button_target' ) ? ' rel="noopener noreferrer"' : '' ) . ' class="button mobile-header-button button-size-' . esc_attr( kadence()->option( 'mobile_button_size' ) ) . ' button-style-' . esc_attr( kadence()->option( 'mobile_button_style' ) ) . '">';
		echo esc_html( $label );
		echo '</a>';
		echo '</div>';
		echo '</div>';
	}
}
add_action( 'kadence_mobile_button', 'Kadence\mobile_button', 10 );


/**
 * Desktop Cart
 */
function header_cart() {
	if ( class_exists( 'woocommerce' ) ) {
		$label      = kadence()->option( 'header_cart_label' );
		$show_total = kadence()->option( 'header_cart_show_total' );
		$icon       = kadence()->option( 'header_cart_icon', 'shopping-bag' );
		echo '<div class="header-cart-wrap kadence-header-cart">';
		if ( is_customize_preview() ) {
			?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
		}
		echo '<div class="header-cart-inner-wrap header-cart-is-empty-' . ( WC()->cart->get_cart_contents_count() > 0 ? 'true' : 'false' ) . ' cart-show-label-' . ( ! empty( $label ) ? 'true' : 'false' ) . ' cart-style-' . esc_attr( kadence()->option( 'header_cart_style' ) ) . '">';
		if ( 'link' === kadence()->option( 'header_cart_style' ) ) {
			echo '<a href="' . esc_url( wc_get_cart_url() ) . '"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'kadence' ) . '"' ) . ' class="header-cart-button">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			kadence()->print_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</a>';
		} elseif ( 'slide' === kadence()->option( 'header_cart_style' ) ) {
			add_action( 'wp_footer', 'Kadence\cart_popup', 20 );
			echo '<button data-toggle-target="#cart-drawer"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'kadence' ) . '"' ) . ' class="drawer-toggle header-cart-button" data-toggle-body-class="showing-popup-drawer" aria-expanded="false" data-set-focus=".cart-toggle-close">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			kadence()->print_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</button>';
		}
		echo '</div>';
		echo '</div>';
	}
}
add_action( 'kadence_header_cart', 'Kadence\header_cart', 10 );

/**
 * Cart Popup Toggle
 */
function cart_popup() {
	?>
	<div id="cart-drawer" class="popup-drawer popup-drawer-layout-sidepanel popup-drawer-side-<?php echo esc_attr( kadence()->option( 'header_cart_popup_side' ) ); ?> popup-mobile-drawer-side-<?php echo esc_attr( kadence()->option( 'header_mobile_cart_popup_side' ) ); ?>" data-drawer-target-string="#cart-drawer">
		<div class="drawer-overlay" data-drawer-target-string="#cart-drawer"></div>
		<div class="drawer-inner">
			<div class="drawer-header">
				<h2 class="side-cart-header"><?php esc_html_e( 'Review Cart', 'kadence' ); ?></h2>
				<button class="cart-toggle-close drawer-toggle" aria-label="<?php esc_attr_e( 'Close Cart', 'kadence' ); ?>"  data-toggle-target="#cart-drawer" data-toggle-body-class="showing-popup-drawer" aria-expanded="false" data-set-focus=".header-cart-button">
					<?php kadence()->print_icon( 'close', '', false ); ?>
				</button>
			</div>
			<div class="drawer-content woocommerce widget_shopping_cart">
				<div class="kadence-mini-cart-refresh">
					<?php woocommerce_mini_cart(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Desktop Cart
 */
function mobile_cart() {
	if ( class_exists( 'woocommerce' ) ) {
		$label      = kadence()->option( 'header_mobile_cart_label' );
		$show_total = kadence()->option( 'header_mobile_cart_show_total' );
		$icon       = kadence()->option( 'header_mobile_cart_icon', 'shopping-bag' );
		echo '<div class="header-mobile-cart-wrap kadence-header-cart">';
		if ( is_customize_preview() ) {
			?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
		}
		echo '<div class="header-cart-inner-wrap header-cart-is-empty-' . ( WC()->cart->get_cart_contents_count() > 0 ? 'true' : 'false' ) . ' cart-show-label-' . ( ! empty( $label ) ? 'true' : 'false' ) . ' cart-style-' . esc_attr( kadence()->option( 'header_mobile_cart_style' ) ) . '">';
		if ( 'link' === kadence()->option( 'header_mobile_cart_style' ) ) {
			echo '<a href="' . esc_url( wc_get_cart_url() ) . '"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'kadence' ) . '"' ) . ' class="header-cart-button">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			kadence()->print_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</a>';
		} elseif ( 'slide' === kadence()->option( 'header_mobile_cart_style' ) ) {
			add_action( 'wp_footer', 'Kadence\cart_popup', 20 );
			echo '<button data-toggle-target="#cart-drawer"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'kadence' ) . '"' ) . ' class="drawer-toggle header-cart-button" data-toggle-body-class="showing-popup-drawer" aria-expanded="false" data-set-focus=".cart-toggle-close">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			kadence()->print_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</button>';
		}
		echo '</div>';
		echo '</div>';
	}
}
add_action( 'kadence_mobile_cart', 'Kadence\mobile_cart', 10 );

/**
 * Desktop Social
 */
function header_social() {
	$items      = kadence()->sub_option( 'header_social_items', 'items' );
	$show_label = kadence()->option( 'header_social_show_label' );
	echo '<div class="header-social-wrap">';
	if ( is_customize_preview() ) {
		?>
		<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
			<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
		</div>
		<?php
	}
	echo '<div class="header-social-inner-wrap element-social-inner-wrap social-show-label-' . ( $show_label ? 'true' : 'false' ) . ' social-style-' . esc_attr( kadence()->option( 'header_social_style' ) ) . '">';
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['enabled'] ) {
				$link = kadence()->option( $item['id'] . '_link' );
				if ( 'phone' === $item['id'] ) {
					$link = 'tel:' . str_replace( 'tel:', '', $link );
				} elseif ( 'email' === $item['id'] ) {
					$link = 'mailto:' . str_replace( 'mailto:', '', $link );
				}
				echo '<a href="' . esc_attr( $link ) . '"' . esc_attr( $show_label ? '' : ' aria-label="' . $item['label'] . '"' ) . ' ' . ( 'phone' === $item['id'] || 'email' === $item['id'] ? '' : 'target="_blank" rel="noopener noreferrer"  ' ) . 'class="social-button header-social-item' . esc_attr( 'image' === $item['source'] ? ' has-custom-image' : '' ) . '">';
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
add_action( 'kadence_header_social', 'Kadence\header_social', 10 );

/**
 * Mobile Social
 */
function mobile_social() {
	$items      = kadence()->sub_option( 'header_mobile_social_items', 'items' );
	$show_label = kadence()->option( 'header_mobile_social_show_label' );
	echo '<div class="header-mobile-social-wrap">';
	if ( is_customize_preview() ) {
		?>
		<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
			<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
		</div>
		<?php
	}
	echo '<div class="header-mobile-social-inner-wrap element-social-inner-wrap social-show-label-' . ( $show_label ? 'true' : 'false' ) . ' social-style-' . esc_attr( kadence()->option( 'header_mobile_social_style' ) ) . '">';
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['enabled'] ) {
				$link = kadence()->option( $item['id'] . '_link' );
				if ( 'phone' === $item['id'] ) {
					$link = 'tel:' . str_replace( 'tel:', '', $link );
				} elseif ( 'email' === $item['id'] ) {
					$link = 'mailto:' . str_replace( 'mailto:', '', $link );
				}
				echo '<a href="' . esc_attr( $link ) . '"' . esc_attr( $show_label ? '' : ' aria-label="' . $item['label'] . '"' ) . ' ' . ( 'phone' === $item['id'] || 'email' === $item['id'] ? '' : 'target="_blank" rel="noopener noreferrer"  ' ) . 'class="social-button header-social-item' . esc_attr( 'image' === $item['source'] ? ' has-custom-image' : '' ) . '">';
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
add_action( 'kadence_mobile_social', 'Kadence\mobile_social', 10 );

/**
 * Header Search Popup Toggle
 */
function header_search() {
	add_action( 'wp_footer', 'Kadence\search_modal', 10 );
	?>
	<div class="search-toggle-open-container">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<button class="search-toggle-open drawer-toggle search-toggle-style-<?php echo esc_attr( kadence()->option( 'header_search_style' ) ); ?>" aria-label="<?php esc_attr_e( 'View Search Form', 'kadence' ); ?>" data-toggle-target="#search-drawer" data-toggle-body-class="showing-popup-drawer" aria-expanded="false" data-set-focus="#search-drawer .search-field">
			<?php
			$label = kadence()->option( 'header_search_label' );
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="search-toggle-label vs-lg-<?php echo ( kadence()->sub_option( 'header_search_label_visiblity', 'desktop' ) ? 'true' : 'false' ); ?> vs-md-<?php echo ( kadence()->sub_option( 'header_search_label_visiblity', 'tablet' ) ? 'true' : 'false' ); ?> vs-sm-<?php echo ( kadence()->sub_option( 'header_search_label_visiblity', 'mobile' ) ? 'true' : 'false' ); ?>"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			?>
			<span class="search-toggle-icon"><?php search_toggle(); ?></span>
		</button>
	</div>
	<?php
}
add_action( 'kadence_header_search', 'Kadence\header_search', 10 );
/**
 * Search Popup Toggle Icon
 */
function search_toggle() {
	$icon = kadence()->option( 'header_search_icon' );
	kadence()->print_icon( $icon, '', false );
}
/**
 * Search Popup Modal
 */
function search_modal() {
	?>
	<div id="search-drawer" class="popup-drawer popup-drawer-layout-fullwidth" data-drawer-target-string="#search-drawer">
		<div class="drawer-overlay" data-drawer-target-string="#search-drawer"></div>
		<div class="drawer-inner">
			<div class="drawer-header">
				<button class="search-toggle-close drawer-toggle" aria-label="<?php esc_attr_e( 'Close search', 'kadence' ); ?>"  data-toggle-target="#search-drawer" data-toggle-body-class="showing-popup-drawer" aria-expanded="false" data-set-focus=".search-toggle-open">
					<?php kadence()->print_icon( 'close', '', false ); ?>
				</button>
			</div>
			<div class="drawer-content">
				<?php
				if ( class_exists( 'woocommerce' ) && kadence()->option( 'header_search_woo' ) ) {
					get_product_search_form();
				} else {
					get_search_form();
				}
				?>
			</div>
		</div>
	</div>
	<?php
}
