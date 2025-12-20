<?php
/**
 * Custom CTA Section Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_CTA_Section_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_cta_section';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom CTA Section', 'advanced-rolloffs' );
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
        return [ 'cta', 'call to action', 'button', 'banner', 'advanced rolloffs' ];
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
            'cta_title',
            [
                'label' => __( 'Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Ready to Get Started?', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cta_description',
            [
                'label' => __( 'Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Contact us today for a free quote and fast delivery', 'advanced-rolloffs' ),
                'rows' => 3,
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Started', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label' => __( 'Button URL', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'advanced-rolloffs' ),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $repeater->add_control(
            'button_style',
            [
                'label' => __( 'Button Style', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'primary',
                'options' => [
                    'primary' => __( 'Primary', 'advanced-rolloffs' ),
                    'white' => __( 'White', 'advanced-rolloffs' ),
                    'secondary' => __( 'Secondary', 'advanced-rolloffs' ),
                ],
            ]
        );

        $this->add_control(
            'buttons_list',
            [
                'label' => __( 'Buttons', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'button_text' => __( 'Request a Quote', 'advanced-rolloffs' ),
                        'button_url' => [
                            'url' => 'https://app.icans.ai/customer-portal/advanced-roll-offs/book/',
                            'is_external' => true,
                            'nofollow' => false,
                        ],
                        'button_style' => 'primary',
                    ],
                    [
                        'button_text' => __( 'Call: 317-564-3094', 'advanced-rolloffs' ),
                        'button_url' => [
                            'url' => 'tel:+317-564-3094',
                            'is_external' => false,
                            'nofollow' => false,
                        ],
                        'button_style' => 'white',
                    ],
                ],
                'title_field' => '{{{ button_text }}}',
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
                    '{{WRAPPER}} .cta-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'buttons_gap',
            [
                'label' => __( 'Buttons Gap', 'advanced-rolloffs' ),
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
                    'size' => 1.5,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-buttons' => 'gap: {{SIZE}}{{UNIT}};',
                ],
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
            'show_gradient_overlay',
            [
                'label' => __( 'Show Gradient Overlay', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => __( 'Background', 'advanced-rolloffs' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .custom-cta-section',
                'fields_options' => [
                    'background' => [
                        'default' => 'gradient',
                    ],
                    'color' => [
                        'default' => '#000000',
                    ],
                    'color_b' => [
                        'default' => '#8B0000',
                    ],
                    'gradient_angle' => [
                        'default' => [
                            'unit' => 'deg',
                            'size' => 135,
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Title
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Title', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .cta-content h2',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cta-content h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin Bottom', 'advanced-rolloffs' ),
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
                    '{{WRAPPER}} .cta-content h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Description
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => __( 'Description', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .cta-content p',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f8f9fa',
                'selectors' => [
                    '{{WRAPPER}} .cta-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_margin',
            [
                'label' => __( 'Margin Bottom', 'advanced-rolloffs' ),
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
                    '{{WRAPPER}} .cta-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                'default' => [
                    'top' => '80',
                    'right' => '0',
                    'bottom' => '80',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .custom-cta-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $has_gradient = 'yes' === $settings['show_gradient_overlay'] ? ' has-gradient' : '';
        ?>

        <section class="custom-cta-section<?php echo esc_attr( $has_gradient ); ?>">
            <?php if ( 'yes' === $settings['show_gradient_overlay'] ) : ?>
                <div class="cta-gradient-overlay"></div>
            <?php endif; ?>

            <div class="container">
                <div class="cta-content">
                    <h2><?php echo esc_html( $settings['cta_title'] ); ?></h2>
                    <p><?php echo esc_html( $settings['cta_description'] ); ?></p>

                    <?php if ( $settings['buttons_list'] ) : ?>
                        <div class="cta-buttons">
                            <?php foreach ( $settings['buttons_list'] as $button ) :
                                $button_url = $button['button_url']['url'];
                                $button_target = $button['button_url']['is_external'] ? ' target="_blank"' : '';
                                $button_nofollow = $button['button_url']['nofollow'] ? ' rel="nofollow"' : '';
                                $button_class = 'btn btn-' . esc_attr( $button['button_style'] );
                            ?>
                                <a href="<?php echo esc_url( $button_url ); ?>" class="<?php echo esc_attr( $button_class ); ?>"<?php echo $button_target . $button_nofollow; ?>>
                                    <?php echo esc_html( $button['button_text'] ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
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
        var hasGradient = 'yes' === settings.show_gradient_overlay ? ' has-gradient' : '';
        #>

        <section class="custom-cta-section{{{ hasGradient }}}">
            <# if ( 'yes' === settings.show_gradient_overlay ) { #>
                <div class="cta-gradient-overlay"></div>
            <# } #>

            <div class="container">
                <div class="cta-content">
                    <h2>{{{ settings.cta_title }}}</h2>
                    <p>{{{ settings.cta_description }}}</p>

                    <# if ( settings.buttons_list.length ) { #>
                        <div class="cta-buttons">
                            <# _.each( settings.buttons_list, function( button ) {
                                var buttonTarget = button.button_url.is_external ? ' target="_blank"' : '';
                                var buttonNofollow = button.button_url.nofollow ? ' rel="nofollow"' : '';
                                var buttonClass = 'btn btn-' + button.button_style;
                            #>
                                <a href="{{ button.button_url.url }}" class="{{{ buttonClass }}}"{{{ buttonTarget }}}{{{ buttonNofollow }}}>
                                    {{{ button.button_text }}}
                                </a>
                            <# }); #>
                        </div>
                    <# } #>
                </div>
            </div>
        </section>

        <?php
    }
}
