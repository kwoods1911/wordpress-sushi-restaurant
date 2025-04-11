<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="text-2xl font-bold">
                <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </div>

            <!-- Hamburger -->
            <button id="menu-toggle" class="md:hidden flex flex-col justify-between w-6 h-6 focus:outline-none">
                <span class="block h-0.5 bg-white transition-transform duration-300 origin-top-left" id="bar1"></span>
                <span class="block h-0.5 bg-white transition-opacity duration-300" id="bar2"></span>
                <span class="block h-0.5 bg-white transition-transform duration-300 origin-bottom-left" id="bar3"></span>
            </button>

            <!-- Menu -->
            <nav id="main-menu"
                class="hidden md:flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6 absolute md:static top-50 left-0 w-full md:w-auto bg-gray-800 md:bg-transparent p-4 md:p-0 z-50 mt-40 md:mt-0">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary_menu',
                    'container' => false,
                    'menu_class' => 'list-none flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6',
                    'fallback_cb' => false,
                    'link_before' => '<span class="hover:text-yellow-400 transition-colors duration-200">',
                    'link_after' => '</span>'
                ]);
                ?>
            </nav>
        </div>
    </header>