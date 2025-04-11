<?php

function restropress_enqueue_scripts() { 
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css', [], '2.2.19');
    wp_enqueue_style('style', get_stylesheet_uri());
}


add_action('wp_enqueue_scripts', 'restropress_enqueue_scripts');



function restropress_register_menus(){
    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'restropress')
    ]);
}

add_action('after_setup_theme', 'restropress_register_menus');


function restropress_menu_item_class($classes, $item){
    if(in_array('current-menu-item', $classes)){
        $classes[] = 'text-yellow-400 font-semibold underline';
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'restropress_menu_item_class', 10, 2);
