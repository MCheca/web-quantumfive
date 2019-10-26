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
			<div class="<?php milos_the_content_classes(); ?>">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'milos' ),
						'after'  => '</div>',
					) );

					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'milos' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<p class="edit-link">',
						'</p>'
					);
				?>
			</div>
		</div>
	</div>
</article>
