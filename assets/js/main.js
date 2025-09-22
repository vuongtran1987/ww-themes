jQuery(document).ready(function($) {
    // Mobile menu toggle
    $('#mobile-menu-btn').on('click', function() {
        $('#mobile-menu').addClass('active');
        $('#mobile-overlay').addClass('active');
        $('body').css('overflow', 'hidden');
    });
    
    $('#mobile-menu-close, #mobile-overlay').on('click', function() {
        $('#mobile-menu').removeClass('active');
        $('#mobile-overlay').removeClass('active');
        $('body').css('overflow', '');
    });
    
    // Mobile dropdown toggles
    $('.mobile-dropdown-toggle').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var $menu = $(this).siblings('.mobile-dropdown-menu');
        var $arrow = $(this);
        
        // Close other open dropdowns
        $('.mobile-dropdown-menu').not($menu).removeClass('active');
        $('.mobile-dropdown-toggle').not($arrow).removeClass('rotated').text('+');
        
        // Toggle current dropdown
        $menu.toggleClass('active');
        if ($menu.hasClass('active')) {
            $arrow.addClass('rotated').text('−');
        } else {
            $arrow.removeClass('rotated').text('+');
        }
    });
    
    // Desktop dropdown hover
    $('.menu-item-has-children').hover(
        function() {
            $(this).find('> .sub-menu').show();
        },
        function() {
            $(this).find('.sub-menu').hide();
        }
    );
    
    // Third level dropdown for nested items
    $('.sub-menu .menu-item-has-children').hover(
        function() {
            $(this).find('> .sub-menu').show();
        },
        function() {
            $(this).find('> .sub-menu').hide();
        }
    );
    
    // Close mobile menu when clicking on links
    $('.mobile-nav-menu a').on('click', function() {
        if (!$(this).parent().hasClass('mobile-dropdown')) {
            $('#mobile-menu').removeClass('active');
            $('#mobile-overlay').removeClass('active');
            $('body').css('overflow', '');
        }
    });
    
    // Prevent body scroll when mobile menu is open
    $('#mobile-menu').on('touchmove', function(e) {
        e.stopPropagation();
    });
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
});