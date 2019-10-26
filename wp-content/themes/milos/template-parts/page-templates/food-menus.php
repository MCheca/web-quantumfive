<?php
/**
 * Template part for displaying child pages
 *
 * @package Milos
 */
?>

<?php
	//
	// Display the food menu.
	//
	$q = new WP_Query( array(
		'post_type' => 'nova_menu_item',
	) );

	while ( $q->have_posts() ) : $q->the_post();

		get_template_part( 'template-parts/content', 'menu-item' );

	endwhile;

	wp_reset_postdata();
