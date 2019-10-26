<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Milos
 */

get_header(); ?>

<div id="content" class="main">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<main id="main" role="main">
					<article class="error-404 not-found">
						<header class="entry-header">

							<h1 class="page-title">
								<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'milos' ); ?>
							</h1>

							<p class="page-meta">
								<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'milos' ); ?>
							</p>

						</header>

						<div class="entry-content">
							<div class="row">
								<div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-xs-12">

									<?php get_search_form(); ?>

								</div>
							</div>
						</div>
					</article>
				</main>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();