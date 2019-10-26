<?php
/**
 * Template Name: Menu page
 *
 * @package Milos
 */

if ( class_exists( 'Nova_Restaurant' ) ) {
	Nova_Restaurant::init( array(
		'menu_tag'        => 'div',
		'menu_class'      => 'menu-category',
		'menu_header_tag' => 'div',
		'menu_title_tag'  => 'h5',
	) );
}

get_header(); ?>

<div id="content" class="main">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<?php while ( have_posts() ) : the_post(); ?>

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
								<div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-xs-12">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</article>

				<?php endwhile; ?>

			</div>
		</div>
	</div>
</div>

<?php
get_footer();
