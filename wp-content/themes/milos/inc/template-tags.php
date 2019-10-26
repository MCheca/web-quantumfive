<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Milos
 */

if ( ! function_exists( 'milos_posted_on' ) ) :
function milos_entry_header() {
	$time_string = '<time class="entry-time published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-time published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( ! get_the_title() ) {
		$time_string = sprintf( '<a class="entry-time" href="%1$s">%2$s</a>',
			esc_url( get_the_permalink() ),
			$time_string
		);
	}

	if ( ! is_singular() && is_sticky() ) {
		echo '<span>' . esc_html__( 'FEATURED', 'milos' ) . '</span>';
	} else {
		echo $time_string; // WPCS: XSS OK.
	}

	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'milos' ) );
	if ( $categories_list ) {
		printf( '<span class="entry-categories">%1$s</span>', $categories_list ); // WPCS: XSS OK.
	}

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'milos' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="entry-comments-no">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'milos' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

}
endif;

if ( ! function_exists( 'milos_entry_footer' ) ) :
function milos_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() && is_single() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'milos' ) );
		if ( $tags_list ) {
			/* translators: %1$s is the list of post tags. */
			printf( '<p class="tags-links">' . esc_html__( 'Tags: %1$s', 'milos' ) . '</p>', $tags_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'milos' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<p class="edit-link">',
		'</p>'
	);
}
endif;


/**
 * Gets the appropriate template part that makes the page templates special.
 */
function milos_page_template_content( $post_id = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$template = get_page_template_slug( $post_id );

	// Note: Do not add a case for the front page template, as it may result in an infinite loop,
	//       depending on user configuration (i.e. a front page section page is assigned the front-page.php template.
	switch ( $template ) {
		case 'templates/template-child-pages.php':
			get_template_part( 'template-parts/page-templates/child-pages' );
			break;
		case 'templates/food-menus-page.php':
			get_template_part( 'template-parts/page-templates/food-menus' );
			break;
	}
}

function milos_the_content_page_template_content( $content ) {
	global $post;

	$is_home_tpl  = is_page_template( 'templates/front-page.php' );
	$has_readmore = preg_match( '/<!--more(.*?)?-->/', $post->post_content );

	if ( $is_home_tpl && $has_readmore ) {
		return $content;
	}

	ob_start();
	milos_page_template_content();
	$content .= ob_get_clean();

	return $content;
}


/**
 * Echoes main container classes based on whether
 * the current template has a visible sidebar or not
 */
function milos_the_main_classes() {
	$meta = milos_get_layout_info();
	echo esc_attr( $meta['main_classes'] );
}

/**
 * Echoes classes based on whether
 * the current template has a visible sidebar or not
 */
function milos_the_container_classes() {
	$meta = milos_get_layout_info();
	echo esc_attr( $meta['container_classes'] );
}

/**
 * Echoes content classes based on whether
 * the current template has a visible sidebar or not
 */
function milos_the_content_classes() {
	$meta = milos_get_layout_info();
	echo esc_attr( $meta['content_classes'] );
}

/**
 * Echoes comment classes based on whether
 * the current template has a visible sidebar or not
 */
function milos_the_comment_classes() {
	$meta = milos_get_layout_info();
	echo esc_attr( $meta['comment_classes'] );
}

/**
 * Echoes header classes based on customizer options
 */
function milos_the_header_classes() {
	$classes = apply_filters( 'milos_header_classes', array(
		get_theme_mod( 'header_sticky' ) ? 'header-sticky' : '',
	) );

	$classes = array_filter( $classes );

	echo esc_attr( implode( ' ', $classes ) );
}

/**
 * Whether the current template has a visible sidebar or not
 *
 * @return bool
 */
function milos_has_sidebar() {
	$meta = milos_get_layout_info();
	return $meta['has_sidebar'];
}

/**
 * Whether the front page may display a video background.
 *
 * @return bool
 */
function milos_has_bg_video() {

	$url = get_theme_mod( 'front_video_url' );

	if ( ! empty( $url ) && milos_has_featured_posts( 1 ) && ! milos_has_featured_posts( 2 ) ) {
		return true;
	}

	return false;
}

function milos_the_bg_video() {

	$url = get_theme_mod( 'front_video_url' );

	if ( empty( $url ) ) {
		return;
	}

	$video = milos_get_video_url_info( $url );

	if ( $video['supported'] ) {
		?>
		<div class="ci-video-wrap">
			<div class="ci-video-background" data-video-type="<?php echo esc_attr( $video['provider'] ); ?>" data-video-id="<?php echo esc_attr( $video['video_id'] ); ?>">
				<?php if ( 'youtube' === $video['provider'] ) : ?>
					<div id="youtube-vid"></div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
