<?php
/**
 * The Row customize control extends the WP_Customize_Control class.
 *
 * @package customizer-controls
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}


/**
 * Class Kadence_Control_Row
 *
 * @access public
 */
class Kadence_Control_Row extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'kadence_row_control';

	/**
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $default = array();

	/**
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $input_attrs = array();

	/**
	 * Send to JS.
	 */
	public function to_json() {
		parent::to_json();
		$this->json['input_attrs'] = $this->input_attrs;
		$this->json['default']     = $this->default;
	}
}
$wp_customize->register_control_type( 'Kadence_Control_Row' );
