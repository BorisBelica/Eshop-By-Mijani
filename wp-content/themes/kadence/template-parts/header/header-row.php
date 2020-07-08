<?php
/**
 * Template part for displaying the a row of the header
 *
 * @package kadence
 */

namespace Kadence;

$row = get_query_var( 'row' );
?>
<div class="site-<?php echo esc_attr( $row ); ?>-header-wrap site-header-row-container site-header-focus-item site-header-row-layout-<?php echo esc_attr( kadence()->sub_option( 'header_' . $row . '_layout', 'desktop' ) ); ?><?php echo esc_attr( kadence()->option( 'header_sticky' ) === $row ? ' kadence-sticky-header' : '' ); ?>" data-section="kadence_customizer_header_<?php echo esc_attr( $row ); ?>"<?php
if ( 'main' === $row && 'main' === kadence()->option( 'header_sticky' ) ) {
	echo ' data-shrink="' . ( kadence()->option( 'header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
	if ( kadence()->option( 'header_sticky_shrink' ) ) {
		echo ' data-shrink-height="' . esc_attr( kadence()->sub_option( 'header_sticky_main_shrink', 'size' ) ) . '"';
	}
}
?>>
	<div class="site-header-row-container-inner">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut kadence-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kadence' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<div class="site-container">
			<div class="site-<?php echo esc_attr( $row ); ?>-header-inner-wrap site-header-row <?php echo ( kadence()->has_side_columns( $row ) ? 'site-header-row-has-sides' : 'site-header-row-only-center-column' ); ?> <?php echo ( kadence()->has_center_column( $row ) ? 'site-header-row-center-column' : 'site-header-row-no-center' ); ?>">
				<?php if ( kadence()->has_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left site-header-section site-header-section-left">
						<?php
						/**
						 * Kadence Render Header Column
						 *
						 * Hooked Kadence\header_column
						 */
						do_action( 'kadence_render_header_column', $row, 'left' );

						if ( kadence()->has_center_column( $row ) ) {
							?>
							<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left-center site-header-section site-header-section-left-center">
								<?php
								/**
								 * Kadence Render Header Column
								 *
								 * Hooked Kadence\header_column
								 */
								do_action( 'kadence_render_header_column', $row, 'left_center' );
								?>
							</div>
							<?php
						}
						?>
					</div>
				<?php } ?>
				<?php if ( kadence()->has_center_column( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-center site-header-section site-header-section-center">
						<?php
						/**
						 * Kadence Render Header Column
						 *
						 * Hooked Kadence\header_column
						 */
						do_action( 'kadence_render_header_column', $row, 'center' );
						?>
					</div>
				<?php } ?>
				<?php if ( kadence()->has_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right site-header-section site-header-section-right">
						<?php
						if ( kadence()->has_center_column( $row ) ) {
							?>
							<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right-center site-header-section site-header-section-right-center">
								<?php
								/**
								 * Kadence Render Header Column
								 *
								 * Hooked Kadence\header_column
								 */
								do_action( 'kadence_render_header_column', $row, 'right_center' );
								?>
							</div>
							<?php
						}
						/**
							 * Kadence Render Header Column
							 *
							 * Hooked Kadence\header_column
							 */
							do_action( 'kadence_render_header_column', $row, 'right' );
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
