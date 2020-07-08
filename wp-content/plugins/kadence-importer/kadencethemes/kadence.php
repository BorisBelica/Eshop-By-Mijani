<?php
/**
 * Kadence Theme Demos import data.
 *
 * @package Kadence Importer.
 */

/**
 * Kadence Import function.
 */
function kadence_import_kadence_theme_files() {
	$woocommerce = array(
		'base'         => 'woocommerce',
		'slug'         => 'woocommerce',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_woocommerce/woocommerce.php' ) . '&action=activate&plugin=woocommerce%2Fwoocommerce.php' ),
		'install_url'  => $install_link = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'install-plugin',
					'plugin' => 'woocommerce',
				),
				network_admin_url( 'update.php' )
			),
			'install-plugin_woocommerce'
		),
		'title'        => 'Woocommerce',
		'bundled'      => '0',
		'state'        => Kadence_Importer_Plugin_Check::active_check( 'woocommerce/woocommerce.php' ),
	);
	$kadence_blocks = array(
		'base'         => 'kadence-blocks',
		'slug'         => 'kadence-blocks',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_kadence-blocks/kadence-blocks.php' ) . '&action=activate&plugin=kadence-blocks%2Fkadence-blocks.php' ),
		'install_url'  => $install_link = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'install-plugin',
					'plugin' => 'kadence-blocks',
				),
				network_admin_url( 'update.php' )
			),
			'install-plugin_kadence-blocks'
		),
		'title'        => 'Kadence Blocks',
		'bundled'      => '0',
		'state'        => Kadence_Importer_Plugin_Check::active_check( 'kadence-blocks/kadence-blocks.php' ),
	);
	$kadence_blocks_pro = array(
		'base'         => 'kadence-blocks-pro',
		'slug'         => 'kadence-blocks-pro',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_kadence-blocks-pro/kadence-blocks-pro.php' ) . '&action=activate&plugin=kadence-blocks-pro%2Fkadence-blocks-pro.php' ),
		'install_url'  => $install_link = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'install-plugin',
					'plugin' => 'kadence-blocks-pro',
				),
				network_admin_url( 'update.php' )
			),
			'install-plugin_kadence-blocks-pro'
		),
		'title'        => 'Kadence Block Pro',
		'bundled'      => '1',
		'state'        => Kadence_Importer_Plugin_Check::active_check( 'kadence-blocks-pro/kadence-blocks-pro.php' ),
	);
	$wpzoom_recipe_card = array(
		'base'         => 'recipe-card-blocks-by-wpzoom',
		'slug'         => 'wpzoom-recipe-card',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_recipe-card-blocks-by-wpzoom/wpzoom-recipe-card.php' ) . '&action=activate&plugin=recipe-card-blocks-by-wpzoom%2Fwpzoom-recipe-card.php' ),
		'install_url'  => $install_link = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'install-plugin',
					'plugin' => 'recipe-card-blocks-by-wpzoom',
				),
				network_admin_url( 'update.php' )
			),
			'install-plugin_recipe-card-blocks-by-wpzoom'
		),
		'title'        => 'Recipe Card Blocks by WPZOOM',
		'bundled'      => '0',
		'state'        => Kadence_Importer_Plugin_Check::active_check( 'recipe-card-blocks-by-wpzoom/wpzoom-recipe-card.php' ),
	);
	if ( 'notactive' !== $kadence_blocks_pro['state'] ) {
		$agency = array(
			'import_file_name'           => 'Agency',
			'categories'                 => array( 'Kadence Blocks Pro' ),
			'import_file_url'            => 'https://kadence.design/importer/kadence/agency_pro/demo_content.xml',
			'import_widget_file_url'     => '',
			'import_customizer_file_url' => 'https://kadence.design/importer/kadence/agency_pro/theme_options.json',
			'preview_url'                => 'https://demos.kadencewp.com/blocks-agency/',
			'import_preview_image_url'   => 'https://kadence.design/importer/kadence/agency_pro/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_blocks,
				$kadence_blocks_pro
			),
		);
	} else {
		$agency = array(
			'import_file_name'           => 'Agency',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/kadence/agency/demo_content.xml',
			'import_widget_file_url'     => '',
			'import_customizer_file_url' => 'https://kadence.design/importer/kadence/agency/theme_options.json',
			'preview_url'                => 'https://demos.kadencewp.com/agency-free/',
			'import_preview_image_url'   => 'https://kadence.design/importer/kadence/agency/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_blocks,
			),
		);
	}
	$demos = array(
		$agency,
		array(
			'import_file_name'           => 'Recipe Blog',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/kadence/recipe_blog/demo_content.xml',
			'import_widget_file_url'     => '',
			'import_customizer_file_url' => 'https://kadence.design/importer/kadence/recipe_blog/theme_options.json',
			'preview_url'                => 'https://demos.kadencewp.com/food/',
			'import_preview_image_url'   => 'https://kadence.design/importer/kadence/recipe_blog/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_blocks,
				$wpzoom_recipe_card,
			),
		),
		array(
			'import_file_name'           => 'Shopping Site',
			'categories'                 => array( 'Woocommerce' ),
			'import_file_url'            => 'https://kadence.design/importer/kadence/shopping_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/kadence/shopping_site/widget_data.json',
			'import_customizer_file_url' => 'https://kadence.design/importer/kadence/shopping_site/theme_options.json',
			'preview_url'                => 'https://demos.kadencewp.com/blocks-store/',
			'import_preview_image_url'   => 'https://kadence.design/importer/kadence/shopping_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_blocks,
				$woocommerce,
			),
		),
	);
	return $demos;
}
/**
 * Kadence After Import functions.
 *
 * @param array $selected_import the selected import.
 */
function kadence_kadence_theme_after_import( $selected_import ) {
	if ( 'Agency' === $selected_import['import_file_name'] ) {

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary' => $main_menu->term_id,
				'mobile'  => $main_menu->term_id,
			)
		);

		// Assign front page.
		$homepage = get_page_by_title( 'Home' );
		if ( isset( $homepage ) && $homepage->ID ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $homepage->ID ); // Front Page.
		}
		wp_delete_post( 1 );

	} elseif ( 'Recipe Blog' === $selected_import['import_file_name'] ) {

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary' => $main_menu->term_id,
				'mobile'  => $main_menu->term_id,
				'footer'  => $main_menu->term_id,
			)
		);

		// Assign front page.
		$homepage = get_page_by_title( 'Home' );
		if ( isset( $homepage ) && $homepage->ID ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $homepage->ID ); // Front Page.
		}
		// Remove Hello Post.
		wp_delete_post( 1 );

	} elseif ( 'Shopping Site' === $selected_import['import_file_name'] ) {
		// Assign Woo Pages.
		if ( class_exists( 'woocommerce' ) ) {
			kadence_import_demo_woocommerce();
		}

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary' => $main_menu->term_id,
				'mobile'  => $main_menu->term_id,
			)
		);

		// Assign front page.
		$homepage = get_page_by_title( 'Home' );
		if ( isset( $homepage ) && $homepage->ID ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $homepage->ID ); // Front Page.
		}
		// Remove Hello Post.
		wp_delete_post( 1 );

	}
}
