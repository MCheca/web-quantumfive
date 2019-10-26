<?php
/**
 * Template part for displaying slider slides
 *
 * @package Milos
 */

$addon_class = '';
$style       = '';

if ( has_post_thumbnail() ) {
	$addon_class = 'widget-section-bg';

	$style = sprintf( 'background-image: url(%s);',
		esc_url( get_the_post_thumbnail_url( get_the_ID(), 'milos-hero' ) )
	);
}

?>
<section id="section-<?php the_ID(); ?>" class="widget-section widget-padded <?php echo esc_attr( $addon_class ); ?>">
	<div class="widget-wrap" style="<?php echo esc_attr( $style ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php the_title( '<h3 class="section-title">', '</h3>' ); ?>

					<?php if ( has_excerpt() ) : ?>
						<p class="section-subtitle"><?php echo get_the_excerpt(); ?></p>
					<?php endif; ?>

					<?php the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'milos' ), array( 'span' => array( 'class' => true ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
