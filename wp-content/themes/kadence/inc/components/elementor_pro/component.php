<?php
/**
 * Kadence\Elementor_Pro\Component class
 *
 * @package kadence
 */

namespace Kadence\Elementor_Pro;

use Kadence\Component_Interface;
use Elementor;
use ElementorPro\Modules\ThemeBuilder\ThemeSupport;
use Elementor\TemplateLibrary\Source_Local;
use ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager;
use ElementorPro\Modules\ThemeBuilder\Module;
use function Kadence\kadence;
use function add_action;
use function add_theme_support;
use function have_posts;
use function the_post;
use function apply_filters;
use function get_template_part;
use function get_post_type;


/**
 * Class for adding Elementor plugin support.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'elementor_pro';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'elementor/theme/register_locations', array( $this, 'register_elementor_locations' ) );
	}
	/**
	 * Elementor Location support.
	 *
	 * @param object $elementor_theme_manager the theme manager.
	 */
	public function register_elementor_locations( $elementor_theme_manager ) {
		$elementor_theme_manager->register_location(
			'header',
			array(
				'hook'         => 'kadence_header',
				'remove_hooks' => array( 'Kadence\header_markup' ),
			)
		);
		$elementor_theme_manager->register_location(
			'footer',
			array(
				'hook'         => 'kadence_footer',
				'remove_hooks' => array( 'Kadence\footer_markup' ),
			)
		);
		$elementor_theme_manager->register_location(
			'archive',
			array(
				'hook'         => 'kadence_archive',
				'remove_hooks' => array( 'Kadence\archive_markup' ),
			)
		);
		$elementor_theme_manager->register_location(
			'single',
			array(
				'hook'         => 'kadence_single',
				'remove_hooks' => array( 'Kadence\single_markup' ),
			)
		);
	}
}
