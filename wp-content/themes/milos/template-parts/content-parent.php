<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Milos
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<?php if ( has_excerpt() ) : ?>
			<div class="entry-meta">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumb">
			<?php the_post_thumbnail( 'milos-featured' ); ?>
		</figure>
	<?php endif; ?>

	<div class="entry-content">
		<div class="row">
			<div class="col-xs-12">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'milos' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div>
	</div>
</article>
