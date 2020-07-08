<?php
/**
 * The `kadence()` function.
 *
 * @package kadence
 */

namespace Kadence;

use Kadence\Template_Tags;
use Kadence\Theme;
use function get_template_directory;

/**
 * Provides access to all available template tags of the theme.
 *
 * When called for the first time, the function will initialize the theme.
 *
 * @return Template_Tags Template tags instance exposing template tag methods.
 */
function kadence() : Template_Tags {
	static $theme = null;

	if ( null === $theme ) {
		$theme = Theme::instance();
	}

	return $theme->template_tags();
}

// Load the CSS class.
require get_template_directory() . '/inc/class-kadence-css.php';

// Load the Customizer class.
require get_template_directory() . '/inc/customizer/class-theme-customizer.php';

// Load Settings Page Class.
require get_template_directory() . '/inc/dashboard/class-theme-dashboard.php';

// Load the Meta class.
require get_template_directory() . '/inc/meta/class-theme-meta.php';

// Load the template hooks.
require get_template_directory() . '/inc/template-hooks/header-hooks.php';
require get_template_directory() . '/inc/template-hooks/footer-hooks.php';
require get_template_directory() . '/inc/template-hooks/title-hooks.php';
require get_template_directory() . '/inc/template-hooks/single-hooks.php';
require get_template_directory() . '/inc/template-hooks/archive-hooks.php';
