<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Milos
 */

get_header(); ?>

<?php if ( have_posts() ) {
	get_template_part( 'template-parts/hero' );
} ?>

<div id="content" class="main">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<main id="main" role="main">
					<?php
						if ( have_posts() ) :

							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
				</main>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
