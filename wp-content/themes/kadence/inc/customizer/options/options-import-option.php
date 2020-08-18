<?php
/**
 * Class for the Customizer Import.
 *
 * @package Kadence
 */

namespace Kadence;

use WP_Customize_Setting;
/**
 * A class that extends WP_Customize_Setting so we can access
 * the protected updated method when importing options.
 */
final class Kadence_Import_Option extends \WP_Customize_Setting {

	/**
	 * Import an option value for this setting.
	 *
	 * @since 0.3
	 * @param mixed $value The option value.
	 * @return void
	 */
	public function import( $value ) {
		$this->update( $value );
	}
}
