<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Milos
 */

get_header(); ?>

<?php get_template_part( 'template-parts/hero' ); ?>

<div id="content" class="main">
	<div class="container">
		<div class="row">
			<div class="<?php milos_the_container_classes(); ?>">
				<main id="main" role="main">
					<?php
					if ( have_posts() ) :

						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</main>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
