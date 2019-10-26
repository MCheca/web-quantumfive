<?php
	if ( ! function_exists( 'milos_get_customizer_css' ) ) :
		function milos_get_customizer_css() {
			ob_start();

			//
			// Global Colors
			//
			if ( get_theme_mod( 'site_accent_color' ) ) {
				$accent_color       = get_theme_mod( 'site_accent_color' );
				$accent_active = milos_color_luminance( $accent_color, .1 );
				?>
				a,
				.jetpack-social-navigation a:hover,
				.nav-footer a:hover,
				.entry-title a:hover,
				.social-icon:hover,
				.navigation-main > div > ul li:hover > a,
				.navigation-main > div > ul li > a:focus,
				.navigation-main > div > ul .current-menu-item > a,
				.navigation-main > div > ul .current-menu-parent > a,
				.navigation-main > div > ul .current-menu-ancestor > a,
				.navigation-main > div > ul .current-page-ancestor > a,
				.navigation-main > div > ul .current_page_item > a,
				.navigation-main > div > ul .current_page_parent > a,
				.navigation-main > div > ul .current_page_ancestor > a {
					color: <?php echo sanitize_hex_color( $accent_color ); ?>;
				}

				.navigation a:hover,
				.navigation .current,
				.page-links .page-number:hover,
				.page-links > .page-number,
				.tag-cloud-link:hover,
				.btn,
				.comment-reply-link,
				input[type="submit"],
				input[type="reset"],
				button,
				.navigation-main > div > ul .nav-btn > a {
					background-color: <?php echo sanitize_hex_color( $accent_color ); ?>;
				}

				.navigation a:hover,
				.navigation .current,
				.page-links .page-number:hover,
				.page-links > .page-number,
				.tag-cloud-link:hover {
					border-color: <?php echo sanitize_hex_color( $accent_color ); ?>;
				}

				a:focus {
					outline: 1px dotted <?php echo sanitize_hex_color( $accent_color ); ?>;
				}

				a:hover {
					color: <?php echo sanitize_hex_color( $accent_active ); ?>;
				}

				.page-jumbotron,
				.btn:hover,
				.comment-reply-link:hover,
				input[type="submit"]:hover,
				input[type="reset"]:hover,
				button:hover,
				.navigation-main > div > ul .nav-btn > a:hover {
					background-color: <?php echo milos_color_luminance( $accent_color, -.1 ); ?>
				}

				.btn:focus,
				.comment-reply-link:focus,
				input[type="submit"]:focus,
				input[type="reset"]:focus,
				button:focus {
					box-shadow: 0 0 10px <?php echo milos_color_luminance( $accent_color, .7 ); ?>
				}
				<?php
			}

			if ( get_theme_mod( 'site_text_color' ) ) {
				$text_color       = get_theme_mod( 'site_text_color' );
				$text_color_light = milos_color_luminance( $text_color, .2 );
				$text_color_dark = milos_color_luminance( $text_color, -.3 );
				?>
				body,
				.ci-select::after,
				.widget .instagram-pics li a {
					color: <?php echo sanitize_hex_color( $text_color ); ?>;
				}

				h1, h2, h3, h4, h5, h6,
				.jetpack-social-navigation a,
				.site-title,
				.site-title a,
				.entry-title a,
				.widget-title > a,
				.nav-footer a,
				.page-meta > span,
				.page-meta > time,
				.page-meta > a,
				.entry-meta > span,
				.entry-meta > time,
				.entry-meta > a,
				.item-menu-title,
				.item-menu-price,
				.navigation a,
				.navigation span,
				.page-links .page-number,
				.footer .list-social-icons::after,
				.social-icon,
				.navigation-main > div > ul a,
				.navigation-main > div > ul .dropdown-toggle,
				.item-testimonial .testimonial-entry-title,
				.testimonial-entry .testimonial-entry-title,
				.widget_meta li a,
				.widget_pages li a,
				.widget_categories li a,
				.widget_archive li a,
				.widget_nav_menu li a,
				.tag-cloud-link {
					color: <?php echo sanitize_hex_color( $text_color_dark ); ?>;
				}

				blockquote cite,
				.form-allowed-tags,
				.comment-notes {
					color: <?php echo sanitize_hex_color( $text_color_light ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'site_border_color' ) ) {
				$border_color = get_theme_mod( 'site_border_color' );
				?>
				blockquote,
				hr,
				.sharedaddy,
				.footer,
				.header,
				.page-hero,
				.item-menu-tag,
				.navigation a,
				.navigation span,
				.page-links .page-number,
				.navigation-main > div > ul a,
				.navigation-main > div > ul ul,
				.navigation-main > div > ul .dropdown-toggle,
				.widget_recent_comments li,
				.widget_rss li,
				.widget_recent_entries li,
				.tag-cloud-link {
					border-color: <?php echo sanitize_hex_color( $border_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'button_bg_color' ) ) {
				$button_bg_color = get_theme_mod( 'button_bg_color' );
				?>
				.btn,
				.button,
				.comment-reply-link,
				input[type="submit"],
				input[type="reset"],
				button,
				.more-link,
				.navigation-main > div > ul .nav-btn > a {
					background-color: <?php echo sanitize_hex_color( $button_bg_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'button_hover_bg_color' ) ) {
				$button_hover_bg_color = get_theme_mod( 'button_hover_bg_color' );
				?>
				.btn:hover,
				.button:hover,
				.comment-reply-link:hover,
				input[type="submit"]:hover,
				input[type="reset"]:hover,
				button:hover,
				.more-link:hover,
				.navigation-main > div > ul .nav-btn > a:hover {
					background-color: <?php echo sanitize_hex_color( $button_hover_bg_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'button_text_color' ) ) {
				$button_text_color = get_theme_mod( 'button_text_color' );
				?>
				.btn,
				.button,
				.comment-reply-link,
				input[type="submit"],
				input[type="reset"],
				button,
				.more-link,
				.navigation-main > div > ul .nav-btn > a {
					color: <?php echo sanitize_hex_color( $button_text_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'button_hover_text_color' ) ) {
				$button_hover_text_color = get_theme_mod( 'button_hover_text_color' );
				?>
				.btn:hover,
				.button:hover,
				.comment-reply-link:hover,
				input[type="submit"]:hover,
				input[type="reset"]:hover,
				button:hover,
				.more-link:hover,
				.navigation-main > div > ul .nav-btn > a:hover {
					color: <?php echo sanitize_hex_color( $button_hover_text_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'button_border_color' ) ) {
				$button_border_color = get_theme_mod( 'button_border_color' );
				?>
				.btn,
				.button,
				.comment-reply-link,
				input[type="submit"],
				input[type="reset"],
				button,
				.btn:hover,
				.button:hover,
				.comment-reply-link:hover,
				input[type="submit"]:hover,
				input[type="reset"]:hover,
				button:hover,
				.more-link:hover,
				.navigation-main > div > ul .nav-btn > a,
				.navigation-main > div > ul .nav-btn > a:hover {
					border: 2px solid <?php echo sanitize_hex_color( $button_border_color ); ?>;
				}
				<?php
			}


			//
			// Header Colors
			//
			if ( get_theme_mod( 'head_bg_color' ) ) {
				$head_bg_color = get_theme_mod( 'head_bg_color' );
				?>
				.header {
					background-color: <?php echo sanitize_hex_color( $head_bg_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'head_text_color' ) ) {
				$head_text_color = get_theme_mod( 'head_text_color' );
				?>
				.header,
				.site-brand,
				.site-brand a,
				.site-tagline,
				.navigation-main > div > ul a {
					color: <?php echo sanitize_hex_color( $head_text_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'head_text_hover_color' ) ) {
				$head_text_hover_color = get_theme_mod( 'head_text_hover_color' );
				?>
				.site-brand a:hover,
				.navigation-main > div > ul li:hover > a,
				.navigation-main > div > ul li > a:focus,
				.navigation-main > div > ul .current-menu-item > a,
				.navigation-main > div > ul .current-menu-parent > a,
				.navigation-main > div > ul .current-menu-ancestor > a,
				.navigation-main > div > ul .current-page-ancestor > a,
				.navigation-main > div > ul .current_page_item > a,
				.navigation-main > div > ul .current_page_parent > a,
				.navigation-main > div > ul .current_page_ancestor > a {
					color: <?php echo sanitize_hex_color( $head_text_hover_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'head_subnav_bg_color' ) ) {
				$head_subnav_bg_color = get_theme_mod( 'head_subnav_bg_color' );
				?>
				.navigation-main > div > ul ul {
					background-color: <?php echo sanitize_hex_color( $head_subnav_bg_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'head_subnav_text_color' ) ) {
				$head_subnav_text_color = get_theme_mod( 'head_subnav_text_color' );
				?>
				.navigation-main > div > ul li li a {
					color: <?php echo sanitize_hex_color( $head_subnav_text_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'head_subnav_text_hover_color' ) ) {
				$head_subnav_text_hover_color = get_theme_mod( 'head_subnav_text_hover_color' );
				?>
				.navigation-main li li:hover > a,
				.navigation-main li li > a:focus,
				.navigation-main li .current-menu-item > a,
				.navigation-main li .current-menu-parent > a,
				.navigation-main li .current-menu-ancestor > a	{
					color: <?php echo sanitize_hex_color( $head_subnav_text_hover_color ); ?>;
				}
				<?php
			}


			//
			// Sidebar Colors
			//
			if ( get_theme_mod( 'sidebar_text_color' ) ) {
				$sidebar_text_color = get_theme_mod( 'sidebar_text_color' );
				?>
				.sidebar,
				.sidebar .widget-title {
					color: <?php echo sanitize_hex_color( $sidebar_text_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'sidebar_link_color' ) ) {
				$sidebar_link_color = get_theme_mod( 'sidebar_link_color' );
				?>
				.sidebar a:not(.btn),
				.sidebar .widget_meta li a,
				.sidebar .widget_pages li a,
				.sidebar .widget_categories li a,
				.sidebar .widget_archive li a,
				.sidebar .widget_nav_menu li a,
				.sidebar .widget_recent_entries li a,
				.sidebar .widget_product_categories li a,
				.sidebar .widget_layered_nav li a,
				.sidebar .widget_rating_filter li a,
				.sidebar .sidebar .product_list_widget .product-title {
					color: <?php echo sanitize_hex_color( $sidebar_link_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'sidebar_link_hover_color' ) ) {
				$sidebar_link_hover_color = get_theme_mod( 'sidebar_link_hover_color' );
				?>
				.sidebar a:not(.btn):hover,
				.sidebar .widget_meta li a:hover,
				.sidebar .widget_pages li a:hover,
				.sidebar .widget_categories li a:hover,
				.sidebar .widget_archive li a:hover,
				.sidebar .widget_nav_menu li a:hover,
				.sidebar .widget_recent_entries li a:hover,
				.sidebar .widget_product_categories li a:hover,
				.sidebar .widget_layered_nav li a:hover,
				.sidebar .widget_rating_filter li a:hover,
				.sidebar .product_list_widget .product-title:hover {
					color: <?php echo sanitize_hex_color( $sidebar_link_hover_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'sidebar_border_color' ) ) {
				$sidebar_border_color = get_theme_mod( 'sidebar_border_color' );
				?>
				.sidebar .widget select,
				.sidebar .widget-title::after,
				.sidebar input,
				.sidebar textarea {
					border-color: <?php echo sanitize_hex_color( $sidebar_border_color ); ?>;
				}

				.sidebar .widget_recent_comments li,
				.sidebar .widget_recent_entries li,
				.sidebar .widget_rss li,
				.sidebar .widget_meta li a,
				.sidebar .widget_pages li a,
				.sidebar .widget_categories li a,
				.sidebar .widget_archive li a,
				.sidebar .widget_nav_menu li a {
					border-bottom-color: <?php echo sanitize_hex_color( $sidebar_border_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'sidebar_widget_title_color' ) ) {
				$sidebar_widget_title_color = get_theme_mod( 'sidebar_widget_title_color' );
				?>
				.sidebar .widget-title {
					color: <?php echo sanitize_hex_color( $sidebar_widget_title_color ); ?>;
				}
				<?php
			}

			//
			// Footer Colors
			//

			if ( get_theme_mod( 'footer_bg_color' ) ) {
				$footer_bg_color = get_theme_mod( 'footer_bg_color' );
				?>
				.footer {
					background-color: <?php echo sanitize_hex_color( $footer_bg_color ); ?>;
				}
				<?php
			}

			if ( get_theme_mod( 'footer_text_color' ) ) {
				$footer_text_color = get_theme_mod( 'footer_text_color' );
				?>
				.footer,
				.footer a,
				.footer h1,
				.footer h2,
				.footer h3,
				.footer h4,
				.footer h5,
				.footer h6 {
					color: <?php echo sanitize_hex_color( $footer_text_color ); ?>;
				}
				<?php
			}

			//
			// Typography
			//
			if ( get_theme_mod( 'h1_size' ) ) {
				?>
				.entry-content h1,
				.entry-title {
					font-size: <?php echo intval( get_theme_mod( 'h1_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'h2_size' ) ) {
				?>
				.entry-content h2 {
					font-size: <?php echo intval( get_theme_mod( 'h2_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'h3_size' ) ) {
				?>
				.entry-content h3 {
					font-size: <?php echo intval( get_theme_mod( 'h3_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'h4_size' ) ) {
				?>
				.entry-content h4 {
					font-size: <?php echo intval( get_theme_mod( 'h4_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'h5_size' ) ) {
				?>
				.entry-content h5 {
					font-size: <?php echo intval( get_theme_mod( 'h5_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'h6_size' ) ) {
				?>
				.entry-content h6 {
					font-size: <?php echo intval( get_theme_mod( 'h6_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'body_text_size' ) ) {
				?>
				.entry-content {
					font-size: <?php echo intval( get_theme_mod( 'body_text_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'widgets_text_size' ) ) {
				?>
				.sidebar .widget,
				.sidebar .widget_meta li,
				.sidebar .widget_pages li,
				.sidebar .widget_categories li,
				.sidebar .widget_archive li,
				.sidebar .widget_nav_menu li,
				.sidebar .widget_recent_entries li {
					font-size: <?php echo intval( get_theme_mod( 'widgets_text_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'widgets_title_size' ) ) {
				?>
				.widget-title {
					font-size: <?php echo intval( get_theme_mod( 'widgets_title_size' ) ); ?>px;
				}
				<?php
			}

			if ( get_theme_mod( 'lowercase_widget_titles' ) ) {
				?>
				.widget-title {
					text-transform: none;
				}
				<?php
			}

			if ( get_theme_mod( 'uppercase_content_titles' ) ) {
				?>
				.entry-title,
				.entry-content h1,
				.entry-content h2,
				.entry-content h3,
				.entry-content h4,
				.entry-content h5,
				.entry-content h6,
				.item-catalogue-title,
				.item-menu-title,
				.item-title {
					text-transform: uppercase;
				}
				<?php
			}

			if ( get_theme_mod( 'uppercase_hero_titles' ) ) {
				?>
				.jumbo-title,
				.section-title,
				.page-title,
				.page-hero-title,
				.page-hero-subtitle {
					text-transform: uppercase;
				}
				<?php
			}

			$css = ob_get_clean();
			return apply_filters( 'milos_customizer_css', $css );
		}
	endif;
