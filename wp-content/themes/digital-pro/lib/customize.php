<?php
/**
 * Digital Pro.
 *
 * This file adds the Customizer additions to the Digital Pro Theme.
 *
 * @package Digital
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/digital/
 */

add_action( 'customize_register', 'digital_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function digital_customizer_register( $wp_customize ) {

	$wp_customize->add_section( 'digital-image', array(
		'title'       => __( 'Front Page Image', 'digital-pro' ),
		'description' => __( '<p>Use the default image or personalize your site by uploading your own image for the front page 1 widget background.</p><p>The default image is <strong>1600 x 1050 pixels</strong>.</p>', 'digital-pro' ),
		'priority'    => 75,
	) );

	$wp_customize->add_setting( 'digital-front-image', array(
		'default'           => sprintf( '%s/images/front-page-1.jpg', get_stylesheet_directory_uri() ),
		'sanitize_callback' => 'esc_url_raw',
		'type'              => 'option',
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'front-background-image',
			array(
				'label'    => __( 'Front Image Upload', 'digital-pro' ),
				'section'  => 'digital-image',
				'settings' => 'digital-front-image',
			)
		)
	);

	$wp_customize->add_setting(
		'digital_link_color',
		array(
			'default'           => digital_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'digital_link_color',
			array(
				'description' => __( 'Change the default color for link hovers, linked titles, and more.', 'digital-pro' ),
			    'label'       => __( 'Link Color', 'digital-pro' ),
			    'section'     => 'colors',
			    'settings'    => 'digital_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'digital_accent_color',
		array(
			'default'           => digital_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'digital_accent_color',
			array(
				'description' => __( 'Change the default color for button hover and the footer widget background.', 'digital-pro' ),
			    'label'       => __( 'Accent Color', 'digital-pro' ),
			    'section'     => 'colors',
			    'settings'    => 'digital_accent_color',
			)
		)
	);

	// Add front page setting to the Customizer
	$wp_customize->add_section( 'digital_journal_section', array(
		'title'       => __( 'Front Page Content Settings', 'digital-pro' ),
		'description' => __( 'Choose if you would like to display the content section below widget sections on the front page.', 'digital-pro' ),
		'priority'    => 75.01,
	));

	// Add front page setting to the Customizer
	$wp_customize->add_setting( 'digital_journal_setting', array(
		'default'    => 'true',
		'capability' => 'edit_theme_options',
		'type'       => 'option',
	));

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'digital_journal_control', array(
			'label'       => __( 'Front Page Content Section Display', 'digital-pro' ),
			'description' => __( 'Show or Hide the content section. The section will display on the front page by default.', 'digital-pro' ),
			'section'     => 'digital_journal_section',
			'settings'    => 'digital_journal_setting',
			'type'        => 'select',
			'choices'     => array(
				'false'   => __( 'Hide content section', 'digital-pro' ),
				'true'    => __( 'Show content section', 'digital-pro' ),
			),
		))
	);

	$wp_customize->add_setting( 'digital_journal_text', array(
		'default'           => __( 'Our Journal', 'digital-pro' ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'type'              => 'option',
	));

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'digital_journal_text_control', array(
			'label'       => __( 'Journal Section Heading Text', 'digital-pro' ),
			'description' => __( 'Choose the heading text you would like to display above posts on the front page.<br /><br />This text will show when displaying posts and using widgets on the front page.', 'digital-pro' ),
			'section'     => 'digital_journal_section',
			'settings'    => 'digital_journal_text',
			'type'        => 'text',
		))
	);

}
