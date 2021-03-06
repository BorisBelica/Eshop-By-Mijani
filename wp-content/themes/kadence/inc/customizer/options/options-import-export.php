<?php
/**
 * Class for the Customizer Import/Export and Reset.
 * This is based on the Beaver Builders Import Export plugin.
 *
 * @package Kadence
 */

namespace Kadence;

use Kadence_Control_Builder;
use Kadence_Control_Builder_Tabs;
use WP_Customize_Control;
use function Kadence\kadence;
use function add_action;
use function get_template_part;
use function add_filter;
use function wp_enqueue_style;
use function get_template_directory;
use function wp_style_add_data;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_styles;
use function esc_attr;
use function esc_url;
use function wp_style_is;
use function _doing_it_wrong;
use function wp_print_styles;
use function post_password_required;
use function get_option;
use function wp_get_attachment_thumb_url;
use function apply_filters;
use function wp_get_attachment_url;
use function wp_get_attachment_metadata;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class for Customizer Import Export
 *
 * @category class
 */
class Customizer_Import_Export {

	/**
	 * An array of core options that shouldn't be imported.
	 * @access private
	 * @var array $core_options
	 */
	static private $core_options = array(
		'blogname',
		'blogdescription',
		'show_on_front',
		'page_on_front',
		'page_for_posts',
	);

	/**
	 * @var null
	 */
	private static $instance = null;
	/**
	 * Instance Control
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Class constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'import_export_requests' ), 999999 );
		add_action( 'customize_controls_print_scripts', array( $this, 'controls_print_scripts' ) );
	}

	/**
	 * Check to see if we need to do an export or import.
	 * @param object $wp_customize An instance of WP_Customize_Manager.
	 * @return void
	 */
	public static function import_export_requests( $wp_customize ) {
		// Check if user is allowed to change values.
		if ( current_user_can( 'edit_theme_options' ) ) {
			if ( isset( $_REQUEST['kadence-theme-export'] ) ) {
				self::export_data( $wp_customize );
			}
			if ( isset( $_REQUEST['kadence-theme-import'] ) && isset( $_FILES['kadence-theme-import-file'] ) ) {
				self::import_data( $wp_customize );
			}
		}
	}

	/**
	 * Export Theme settings.
	 *
	 * @access private
	 * @param object $wp_customize An instance of WP_Customize_Manager.
	 * @return void
	 */
	private static function export_data( $wp_customize ) {
		if ( ! wp_verify_nonce( $_REQUEST['kadence-theme-export'], 'kadence-theme-exporting' ) ) {
			return;
		}
		$template = 'kadence';
		$charset  = get_option( 'blog_charset' );
		$mods     = get_theme_mods();
		$data     = array(
			'template' => $template,
			'mods'     => $mods ? $mods : array(),
			'options'  => array(),
		);

		// Get options from the Customizer API.
		$settings = $wp_customize->settings();
		foreach ( $settings as $key => $setting ) {

			if ( 'option' == $setting->type ) {

				// Don't save widget data.
				if ( 'widget_' === substr( strtolower( $key ), 0, 7 ) ) {
					continue;
				}

				// Don't save sidebar data.
				if ( 'sidebars_' === substr( strtolower( $key ), 0, 9 ) ) {
					continue;
				}

				// Don't save core options.
				if ( in_array( $key, self::$core_options ) ) {
					continue;
				}

				$data['options'][ $key ] = $setting->value();
			}
		}
		if ( function_exists( 'wp_get_custom_css_post' ) ) {
			$data['wp_css'] = wp_get_custom_css();
		}

		// Set the download headers.
		header( 'Content-disposition: attachment; filename=kadence-theme-export.dat' );
		header( 'Content-Type: application/octet-stream; charset=' . $charset );

		// Serialize the export data.
		echo serialize( $data );

		// Start the download.
		die();
	}
	/**
	 * Imports uploaded kadence woo email settings
	 *
	 * @access private
	 * @param object $wp_customize An instance of WP_Customize_Manager.
	 * @return void
	 */
	private static function import_data( $wp_customize ) {
		// Make sure we have a valid nonce.
		if ( ! wp_verify_nonce( $_REQUEST['kadence-theme-import'], 'kadence-theme-importing' ) ) {
			return;
		}
		// Make sure WordPress upload support is loaded.
		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}
		// Load the export/import option class.
		require_once get_template_directory() . '/inc/customizer/options/options-import-option.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		// Setup global vars.
		global $wp_customize;
		global $kadence_import_error;

		// Setup internal vars.
		$kadence_import_error = false;
		$template             = 'kadence';
		$overrides            = array( 'test_form' => false, 'test_type' => false, 'mimes' => array( 'dat' => 'text/plain' ) );
		$file                 = wp_handle_upload( $_FILES['kadence-theme-import-file'], $overrides );

		// Make sure we have an uploaded file.
		if ( isset( $file['error'] ) ) {
			$kadence_import_error = $file['error'];
			return;
		}
		if ( ! file_exists( $file['file'] ) ) {
			$kadence_import_error = __( 'Error importing settings! Please try again.', 'kadence' );
			return;
		}

		// Get the upload data.
		$raw  = file_get_contents( $file['file'] );
		$data = @unserialize( $raw );

		// Remove the uploaded file.
		unlink( $file['file'] );

		// Data checks.
		if ( 'array' != gettype( $data ) ) {
			$kadence_import_error = __( 'Error importing settings! Please check that you uploaded a customizer export file.', 'kadence' );
			return;
		}
		if ( ! isset( $data['template'] ) ) {
			$kadence_import_error = __( 'Error importing settings! Please check that you uploaded a customizer export file.', 'kadence' );
			return;
		}
		if ( $data['template'] != $template ) {
			$kadence_import_error = __( 'Error importing settings! The settings you uploaded are not for the Kadence Theme.', 'kadence' );
			return;
		}
		// Import images.
		$data['mods'] = self::import_images( $data['mods'] );

		// Import custom options.
		if ( isset( $data['options'] ) ) {
			foreach ( $data['options'] as $option_key => $option_value ) {
				$option = new Kadence_Import_Option(
					$wp_customize,
					$option_key,
					array(
						'default'    => '',
						'type'       => 'option',
						'capability' => 'edit_theme_options'
					)
				);
				$option->import( $option_value );
			}
		}
		// If wp_css is set then import it.
		if ( function_exists( 'wp_update_custom_css_post' ) && isset( $data['wp_css'] ) && '' !== $data['wp_css'] ) {
			wp_update_custom_css_post( $data['wp_css'] );
		}
		// Call the customize_save action.
		do_action( 'customize_save', $wp_customize );

		// Loop through the mods.
		foreach ( $data['mods'] as $key => $val ) {

			// Call the customize_save_ dynamic action.
			do_action( 'customize_save_' . $key, $wp_customize );

			// Save the mod.
			set_theme_mod( $key, $val );
		}

		// Call the customize_save_after action.
		do_action( 'customize_save_after', $wp_customize );
	}

	/**
	 * Imports images for settings saved as mods.
	 *
	 * @since 0.1
	 * @access private
	 * @param array $mods An array of customizer mods.
	 * @return array The mods array with any new import data.
	 */
	private static function import_images( $mods ) {
		foreach ( $mods as $key => $val ) {

			if ( self::is_image_url( $val ) ) {

				$data = self::sideload_image( $val );

				if ( ! is_wp_error( $data ) ) {

					$mods[ $key ] = $data->url;

					// Handle header image controls.
					if ( isset( $mods[ $key . '_data' ] ) ) {
						$mods[ $key . '_data' ] = $data;
						update_post_meta( $data->attachment_id, '_wp_attachment_is_custom_header', get_stylesheet() );
					}
				}
			}
		}

		return $mods;
	}
	/**
	 * Taken from the core media_sideload_image function and
	 * modified to return an array of data instead of html.
	 *
	 * @since 0.1
	 * @access private
	 * @param string $file The image file path.
	 * @return array An array of image data.
	 */
	private static function _sideload_image( $file ) {
		$data = new stdClass();

		if ( ! function_exists( 'media_handle_sideload' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
		}
		if ( ! empty( $file ) ) {

			// Set variables for storage, fix file filename for query strings.
			preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
			$file_array = array();
			$file_array['name'] = basename( $matches[0] );

			// Download file to temp location.
			$file_array['tmp_name'] = download_url( $file );

			// If error storing temporarily, return the error.
			if ( is_wp_error( $file_array['tmp_name'] ) ) {
				return $file_array['tmp_name'];
			}

			// Do the validation and storage stuff.
			$id = media_handle_sideload( $file_array, 0 );

			// If error storing permanently, unlink.
			if ( is_wp_error( $id ) ) {
				@unlink( $file_array['tmp_name'] );
				return $id;
			}

			// Build the object to return.
			$meta                = wp_get_attachment_metadata( $id );
			$data->attachment_id = $id;
			$data->url           = wp_get_attachment_url( $id );
			$data->thumbnail_url = wp_get_attachment_thumb_url( $id );
			$data->height        = $meta['height'];
			$data->width         = $meta['width'];
		}

		return $data;
	}

	/**
	 * Checks to see whether a string is an image url or not.
	 *
	 * @since 0.1
	 * @access private
	 * @param string $string The string to check.
	 * @return bool Whether the string is an image url or not.
	 */
	private static function is_image_url( $string = '' ) {
		if ( is_string( $string ) ) {
			if ( preg_match( '/\.(jpg|jpeg|png|gif)/i', $string ) ) {
				return true;
			}
		}

		return false;
	}
	/**
	 * Prints error scripts for the control.
	 *
	 * @since 0.1
	 * @return void
	 */
	public static function controls_print_scripts() {
		global $kadence_import_error;
		
		if ( $kadence_import_error ) {
			echo '<script> alert("' . $kadence_import_error . '"); </script>';
		}
	}
}
Customizer_Import_Export::get_instance();


$settings = array(
	'kadence_theme_import_export' => array(
		'control_type' => 'kadence_import_export_control',
		'section'      => 'import_export',
		'priority'     => 2,
		'label'        => esc_html__( 'Import/Export', 'kadence' ),
		'settings'     => false,
	),
);

Theme_Customizer::add_settings( $settings );
