<!-- Footer -->
<footer class="site-footer bg-gray-800 text-white py-8">
    <div class="footer-content max-w-8xl mx-auto px-6 flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
        <div class="footer-tagline font-avenir font-medium text-sm text-center">
            <?php echo get_theme_mod('footer_tagline', __('Inner work for outer chaos. Wisdom for the modern world.', 'wisdom-waypoints')); ?>
        </div>
        
        <nav class="footer-nav flex items-center">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_class' => 'footer-menu-list flex items-center flex-wrap',
                'container' => false,
                'walker' => new Wisdom_Waypoints_Footer_Walker(),
                'fallback_cb' => 'wisdom_waypoints_footer_fallback_menu'
            ));
            ?>
        </nav>
        
        <div class="footer-copyright font-avenir font-medium text-sm text-center">
            <?php echo get_theme_mod('footer_copyright', __('Copyright © 2025 Wisdom Waypoints, a 501(c)(3) non-profit', 'wisdom-waypoints')); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            mobileOverlay.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    }
    
    function closeMobileMenu() {
        mobileMenu.classList.remove('active');
        mobileOverlay.style.display = 'none';
        document.body.style.overflow = '';
    }
    
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
    }
    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', closeMobileMenu);
    }
    
    // Mobile dropdown functionality
    document.addEventListener('click', function(e) {
        // Only handle clicks inside mobile menu
        if (!e.target.closest('#mobile-menu')) return;
        
        // Check if clicked on a menu item with children
        const menuItem = e.target.closest('#mobile-menu .menu-item-has-children');
        if (menuItem && e.target.tagName === 'A' && menuItem.contains(e.target)) {
            e.preventDefault();
            
            const submenu = menuItem.querySelector('.sub-menu');
            const isCurrentlyOpen = menuItem.classList.contains('open');
            
            // Close other open dropdowns
            const allDropdowns = document.querySelectorAll('#mobile-menu .menu-item-has-children');
            allDropdowns.forEach(function(item) {
                if (item !== menuItem) {
                    item.classList.remove('open');
                    item.classList.remove('highlighted');
                }
            });
            
            if (isCurrentlyOpen) {
                // Closing: Remove open to start animation, keep highlighted
                menuItem.classList.remove('open');
                // Keep highlighted class until animation completes
                
                // Listen for animation completion
                const handleTransitionEnd = function(event) {
                    // Only respond to max-height transition on this specific submenu
                    if (event.target === submenu && event.propertyName === 'max-height' && submenu.style.maxHeight === '0px') {
                        menuItem.classList.remove('highlighted');
                        submenu.removeEventListener('transitionend', handleTransitionEnd);
                    }
                };
                
                submenu.addEventListener('transitionend', handleTransitionEnd);
                
                // Fallback timeout in case transitionend doesn't fire
                setTimeout(function() {
                    menuItem.classList.remove('highlighted');
                    submenu.removeEventListener('transitionend', handleTransitionEnd);
                }, 350); // Slightly longer than CSS transition (300ms)
                
            } else {
                // Opening: Add both classes immediately
                menuItem.classList.add('open', 'highlighted');
            }
        }
    });
    
    // Close mobile menu when clicking on submenu links
    document.addEventListener('click', function(e) {
        if (e.target.matches('#mobile-menu .sub-menu a')) {
            closeMobileMenu();
        }
    });
});
</script>
</body>
</html>