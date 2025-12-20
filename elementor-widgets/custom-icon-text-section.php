<?php
/**
 * Custom Icon Text Section Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_Icon_Text_Section_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_icon_text_section';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Icon Text Section', 'advanced-rolloffs' );
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
        return [ 'services', 'icon', 'text', 'grid', 'cards', 'advanced rolloffs' ];
    }

    /**
     * Register widget controls.
     */
    protected function register_controls() {

        // Header Section
        $this->start_controls_section(
            'header_section',
            [
                'label' => __( 'Section Header', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __( 'Section Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Our Dumpster Rental Services', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __( 'Section Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We provide reliable roll-off dumpster rentals for all your waste management needs', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Cards Section
        $this->start_controls_section(
            'cards_section',
            [
                'label' => __( 'Service Cards', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_icon',
            [
                'label' => __( 'Icon (Emoji or Text)', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '🏠',
            ]
        );

        $repeater->add_control(
            'card_title',
            [
                'label' => __( 'Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Service Title', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'card_description',
            [
                'label' => __( 'Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Service description goes here.', 'advanced-rolloffs' ),
                'rows' => 4,
            ]
        );

        $this->add_control(
            'service_cards',
            [
                'label' => __( 'Service Cards', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_icon' => '🏠',
                        'card_title' => __( 'Residential Projects', 'advanced-rolloffs' ),
                        'card_description' => __( 'Perfect for home renovations, cleanouts, and landscaping projects. We make residential waste removal simple and stress-free.', 'advanced-rolloffs' ),
                    ],
                    [
                        'card_icon' => '🏗️',
                        'card_title' => __( 'Commercial & Construction', 'advanced-rolloffs' ),
                        'card_description' => __( 'Heavy-duty dumpsters for construction sites, demolition projects, and commercial waste management needs.', 'advanced-rolloffs' ),
                    ],
                    [
                        'card_icon' => '♻️',
                        'card_title' => __( 'Eco-Friendly Disposal', 'advanced-rolloffs' ),
                        'card_description' => __( 'We\'re committed to responsible waste disposal and recycling to protect our environment.', 'advanced-rolloffs' ),
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'layout_section',
            [
                'label' => __( 'Layout', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'columns',
            [
                'label' => __( 'Columns', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .services-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_gap',
            [
                'label' => __( 'Card Gap', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'size' => 2.5,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .services-grid' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Header
        $this->start_controls_section(
            'header_style_section',
            [
                'label' => __( 'Header', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_typography',
                'label' => __( 'Title Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .section-header h2',
            ]
        );

        $this->add_control(
            'section_title_color',
            [
                'label' => __( 'Title Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_description_typography',
                'label' => __( 'Description Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .section-header p',
            ]
        );

        $this->add_control(
            'section_description_color',
            [
                'label' => __( 'Description Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Cards
        $this->start_controls_section(
            'cards_style_section',
            [
                'label' => __( 'Cards', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => __( 'Background Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'card_border_color',
            [
                'label' => __( 'Top Border Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'border-top-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => __( 'Card Padding', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '2.5',
                    'right' => '2.5',
                    'bottom' => '2.5',
                    'left' => '2.5',
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Icon Size', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 150,
                    ],
                    'rem' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'size' => 3,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'label' => __( 'Card Title Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .service-card h3',
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => __( 'Card Title Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_description_typography',
                'label' => __( 'Card Description Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .service-card p',
            ]
        );

        $this->add_control(
            'card_description_color',
            [
                'label' => __( 'Card Description Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Background
        $this->start_controls_section(
            'background_style_section',
            [
                'label' => __( 'Section Background', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_background_color',
            [
                'label' => __( 'Background Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f8f9fa',
                'selectors' => [
                    '{{WRAPPER}} .custom-icon-text-section' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => __( 'Section Padding', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '80',
                    'right' => '0',
                    'bottom' => '80',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .custom-icon-text-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        ?>

        <section class="custom-icon-text-section">
            <div class="container">
                <div class="section-header">
                    <h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
                    <p><?php echo esc_html( $settings['section_description'] ); ?></p>
                </div>
                <?php if ( $settings['service_cards'] ) : ?>
                    <div class="services-grid">
                        <?php foreach ( $settings['service_cards'] as $card ) : ?>
                            <div class="service-card">
                                <div class="service-icon"><?php echo esc_html( $card['card_icon'] ); ?></div>
                                <h3><?php echo esc_html( $card['card_title'] ); ?></h3>
                                <p><?php echo esc_html( $card['card_description'] ); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php
    }

    /**
     * Render widget output in the editor.
     */
    protected function content_template() {
        ?>
        <section class="custom-icon-text-section">
            <div class="container">
                <div class="section-header">
                    <h2>{{{ settings.section_title }}}</h2>
                    <p>{{{ settings.section_description }}}</p>
                </div>
                <# if ( settings.service_cards.length ) { #>
                    <div class="services-grid">
                        <# _.each( settings.service_cards, function( card ) { #>
                            <div class="service-card">
                                <div class="service-icon">{{{ card.card_icon }}}</div>
                                <h3>{{{ card.card_title }}}</h3>
                                <p>{{{ card.card_description }}}</p>
                            </div>
                        <# }); #>
                    </div>
                <# } #>
            </div>
        </section>

        <?php
    }
}
