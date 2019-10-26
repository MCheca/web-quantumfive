<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Milos
 */

get_header();
?>

<div id="content" class="main">
	<div class="container">
		<div class="row">
			<div class="<?php milos_the_container_classes(); ?>">
				<main id="main" role="main" class="<?php milos_the_main_classes(); ?>">
					<?php
					if ( have_posts() ) :

						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', get_post_format() );

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
