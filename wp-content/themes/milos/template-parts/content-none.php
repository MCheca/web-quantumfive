<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Milos
 */

?>

<article class="no-results not-found">
	<header class="entry-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'milos' ); ?></h1>
	</header>

	<div class="entry-content">
		<div class="row">
			<div class="<?php milos_the_content_classes(); ?>">
				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p class="text-center"><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'milos' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p class="text-center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'milos' ); ?></p>
					<?php
						get_search_form();

				else : ?>

					<p class="text-center"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'milos' ); ?></p>
					<?php
						get_search_form();

				endif; ?>
			</div>
		</div>
	</div>
</article>
