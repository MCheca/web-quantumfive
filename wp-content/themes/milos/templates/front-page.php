<?php
/**
 * Template Name: Front page
 *
 * @package Milos
 */

get_header(); ?>

<?php
	if ( milos_has_featured_posts( 1 ) && ! milos_has_featured_posts( 2 ) ) {

		$featured_posts = milos_get_featured_posts();

		foreach ( $featured_posts as $post ) :
			setup_postdata( $post );

			if ( milos_has_bg_video() ) {
				get_template_part( 'template-parts/content', 'slide-video' );
			} else {
				get_template_part( 'template-parts/content', 'slide' );
			}
		endforeach;

		wp_reset_postdata();

	} elseif ( milos_has_featured_posts( 2 ) ) {

		$featured_posts = milos_get_featured_posts();

		?><div class="page-slideshow" data-animation="fade" data-autoplay="true" data-autoplayspeed="6000" data-speed="550"><?php

		foreach ( $featured_posts as $post ) :
			setup_postdata( $post );

			?><div id="slick-slide-<?php the_ID(); ?>" class="slick-slide"><?php

				get_template_part( 'template-parts/content', 'slide' );

			?></div><?php
		endforeach;

		wp_reset_postdata();

		?></div><?php
	}
?>

<main class="main widget-sections">
	<?php
		global $post;

		for ( $i = 1; $i <= 5; $i++ ) {
			$page_id     = intval( get_theme_mod( 'front_section_page_' . $i ) );
			$featured_bg = absint( get_theme_mod( 'front_section_featured_bg_' . $i ) );
			$post        = get_post( $page_id );

			if ( $page_id > 0 && $post ) {
				setup_postdata( $post );

				get_template_part( 'template-parts/front-section', $featured_bg ? 'background' : null );

				wp_reset_postdata();
			}
		}
	?>
</main>

<?php
get_footer();
