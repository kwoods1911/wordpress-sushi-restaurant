<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Food Restaurant Elementor
 */

?>

<footer class="footer-side">
  <?php if( get_theme_mod( 'food_restaurant_elementor_show_footer_widget',true)) : ?>
    <div class="footer-widget">
      <div class="container">
        <?php if ( is_active_sidebar( 'footer1-sidebar' ) || is_active_sidebar( 'footer2- sidebar' ) || is_active_sidebar( 'footer3-sidebar' ) || is_active_sidebar( 'footer4-sidebar' ) ) : ?>
        <?php $food_restaurant_elementor_count = 0;
          if ( is_active_sidebar('footer1-sidebar') ) : $food_restaurant_elementor_count++; endif; 
          if ( is_active_sidebar('footer2-sidebar') ) : $food_restaurant_elementor_count++; endif; 
          if ( is_active_sidebar('footer3-sidebar') ) : $food_restaurant_elementor_count++; endif; 
          if ( is_active_sidebar('footer4-sidebar') ) : $food_restaurant_elementor_count++; endif;
          $food_restaurant_elementor_row = 'col-lg-'. 12/$food_restaurant_elementor_count .' col-md-'. 12/$food_restaurant_elementor_count .' col-sm-12';
        ?>
        <div class="row pt-2">
            <?php if ( is_active_sidebar('footer1-sidebar') ) : ?>
                <div class="footer-area <?php echo $food_restaurant_elementor_row ?>">
                    <?php dynamic_sidebar('footer1-sidebar'); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar('footer2-sidebar') ) : ?>
                <div class="footer-area <?php echo $food_restaurant_elementor_row ?>">
                    <?php dynamic_sidebar('footer2-sidebar'); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar('footer3-sidebar') ) : ?>
                <div class="footer-area <?php echo $food_restaurant_elementor_row ?>">
                    <?php dynamic_sidebar('footer3-sidebar'); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar('footer4-sidebar') ) : ?>
                <div class="footer-area <?php echo $food_restaurant_elementor_row ?>">
                    <?php dynamic_sidebar('footer4-sidebar'); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if( get_theme_mod( 'food_restaurant_elementor_show_footer_copyright',true)) : ?>
    <div class="footer-copyright">
      <div class="container">
        <div class="row pt-2">
          <div class="col-lg-6 col-md-6 align-self-center">
            <p class="mb-0 py-3 text-center text-md-start">
              <?php
                if (!get_theme_mod('food_restaurant_elementor_footer_text') ) { ?>
                <a href="<?php echo esc_url(__('https://www.wpelemento.com/products/free-food-wordpress-theme', 'food-restaurant-elementor' )); ?>" target="_blank">
                    <?php esc_html_e('Food Restaurant Elementor WordPress Theme','food-restaurant-elementor'); ?>
                </a>
              <?php } else {
                  echo esc_html(get_theme_mod('food_restaurant_elementor_footer_text'));
                }
              ?>
              <?php if ( get_theme_mod('food_restaurant_elementor_copyright_enable', true) == true ) : ?>
              <?php
                /* translators: %s: WP Elemento */
                printf( esc_html__( ' By %s', 'food-restaurant-elementor' ), 'WP Elemento' ); ?>
              <?php endif; ?>
            </p>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center text-center text-md-end">
            <?php if ( get_theme_mod('food_restaurant_elementor_copyright_enable', true) == true ) : ?>
              <a href="<?php echo esc_url(__('https://wordpress.org','food-restaurant-elementor') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'food-restaurant-elementor' ), 'WordPress' ); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if ( get_theme_mod('food_restaurant_elementor_scroll_enable_setting')) : ?>
    <div class="scroll-up">
      <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
    </div>
  <?php endif; ?>
  <?php if(get_theme_mod('food_restaurant_elementor_progress_bar', true )== true): ?>
    <div id="elemento-progress-bar" class="theme-progress-bar <?php if( get_theme_mod( 'food_restaurant_elementor_progress_bar_position','top') == 'top') { ?> top <?php } else { ?> bottom <?php } ?>"></div>
  <?php endif; ?>
  <?php if(get_theme_mod('food_restaurant_elementor_cursor_outline', false )== true): ?>
			<!-- Custom cursor -->
			<div class="cursor-point-outline"></div>
			<div class="cursor-point"></div>
			<!-- .Custom cursor -->
  <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>