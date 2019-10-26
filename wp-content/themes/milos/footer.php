<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Milos
 */
?>
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if ( function_exists( 'jetpack_social_menu' ) ) : ?>
						<div class="site-social">
							<?php jetpack_social_menu(); ?>
						</div>
					<?php endif; ?>

					<div class="brand-footer">
						<?php if ( has_custom_logo() ) {
							the_custom_logo();
						} ?>

					    <h4 class="site-logo-footer"><?php bloginfo( 'name' ); ?></h4>

						<?php $description = get_bloginfo( 'description', 'display' ); ?>
						<?php if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>

					<?php wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_class'     => 'nav-footer',
						'container'      => '',
						'fallback_cb'    => false,
						'depth'          => 1,
					) ); ?>
				</div>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
