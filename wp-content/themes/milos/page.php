<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;
					?>
				</main>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
