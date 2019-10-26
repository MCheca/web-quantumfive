<?php
/**
 * Milos functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Milos
 */

if ( ! function_exists( 'milos_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function milos_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'milos', get_template_directory() . '/languages' );

	// Default content width.
	$GLOBALS['content_width'] = 750;

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Add theme support for custom logos.
	// Add theme support for custom logos.
	add_theme_support( 'custom-logo', array(
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'milos-featured', 1140, 694, true );
	add_image_size( 'milos-slider', 1920, 920, true );
	add_image_size( 'milos-hero', 1920, 600, true );
	add_image_size( 'milos-listing', 750, 850, true );
	add_image_size( 'milos-menu-item', 68, 68, true );

	register_nav_menus( array(
		'menu-1' => esc_html__( 'Main Menu', 'milos' ),
		'menu-2' => esc_html__( 'Footer Menu', 'milos' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'milos_custom_background_args', array(
		'default-color' => '',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for excerpts on pages
	add_post_type_support( 'page', 'excerpt' );

	// Add the additional output needed for the page templates that list something, i.e. menu, child pages.
	// Without it, plugins that filter the_content (e.g. jetpack sharing buttons) output between, instead of after, the additional content.
	add_filter( 'the_content', 'milos_the_content_page_template_content' );
}
endif;
add_action( 'after_setup_theme', 'milos_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function milos_content_width() {
	$content_width = $GLOBALS['content_width'];

	if ( is_page_template( 'templates/front-page.php' ) ) {
		$content_width = 1140;
	} elseif ( is_singular() ) {
		$info          = milos_get_layout_info();
		$content_width = $info['content_width'];
	}

	$GLOBALS['content_width'] = apply_filters( 'milos_content_width', $content_width );
}
add_action( 'template_redirect', 'milos_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function milos_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'milos' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets added here will appear in the sidebar.', 'milos' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pages Sidebar', 'milos' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( "Widgets added here will appear on the pages' sidebar.", 'milos' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'milos_widgets_init' );

/**
 * Register Google Fonts
 */
function milos_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'milos' ) ) {
		$fonts[] = 'Montserrat:700';
	}

	/* translators: If there are characters in your language that are not supported by Libre Franklin, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Libre Franklin font: on or off', 'milos' ) ) {
		$fonts[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function milos_scripts() {

	if ( ! class_exists( 'Jetpack_Carousel' ) ) {
		wp_enqueue_style( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/vendor/magnific-popup/magnific.css', array(), '1.0.0' );
		wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/vendor/magnific-popup/jquery.magnific-popup.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'milos-magnific-init', get_template_directory_uri() . '/assets/js/magnific-init.js', array( 'jquery' ), '20170530', true );
	}

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/vendor/genericons/genericons.css', array(), '3.4.1' );
	wp_enqueue_style( 'milos-fonts', milos_fonts_url(), array(), null );
	wp_enqueue_style( 'milos-style', get_stylesheet_uri(), array(), '20170530' );

	wp_add_inline_style( 'milos-style', milos_page_hero_testimonial_bg_image() );
	wp_add_inline_style( 'milos-style', milos_get_customizer_css() );

	wp_enqueue_script( 'milos-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20170530', true );
	wp_enqueue_script( 'milos-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20170530', true );

	wp_register_script( 'jquery-sticky-kit', get_template_directory_uri() . '/assets/vendor/sticky-kit/jquery.sticky-kit.js', array( 'jquery' ), '1.1.2', true );

	wp_enqueue_script( 'milos-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(
		'jquery',
		'jquery-sticky-kit',
	), '20170530', true );

	if ( milos_has_featured_posts( 2 ) ) {
	    wp_register_script( 'slick', get_template_directory_uri() . '/assets/vendor/slick/slick.js', array( 'jquery' ), '1.6.0', true );
	    wp_enqueue_script( 'milos-slick-init', get_template_directory_uri() . '/assets/js/slick-init.js', array(
	    	'slick',
	    ), '20170530', true );
	    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/vendor/slick/slick.css', array(), '1.6.0' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'milos_scripts' );

if ( ! function_exists( 'milos_get_layout_info' ) ) :
/**
 * Determine if a sidebar is being displayed and return
 * the appropriate layout information.
 */
function milos_get_layout_info() {
	$has_sidebar = ( ! is_page() && is_active_sidebar( 'sidebar-1' ) )
	               || ( is_page() && is_active_sidebar( 'sidebar-2' ) );

	return array(
		'main_classes'      => $has_sidebar ? 'main-with-sidebar' : '',
		'container_classes' => $has_sidebar ? 'col-lg-8 col-xs-12' : 'col-xs-12',
		'content_classes'   => $has_sidebar ? 'col-xs-12' : 'col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-xs-12',
		'comment_classes'   => $has_sidebar ? 'col-xs-12' : 'col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-xs-12',
		'content_width'     => $has_sidebar ? 720 : 750,
		'has_sidebar'       => $has_sidebar,
	);
}
endif;


function milos_get_video_url_info( $url ) {
	$is_vimeo   = preg_match( '#(?:https?://)?(?:www\.)?vimeo\.com/([A-Za-z0-9\-_]+)#', $url, $vimeo_id );
	$is_youtube = preg_match( '~
		# Match non-linked youtube URL in the wild. (Rev:20111012)
		https?://         # Required scheme. Either http or https.
		(?:[0-9A-Z-]+\.)? # Optional subdomain.
		(?:               # Group host alternatives.
		  youtu\.be/      # Either youtu.be,
		| youtube\.com    # or youtube.com followed by
		  \S*             # Allow anything up to VIDEO_ID,
		  [^\w\-\s]       # but char before ID is non-ID char.
		)                 # End host alternatives.
		([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
		(?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
		(?!               # Assert URL is not pre-linked.
		  [?=&+%\w]*      # Allow URL (query) remainder.
		  (?:             # Group pre-linked alternatives.
			[\'"][^<>]*>  # Either inside a start tag,
		  | </a>          # or inside <a> element text contents.
		  )               # End recognized pre-linked alts.
		)                 # End negative lookahead assertion.
		[?=&+%\w-]*        # Consume any URL (query) remainder.
		~ix',
	$url, $youtube_id );

	$info = array(
		'supported' => false,
		'provider'  => '',
		'video_id'  => '',
	);

	if ( $is_youtube ) {
		$info['supported'] = true;
		$info['provider']  = 'youtube';
		$info['video_id']  = $youtube_id[1];
	} elseif ( $is_vimeo ) {
		$info['supported'] = true;
		$info['provider']  = 'vimeo';
		$info['video_id']  = $vimeo_id[1];
	}

	return $info;
}

function milos_page_hero_testimonial_bg_image() {
	$css = '';

	if ( ! is_post_type_archive( 'jetpack-testimonial' ) ) {
		return $css;
	}

	$jetpack = get_theme_mod( 'jetpack_testimonials' );
	if ( isset( $jetpack['featured-image'] ) && ! empty( $jetpack['featured-image'] ) ) {
		$url = wp_get_attachment_image_url( intval( $jetpack['featured-image'] ), 'milos-hero' );

		$css .= sprintf( '.page-hero { background-image: url(%s); background-size: cover; }' . PHP_EOL, esc_url( $url ) );
	}

	return $css;
}


add_filter( 'the_content', 'milos_lightbox_rel', 12 );
add_filter( 'get_comment_text', 'milos_lightbox_rel' );
if ( ! function_exists( 'milos_lightbox_rel' ) ) :
	function milos_lightbox_rel( $content ) {
		if ( ! class_exists( 'Jetpack_Carousel' ) ) {
			global $post;
			$pattern     = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
			$replacement = '<a$1href=$2$3.$4$5 data-lightbox="gal[' . $post->ID . ']"$6>$7</a>';
			$content     = preg_replace( $pattern, $replacement, $content );
		}

		return $content;
	}
endif;



/**
 * Sanitizes integer input while differentiating zero from empty string.
 *
 * @param int|string $input Input value to sanitize.
 * @return int|string Integer value, 0, or an empty string otherwise.
 */
function milos_sanitize_intval_or_empty( $input ) {
	if ( $input === false || $input === '' ) {
		return '';
	}

	if ( $input == 0 ) {
		return 0;
	}

	return intval( $input );
}

/**
 * Return a list of allowed tags and attributes for a given context.
 *
 * @param string $context The context for which to retrieve tags.
 *                        Currently available contexts: guide
 * @return array List of allowed tags and their allowed attributes.
 */
function milos_get_allowed_tags( $context = '' ) {
	$allowed = array(
		'a'       => array(
			'href'   => true,
			'title'  => true,
			'class'  => true,
			'target' => true,
		),
		'abbr'    => array( 'title' => true, ),
		'acronym' => array( 'title' => true, ),
		'b'       => array( 'class' => true, ),
		'br'      => array(),
		'code'    => array( 'class' => true, ),
		'em'      => array( 'class' => true, ),
		'i'       => array( 'class' => true, ),
		'img'     => array(
			'alt'    => true,
			'class'  => true,
			'src'    => true,
			'width'  => true,
			'height' => true,
		),
		'li'      => array( 'class' => true, ),
		'ol'      => array( 'class' => true, ),
		'p'       => array( 'class' => true, ),
		'pre'     => array( 'class' => true, ),
		'span'    => array( 'class' => true, ),
		'strong'  => array( 'class' => true, ),
		'ul'      => array( 'class' => true, ),
	);

	switch ( $context ) {
		case 'guide':
			unset( $allowed['p'] );
			break;
		default:
			break;
	}

	return apply_filters( 'milos_get_allowed_tags', $allowed, $context );
}


if ( ! function_exists( 'milos_get_image_repeat_choices' ) ) :
	function milos_get_image_repeat_choices() {
		return apply_filters( 'milos_image_repeat_choices', array(
			'no-repeat' => esc_html__( 'No repeat', 'milos' ),
			'repeat'    => esc_html__( 'Tile', 'milos' ),
			'repeat-x'  => esc_html__( 'Tile Horizontally', 'milos' ),
			'repeat-y'  => esc_html__( 'Tile Vertically', 'milos' ),
		) );
	}
endif;

if ( ! function_exists( 'milos_sanitize_image_repeat' ) ) :
	function milos_sanitize_image_repeat( $value ) {
		$choices = milos_get_image_repeat_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'milos_sanitize_image_repeat_default', 'no-repeat' );
	}
endif;

if ( ! function_exists( 'milos_get_image_position_x_choices' ) ) :
	function milos_get_image_position_x_choices() {
		return apply_filters( 'milos_image_position_x_choices', array(
			'left'   => esc_html__( 'Left', 'milos' ),
			'center' => esc_html__( 'Center', 'milos' ),
			'right'  => esc_html__( 'Right', 'milos' ),
		) );
	}
endif;

if ( ! function_exists( 'milos_sanitize_image_position_x' ) ) :
	function milos_sanitize_image_position_x( $value ) {
		$choices = milos_get_image_position_x_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'milos_sanitize_image_position_x_default', 'center' );
	}
endif;

if ( ! function_exists( 'milos_get_image_position_y_choices' ) ) :
	function milos_get_image_position_y_choices() {
		return apply_filters( 'milos_image_position_y_choices', array(
			'top'    => esc_html__( 'Top', 'milos' ),
			'center' => esc_html__( 'Center', 'milos' ),
			'bottom' => esc_html__( 'Bottom', 'milos' ),
		) );
	}
endif;

if ( ! function_exists( 'milos_sanitize_image_position_y' ) ) :
	function milos_sanitize_image_position_y( $value ) {
		$choices = milos_get_image_position_y_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'milos_sanitize_image_position_y_default', 'center' );
	}
endif;

if ( ! function_exists( 'milos_get_image_attachment_choices' ) ) :
	function milos_get_image_attachment_choices() {
		return apply_filters( 'milos_image_attachment_choices', array(
			'scroll' => esc_html__( 'Scroll', 'milos' ),
			'fixed'  => esc_html__( 'Fixed', 'milos' ),
		) );
	}
endif;

if ( ! function_exists( 'milos_sanitize_image_attachment' ) ) :
	function milos_sanitize_image_attachment( $value ) {
		$choices = milos_get_image_attachment_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'milos_sanitize_image_attachment_default', 'scroll' );
	}
endif;

if ( ! function_exists( 'milos_color_luminance' ) ) :
	/**
	 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.
	 *
	 * @see https://gist.github.com/stephenharris/5532899
	 *
	 * @param string $color Hexadecimal color value. May be 3 or 6 digits, with an optional leading # sign.
	 * @param float $percent Decimal (0.2 = lighten by 20%, -0.4 = darken by 40%)
	 *
	 * @return string Lightened/Darkened colour as hexadecimal (with hash)
	 */
	function milos_color_luminance( $color, $percent ) {
		// Remove # if provided
		if ( '#' === $color[0] ) {
			$color = substr( $color, 1 );
		}

		// Validate hex string.
		$hex     = preg_replace( '/[^0-9a-f]/i', '', $color );
		$new_hex = '#';

		$percent = floatval( $percent );

		if ( strlen( $hex ) < 6 ) {
			$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
		}

		// Convert to decimal and change luminosity.
		for ( $i = 0; $i < 3; $i ++ ) {
			$dec = hexdec( substr( $hex, $i * 2, 2 ) );
			$dec = min( max( 0, $dec + $dec * $percent ), 255 );
			$new_hex .= str_pad( dechex( $dec ), 2, 0, STR_PAD_LEFT );
		}

		return $new_hex;
	}
endif;

if ( ! function_exists( 'milos_hex2rgba' ) ) :
	/**
	 * Converts hexadecimal color value to rgb(a) format.
	 *
	 * @param string $color Hexadecimal color value. May be 3 or 6 digits, with an optional leading # sign.
	 * @param float|bool $opacity Opacity level 0-1 (decimal) or false to disable.
	 *
	 * @return string
	 */
	function milos_hex2rgba( $color, $opacity = false ) {

		$default = 'rgb(0,0,0)';

		// Return default if no color provided
		if ( empty( $color ) ) {
			return $default;
		}

		// Remove # if provided
		if ( '#' === $color[0] ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values
		if ( strlen( $color ) === 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) === 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		$rgb = array_map( 'hexdec', $hex );

		if ( false === $opacity ) {
			$opacity = abs( floatval( $opacity ) );
			if ( $opacity > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
		} else {
			$output = 'rgb(' . implode( ',', $rgb ) . ')';
		}

		return $output;
	}
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer styles.
 */
require get_template_directory() . '/inc/customizer-styles.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
