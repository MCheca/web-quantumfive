<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Milos
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'milos' ); ?></a>

	<header id="masthead" class="header <?php milos_the_header_classes(); ?>" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="mast-head-wrap">
						<div class="site-brand">
							<?php if ( has_custom_logo() ) {
								the_custom_logo();
							} ?>

							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif; ?>

							<?php $description = get_bloginfo( 'description', 'display' ); ?>
							<?php if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div>

						<button class="btn-sm menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span class="genericon genericon-menu"></span>
							<?php esc_html_e( 'Menu', 'milos' ); ?>
						</button>

						<nav id="site-navigation" class="navigation-main" role="navigation">
							<?php wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) ); ?>
						</nav>
					</div>
				</div>
			</div>	
		</div>
	</header>
