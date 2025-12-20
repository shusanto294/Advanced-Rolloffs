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

    // Add theme support for automatic feed links
    add_theme_support( 'automatic-feed-links' );

    // Add theme support for post formats
    add_theme_support( 'post-formats', array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add theme support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) );

    // Add theme support for editor styles
    add_theme_support( 'editor-styles' );

    // Add theme support for responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Add theme support for wide and full alignment
    add_theme_support( 'align-wide' );

    // Add theme support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add theme support for core block patterns
    add_theme_support( 'core-block-patterns' );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'advanced-rolloffs' ),
        'footer'  => __( 'Footer Menu', 'advanced-rolloffs' ),
        'mobile'  => __( 'Mobile Menu', 'advanced-rolloffs' ),
    ) );

    // Add theme support for HTML5 markup
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
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

/**
 * SEO Functions
 *
 * This theme includes comprehensive SEO features that work seamlessly with or without SEO plugins:
 *
 * 1. Meta Tags: Description, keywords, robots, canonical URLs
 * 2. Open Graph: Full Facebook/social media integration
 * 3. Twitter Cards: Proper Twitter sharing metadata
 * 4. Schema.org Structured Data: Article, WebPage, Organization schemas
 * 5. Semantic HTML: Proper microdata markup (itemprop attributes)
 * 6. XML Sitemap: Auto-generated at /sitemap.xml
 * 7. Breadcrumbs: SEO-friendly navigation with fallback
 * 8. Image Optimization: Auto alt tags, lazy loading, dimensions
 * 9. Performance: Preconnect, DNS prefetch for external resources
 *
 * Plugin Detection: Automatically disables when Yoast SEO, Rank Math, All in One SEO, or SEOPress is active
 */

// Generate SEO-friendly excerpt
function advanced_rolloffs_get_seo_excerpt( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    // First, try to get the manual excerpt
    $excerpt = get_the_excerpt( $post_id );

    // If no manual excerpt, create one from content
    if ( empty( $excerpt ) ) {
        $content = get_post_field( 'post_content', $post_id );
        $excerpt = wp_trim_words( wp_strip_all_tags( $content ), 30, '...' );
    }

    // Clean it up
    $excerpt = wp_strip_all_tags( $excerpt );
    $excerpt = str_replace( array( "\r", "\n", "\t" ), ' ', $excerpt );
    $excerpt = preg_replace( '/\s+/', ' ', $excerpt ); // Remove extra spaces

    // Limit to 160 characters for optimal SEO
    if ( strlen( $excerpt ) > 160 ) {
        $excerpt = substr( $excerpt, 0, 157 ) . '...';
    }

    return $excerpt;
}

// Add SEO meta tags to head
function advanced_rolloffs_seo_meta_tags() {
    // Don't add custom meta if Yoast SEO or other major SEO plugins are active
    // Check if SEO plugin classes/functions exist instead of is_plugin_active
    if ( defined('WPSEO_VERSION') || // Yoast SEO
         class_exists('AIOSEO\\Plugin\\AIOSEO') || // All in One SEO
         class_exists('RankMath') || // Rank Math
         function_exists('seopress_activation') ) { // SEOPress
        return;
    }
    
    global $post;

    // Basic meta tags
    if ( is_singular() && ! is_front_page() ) {
        $title = single_post_title( '', false );
        $description = advanced_rolloffs_get_seo_excerpt();
        $url = get_permalink();
        $image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '';
    } else {
        $title = get_bloginfo( 'name' ) . ( is_front_page() ? '' : ' - ' . get_bloginfo( 'description' ) );
        $description = get_bloginfo( 'description' );
        $url = home_url( '/' );
        $image = get_header_image() ? get_header_image() : '';
    }
    
    // Meta description
    if ( ! empty( $description ) ) {
        echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $description ) ) . '">' . "\n";
    }
    
    // Meta keywords (optional, less important for modern SEO)
    if ( is_singular() && has_tag() ) {
        $tags = get_the_tags();
        if ( $tags ) {
            $keywords = array();
            foreach ( $tags as $tag ) {
                $keywords[] = $tag->name;
            }
            echo '<meta name="keywords" content="' . esc_attr( implode( ', ', $keywords ) ) . '">' . "\n";
        }
    }
    
    // Open Graph meta tags
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( wp_strip_all_tags( $description ) ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";
    echo '<meta property="og:type" content="' . ( is_singular() ? 'article' : 'website' ) . '">' . "\n";
    
    if ( ! empty( $image ) ) {
        echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
        echo '<meta property="og:image:width" content="1200">' . "\n";
        echo '<meta property="og:image:height" content="630">' . "\n";
    }
    
    echo '<meta property="og:locale" content="' . esc_attr( get_locale() ) . '">' . "\n";
    
    // Twitter Card meta tags
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr( wp_strip_all_tags( $description ) ) . '">' . "\n";
    
    if ( ! empty( $image ) ) {
        echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
    }
    
    // Canonical URL
    if ( is_singular() ) {
        echo '<link rel="canonical" href="' . esc_url( get_permalink() ) . '">' . "\n";
    } elseif ( is_home() || is_front_page() ) {
        echo '<link rel="canonical" href="' . esc_url( home_url( '/' ) ) . '">' . "\n";
    }
    
    // Robots meta tag
    $robots = 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1';
    
    if ( is_404() || is_search() ) {
        $robots = 'noindex, nofollow';
    }
    
    echo '<meta name="robots" content="' . esc_attr( $robots ) . '">' . "\n";
    
    // Author and publisher info
    if ( is_singular() && get_the_author_meta( 'description' ) ) {
        echo '<link rel="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . "\n";
    }
    
    // Schema.org structured data
    advanced_rolloffs_structured_data();
}
add_action( 'wp_head', 'advanced_rolloffs_seo_meta_tags', 1 );

// Structured Data (Schema.org)
function advanced_rolloffs_structured_data() {
    global $post;

    // Check if SEO plugin is handling structured data
    if ( defined('WPSEO_VERSION') || class_exists('AIOSEO\\Plugin\\AIOSEO') || class_exists('RankMath') ) {
        return;
    }

    if ( is_front_page() ) {
        // Organization schema
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => get_bloginfo( 'name' ),
            'description' => get_bloginfo( 'description' ),
            'url' => home_url( '/' ),
            'logo' => array(
                '@type' => 'ImageObject',
                'url' => has_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : get_template_directory_uri() . '/img/Logo.png',
                'width' => 250,
                'height' => 80,
            ),
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                'telephone' => '+1-317-564-3094',
                'contactType' => 'customer service',
                'availableLanguage' => 'English',
            ),
            'address' => array(
                '@type' => 'PostalAddress',
                'addressLocality' => 'Indianapolis',
                'addressRegion' => 'IN',
                'addressCountry' => 'US',
            ),
            'sameAs' => array(),
        );

        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";

    } elseif ( is_singular() && 'post' === get_post_type() ) {
        // Article schema for blog posts
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title(),
            'description' => get_the_excerpt() ? wp_strip_all_tags( get_the_excerpt() ) : wp_trim_words( wp_strip_all_tags( get_the_content() ), 30 ),
            'datePublished' => get_the_date( 'c' ),
            'dateModified' => get_the_modified_date( 'c' ),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author(),
                'url' => get_author_posts_url( get_the_author_meta( 'ID' ) ),
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo( 'name' ),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => has_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : get_template_directory_uri() . '/img/Logo.png',
                ),
            ),
            'mainEntityOfPage' => array(
                '@type' => 'WebPage',
                '@id' => get_permalink(),
            ),
        );

        // Add featured image
        if ( has_post_thumbnail() ) {
            $image_id = get_post_thumbnail_id();
            $image_data = wp_get_attachment_image_src( $image_id, 'full' );
            $schema['image'] = array(
                '@type' => 'ImageObject',
                'url' => $image_data[0],
                'width' => $image_data[1],
                'height' => $image_data[2],
            );
        }

        // Add article body (first 500 characters)
        $content = wp_strip_all_tags( get_the_content() );
        if ( ! empty( $content ) ) {
            $schema['articleBody'] = wp_trim_words( $content, 100 );
        }

        // Add word count
        $word_count = str_word_count( wp_strip_all_tags( get_the_content() ) );
        if ( $word_count > 0 ) {
            $schema['wordCount'] = $word_count;
        }

        // Add categories as keywords
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $keywords = array();
            foreach ( $categories as $category ) {
                $keywords[] = $category->name;
            }
            $schema['keywords'] = implode( ', ', $keywords );
        }

        // Add tags
        $tags = get_the_tags();
        if ( ! empty( $tags ) ) {
            $tag_names = array();
            foreach ( $tags as $tag ) {
                $tag_names[] = $tag->name;
            }
            if ( isset( $schema['keywords'] ) ) {
                $schema['keywords'] .= ', ' . implode( ', ', $tag_names );
            } else {
                $schema['keywords'] = implode( ', ', $tag_names );
            }
        }

        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";

    } elseif ( is_singular() && 'page' === get_post_type() ) {
        // WebPage schema
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => get_the_title(),
            'description' => get_the_excerpt() ? wp_strip_all_tags( get_the_excerpt() ) : wp_trim_words( wp_strip_all_tags( get_the_content() ), 30 ),
            'url' => get_permalink(),
            'datePublished' => get_the_date( 'c' ),
            'dateModified' => get_the_modified_date( 'c' ),
            'isPartOf' => array(
                '@type' => 'WebSite',
                'name' => get_bloginfo( 'name' ),
                'url' => home_url( '/' ),
            ),
        );

        if ( has_post_thumbnail() ) {
            $image_id = get_post_thumbnail_id();
            $image_data = wp_get_attachment_image_src( $image_id, 'full' );
            $schema['image'] = array(
                '@type' => 'ImageObject',
                'url' => $image_data[0],
                'width' => $image_data[1],
                'height' => $image_data[2],
            );
        }

        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
    }
}

// Add breadcrumb support
function advanced_rolloffs_breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<nav class="breadcrumbs" aria-label="breadcrumb"><p id="breadcrumbs">', '</p></nav>' );
    } elseif ( function_exists('rank_math_the_breadcrumbs') ) {
        rank_math_the_breadcrumbs();
    } else {
        // Custom breadcrumbs
        $breadcrumbs = array();
        $breadcrumbs[] = array( 'url' => home_url('/'), 'text' => 'Home' );
        
        if ( is_category() || is_tag() || is_tax() ) {
            $term = get_queried_object();
            $breadcrumbs[] = array( 'url' => get_term_link( $term ), 'text' => single_term_title( '', false ) );
        } elseif ( is_singular() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( $post_type && $post_type->has_archive ) {
                $breadcrumbs[] = array( 'url' => get_post_type_archive_link( get_post_type() ), 'text' => $post_type->labels->name );
            }
            $breadcrumbs[] = array( 'url' => get_permalink(), 'text' => get_the_title() );
        } elseif ( is_page() && ! is_front_page() ) {
            $ancestors = get_post_ancestors( get_the_ID() );
            if ( $ancestors ) {
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor_id ) {
                    $breadcrumbs[] = array( 'url' => get_permalink( $ancestor_id ), 'text' => get_the_title( $ancestor_id ) );
                }
            }
            $breadcrumbs[] = array( 'url' => get_permalink(), 'text' => get_the_title() );
        }
        
        echo '<nav class="breadcrumbs" aria-label="breadcrumb"><ol class="breadcrumb-list">';
        foreach ( $breadcrumbs as $index => $breadcrumb ) {
            $is_last = $index === count( $breadcrumbs ) - 1;
            if ( $is_last ) {
                echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html( $breadcrumb['text'] ) . '</li>';
            } else {
                echo '<li class="breadcrumb-item"><a href="' . esc_url( $breadcrumb['url'] ) . '">' . esc_html( $breadcrumb['text'] ) . '</a></li>';
            }
        }
        echo '</ol></nav>';
    }
}

// Add SEO-friendly image attributes
function advanced_rolloffs_optimize_images( $attr, $attachment, $size ) {
    if ( ! isset( $attr['alt'] ) || empty( $attr['alt'] ) ) {
        $attr['alt'] = get_post_field( 'post_excerpt', $attachment->ID );
        if ( empty( $attr['alt'] ) ) {
            $attr['alt'] = get_post_field( 'post_title', $attachment->ID );
        }
    }
    
    // Add loading="lazy" for performance
    $attr['loading'] = 'lazy';
    
    // Add width and height for aspect ratio preservation
    if ( ! isset( $attr['width'] ) || ! isset( $attr['height'] ) ) {
        $image_src = wp_get_attachment_image_src( $attachment->ID, $size );
        if ( $image_src ) {
            $attr['width'] = $image_src[1];
            $attr['height'] = $image_src[2];
        }
    }
    
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'advanced_rolloffs_optimize_images', 10, 3 );

// SEO-friendly menu Walker
class Advanced_Rolloffs_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $output .= "<li class='nav-item " .  implode(" ", $item->classes) . "'>";

        // Add span for current menu item
        if ( in_array( 'current-menu-item', $item->classes ) ) {
            $output .= "<span class='sr-only'>Current page: </span>";
        }

        // Build the target attribute if set
        $target = '';
        if ( ! empty( $item->target ) && '_blank' === $item->target ) {
            $target = ' target="_blank" rel="noopener noreferrer"';
        }

        $output .= '<a href="' . esc_url( $permalink ) . '" class="nav-link"' . $target . '>';
        $output .= esc_html( $title );

        if ( $description && $depth === 0 ) {
            $output .= '<span class="menu-description">' . esc_html( $description ) . '</span>';
        }

        $output .= '</a>';
    }
}

// Add schema.org attributes to navigation menu
function advanced_rolloffs_nav_menu_schema( $atts, $item, $args ) {
    $atts['itemprop'] = 'url';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'advanced_rolloffs_nav_menu_schema', 10, 3 );

// Add preconnect to external domains for performance
function advanced_rolloffs_resource_hints() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="dns-prefetch" href="//www.google-analytics.com">' . "\n";
}
add_action( 'wp_head', 'advanced_rolloffs_resource_hints', 1 );

// Add viewport meta tag for mobile responsiveness
function advanced_rolloffs_viewport_meta() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">' . "\n";
}
add_action( 'wp_head', 'advanced_rolloffs_viewport_meta', 1 );

// Add theme color meta tag
function advanced_rolloffs_theme_color() {
    echo '<meta name="theme-color" content="#DC143C">' . "\n";
    echo '<meta name="msapplication-TileColor" content="#DC143C">' . "\n";
}
add_action( 'wp_head', 'advanced_rolloffs_theme_color', 1 );

// Remove WordPress version for security
function advanced_rolloffs_remove_wp_version() {
    return '';
}
add_filter( 'the_generator', 'advanced_rolloffs_remove_wp_version' );

// Add custom CSS for breadcrumbs
function advanced_rolloffs_breadcrumb_styles() {
    $custom_css = "
        .breadcrumbs {
            background: #f8f9fa;
            padding: 1rem 0;
            margin-bottom: 2rem;
            border-bottom: 1px solid #e9ecef;
        }
        .breadcrumb-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .breadcrumb-item {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .breadcrumb-item:not(.active)::after {
            content: '/';
            margin-left: 0.5rem;
            color: #6c757d;
        }
        .breadcrumb-item a {
            color: #DC143C;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .breadcrumb-item a:hover {
            color: #B01030;
            text-decoration: underline;
        }
        .breadcrumb-item.active {
            color: #495057;
            font-weight: 600;
        }
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
        .entry-header {
            margin-bottom: 2rem;
        }
        .entry-title {
            color: var(--black);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .entry-footer {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #e9ecef;
        }
        .last-updated {
            font-size: 0.9rem;
            color: var(--text-gray);
            margin: 0;
        }
        .page-links {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e9ecef;
        }
        .page-links a {
            color: var(--primary-red);
            text-decoration: none;
            font-weight: 600;
            margin: 0 0.5rem;
        }
        .page-links a:hover {
            color: var(--dark-red);
            text-decoration: underline;
        }
    ";
    
    wp_add_inline_style( 'advanced-rolloffs-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'advanced_rolloffs_breadcrumb_styles', 20 );

/**
 * XML Sitemap functionality
 */

// Add rewrite rule for sitemap
function advanced_rolloffs_sitemap_rewrite_rule() {
    add_rewrite_rule( '^sitemap\.xml$', 'index.php?sitemap=1', 'top' );
}
add_action( 'init', 'advanced_rolloffs_sitemap_rewrite_rule' );

// Add query var for sitemap
function advanced_rolloffs_sitemap_query_vars( $query_vars ) {
    $query_vars[] = 'sitemap';
    return $query_vars;
}
add_filter( 'query_vars', 'advanced_rolloffs_sitemap_query_vars' );

// Handle sitemap request
function advanced_rolloffs_sitemap_template_redirect() {
    if ( get_query_var( 'sitemap' ) ) {
        advanced_rolloffs_generate_sitemap();
        exit;
    }
}
add_action( 'template_redirect', 'advanced_rolloffs_sitemap_template_redirect' );

// Generate XML sitemap
function advanced_rolloffs_generate_sitemap() {
    header( 'Content-Type: text/xml; charset=utf-8' );
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    
    // Homepage
    echo '  <url>' . "\n";
    echo '    <loc>' . esc_url( home_url( '/' ) ) . '</loc>' . "\n";
    echo '    <lastmod>' . date( 'Y-m-d' ) . '</lastmod>' . "\n";
    echo '    <changefreq>weekly</changefreq>' . "\n";
    echo '    <priority>1.0</priority>' . "\n";
    echo '  </url>' . "\n";
    
    // Pages
    $pages = get_pages( array( 'post_status' => 'publish', 'post_type' => 'page' ) );
    foreach ( $pages as $page ) {
        if ( $page->ID != get_option( 'page_on_front' ) ) { // Exclude homepage if it's a page
            echo '  <url>' . "\n";
            echo '    <loc>' . esc_url( get_permalink( $page->ID ) ) . '</loc>' . "\n";
            echo '    <lastmod>' . date( 'Y-m-d', strtotime( $page->post_modified ) ) . '</lastmod>' . "\n";
            echo '    <changefreq>monthly</changefreq>' . "\n";
            echo '    <priority>0.8</priority>' . "\n";
            echo '  </url>' . "\n";
        }
    }
    
    // Posts if they exist
    if ( post_type_exists( 'post' ) ) {
        $posts = get_posts( array( 'post_status' => 'publish', 'post_type' => 'post', 'numberposts' => -1 ) );
        foreach ( $posts as $post ) {
            echo '  <url>' . "\n";
            echo '    <loc>' . esc_url( get_permalink( $post->ID ) ) . '</loc>' . "\n";
            echo '    <lastmod>' . date( 'Y-m-d', strtotime( $post->post_modified ) ) . '</lastmod>' . "\n";
            echo '    <changefreq>monthly</changefreq>' . "\n";
            echo '    <priority>0.6</priority>' . "\n";
            echo '  </url>' . "\n";
        }
    }
    
    echo '</urlset>' . "\n";
}

// Add sitemap to robots.txt
function advanced_rolloffs_sitemap_robots_txt( $output ) {
    $sitemap_url = home_url( '/sitemap.xml' );
    if ( strpos( $output, 'Sitemap:' ) === false ) {
        $output .= "\nSitemap: " . $sitemap_url . "\n";
    }
    return $output;
}
add_filter( 'robots_txt', 'advanced_rolloffs_sitemap_robots_txt', 10, 2 );

// Flush rewrite rules on theme activation
function advanced_rolloffs_activate() {
    advanced_rolloffs_sitemap_rewrite_rule();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'advanced_rolloffs_activate' );

// Add screen reader text styles for accessibility
function advanced_rolloffs_accessibility_styles() {
    $custom_css = "
        .screen-reader-text {
            clip: rect(1px, 1px, 1px, 1px);
            position: absolute !important;
            height: 1px;
            width: 1px;
            overflow: hidden;
        }
        .screen-reader-text:focus {
            background: #f1f1f1;
            border-radius: 3px;
            box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.6);
            clip: auto !important;
            color: #21759b;
            display: block;
            font-size: 14px;
            font-weight: bold;
            height: auto;
            left: 5px;
            line-height: normal;
            padding: 15px 23px 14px;
            text-decoration: none;
            top: 5px;
            width: auto;
            z-index: 100000;
        }
        .skip-link {
            position: absolute;
            top: -40px;
            left: 6px;
            background: #DC143C;
            color: white;
            padding: 8px;
            text-decoration: none;
            border-radius: 3px;
            z-index: 100000;
        }
        .skip-link:focus {
            top: 6px;
        }
    ";
    
    wp_add_inline_style( 'advanced-rolloffs-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'advanced_rolloffs_accessibility_styles', 25 );

/**
 * Elementor Integration
 */

// Register custom Elementor widget category
function advanced_rolloffs_add_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'advanced-rolloffs',
        [
            'title' => __( 'Advanced Rolloffs', 'advanced-rolloffs' ),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'advanced_rolloffs_add_elementor_widget_categories' );

// Register custom Elementor widgets
function advanced_rolloffs_register_elementor_widgets( $widgets_manager ) {
    require_once( get_template_directory() . '/elementor-widgets/custom-hero-section.php' );
    $widgets_manager->register( new \Custom_Hero_Section_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/left-text-right-image.php' );
    $widgets_manager->register( new \Left_Text_Right_Image_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/custom-icon-text-section.php' );
    $widgets_manager->register( new \Custom_Icon_Text_Section_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/custom-pricing-tables.php' );
    $widgets_manager->register( new \Custom_Pricing_Tables_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/custom-numbered-text.php' );
    $widgets_manager->register( new \Custom_Numbered_Text_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/custom-testimonials.php' );
    $widgets_manager->register( new \Custom_Testimonials_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/custom-cta-section.php' );
    $widgets_manager->register( new \Custom_CTA_Section_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/custom-page-header.php' );
    $widgets_manager->register( new \Custom_Page_Header_Widget() );

    require_once( get_template_directory() . '/elementor-widgets/custom-contact-section.php' );
    $widgets_manager->register( new \Custom_Contact_Section_Widget() );

}
add_action( 'elementor/widgets/register', 'advanced_rolloffs_register_elementor_widgets' );
