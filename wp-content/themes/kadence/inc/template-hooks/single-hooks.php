<?php
/**
 * Calls in content using theme hooks.
 *
 * @package kadence
 */

namespace Kadence;

use function Kadence\kadence;
use function get_template_part;
use function add_action;
/**
 * Single Content
 */
function single_markup() {
	get_template_part( 'template-parts/content/single', get_post_type() );
}
add_action( 'kadence_single', 'Kadence\single_markup', 10 );
