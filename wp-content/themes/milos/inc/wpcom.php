<?php
/**
 * WordPress.com-specific functions and definitions
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Milos
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 */
function milos_wpcom_setup() {

	global $themecolors;

	/**
	 * Set a default theme color array for WP.com.
	 *
	 * @global array $themecolors
	 */
	if ( ! isset( $themecolors ) ) :
		$themecolors = array(
			'bg'     => 'ffffff',
			'border' => 'ebebeb',
			'text'   => '444444',
			'link'   => '00a9ef',
			'url'    => '00a9ef',
		);
	endif;

	add_theme_support( 'print-style' );
}
add_action( 'after_setup_theme', 'milos_wpcom_setup' );

/*
 * De-queue Google fonts if custom fonts are being used instead
 */
function milos_dequeue_fonts() {
	if ( class_exists( 'TypekitData' ) && class_exists( 'CustomDesign' ) && CustomDesign::is_upgrade_active() ) {
		$customfonts = TypekitData::get( 'families' );
		if ( $customfonts && $customfonts['site-title']['id'] && $customfonts['headings']['id'] && $customfonts['body-text']['id'] ) {
			wp_dequeue_style( 'milos-fonts' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'milos_dequeue_fonts' );
