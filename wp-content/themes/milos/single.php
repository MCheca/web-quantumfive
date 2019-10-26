<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Milos
 */

get_header(); ?>

<div id="content" class="main">
	<div class="container">
		<div class="row">
			<div class="<?php milos_the_container_classes(); ?>">
				<main id="main" role="main" class="<?php milos_the_main_classes(); ?>">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</main>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
