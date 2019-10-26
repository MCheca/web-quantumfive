<div class="page-hero">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-header">
					<?php
						if ( is_post_type_archive( 'jetpack-testimonial' ) ) {

							$jetpack = get_theme_mod( 'jetpack_testimonials' );
							$title   = isset( $jetpack['page-title'] ) && ! empty( $jetpack['page-title'] ) ? $jetpack['page-title'] : __( 'Testimonials', 'milos' );
							$content = isset( $jetpack['page-content'] ) && ! empty( $jetpack['page-content'] ) ? $jetpack['page-content'] : '';

							echo '<h1 class="page-title">' . esc_html( $title ) . '</h1>';

							if ( $content ) {
								echo '<div class="page-meta">' . $content . '</div>';
							}

						} elseif ( is_archive() ) {

							the_archive_title( '<h1 class="page-title">', '</h1>' );

							the_archive_description( '<div class="page-meta">', '</div>' );

						} elseif ( is_search() && have_posts() ) {

							?><h1 class="page-title"><?php

								/* translators: %s is the search terms entered by the visitor. */
								echo wp_kses( sprintf( __( 'Search Results for: %s', 'milos' ), '<span>' . get_search_query() . '</span>' ), array(
									'span' => array(),
								) );

							?></h1><?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
