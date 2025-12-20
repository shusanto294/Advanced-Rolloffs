<?php
/**
 * Custom Hero Section Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_Hero_Section_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_hero_section';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Hero Section', 'advanced-rolloffs' );
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-code';
    }

    /**
     * Get widget categories.
     */
    public function get_categories() {
        return [ 'advanced-rolloffs' ];
    }

    /**
     * Get widget keywords.
     */
    public function get_keywords() {
        return [ 'hero', 'banner', 'header', 'advanced rolloffs' ];
    }

    /**
     * Register widget controls.
     */
    protected function register_controls() {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_title',
            [
                'label' => __( 'Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Professional Roll-Off Dumpster Rentals', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_subtitle',
            [
                'label' => __( 'Subtitle', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Fast, Reliable, and Affordable Waste Management Solutions for Your Home or Business', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Features Section
        $this->start_controls_section(
            'features_section',
            [
                'label' => __( 'Features', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_text',
            [
                'label' => __( 'Feature Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Feature Item', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'feature_icon',
            [
                'label' => __( 'Icon', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '✓',
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => __( 'Features List', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_text' => __( 'Multiple Sizes Available', 'advanced-rolloffs' ),
                        'feature_icon' => '✓',
                    ],
                    [
                        'feature_text' => __( 'Same-Day Delivery', 'advanced-rolloffs' ),
                        'feature_icon' => '✓',
                    ],
                    [
                        'feature_text' => __( 'Competitive Pricing', 'advanced-rolloffs' ),
                        'feature_icon' => '✓',
                    ],
                ],
                'title_field' => '{{{ feature_text }}}',
            ]
        );

        $this->end_controls_section();

        // Buttons Section
        $this->start_controls_section(
            'buttons_section',
            [
                'label' => __( 'Buttons', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label' => __( 'Primary Button Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get a Free Quote', 'advanced-rolloffs' ),
            ]
        );

        $this->add_control(
            'primary_button_url',
            [
                'label' => __( 'Primary Button URL', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'advanced-rolloffs' ),
                'default' => [
                    'url' => 'https://app.icans.ai/customer-portal/advanced-roll-offs/book/',
                    'is_external' => true,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label' => __( 'Secondary Button Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Call Now', 'advanced-rolloffs' ),
            ]
        );

        $this->add_control(
            'secondary_button_url',
            [
                'label' => __( 'Secondary Button URL', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'tel:+1234567890', 'advanced-rolloffs' ),
                'default' => [
                    'url' => 'tel:+317-564-3094',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'show_phone_icon',
            [
                'label' => __( 'Show Phone Icon', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Background Section
        $this->start_controls_section(
            'background_section',
            [
                'label' => __( 'Background', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_overlay',
            [
                'label' => __( 'Show Overlay', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_shapes',
            [
                'label' => __( 'Show Background Shapes', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Style Section - Typography
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Typography', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .hero-content h1',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-content h1' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .hero-subtitle',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Buttons
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __( 'Buttons', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'primary_button_bg_color',
            [
                'label' => __( 'Primary Button Background', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'primary_button_text_color',
            [
                'label' => __( 'Primary Button Text Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_bg_color',
            [
                'label' => __( 'Secondary Button Background', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-secondary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text_color',
            [
                'label' => __( 'Secondary Button Text Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-secondary' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $primary_url = $settings['primary_button_url']['url'];
        $primary_target = $settings['primary_button_url']['is_external'] ? ' target="_blank"' : '';
        $primary_nofollow = $settings['primary_button_url']['nofollow'] ? ' rel="nofollow"' : '';

        $secondary_url = $settings['secondary_button_url']['url'];
        $secondary_target = $settings['secondary_button_url']['is_external'] ? ' target="_blank"' : '';
        $secondary_nofollow = $settings['secondary_button_url']['nofollow'] ? ' rel="nofollow"' : '';
        ?>

        <section class="hero">
            <?php if ( 'yes' === $settings['show_overlay'] ) : ?>
                <div class="hero-overlay"></div>
            <?php endif; ?>

            <?php if ( 'yes' === $settings['show_shapes'] ) : ?>
                <div class="hero-shapes-bg">
                    <div class="hero-shape hero-shape-1"></div>
                    <div class="hero-shape hero-shape-2"></div>
                </div>
            <?php endif; ?>

            <div class="container">
                <div class="hero-content-wrapper">
                    <div class="hero-content">
                        <h1><?php echo esc_html( $settings['hero_title'] ); ?></h1>
                        <p class="hero-subtitle"><?php echo esc_html( $settings['hero_subtitle'] ); ?></p>

                        <?php if ( $settings['features_list'] ) : ?>
                            <div class="hero-features">
                                <?php foreach ( $settings['features_list'] as $feature ) : ?>
                                    <div class="hero-feature">
                                        <span class="feature-icon"><?php echo esc_html( $feature['feature_icon'] ); ?></span>
                                        <span><?php echo esc_html( $feature['feature_text'] ); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="hero-buttons">
                            <a href="<?php echo esc_url( $primary_url ); ?>" class="btn btn-primary"<?php echo $primary_target . $primary_nofollow; ?>>
                                <?php echo esc_html( $settings['primary_button_text'] ); ?>
                            </a>
                            <a href="<?php echo esc_url( $secondary_url ); ?>" class="btn btn-secondary"<?php echo $secondary_target . $secondary_nofollow; ?>>
                                <?php if ( 'yes' === $settings['show_phone_icon'] ) : ?>
                                    <span>
                                        <svg version="1.1" id="fi_597177" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 513.64 513.64" style="enable-background:new 0 0 513.64 513.64;width:20px;fill:currentColor;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
                                                        c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
                                                        c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
                                                        l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                                <?php echo esc_html( $settings['secondary_button_text'] ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }

    /**
     * Render widget output in the editor.
     */
    protected function content_template() {
        ?>
        <#
        var primaryTarget = settings.primary_button_url.is_external ? ' target="_blank"' : '';
        var primaryNofollow = settings.primary_button_url.nofollow ? ' rel="nofollow"' : '';
        var secondaryTarget = settings.secondary_button_url.is_external ? ' target="_blank"' : '';
        var secondaryNofollow = settings.secondary_button_url.nofollow ? ' rel="nofollow"' : '';
        #>

        <section class="hero">
            <# if ( 'yes' === settings.show_overlay ) { #>
                <div class="hero-overlay"></div>
            <# } #>

            <# if ( 'yes' === settings.show_shapes ) { #>
                <div class="hero-shapes-bg">
                    <div class="hero-shape hero-shape-1"></div>
                    <div class="hero-shape hero-shape-2"></div>
                </div>
            <# } #>

            <div class="container">
                <div class="hero-content-wrapper">
                    <div class="hero-content">
                        <h1>{{{ settings.hero_title }}}</h1>
                        <p class="hero-subtitle">{{{ settings.hero_subtitle }}}</p>

                        <# if ( settings.features_list.length ) { #>
                            <div class="hero-features">
                                <# _.each( settings.features_list, function( feature ) { #>
                                    <div class="hero-feature">
                                        <span class="feature-icon">{{{ feature.feature_icon }}}</span>
                                        <span>{{{ feature.feature_text }}}</span>
                                    </div>
                                <# }); #>
                            </div>
                        <# } #>

                        <div class="hero-buttons">
                            <a href="{{ settings.primary_button_url.url }}" class="btn btn-primary"{{{ primaryTarget }}}{{{ primaryNofollow }}}>
                                {{{ settings.primary_button_text }}}
                            </a>
                            <a href="{{ settings.secondary_button_url.url }}" class="btn btn-secondary"{{{ secondaryTarget }}}{{{ secondaryNofollow }}}>
                                <# if ( 'yes' === settings.show_phone_icon ) { #>
                                    <span>
                                        <svg version="1.1" id="fi_597177" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 513.64 513.64" style="enable-background:new 0 0 513.64 513.64;width:20px;fill:currentColor;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
                                                        c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
                                                        c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
                                                        l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                <# } #>
                                {{{ settings.secondary_button_text }}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}
