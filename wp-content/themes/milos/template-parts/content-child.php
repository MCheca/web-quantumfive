<?php
/**
 * Template part for displaying child pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Milos
 */

?>

<div class="col-lg-4 col-sm-6 col-xs-12">
	<div class="item">
		<a href="<?php the_permalink(); ?>">
			<figure class="item-thumb">
					<?php the_post_thumbnail( 'milos-listing' ); ?>
			</figure>

			<div class="item-info">
				<?php the_title( '<p class="item-title">', '</p>' ); ?>
				<span class="btn btn-sm item-btn"><?php esc_html_e( 'Read more', 'milos' ); ?></span>
			</div>
		</a>
	</div>
</div>