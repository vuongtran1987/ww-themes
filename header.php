<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'wisdom-red': '#962017',
                        'wisdom-purple': '#663366',
                        'wisdom-teal': '#203f41',
                        'my-account': '#712017',
                        'getting-started': '#4a6741',
                        'latest-news': '#962017',
                        'events': '#c5975a',
                        'courses': '#6b4c93'
                    },
                    fontFamily: {
                        'avenir': ['Avenir', 'Avenir Next', 'sans-serif'],
                        'minion': ['Minion Pro', 'serif']
                    }
                }
            }
        }
    </script>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Mobile Menu Overlay -->
<div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

<!-- Mobile Menu -->
<div id="mobile-menu" class="fixed top-0 left-0 w-80 h-full bg-white z-50 transform -translate-x-full transition-transform duration-300 overflow-y-auto">
    <!-- Mobile Menu Header -->
    <div class="flex items-center justify-between p-6 border-b border-gray-100">
        <div class="flex items-center space-x-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-mobile.png" alt="<?php bloginfo('name'); ?>" class="h-8 w-auto">
        </div>
        <button id="mobile-menu-close" class="text-wisdom-red text-2xl font-light">&times;</button>
    </div>
    
    <!-- Mobile Navigation -->
    <nav class="mobile-nav-container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'container' => false,
            'menu_class' => 'mobile-menu-list',
            'fallback_cb' => false,
            'items_wrap' => '<ul class="%2$s">%3$s</ul>'
        ));
        ?>
    </nav>
</div>

<!-- Header -->
<header class="site-header w-full bg-white relative">
    <!-- My Account - Desktop Only - Top Right -->
    <div class="my-account-desktop hidden lg:block absolute top-8 right-24 font-avenir font-black text-my-account text-base cursor-pointer hover:opacity-80 transition-opacity">
        My Account
    </div>

    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between lg:justify-center">
            <!-- Mobile Header -->
            <div class="lg:hidden mobile-header flex items-center justify-between w-full">
                <div class="mobile-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-mobile.png" alt="<?php bloginfo('name'); ?>" class="h-12 w-auto"></a>
                </div>
                
                <div class="mobile-icons flex items-center space-x-4">
                    <!-- User Icon -->
                    <button class="mobile-icon text-wisdom-red">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </button>
                    
                    <!-- Cart Icon (Mobile) -->
                    <?php if (function_exists('wisdom_waypoints_woocommerce_cart_link')) wisdom_waypoints_woocommerce_cart_link(); ?>
                    
                    <!-- Mobile Hamburger -->
                    <button id="mobile-menu-btn" class="mobile-icon text-wisdom-red">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Desktop Logo - Centered -->
            <div class="site-logo desktop-only hidden lg:block text-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>" class="h-20 w-auto mx-auto"></a>
            </div>
        </div>
    </div>
    
    <!-- Desktop Navigation -->
    <div class="main-navigation desktop-only hidden lg:block border-t border-gray-300">
        <div class="container mx-auto px-4">
            <nav class="desktop-nav flex justify-center items-center relative">
                <!-- Cart Icon (Desktop) -->
                <div class="absolute right-0">
                    <?php if (function_exists('wisdom_waypoints_woocommerce_cart_link')) wisdom_waypoints_woocommerce_cart_link(); ?>
                </div>
                
                <div class="flex justify-center space-x-12">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'nav-menu flex space-x-12',
                    'container' => false,
                    'walker' => new Wisdom_Waypoints_Walker_Nav_Menu(),
                    'fallback_cb' => 'wisdom_waypoints_primary_fallback_menu'
                ));
                ?>
                </div>
            </nav>
        </div>
    </div>
</header>