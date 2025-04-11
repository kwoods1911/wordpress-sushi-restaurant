<?php if(get_theme_mod('food_restaurant_elementor_show_pagination', true )== true): ?>
	<?php
		the_posts_pagination( array(
			'prev_text' => esc_html__( 'Previous page', 'food-restaurant-elementor' ),
			'next_text' => esc_html__( 'Next page', 'food-restaurant-elementor' ),
		) );
	?>		
<?php endif; ?>