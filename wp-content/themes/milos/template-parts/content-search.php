<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Milos
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php milos_entry_header(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<div class="row">
			<div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-xs-12">
				<?php the_excerpt(); ?>
				<?php milos_entry_footer(); ?>
			</div>
		</div>
	</div>
</article>

