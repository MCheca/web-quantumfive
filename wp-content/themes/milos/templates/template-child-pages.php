<?php
/**
 * Template Name: Parent and Child Pages
 *
 * @package Milos
 */

get_header(); ?>

<div id="content" class="main">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<main id="main" role="main">
					<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'parent' );

						endwhile;
					?>
				</main>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();