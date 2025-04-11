<?php

  $food_restaurant_elementor_theme_custom_setting_css = '';

	// Global Color
	$food_restaurant_elementor_theme_color = get_theme_mod('food_restaurant_elementor_theme_color', '#597E52');

	$food_restaurant_elementor_theme_custom_setting_css .=':root {';
		$food_restaurant_elementor_theme_custom_setting_css .='--primary-theme-color: '.esc_attr($food_restaurant_elementor_theme_color ).'!important;';
	$food_restaurant_elementor_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$food_restaurant_elementor_scroll_alignment = get_theme_mod('food_restaurant_elementor_scroll_alignment', 'right');

    if($food_restaurant_elementor_scroll_alignment == 'right'){
        $food_restaurant_elementor_theme_custom_setting_css .='.scroll-up{';
            $food_restaurant_elementor_theme_custom_setting_css .='right: 30px;!important;';
			$food_restaurant_elementor_theme_custom_setting_css .='left: auto;!important;';
        $food_restaurant_elementor_theme_custom_setting_css .='}';
    }else if($food_restaurant_elementor_scroll_alignment == 'center'){
        $food_restaurant_elementor_theme_custom_setting_css .='.scroll-up{';
            $food_restaurant_elementor_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
        $food_restaurant_elementor_theme_custom_setting_css .='}';
    }else if($food_restaurant_elementor_scroll_alignment == 'left'){
        $food_restaurant_elementor_theme_custom_setting_css .='.scroll-up{';
            $food_restaurant_elementor_theme_custom_setting_css .='left: 30px;!important;';
			$food_restaurant_elementor_theme_custom_setting_css .='right: auto;!important;';
        $food_restaurant_elementor_theme_custom_setting_css .='}';
    }	

	// Related Product

	$food_restaurant_elementor_show_related_product = get_theme_mod('food_restaurant_elementor_show_related_product', true );

	if($food_restaurant_elementor_show_related_product != true){
		$food_restaurant_elementor_theme_custom_setting_css .='.related.products{';
			$food_restaurant_elementor_theme_custom_setting_css .='display: none;';
		$food_restaurant_elementor_theme_custom_setting_css .='}';
	}    