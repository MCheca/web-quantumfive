<?php
/**
 * Template part for displaying child pages
 *
 * @package Milos
 */

?>
<div class="row row-items">
	<?php
		$child_pages_args = array(
			'suppress_filters' => false,
			'post_type'        => 'page',
			'post_status'      => 'publish',
			'post_parent'      => get_the_ID(),
			'order'            => 'ASC',
			'orderby'          => 'menu_order',
		);

		$limit = get_theme_mod( 'front_child_pages_limit', 0 );

		if ( $limit > 0 && is_page_template( 'templates/front-page.php' ) ) {

			$child_pages_args = array_merge( $child_pages_args, array(
				'numberposts' => absint( $limit ),
			) );

		}

		$child_pages = get_children( $child_pages_args );

		if ( count( $child_pages ) > 0 ) :

			global $post;

			foreach ( $child_pages as $post ) : setup_postdata( $post );

				get_template_part( 'template-parts/content', 'child' );

			endforeach;

			wp_reset_postdata();

		endif;
	?>
</div>
