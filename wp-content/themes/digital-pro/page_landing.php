<?php
/**
 * Digital Pro.
 *
 * This file adds the landing page template to the Digital Pro Theme.
 *
 * Template Name: Landing
 *
 * @package Digital
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/digital/
 */

// Add landing body class to the head.
add_filter( 'body_class', 'digital_add_body_class' );
function digital_add_body_class( $classes ) {

	$classes[] = 'digital-landing';

	return $classes;

}

// Remove Skip Links from a template.
remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );

// Dequeue Skip Links Script.
add_action( 'wp_enqueue_scripts', 'digital_dequeue_skip_links' );
function digital_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

// Remove site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Remove navigation.
remove_theme_support( 'genesis-menus' );

// Remove breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove site footer widgets.
remove_theme_support( 'genesis-footer-widgets' );

// Remove site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Run the Genesis loop.
genesis();
