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
 * Archive Content
 */
function archive_markup() {
	get_template_part( 'template-parts/content/archive', get_post_type() );
}
add_action( 'kadence_archive', 'Kadence\archive_markup', 10 );
