<?php
/**
 * Wisdom Waypoints Theme Customizer
 */

function wisdom_waypoints_customize_register($wp_customize) {
    // Remove default sections we don't need
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');

    // Site Identity enhancements
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    // Header Settings
    $wp_customize->add_section('wisdom_header_section', array(
        'title' => __('Header Settings', 'wisdom-waypoints'),
        'priority' => 25,
    ));

    $wp_customize->add_setting('show_my_account', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('show_my_account', array(
        'label' => __('Show "My Account" Link', 'wisdom-waypoints'),
        'section' => 'wisdom_header_section',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('my_account_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_account_url', array(
        'label' => __('My Account URL', 'wisdom-waypoints'),
        'section' => 'wisdom_header_section',
        'type' => 'url',
    ));

    // Hero Section
    $wp_customize->add_section('wisdom_hero_section', array(
        'title' => __('Hero Section', 'wisdom-waypoints'),
        'priority' => 26,
    ));

    $wp_customize->add_setting('hero_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => __('Hero Background Image', 'wisdom-waypoints'),
        'section' => 'wisdom_hero_section',
        'settings' => 'hero_background_image',
    )));

    $wp_customize->add_setting('hero_height', array(
        'default' => '360',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('hero_height', array(
        'label' => __('Hero Height (px)', 'wisdom-waypoints'),
        'section' => 'wisdom_hero_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 200,
            'max' => 800,
            'step' => 10,
        ),
    ));

    // Cards Section (existing code)
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

    // Colors Section
    $wp_customize->add_section('wisdom_colors_section', array(
        'title' => __('Theme Colors', 'wisdom-waypoints'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('wisdom_red_color', array(
        'default' => '#962017',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wisdom_red_color', array(
        'label' => __('Wisdom Red', 'wisdom-waypoints'),
        'section' => 'wisdom_colors_section',
    )));

    $wp_customize->add_setting('wisdom_purple_color', array(
        'default' => '#663366',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wisdom_purple_color', array(
        'label' => __('Wisdom Purple', 'wisdom-waypoints'),
        'section' => 'wisdom_colors_section',
    )));

    $wp_customize->add_setting('wisdom_teal_color', array(
        'default' => '#203f41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wisdom_teal_color', array(
        'label' => __('Wisdom Teal', 'wisdom-waypoints'),
        'section' => 'wisdom_colors_section',
    )));
}
add_action('customize_register', 'wisdom_waypoints_customize_register');

// Bind JS handlers to instantly live-preview changes
function wisdom_waypoints_customize_preview_js() {
    wp_enqueue_script('wisdom-waypoints-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '1.0.0', true);
}
add_action('customize_preview_init', 'wisdom_waypoints_customize_preview_js');