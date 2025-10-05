<?php

/**
 * Theme setup
 */
function bedrock_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'bedrock-theme'),
        'footer' => __('Footer Menu', 'bedrock-theme'),
    ]);
}
add_action('after_setup_theme', 'bedrock_theme_setup');

/**
 * Enqueue scripts and styles
 */
function bedrock_theme_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style(
        'bedrock-theme-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    // Enqueue bundled CSS
    if (file_exists(get_template_directory() . '/dist/main.css')) {
        wp_enqueue_style(
            'bedrock-theme-main',
            get_template_directory_uri() . '/dist/main.css',
            [],
            filemtime(get_template_directory() . '/dist/main.css')
        );
    }

    // Enqueue bundled JavaScript
    if (file_exists(get_template_directory() . '/dist/main.js')) {
        wp_enqueue_script(
            'bedrock-theme-main',
            get_template_directory_uri() . '/dist/main.js',
            [],
            filemtime(get_template_directory() . '/dist/main.js'),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'bedrock_theme_assets');

/**
 * Register widget areas
 */
function bedrock_theme_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'bedrock-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'bedrock-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'bedrock_theme_widgets_init');
