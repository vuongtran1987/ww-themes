<?php
/**
 * Wisdom Waypoints Theme Functions
 */

// Theme setup
function wisdom_waypoints_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');

    // Register navigation menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'wisdom-waypoints'),
        'mobile-menu' => __('Mobile Menu', 'wisdom-waypoints'),
        'footer-menu' => __('Footer Menu', 'wisdom-waypoints'),
    ));
}
add_action('after_setup_theme', 'wisdom_waypoints_setup');

// WooCommerce support
function wisdom_waypoints_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'wisdom_waypoints_woocommerce_setup');

// Enqueue scripts and styles
function wisdom_waypoints_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style('wisdom-waypoints-style', get_stylesheet_uri(), array(), '1.0.2');
    
    // Enqueue jQuery properly
    wp_enqueue_script('jquery');
    
    // Enqueue custom script
    wp_enqueue_script('wisdom-waypoints-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.1', true);
    
    // WooCommerce styles
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('wisdom-waypoints-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.css', array('wisdom-waypoints-style'), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'wisdom_waypoints_scripts');

// Customizer settings
function wisdom_waypoints_customize_register($wp_customize) {
    // Cards Section
    $wp_customize->add_section('wisdom_cards_section', array(
        'title' => __('Homepage Cards', 'wisdom-waypoints'),
        'priority' => 30,
    ));

    // Getting Started Card
    $wp_customize->add_setting('getting_started_text', array(
        'default' => 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('getting_started_text', array(
        'label' => __('Getting Started Text', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('getting_started_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('getting_started_link', array(
        'label' => __('Getting Started Link', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'url',
    ));

    // Latest News Card
    $wp_customize->add_setting('latest_news_text', array(
        'default' => 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et<br>omnis utem cus antiamenimo quamet',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('latest_news_text', array(
        'label' => __('Latest News Text', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('latest_news_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('latest_news_link', array(
        'label' => __('Latest News Link', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'url',
    ));

    // Events Card
    $wp_customize->add_setting('events_text', array(
        'default' => 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('events_text', array(
        'label' => __('Events Text', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('events_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('events_link', array(
        'label' => __('Events Link', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'url',
    ));

    // Courses Card
    $wp_customize->add_setting('courses_text', array(
        'default' => 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et<br>omnis utem cus antiamenimo quamet',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('courses_text', array(
        'label' => __('Courses Text', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('courses_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('courses_link', array(
        'label' => __('Courses Link', 'wisdom-waypoints'),
        'section' => 'wisdom_cards_section',
        'type' => 'url',
    ));

    // Footer Section
    $wp_customize->add_section('wisdom_footer_section', array(
        'title' => __('Footer Settings', 'wisdom-waypoints'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('footer_tagline', array(
        'default' => 'Inner work for outer chaos. Wisdom for the modern world.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_tagline', array(
        'label' => __('Footer Tagline', 'wisdom-waypoints'),
        'section' => 'wisdom_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'default' => 'Copyright © 2025 Wisdom Waypoints, a 501(c)(3) non-profit',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label' => __('Footer Copyright', 'wisdom-waypoints'),
        'section' => 'wisdom_footer_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'wisdom_waypoints_customize_register');

// Register widget areas
function wisdom_waypoints_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'wisdom-waypoints'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'wisdom-waypoints'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-8">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'wisdom-waypoints'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'wisdom-waypoints'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-bold text-white mb-3 font-minion">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'wisdom-waypoints'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'wisdom-waypoints'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-bold text-white mb-3 font-minion">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'wisdom-waypoints'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'wisdom-waypoints'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-bold text-white mb-3 font-minion">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'wisdom_waypoints_widgets_init');

// Add ACF support for custom fields
function wisdom_waypoints_acf_init() {
    // Check if ACF is active
    if (function_exists('acf_add_local_field_group')) {
        
        // Home Page Template Fields
        acf_add_local_field_group(array(
            'key' => 'group_home_page_fields',
            'title' => 'Home Page Settings',
            'fields' => array(
                // Banner Settings
                array(
                    'key' => 'field_banner_type',
                    'label' => 'Banner Type',
                    'name' => 'banner_type',
                    'type' => 'radio',
                    'choices' => array(
                        'image' => 'Featured Image',
                        'video' => 'Video'
                    ),
                    'default_value' => 'image',
                    'layout' => 'horizontal',
                ),
                array(
                    'key' => 'field_banner_video',
                    'label' => 'Banner Video',
                    'name' => 'banner_video',
                    'type' => 'file',
                    'return_format' => 'array',
                    'mime_types' => 'mp4,webm,ogg',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_banner_type',
                                'operator' => '==',
                                'value' => 'video',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_banner_height',
                    'label' => 'Banner Height (px)',
                    'name' => 'banner_height',
                    'type' => 'number',
                    'default_value' => 500,
                    'min' => 300,
                    'max' => 800,
                ),
                array(
                    'key' => 'field_banner_title',
                    'label' => 'Banner Title',
                    'name' => 'banner_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_banner_subtitle',
                    'label' => 'Banner Subtitle',
                    'name' => 'banner_subtitle',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                
                // Box 1 Fields
                array(
                    'key' => 'field_box1_title',
                    'label' => 'Box 1 Title',
                    'name' => 'box1_title',
                    'type' => 'text',
                    'default_value' => 'Getting Started',
                ),
                array(
                    'key' => 'field_box1_content',
                    'label' => 'Box 1 Content',
                    'name' => 'box1_content',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_box1_link_text',
                    'label' => 'Box 1 Link Text',
                    'name' => 'box1_link_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_box1_link_url',
                    'label' => 'Box 1 Link URL',
                    'name' => 'box1_link_url',
                    'type' => 'url',
                ),
                
                // Box 2 Fields
                array(
                    'key' => 'field_box2_title',
                    'label' => 'Box 2 Title',
                    'name' => 'box2_title',
                    'type' => 'text',
                    'default_value' => 'Latest News',
                ),
                array(
                    'key' => 'field_box2_content',
                    'label' => 'Box 2 Content',
                    'name' => 'box2_content',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_box2_link_text',
                    'label' => 'Box 2 Link Text',
                    'name' => 'box2_link_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_box2_link_url',
                    'label' => 'Box 2 Link URL',
                    'name' => 'box2_link_url',
                    'type' => 'url',
                ),
                
                // Box 3 Fields
                array(
                    'key' => 'field_box3_title',
                    'label' => 'Box 3 Title',
                    'name' => 'box3_title',
                    'type' => 'text',
                    'default_value' => 'Events',
                ),
                array(
                    'key' => 'field_box3_content',
                    'label' => 'Box 3 Content',
                    'name' => 'box3_content',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_box3_link_text',
                    'label' => 'Box 3 Link Text',
                    'name' => 'box3_link_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_box3_link_url',
                    'label' => 'Box 3 Link URL',
                    'name' => 'box3_link_url',
                    'type' => 'url',
                ),
                
                // Box 4 Fields
                array(
                    'key' => 'field_box4_title',
                    'label' => 'Box 4 Title',
                    'name' => 'box4_title',
                    'type' => 'text',
                    'default_value' => 'Courses',
                ),
                array(
                    'key' => 'field_box4_content',
                    'label' => 'Box 4 Content',
                    'name' => 'box4_content',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_box4_link_text',
                    'label' => 'Box 4 Link Text',
                    'name' => 'box4_link_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_box4_link_url',
                    'label' => 'Box 4 Link URL',
                    'name' => 'box4_link_url',
                    'type' => 'url',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-home.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
        ));
    }
}
add_action('acf/init', 'wisdom_waypoints_acf_init');

// Fallback functions if ACF is not installed
if (!function_exists('get_field')) {
    function get_field($selector, $post_id = false, $format_value = true) {
        return get_post_meta($post_id ?: get_the_ID(), $selector, true);
    }
}

// Custom comment callback
function wisdom_waypoints_comment($comment, $args, $depth) {
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent', $comment); ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body bg-gray-50 p-6 rounded-lg">
    <?php endif; ?>
    
    <div class="comment-author vcard flex items-start space-x-4">
        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'w-12 h-12 rounded-full')); ?>
        <div class="comment-content flex-1">
            <div class="comment-meta commentmetadata mb-2">
                <cite class="fn font-bold text-wisdom-purple font-avenir"><?php comment_author_link(); ?></cite>
                <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>" class="text-sm text-gray-500 ml-2 font-avenir">
                    <?php printf(__('%1$s at %2$s', 'wisdom-waypoints'), get_comment_date(), get_comment_time()); ?>
                </a>
                <?php edit_comment_link(__('(Edit)', 'wisdom-waypoints'), '  ', ''); ?>
            </div>

            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation text-sm text-yellow-600 font-avenir">
                    <?php _e('Your comment is awaiting moderation.', 'wisdom-waypoints'); ?>
                </em>
                <br />
            <?php endif; ?>

            <div class="comment-text font-minion text-gray-700">
                <?php comment_text(); ?>
            </div>

            <div class="reply mt-3">
                <?php comment_reply_link(array_merge($args, array(
                    'add_below' => $add_below, 
                    'depth' => $depth, 
                    'max_depth' => $args['max_depth'],
                    'class' => 'text-wisdom-red hover:text-red-800 transition-colors font-avenir text-sm'
                ))); ?>
            </div>
        </div>
    </div>
    
    <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?>
    <?php
}

// Add image sizes
function wisdom_waypoints_image_sizes() {
    add_image_size('wisdom-card', 400, 300, true);
    add_image_size('wisdom-hero', 1200, 400, true);
}
add_action('after_setup_theme', 'wisdom_waypoints_image_sizes');

// Fallback menu for primary navigation
function wisdom_waypoints_primary_fallback_menu() {
    echo '<ul class="nav-menu flex justify-center space-x-12">';
    echo '<li><a href="' . home_url('/about') . '" class="nav-item">About</a></li>';
    echo '<li><a href="' . home_url('/blog') . '" class="nav-item">Blog</a></li>';
    echo '<li><a href="' . home_url('/events') . '" class="nav-item">Events</a></li>';
    echo '<li class="menu-item-has-children">';
    echo '<a href="' . home_url('/courses') . '" class="nav-item has-dropdown">Courses';
    echo '<svg class="dropdown-arrow w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>';
    echo '</svg></a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . home_url('/courses/fourth-way') . '">Fourth Way</a></li>';
    echo '<li class="menu-item-has-children">';
    echo '<a href="' . home_url('/courses/wisdom-liturgy') . '">Wisdom Liturgy</a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . home_url('/courses/wisdom-liturgy/morning-prayer') . '">Morning Prayer</a></li>';
    echo '<li><a href="' . home_url('/courses/wisdom-liturgy/evening-prayer') . '">Evening Prayer</a></li>';
    echo '<li><a href="' . home_url('/courses/wisdom-liturgy/compline') . '">Compline</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . home_url('/courses/wisdom-christianity') . '">Wisdom Christianity</a></li>';
    echo '<li><a href="' . home_url('/courses/wisdom-in-the-world') . '">Wisdom in the World</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . home_url('/community') . '" class="nav-item">Community</a></li>';
    echo '<li><a href="' . home_url('/practice') . '" class="nav-item">Practice</a></li>';
    echo '<li><a href="' . home_url('/resources') . '" class="nav-item">Resources</a></li>';
    echo '<li><a href="' . home_url('/donate') . '" class="nav-item donate">Donate</a></li>';
    echo '</ul>';
}

// Fallback menu for mobile navigation
function wisdom_waypoints_mobile_fallback_menu() {
    echo '<ul class="mobile-nav-list">';
    echo '<li><a href="' . home_url('/about') . '">About</a></li>';
    echo '<li><a href="' . home_url('/blog') . '">Blog</a></li>';
    echo '<li><a href="' . home_url('/events') . '">Events</a></li>';
    echo '<li class="mobile-dropdown-item">';
    echo '<div class="mobile-item-wrapper">';
    echo '<a href="' . home_url('/courses') . '">Courses</a>';
    echo '<button type="button" class="mobile-dropdown-toggle">';
    echo '<svg class="dropdown-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>';
    echo '</svg>';
    echo '</button>';
    echo '</div>';
    echo '<ul class="mobile-dropdown-menu">';
    echo '<li><a href="' . home_url('/courses/fourth-way') . '">Fourth Way</a></li>';
    echo '<li class="mobile-dropdown-item">';
    echo '<div class="mobile-item-wrapper">';
    echo '<a href="' . home_url('/courses/wisdom-liturgy') . '">Wisdom Liturgy</a>';
    echo '<button type="button" class="mobile-dropdown-toggle">';
    echo '<svg class="dropdown-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>';
    echo '</svg>';
    echo '</button>';
    echo '</div>';
    echo '<ul class="mobile-dropdown-menu">';
    echo '<li><a href="' . home_url('/courses/wisdom-liturgy/morning-prayer') . '">Morning Prayer</a></li>';
    echo '<li><a href="' . home_url('/courses/wisdom-liturgy/evening-prayer') . '">Evening Prayer</a></li>';
    echo '<li><a href="' . home_url('/courses/wisdom-liturgy/compline') . '">Compline</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . home_url('/courses/wisdom-christianity') . '">Wisdom Christianity</a></li>';
    echo '<li><a href="' . home_url('/courses/wisdom-in-the-world') . '">Wisdom in the World</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . home_url('/community') . '">Community</a></li>';
    echo '<li><a href="' . home_url('/practice') . '">Practice</a></li>';
    echo '<li><a href="' . home_url('/resources') . '">Resources</a></li>';
    echo '<li><a href="' . home_url('/donate') . '" class="donate">Donate</a></li>';
    echo '</ul>';
}

// Custom walker for footer menu with separators
class Wisdom_Waypoints_Footer_Walker extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        // No sub-menus in footer
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        // No sub-menus in footer
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Add separator before each item except the first
        if ($item->menu_order > 1) {
            $output .= '<span class="footer-separator">•</span>';
        }
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $output .= '<a' . $attributes .'>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        // Nothing to close for inline menu
    }
}

// Fallback menu for footer navigation
function wisdom_waypoints_footer_fallback_menu() {
    echo '<a href="' . home_url('/subscribe') . '">Subscribe</a>';
    echo '<span class="footer-separator">•</span>';
    echo '<a href="' . home_url('/donate') . '">Donate</a>';
    echo '<span class="footer-separator">•</span>';
    echo '<a href="' . home_url('/contact') . '">Contact</a>';
}

// Custom walker for navigation menus with dropdown support
class Wisdom_Waypoints_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Check if item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . ' class="nav-item' . ($has_children ? ' has-dropdown' : '') . '">';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown arrow for items with children
        if ($has_children) {
            $item_output .= ' <svg class="dropdown-arrow w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

// Custom walker for mobile navigation menus with dropdown support

// Text domain for translations
function wisdom_waypoints_textdomain() {
    load_theme_textdomain('wisdom-waypoints', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'wisdom_waypoints_textdomain');

// Remove admin bar for non-admin users
function wisdom_waypoints_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'wisdom_waypoints_remove_admin_bar');

// WooCommerce customizations
if (class_exists('WooCommerce')) {
    // Remove WooCommerce default styles
    add_filter('woocommerce_enqueue_styles', '__return_empty_array');
    
    // Change number of products per row
    function wisdom_waypoints_woocommerce_loop_columns() {
        return 3;
    }
    add_filter('loop_shop_columns', 'wisdom_waypoints_woocommerce_loop_columns');
    
    // Change number of products per page
    function wisdom_waypoints_woocommerce_products_per_page() {
        return 12;
    }
    add_filter('loop_shop_per_page', 'wisdom_waypoints_woocommerce_products_per_page');
    
    // Remove WooCommerce breadcrumbs (we'll use our own)
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    
    // Customize add to cart button text
    function wisdom_waypoints_woocommerce_add_to_cart_text() {
        return __('Add to Cart', 'wisdom-waypoints');
    }
    add_filter('woocommerce_product_add_to_cart_text', 'wisdom_waypoints_woocommerce_add_to_cart_text');
    
    // Customize WooCommerce wrapper
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    
    function wisdom_waypoints_woocommerce_wrapper_start() {
        echo '<main id="main" class="site-main woocommerce-main">';
        echo '<div class="container mx-auto px-4 py-12">';
    }
    add_action('woocommerce_before_main_content', 'wisdom_waypoints_woocommerce_wrapper_start', 10);
    
    function wisdom_waypoints_woocommerce_wrapper_end() {
        echo '</div>';
        echo '</main>';
    }
    add_action('woocommerce_after_main_content', 'wisdom_waypoints_woocommerce_wrapper_end', 10);
    
    // Add cart icon to header
    function wisdom_waypoints_woocommerce_cart_link() {
        if (is_admin() || !function_exists('WC')) return;
        
        $cart_count = WC()->cart->get_cart_contents_count();
        $cart_url = wc_get_cart_url();
        
        echo '<a href="' . esc_url($cart_url) . '" class="cart-icon relative text-wisdom-red hover:text-red-800 transition-colors">';
        echo '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
        echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0h15M17 21a2 2 0 100-4 2 2 0 000 4zM9 21a2 2 0 100-4 2 2 0 000 4z"></path>';
        echo '</svg>';
        if ($cart_count > 0) {
            echo '<span class="cart-count absolute -top-2 -right-2 bg-wisdom-red text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">' . $cart_count . '</span>';
        }
        echo '</a>';
    }
    
    // Update cart count via AJAX
    function wisdom_waypoints_woocommerce_add_to_cart_fragments($fragments) {
        $cart_count = WC()->cart->get_cart_contents_count();
        $cart_url = wc_get_cart_url();
        
        ob_start();
        echo '<a href="' . esc_url($cart_url) . '" class="cart-icon relative text-wisdom-red hover:text-red-800 transition-colors">';
        echo '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
        echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0h15M17 21a2 2 0 100-4 2 2 0 000 4zM9 21a2 2 0 100-4 2 2 0 000 4z"></path>';
        echo '</svg>';
        if ($cart_count > 0) {
            echo '<span class="cart-count absolute -top-2 -right-2 bg-wisdom-red text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">' . $cart_count . '</span>';
        }
        echo '</a>';
        $fragments['.cart-icon'] = ob_get_clean();
        
        return $fragments;
    }
    add_filter('woocommerce_add_to_cart_fragments', 'wisdom_waypoints_woocommerce_add_to_cart_fragments');
}
?>