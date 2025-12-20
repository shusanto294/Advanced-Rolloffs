<?php
/**
 * Custom Page Header Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_Page_Header_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_page_header';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Page Header', 'advanced-rolloffs' );
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
        return [ 'page', 'header', 'banner', 'title', 'advanced rolloffs' ];
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
            'page_title',
            [
                'label' => __( 'Page Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'About Advanced Roll Offs', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'page_subtitle',
            [
                'label' => __( 'Subtitle', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'A Family Legacy of Service, Reliability, and Excellence', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'text_alignment',
            [
                'label' => __( 'Text Alignment', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'advanced-rolloffs' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'advanced-rolloffs' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'advanced-rolloffs' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
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

        $this->add_control(
            'background_image',
            [
                'label' => __( 'Background Image', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/img/about-hero.webp',
                ],
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

        // Style Section - Spacing
        $this->start_controls_section(
            'spacing_section',
            [
                'label' => __( 'Spacing', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => __( 'Section Padding', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hero.about-hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $background_image = $settings['background_image']['url'];

        $inline_style = '';
        if ( ! empty( $background_image ) ) {
            $inline_style = 'style="background: linear-gradient(135deg, rgba(10, 10, 10, 0.85) 0%, rgba(26, 26, 26, 0.85) 50%, rgba(10, 10, 10, 0.85) 100%), url(' . esc_url( $background_image ) . ') !important; background-size: cover !important; background-position: center !important;"';
        }
        ?>

        <section class="hero page-hero" <?php echo $inline_style; ?>>
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
                    <div class="hero-content" style="text-align: <?php echo esc_attr( $settings['text_alignment'] ); ?>;">
                        <h1><?php echo esc_html( $settings['page_title'] ); ?></h1>
                        <p class="hero-subtitle"><?php echo esc_html( $settings['page_subtitle'] ); ?></p>
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
        var inlineStyle = '';
        if ( settings.background_image && settings.background_image.url ) {
            inlineStyle = 'style="background: linear-gradient(135deg, rgba(10, 10, 10, 0.85) 0%, rgba(26, 26, 26, 0.85) 50%, rgba(10, 10, 10, 0.85) 100%), url(' + settings.background_image.url + ') !important; background-size: cover !important; background-position: center !important;"';
        }
        #>

        <section class="hero page-hero" {{{ inlineStyle }}}>
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
                    <div class="hero-content" style="text-align: {{ settings.text_alignment }};">
                        <h1>{{{ settings.page_title }}}</h1>
                        <p class="hero-subtitle">{{{ settings.page_subtitle }}}</p>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}
