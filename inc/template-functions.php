<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

// Add a pingback url auto-discovery header for single posts, pages, or attachments
function wisdom_waypoints_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'wisdom_waypoints_pingback_header');

// Add custom body classes
function wisdom_waypoints_body_classes($classes) {
    // Add class of hfeed to non-singular pages
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Add class of no-sidebar when there is no sidebar present
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Add class for mobile menu
    $classes[] = 'has-mobile-menu';

    return $classes;
}
add_filter('body_class', 'wisdom_waypoints_body_classes');

// Custom excerpt length
function wisdom_waypoints_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'wisdom_waypoints_excerpt_length', 999);

// Custom excerpt more
function wisdom_waypoints_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wisdom_waypoints_excerpt_more');

// Add custom logo support
function wisdom_waypoints_custom_logo_setup() {
    $defaults = array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'wisdom_waypoints_custom_logo_setup');

// Custom post navigation
function wisdom_waypoints_post_navigation() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if (!$prev_post && !$next_post) {
        return;
    }
    ?>
    <nav class="post-navigation flex justify-between items-center py-8 border-t border-gray-200 mt-8">
        <?php if ($prev_post) : ?>
            <div class="nav-previous flex-1">
                <a href="<?php echo get_permalink($prev_post); ?>" class="flex items-center text-wisdom-red hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <div>
                        <div class="text-sm text-gray-500 font-avenir"><?php _e('Previous Post', 'wisdom-waypoints'); ?></div>
                        <div class="font-minion"><?php echo get_the_title($prev_post); ?></div>
                    </div>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($next_post) : ?>
            <div class="nav-next flex-1 text-right">
                <a href="<?php echo get_permalink($next_post); ?>" class="flex items-center justify-end text-wisdom-red hover:text-red-800 transition-colors">
                    <div>
                        <div class="text-sm text-gray-500 font-avenir"><?php _e('Next Post', 'wisdom-waypoints'); ?></div>
                        <div class="font-minion"><?php echo get_the_title($next_post); ?></div>
                    </div>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </nav>
    <?php
}

// Custom pagination
function wisdom_waypoints_pagination() {
    global $wp_query;

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);

    // Add current page to the array
    if ($paged >= 1) {
        $links[] = $paged;
    }

    // Add the pages around the current page to the array
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav class="pagination flex justify-center items-center space-x-2 mt-12">' . "\n";

    // Previous Post Link
    if (get_previous_posts_link()) {
        printf('<div class="prev">%s</div>' . "\n", get_previous_posts_link(__('Previous', 'wisdom-waypoints')));
    }

    // Link to first page, plus ellipses if necessary
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' current' : '';
        printf('<div class="page-number%s"><a href="%s">%s</a></div>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links)) {
            echo '<div class="ellipses">…</div>';
        }
    }

    // Link to current page, plus 2 pages in either direction if necessary
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' current' : '';
        printf('<div class="page-number%s"><a href="%s">%s</a></div>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    // Link to last page, plus ellipses if necessary
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<div class="ellipses">…</div>' . "\n";
        }

        $class = $paged == $max ? ' current' : '';
        printf('<div class="page-number%s"><a href="%s">%s</a></div>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    // Next Post Link
    if (get_next_posts_link()) {
        printf('<div class="next">%s</div>' . "\n", get_next_posts_link(__('Next', 'wisdom-waypoints')));
    }

    echo '</nav>' . "\n";
}

// Add theme support for responsive embeds
function wisdom_waypoints_responsive_embeds() {
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'wisdom_waypoints_responsive_embeds');

// Custom tag cloud widget
function wisdom_waypoints_tag_cloud_widget($args) {
    $args['largest'] = 18;
    $args['smallest'] = 12;
    $args['unit'] = 'px';
    return $args;
}
add_filter('widget_tag_cloud_args', 'wisdom_waypoints_tag_cloud_widget');