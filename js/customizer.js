/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
    // Site title and description
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });
    
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Header text color
    wp.customize('header_textcolor', function(value) {
        value.bind(function(to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title, .site-description').css({
                    'clip': 'auto',
                    'position': 'relative'
                });
                $('.site-title a, .site-description').css({
                    'color': to
                });
            }
        });
    });

    // Footer tagline
    wp.customize('footer_tagline', function(value) {
        value.bind(function(to) {
            $('.footer-tagline').text(to);
        });
    });

    // Footer copyright
    wp.customize('footer_copyright', function(value) {
        value.bind(function(to) {
            $('.footer-copyright').text(to);
        });
    });

    // Hero background image
    wp.customize('hero_background_image', function(value) {
        value.bind(function(to) {
            if (to) {
                $('.hero-section').css('background-image', 'url(' + to + ')');
            } else {
                $('.hero-section').css('background-image', '');
            }
        });
    });

    // Hero height
    wp.customize('hero_height', function(value) {
        value.bind(function(to) {
            $('.hero-section').css('height', to + 'px');
        });
    });

    // Card texts
    wp.customize('getting_started_text', function(value) {
        value.bind(function(to) {
            $('.getting-started-text').html(to);
        });
    });

    wp.customize('latest_news_text', function(value) {
        value.bind(function(to) {
            $('.latest-news-text').html(to);
        });
    });

    wp.customize('events_text', function(value) {
        value.bind(function(to) {
            $('.events-text').html(to);
        });
    });

    wp.customize('courses_text', function(value) {
        value.bind(function(to) {
            $('.courses-text').html(to);
        });
    });

    // Theme colors
    wp.customize('wisdom_red_color', function(value) {
        value.bind(function(to) {
            $('<style id="wisdom-red-color">.text-wisdom-red { color: ' + to + ' !important; }</style>').appendTo('head');
            $('#wisdom-red-color').remove();
            $('<style id="wisdom-red-color">.text-wisdom-red { color: ' + to + ' !important; }</style>').appendTo('head');
        });
    });

    wp.customize('wisdom_purple_color', function(value) {
        value.bind(function(to) {
            $('<style id="wisdom-purple-color">.text-wisdom-purple { color: ' + to + ' !important; }</style>').appendTo('head');
            $('#wisdom-purple-color').remove();
            $('<style id="wisdom-purple-color">.text-wisdom-purple { color: ' + to + ' !important; }</style>').appendTo('head');
        });
    });

    wp.customize('wisdom_teal_color', function(value) {
        value.bind(function(to) {
            $('<style id="wisdom-teal-color">.text-wisdom-teal { color: ' + to + ' !important; }</style>').appendTo('head');
            $('#wisdom-teal-color').remove();
            $('<style id="wisdom-teal-color">.text-wisdom-teal { color: ' + to + ' !important; }</style>').appendTo('head');
        });
    });

})(jQuery);