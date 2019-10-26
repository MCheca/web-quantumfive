<?php
/**
 * Template part for displaying slider slides
 *
 * @package Milos
 */

$style     = '';
$image_url = get_the_post_thumbnail_url( get_the_ID(), 'milos-slider' );

if ( $image_url ) {
	$style = sprintf( 'background-image: url(%s); background-size: cover;',
		esc_url( $image_url )
	);
}
?>

<div class="page-jumbotron" style="<?php echo esc_attr( $style ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php the_title( '<h2 class="jumbo-title">', '</h2>' ); ?>

				<?php if ( has_excerpt() ) : ?>
					<p class="jumbo-subtitle"><?php echo get_the_excerpt(); ?></p>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>" class="btn">
					<?php
						printf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'milos' ), array( 'span' => array( 'class' => true ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						);
					?>
				</a>
			</div>
		</div>
	</div>
</div>
