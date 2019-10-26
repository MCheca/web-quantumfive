<?php
/**
 * Milos Theme Customizer
 *
 * @package Milos
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function milos_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_panel( 'theme_options', array(
		'title' => esc_html_x( 'Theme Options', 'customizer section title', 'milos' ),
	) );

	$wp_customize->add_section( 'theme_header', array(
		'title' => esc_html_x( 'Header', 'customizer section title', 'milos' ),
		'panel' => 'theme_options',
	) );

	$wp_customize->add_section( 'theme_frontpage', array(
		'title' => esc_html_x( 'Front page', 'customizer section title', 'milos' ),
		'panel' => 'theme_options',
	) );

	$wp_customize->add_panel( 'theme_colors', array(
		'title'    => esc_html_x( 'Colors', 'customizer section title', 'milos' ),
		'priority' => 50,
	) );

	// Rename & Reposition the Colors section.
	$wp_customize->get_section( 'colors' )->title    = esc_html_x( 'Global', 'customizer section title', 'milos' );
	$wp_customize->get_section( 'colors' )->priority = 10;
	$wp_customize->get_section( 'colors' )->panel    = 'theme_colors';

	$wp_customize->add_section( 'colors_header', array(
		'title'    => esc_html_x( 'Header', 'customizer section title', 'milos' ),
		'priority' => 20,
		'panel'    => 'theme_colors',
	) );

	$wp_customize->add_section( 'colors_hero', array(
		'title'    => esc_html_x( 'Hero', 'customizer section title', 'milos' ),
		'priority' => 30,
		'panel'    => 'theme_colors',
	) );

	$wp_customize->add_section( 'colors_sidebar', array(
		'title'    => esc_html_x( 'Sidebar', 'customizer section title', 'milos' ),
		'priority' => 40,
		'panel'    => 'theme_colors',
	) );

	$wp_customize->add_section( 'colors_footer', array(
		'title'    => esc_html_x( 'Footer', 'customizer section title', 'milos' ),
		'priority' => 50,
		'panel'    => 'theme_colors',
	) );

	$wp_customize->add_section( 'typography', array(
		'title'    => esc_html_x( 'Typography Options', 'customizer section title', 'milos' ),
		'priority' => 60,
	) );


	//
	// Header
	//
	$wp_customize->add_setting( 'header_sticky', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'header_sticky', array(
		'type'    => 'checkbox',
		'section' => 'theme_header',
		'label'   => esc_html__( 'Sticky header', 'milos' ),
	) );



	//
	// Front page
	//
	$wp_customize->add_setting( 'front_video_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'front_video_url', array(
		'type'        => 'url',
		'section'     => 'theme_frontpage',
		'label'       => esc_html__( 'Video URL', 'milos' ),
		'description' => esc_html__( "Paste the URL of a YouTube or Vimeo video. The video will be displayed as the featured post's background. You need to have exactly one featured post for this option to work.", 'milos' ),
	) );

	for ( $i = 1; $i <= 5; $i++ ) {
		$wp_customize->add_setting( 'front_section_page_' . $i, array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'front_section_page_' . $i, array(
			'type'    => 'dropdown-pages',
			'section' => 'theme_frontpage',
			/* translators: %d is the number of the front page section. */
			'label'   => esc_html( sprintf( __( 'Section %d page', 'milos' ), $i ) ),
		) );

		$wp_customize->add_setting( 'front_section_featured_bg_' . $i, array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'front_section_featured_bg_' . $i, array(
			'type'    => 'checkbox',
			'section' => 'theme_frontpage',
			'label'   => esc_html__( "Use the page's featured image as background.", 'milos' ),
		) );
	}

	$wp_customize->add_setting( 'front_child_pages_limit', array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'front_child_pages_limit', array(
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 0,
			'step' => 3,
		),
		'section'     => 'theme_frontpage',
		'label'       => esc_html__( 'Child pages limit', 'milos' ),
		'description' => wp_kses( __( 'This limit applies on pages that have the <strong>Parent and Child Pages</strong> template assigned. Works best as multiples of <strong>3</strong>. Set to <strong>0</strong> for default limit.', 'milos' ), array( 'strong' => array() ) ),
	) );


	//
	// Global colors
	//
	$wp_customize->get_control( 'background_image' )->section      = 'colors';
	$wp_customize->get_control( 'background_repeat' )->section     = 'colors';
	$wp_customize->get_control( 'background_attachment' )->section = 'colors';
	if ( ! is_null( $wp_customize->get_control( 'background_position_x' ) ) ) {
		$wp_customize->get_control( 'background_position_x' )->section = 'colors';
	} else {
		$wp_customize->get_control( 'background_position' )->section = 'colors';
		$wp_customize->get_control( 'background_preset' )->section   = 'colors';
		$wp_customize->get_control( 'background_size' )->section     = 'colors';
	}

	$wp_customize->add_setting( 'site_accent_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_accent_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Accent color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'site_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_text_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Global text color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'site_border_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_border_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Border color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'button_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bg_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Button background color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'button_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Button text color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'button_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover_bg_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Button hover background color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'button_hover_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover_text_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Button hover text color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'button_border_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_border_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Button border color', 'milos' ),
	) ) );



	//
	// Header colors
	//
	$wp_customize->add_setting( 'head_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_bg_color', array(
		'section' => 'colors_header',
		'label'   => esc_html__( 'Background color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'head_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_text_color', array(
		'section' => 'colors_header',
		'label'   => esc_html__( 'Main text color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'head_text_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_text_hover_color', array(
		'section' => 'colors_header',
		'label'   => esc_html__( 'Main hover &amp; active text color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'head_subnav_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_subnav_text_color', array(
		'section' => 'colors_header',
		'label'   => esc_html__( 'Subnavigation text color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'head_subnav_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_subnav_bg_color', array(
		'section' => 'colors_header',
		'label'   => esc_html__( 'Subnavigation background', 'milos' ),
	) ) );


	//
	// Sidebar colors
	//
	$wp_customize->add_setting( 'sidebar_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Text color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'sidebar_link_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_link_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Link color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'sidebar_link_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_link_hover_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Link hover color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'sidebar_border_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_border_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Border color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'sidebar_widget_title_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_widget_title_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Widget titles color', 'milos' ),
	) ) );


	//
	// Footer Colors
	//
	$wp_customize->add_setting( 'footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'section' => 'colors_footer',
		'label'   => esc_html__( 'Background color', 'milos' ),
	) ) );

	$wp_customize->add_setting( 'footer_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
		'section' => 'colors_footer',
		'label'   => esc_html__( 'Text color', 'milos' ),
	) ) );


	//
	// Typography
	//
	$wp_customize->add_setting( 'h1_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'h1_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H1 size', 'milos' ),
	) );

	$wp_customize->add_setting( 'h2_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'h2_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H2 size', 'milos' ),
	) );

	$wp_customize->add_setting( 'h3_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'h3_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H3 size', 'milos' ),
	) );

	$wp_customize->add_setting( 'h4_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'h4_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H4 size', 'milos' ),
	) );

	$wp_customize->add_setting( 'h5_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'h5_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H5 size', 'milos' ),
	) );

	$wp_customize->add_setting( 'h6_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'h6_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H6 size', 'milos' ),
	) );

	$wp_customize->add_setting( 'body_text_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'body_text_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content body text size', 'milos' ),
	) );

	$wp_customize->add_setting( 'widgets_title_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'widgets_title_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Widgets title size', 'milos' ),
	) );

	$wp_customize->add_setting( 'widgets_text_size', array(
		'default'           => '',
		'sanitize_callback' => 'milos_sanitize_intval_or_empty',
	) );
	$wp_customize->add_control( 'widgets_text_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Widgets text size', 'milos' ),
	) );

	$wp_customize->add_setting( 'lowercase_widget_titles', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'lowercase_widget_titles', array(
		'type'    => 'checkbox',
		'section' => 'typography',
		'label'   => esc_html__( 'Lowercase widget titles', 'milos' ),
	) );

	$wp_customize->add_setting( 'uppercase_content_titles', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'uppercase_content_titles', array(
		'type'    => 'checkbox',
		'section' => 'typography',
		'label'   => esc_html__( 'Uppercase content titles/headings', 'milos' ),
	) );

	$wp_customize->add_setting( 'uppercase_hero_titles', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'uppercase_hero_titles', array(
		'type'    => 'checkbox',
		'section' => 'typography',
		'label'   => esc_html__( 'Uppercase section and hero titles', 'milos' ),
	) );

}
add_action( 'customize_register', 'milos_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function milos_customize_preview_js() {
	wp_enqueue_script( 'milos_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20170530', true );
}
add_action( 'customize_preview_init', 'milos_customize_preview_js' );
