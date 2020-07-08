<?php
/**
 * Kadence\Third_Party\Component class
 *
 * @package kadence
 */

namespace Kadence\Third_Party;

use Kadence\Component_Interface;
use function Kadence\kadence;
use function add_action;
use function add_filter;
use function add_theme_support;
use function get_template_part;
use function locate_template;

/**
 * Class for integrating with the block Third_Party.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'third_party';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		// WeDocs.
		remove_action( 'wedocs_before_main_content', 'wedocs_template_wrapper_start', 10 );
		remove_action( 'wedocs_after_main_content', 'wedocs_template_wrapper_end', 10 );
		add_action( 'wedocs_before_main_content', array( $this, 'output_content_wrapper' ), 10 );
		add_action( 'wedocs_after_main_content', array( $this, 'output_content_wrapper_end' ), 10 );
	}

	/**
	 * Adds theme output Wrapper.
	 */
	public function output_content_wrapper() {
		kadence()->print_styles( 'kadence-content' );
		/**
		 * Hook for Hero Section
		 */
		do_action( 'kadence_hero_header' );
		echo '<div id="primary" class="content-area"><div class="content-container site-container"><main id="main" class="site-main">';
	}
	/**
	 * Adds theme end output Wrapper.
	 */
	public function output_content_wrapper_end() {
		echo '</main></div></div>';
	}
}
