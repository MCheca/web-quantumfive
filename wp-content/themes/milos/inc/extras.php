<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Milos
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function milos_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'milos_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function milos_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'milos_pingback_header' );

/**
 * Wrap a div around the more link button
 */
function milos_wrap_more_link( $more_link ) {
	return '<div class="text-center">' . $more_link . '</div>';
}
add_filter( 'the_content_more_link', 'milos_wrap_more_link', 10, 1 );
