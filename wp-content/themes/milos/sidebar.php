<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Milos
 */

if ( ! is_page() && ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( is_page() && ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>
<div class="col-lg-4 col-xs-12">
	<aside id="secondary" class="sidebar" role="complementary">
		<?php
			if ( ! is_page() ) {
				dynamic_sidebar( 'sidebar-1' );
			} else {
				dynamic_sidebar( 'sidebar-2' );
			}
		?>
	</aside>
</div>
