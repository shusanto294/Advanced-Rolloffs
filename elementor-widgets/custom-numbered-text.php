<?php
/**
 * Custom Numbered Text Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_Numbered_Text_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_numbered_text';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Numbered Text', 'advanced-rolloffs' );
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
        return [ 'numbered', 'text', 'features', 'list', 'steps', 'advanced rolloffs' ];
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
                'default' => __( 'Why Choose Advanced Rolloffs?', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __( 'Section Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Experience the difference with our professional dumpster rental service', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Items Section
        $this->start_controls_section(
            'items_section',
            [
                'label' => __( 'Numbered Items', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_number',
            [
                'label' => __( 'Number', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '01',
                'description' => __( 'The number or text to display (e.g., 01, 02, A, B)', 'advanced-rolloffs' ),
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label' => __( 'Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Feature Title', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_description',
            [
                'label' => __( 'Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Feature description goes here.', 'advanced-rolloffs' ),
                'rows' => 4,
            ]
        );

        $this->add_control(
            'numbered_items',
            [
                'label' => __( 'Numbered Items', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'item_number' => '01',
                        'item_title' => __( 'Fast Delivery', 'advanced-rolloffs' ),
                        'item_description' => __( 'Same-day or next-day delivery available. We work on your schedule to keep your project moving.', 'advanced-rolloffs' ),
                    ],
                    [
                        'item_number' => '02',
                        'item_title' => __( 'Competitive Pricing', 'advanced-rolloffs' ),
                        'item_description' => __( 'Transparent pricing with no hidden fees. Get the best value for your dumpster rental.', 'advanced-rolloffs' ),
                    ],
                    [
                        'item_number' => '03',
                        'item_title' => __( 'Flexible Rental Periods', 'advanced-rolloffs' ),
                        'item_description' => __( 'Rent for as long as you need. We offer flexible rental periods to accommodate any project timeline.', 'advanced-rolloffs' ),
                    ],
                    [
                        'item_number' => '04',
                        'item_title' => __( 'Professional Service', 'advanced-rolloffs' ),
                        'item_description' => __( 'Our experienced team ensures safe, reliable delivery and pickup. Customer satisfaction guaranteed.', 'advanced-rolloffs' ),
                    ],
                ],
                'title_field' => '{{{ item_number }}} - {{{ item_title }}}',
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
                'default' => '4',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .features-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_gap',
            [
                'label' => __( 'Item Gap', 'advanced-rolloffs' ),
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
                    'size' => 3,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .features-grid' => 'gap: {{SIZE}}{{UNIT}};',
                ],
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
                'selectors' => [
                    '{{WRAPPER}} .feature-item' => 'text-align: {{VALUE}};',
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

        // Style Section - Numbers
        $this->start_controls_section(
            'numbers_style_section',
            [
                'label' => __( 'Numbers', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __( 'Number Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'number_opacity',
            [
                'label' => __( 'Number Opacity', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature-number' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => __( 'Number Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .feature-number',
            ]
        );

        $this->add_responsive_control(
            'number_margin',
            [
                'label' => __( 'Number Margin Bottom', 'advanced-rolloffs' ),
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
                    'size' => 1,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Content
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Content', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'item_title_typography',
                'label' => __( 'Title Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .feature-item h3',
            ]
        );

        $this->add_control(
            'item_title_color',
            [
                'label' => __( 'Title Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-item h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_title_margin',
            [
                'label' => __( 'Title Margin Bottom', 'advanced-rolloffs' ),
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
                    'size' => 1,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature-item h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'item_description_typography',
                'label' => __( 'Description Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .feature-item p',
            ]
        );

        $this->add_control(
            'item_description_color',
            [
                'label' => __( 'Description Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-item p' => 'color: {{VALUE}}',
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
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .custom-numbered-text-section' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .custom-numbered-text-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <section class="custom-numbered-text-section">
            <div class="container">
                <div class="section-header">
                    <h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
                    <p><?php echo esc_html( $settings['section_description'] ); ?></p>
                </div>
                <?php if ( $settings['numbered_items'] ) : ?>
                    <div class="features-grid">
                        <?php foreach ( $settings['numbered_items'] as $item ) : ?>
                            <div class="feature-item">
                                <div class="feature-number"><?php echo esc_html( $item['item_number'] ); ?></div>
                                <h3><?php echo esc_html( $item['item_title'] ); ?></h3>
                                <p><?php echo esc_html( $item['item_description'] ); ?></p>
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
        <section class="custom-numbered-text-section">
            <div class="container">
                <div class="section-header">
                    <h2>{{{ settings.section_title }}}</h2>
                    <p>{{{ settings.section_description }}}</p>
                </div>
                <# if ( settings.numbered_items.length ) { #>
                    <div class="features-grid">
                        <# _.each( settings.numbered_items, function( item ) { #>
                            <div class="feature-item">
                                <div class="feature-number">{{{ item.item_number }}}</div>
                                <h3>{{{ item.item_title }}}</h3>
                                <p>{{{ item.item_description }}}</p>
                            </div>
                        <# }); #>
                    </div>
                <# } #>
            </div>
        </section>

        <?php
    }
}
