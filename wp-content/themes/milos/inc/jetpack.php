<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Milos
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function milos_jetpack_setup() {

	// Add theme support for Social Menu.
	add_theme_support( 'jetpack-social-menu', 'svg' );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'milos_infinite_scroll_render',
		'footer'    => 'page',
		'wrapper'   => false,
	) );

	// Add theme support for featured content.
	add_theme_support( 'featured-content', array(
		'filter'     => 'milos_get_featured_posts',
		'max_posts'  => 6,
		'post_types' => array( 'post', 'page' ),
	) );

	add_theme_support( 'jetpack-content-options', array(
	    'blog-display'       => 'content',
	    'post-details'       => array(
		    'stylesheet' => 'milos-style',
		    'date'       => '.entry-time',
		    'categories' => '.entry-categories',
		    'tags'       => '.tags-links',
		    'author'     => '.byline',
		    'comment'    => '.entry-comments-no',
	    ),
	    'featured-images'    => array(
		    'archive' => true,
		    'post'    => true,
		    'page'    => true,
	    ),
	) );

	add_theme_support( 'nova_menu_item' );
	add_theme_support( 'jetpack-testimonial' );

	// Remove sharing buttons that are shown after the excerpt, since we use the
	// pages' excerpts as subtitles.
	add_filter( 'sharing_show', 'milos_remove_page_excerpt_sharing', 10, 2 );
}
add_action( 'after_setup_theme', 'milos_jetpack_setup' );


/**
 * Custom render function for Infinite Scroll.
 */
function milos_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}

/**
 * Featured Content helpers
 */
function milos_get_featured_posts() {
	return apply_filters( 'milos_get_featured_posts', array() );
}

function milos_has_featured_posts( $minimum = 1 ) {
	if ( is_paged() ) {
		return false;
	}

	$minimum        = absint( $minimum );
	$featured_posts = apply_filters( 'milos_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) ) {
		return false;
	}

	if ( $minimum > count( $featured_posts ) ) {
		return false;
	}

	return true;
}

function milos_remove_page_excerpt_sharing( $show, $post ) {
	global $wp_current_filter;
	if ( is_singular( 'page' ) && in_array( 'the_excerpt', (array) $wp_current_filter, true ) ) {
		return false;
	}

	return $show;
}
