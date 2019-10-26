<?php
/**
 * Template part for displaying food menu items
 *
 * @package Milos
 */

?>
<div class="item-menu">
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="item-menu-thumb">
			<?php the_post_thumbnail( 'milos-menu-item' ); ?>
		</figure>
	<?php endif; ?>

	<div class="item-menu-content">

		<div class="item-menu-head">
			<?php the_title( '<p class="item-menu-title">', '</p>' ); ?>
			<?php
				$terms = get_the_terms( get_the_ID(), 'nova_menu_item_label' );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						printf( '<span class="item-menu-tag item-menu-tag-%s">%s</span>',
							esc_attr( $term->term_id ),
							esc_html( $term->name )
						);
					}
				}

				$price = get_post_meta( get_the_ID(), 'nova_price', true );

				if ( ! empty( $price ) ) :
					?>
					<span class="item-menu-price">
						<?php echo esc_html( $price ); ?>
					</span>
					<?php
				endif;
			?>
		</div>

		<?php if ( get_the_content() !== '' ) : ?>
			<div class="item-menu-desc"><?php the_content(); ?></div>
		<?php endif; ?>

	</div>
</div>
