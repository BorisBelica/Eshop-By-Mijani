<?php
/**
 * Template part for displaying a post's footer
 *
 * @package kadence
 */

namespace Kadence;

use WP_Query;
use function add_action;
use function apply_filters;
use function Kadence\kadence;
use function get_template_part;

kadence()->print_styles( 'kadence-related-posts' );
kadence()->print_styles( 'kadence-slide' );
wp_enqueue_script( 'kadence-slide-init' );

$related_title = __( 'Similar Posts', 'kadence' );
$categories    = get_the_category( $post->ID );
if ( $categories ) {
	$category_ids = array();
	foreach ( $categories as $individual_category ) {
		$category_ids[] = $individual_category->term_id;
	}
}
$args = array(
	'orderby'        => 'rand',
	'category__in'   => $category_ids,
	'post__not_in'   => array( $post->ID ),
	'posts_per_page' => 6,
);
if ( kadence()->has_sidebar() ) {
	$cols = array(
		'xxl' => 2,
		'xl'  => 2,
		'md'  => 2,
		'sm'  => 2,
		'xs'  => 2,
		'ss'  => 1,
	);
} else {
	$cols = array(
		'xxl' => 3,
		'xl'  => 3,
		'md'  => 3,
		'sm'  => 2,
		'xs'  => 2,
		'ss'  => 1,
	);
}

$bpc           = new WP_Query( apply_filters( 'kadence_related_posts_carousel_args', $args ) );
$cols          = apply_filters( 'kadence_related_posts_carousel_columns', $cols );
$columns_class = ( 2 === $cols['xxl'] ? 'grid-sm-col-2 grid-lg-col-2' : 'grid-sm-col-2 grid-lg-col-3' );
if ( $bpc ) :
	$num = $bpc->post_count;
	if ( $num > 0 ) {
		?>
		<div class="entry-related alignfull entry-related-style-<?php echo esc_attr( kadence()->option( 'post_related_style' ) ); ?>">
			<div class="entry-related-inner content-container site-container">
				<div class="entry-related-inner-content alignwide">
					<h2 class="entry-related-title"><?php echo esc_html( $related_title ); ?></h2>
					<div class="entry-related-carousel kadence-slide-init grid-cols <?php echo esc_attr( $columns_class ); ?>" data-columns-xxl="<?php echo esc_attr( $cols['xxl'] ); ?>" data-columns-xl="<?php echo esc_attr( $cols['xl'] ); ?>" data-columns-md="<?php echo esc_attr( $cols['md'] ); ?>" data-columns-sm="<?php echo esc_attr( $cols['sm'] ); ?>" data-columns-xs="<?php echo esc_attr( $cols['xs'] ); ?>" data-columns-ss="<?php echo esc_attr( $cols['ss'] ); ?>" data-slider-anim-speed="400" data-slider-scroll="1" data-slider-dots="true" data-slider-arrows="true" data-slider-hover-pause="false" data-slider-auto="false" data-slider-speed="7000" data-slider-gutter="40">
						<?php
						while ( $bpc->have_posts() ) :
							$bpc->the_post();
							echo '<div class="carousel-item">';
							get_template_part( 'template-parts/content/entry', get_post_type() );
							echo '</div>';
						endwhile;
						?>
					</div>
				</div>
			</div>
		</div><!-- .entry-author -->
		<?php
	}
endif;
wp_reset_postdata();
