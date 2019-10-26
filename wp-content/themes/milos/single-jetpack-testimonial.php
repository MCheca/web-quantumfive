<?php
/**
 * The template for displaying single testimonials
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

						get_template_part( 'template-parts/content', get_post_type() );

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
