<?php
/**
 * Digital Pro.
 *
 * Add the required custom CSS to the Digital Pro Theme's WooCommerce stylesheet.
 *
 * @package Digital
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/digital/
 */

add_filter( 'woocommerce_enqueue_styles', 'digital_woocommerce_styles' );
/**
 * Add the theme's WooCommerce styles to the WooCommerce plugin queue.
 *
 * @since 1.1.0
 *
 * @return array Array of required values for inclusion.
 */
function digital_woocommerce_styles( $enqueue_styles ) {

	$enqueue_styles['digital-woocommerce-styles'] = array(
		'src'     => get_stylesheet_directory_uri() . '/lib/woocommerce/digital-woocommerce.css',
		'deps'    => '',
		'version' => CHILD_THEME_VERSION,
		'media'   => 'screen',
	);

	return $enqueue_styles;

}

add_action( 'wp_enqueue_scripts', 'digital_woocommerce_customizer_css' );
/**
 * Load the custom CSS to the theme's WooCommerce stylsheet.
 *
 * @since 1.1.0
 */
function digital_woocommerce_customizer_css() {

	// If WooCommerce isn't installed, exit early.
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$color_accent = get_theme_mod( 'digital_accent_color', digital_customizer_get_default_accent_color() );

	$woo_css = ( digital_customizer_get_default_accent_color() !== $color_accent ) ? sprintf( '

		.woocommerce a.button,
		.woocommerce a.button.alt,
		.woocommerce button.button,
		.woocommerce button.button.alt,
		.woocommerce input.button,
		.woocommerce input.button.alt,
		.woocommerce input.button[type="submit"],
		.woocommerce span.onsale,
		.woocommerce #respond input#submit,
		.woocommerce #respond input#submit.alt,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-range {
			background-color: %1$s;
		}

		.woocommerce-MyAccount-navigation ul li.is-active > a {
			border-bottom-color: %1$s;
			color: %1$s;
		}

	', $color_accent ) : '';

	if ( $woo_css ) {
		wp_add_inline_style( 'digital-woocommerce-styles', $woo_css );
	}

}
