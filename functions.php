<?php
/**
 * Advanced Rolloffs Theme Functions
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function advanced_rolloffs_setup() {
    // Add theme support for title tag
    add_theme_support( 'title-tag' );

    // Add theme support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add theme support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'advanced-rolloffs' ),
        'footer'  => __( 'Footer Menu', 'advanced-rolloffs' ),
    ) );

    // Add theme support for HTML5 markup
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'advanced_rolloffs_setup' );

/**
 * Enqueue Scripts and Styles
 */
function advanced_rolloffs_enqueue_assets() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'advanced-rolloffs-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap',
        array(),
        null
    );

    // Enqueue main stylesheet
    wp_enqueue_style(
        'advanced-rolloffs-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );

    // Enqueue main JavaScript file
    wp_enqueue_script(
        'advanced-rolloffs-script',
        get_template_directory_uri() . '/script.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'advanced_rolloffs_enqueue_assets' );

/**
 * Register Widget Areas
 */
function advanced_rolloffs_widgets_init() {
    // Footer Widget Area 1
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'advanced-rolloffs' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in the first footer column.', 'advanced-rolloffs' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Footer Widget Area 2
    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'advanced-rolloffs' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in the second footer column.', 'advanced-rolloffs' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Footer Widget Area 3
    register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'advanced-rolloffs' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in the third footer column.', 'advanced-rolloffs' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Footer Widget Area 4
    register_sidebar( array(
        'name'          => __( 'Footer Column 4', 'advanced-rolloffs' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in the fourth footer column.', 'advanced-rolloffs' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Footer Bottom Left - Copyright
    register_sidebar( array(
        'name'          => __( 'Footer Bottom - Copyright', 'advanced-rolloffs' ),
        'id'            => 'footer-bottom-left',
        'description'   => __( 'Add widgets here for the footer copyright text (left side of footer bottom).', 'advanced-rolloffs' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Footer Bottom Right - Links
    register_sidebar( array(
        'name'          => __( 'Footer Bottom - Links', 'advanced-rolloffs' ),
        'id'            => 'footer-bottom-right',
        'description'   => __( 'Add widgets here for footer bottom links (right side of footer bottom).', 'advanced-rolloffs' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'advanced_rolloffs_widgets_init' );

/**
 * Theme Customizer
 */
function advanced_rolloffs_customize_register( $wp_customize ) {
    // Add Header Settings Section
    $wp_customize->add_section( 'header_settings', array(
        'title'    => __( 'Header Settings', 'advanced-rolloffs' ),
        'priority' => 30,
    ) );

    // Header Button Text Setting
    $wp_customize->add_setting( 'header_button_text', array(
        'default'           => 'Call Now',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'header_button_text', array(
        'label'       => __( 'Header Button Text', 'advanced-rolloffs' ),
        'description' => __( 'Enter the text for the header call-to-action button.', 'advanced-rolloffs' ),
        'section'     => 'header_settings',
        'type'        => 'text',
    ) );

    // Header Button URL Setting
    $wp_customize->add_setting( 'header_button_url', array(
        'default'           => 'tel:+1234567890',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'header_button_url', array(
        'label'       => __( 'Header Button URL', 'advanced-rolloffs' ),
        'description' => __( 'Enter the URL for the header button (e.g., tel:+1234567890 or https://example.com/contact).', 'advanced-rolloffs' ),
        'section'     => 'header_settings',
        'type'        => 'url',
    ) );

    // Header Button Style Setting
    $wp_customize->add_setting( 'header_button_style', array(
        'default'           => 'button',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'header_button_style', array(
        'label'       => __( 'Header Button Style', 'advanced-rolloffs' ),
        'description' => __( 'Choose how the header button should be displayed.', 'advanced-rolloffs' ),
        'section'     => 'header_settings',
        'type'        => 'select',
        'choices'     => array(
            'button' => __( 'Show as Button', 'advanced-rolloffs' ),
            'hide'   => __( 'Hide Button', 'advanced-rolloffs' ),
        ),
    ) );

    // Logo Width Setting
    $wp_customize->add_setting( 'logo_width', array(
        'default'           => '250',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'logo_width', array(
        'label'       => __( 'Logo Width (px)', 'advanced-rolloffs' ),
        'description' => __( 'Set the logo width in pixels. Default is 250px.', 'advanced-rolloffs' ),
        'section'     => 'header_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 500,
            'step' => 5,
        ),
    ) );

    // Logo Height Setting
    $wp_customize->add_setting( 'logo_height', array(
        'default'           => '80',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'logo_height', array(
        'label'       => __( 'Logo Height (px)', 'advanced-rolloffs' ),
        'description' => __( 'Set the logo height in pixels. Default is 80px.', 'advanced-rolloffs' ),
        'section'     => 'header_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 30,
            'max'  => 200,
            'step' => 5,
        ),
    ) );
}
add_action( 'customize_register', 'advanced_rolloffs_customize_register' );

/**
 * Add Custom CSS for Logo Sizing
 */
function advanced_rolloffs_custom_logo_css() {
    $logo_width = get_theme_mod( 'logo_width', '250' );
    $logo_height = get_theme_mod( 'logo_height', '80' );

    $custom_css = "
        .logo-img,
        .custom-logo {
            width: auto;
            height: {$logo_height}px;
            max-width: {$logo_width}px;
        }
        .footer-logo,
        .footer-section .custom-logo {
            height: " . round( $logo_height * 0.75 ) . "px;
            max-width: " . round( $logo_width * 0.75 ) . "px;
        }
    ";

    wp_add_inline_style( 'advanced-rolloffs-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'advanced_rolloffs_custom_logo_css', 20 );

/**
 * Set content width
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}
