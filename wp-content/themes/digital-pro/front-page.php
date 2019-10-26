<?php
/**
 * Digital Pro.
 *
 * This file adds the front page to the Digital Pro Theme.
 *
 * @package Digital
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/digital/
 */

add_action( 'genesis_meta', 'digital_front_page_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 * @since 1.0.0
 */
function digital_front_page_genesis_meta() {

	if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) ) {

		// Enqueue scripts.
		add_action( 'wp_enqueue_scripts', 'digital_enqueue_digital_script' );
		function digital_enqueue_digital_script() {

			wp_register_style( 'digitalIE9', get_stylesheet_directory_uri() . '/style-ie9.css', array(), CHILD_THEME_VERSION );
			wp_style_add_data( 'digitalIE9', 'conditional', 'IE 9' );
			wp_enqueue_style( 'digitalIE9' );

			wp_enqueue_script( 'digital-front-script', get_stylesheet_directory_uri() . '/js/front-page.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

			wp_enqueue_style( 'digital-front-styles', get_stylesheet_directory_uri() . '/style-front.css', array(), CHILD_THEME_VERSION );

		}

		// Enqueue scripts for backstretch.
		add_action( 'wp_enqueue_scripts', 'digital_front_page_enqueue_scripts' );
		function digital_front_page_enqueue_scripts() {

			$image = get_option( 'digital-front-image', sprintf( '%s/images/front-page-1.jpg', get_stylesheet_directory_uri() ) );

			// Load scripts only if custom backstretch image is being used.
			if ( ! empty( $image ) && is_active_sidebar( 'front-page-1' ) ) {

				// Enqueue Backstretch scripts.
				wp_enqueue_script( 'digital-backstretch', get_stylesheet_directory_uri() . '/js/backstretch.js', array( 'jquery' ), '1.0.0', true );
				wp_enqueue_script( 'digital-backstretch-set', get_stylesheet_directory_uri() . '/js/backstretch-set.js' , array( 'jquery', 'digital-backstretch' ), '1.0.0', true );

				wp_localize_script( 'digital-backstretch-set', 'BackStretchImg', array( 'src' => str_replace( 'http:', '', $image ) ) );

			}

		}

		// Add front-page body class.
		add_filter( 'body_class', 'digital_body_class' );

		// Force full width content layout.
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

		// Remove breadcrumbs.
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		// Add widgets on front page.
		add_action( 'genesis_after_header', 'digital_front_page_widgets' );

		$journal = get_option( 'digital_journal_setting', 'true' );

		if ( 'true' === $journal ) {

			// Add opening markup for blog section.
			add_action( 'genesis_before_loop', 'digital_front_page_blog_open' );

			// Add closing markup for blog section.
			add_action( 'genesis_after_loop', 'digital_front_page_blog_close' );

		} else {

			// Remove the default Genesis loop.
			remove_action( 'genesis_loop', 'genesis_do_loop' );

			// Add front-page-loop body class.
			add_filter( 'body_class', 'digital_loop_body_class' );

		}

	}

}

// Add front-page body class.
function digital_body_class( $classes ) {

	$classes[] = 'front-page';

	return $classes;

}

// Add front-page-loop body class.
function digital_loop_body_class( $classes ) {

	$classes[] = 'front-page-loop';

	return $classes;

}

// Add widgets on front page.
function digital_front_page_widgets() {

	if ( get_query_var( 'paged' ) >= 2 ) {
		return;
	}

	echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'digital-pro' ) . '</h2>';

	genesis_widget_area( 'front-page-1', array(
		'before' => '<div id="front-page-1" class="front-page-1"><div class="widget-area fadeup-effect"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-2', array(
		'before' => '<div id="front-page-2" class="front-page-2"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . digital_halves_widget_area_class( 'front-page-2' ) . '">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-3', array(
		'before' => '<div id="front-page-3" class="front-page-3"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . digital_widget_area_class( 'front-page-3' ) . '">',
		'after'  => '</div></div></div>',
	) );

}

// Add opening markup for blog section.
function digital_front_page_blog_open() {

	$journal_text = get_option( 'digital_journal_text', __( 'Our Journal', 'digital-pro' ) );

	if ( 'posts' == get_option( 'show_on_front' ) ) {

		echo '<div id="journal" class="widget-area fadeup-effect"><div class="wrap">';

		if ( ! empty( $journal_text ) ) {

			echo '<h2 class="widgettitle widget-title center">' . $journal_text . '</h2>';

		}

	}

}

// Add closing markup for blog section.
function digital_front_page_blog_close() {

	if ( 'posts' == get_option( 'show_on_front' ) ) {

		echo '</div></div>';

	}

}

// Run the Genesis loop.
genesis();
