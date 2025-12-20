<?php
/**
 * Custom Contact Section Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_Contact_Section_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_contact_section';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Contact Section', 'advanced-rolloffs' );
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
        return [ 'contact', 'form', 'information', 'phone', 'email', 'advanced rolloffs' ];
    }

    /**
     * Register widget controls.
     */
    protected function register_controls() {

        // Contact Information Section
        $this->start_controls_section(
            'contact_info_section',
            [
                'label' => __( 'Contact Information', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_info_title',
            [
                'label' => __( 'Section Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Contact Information', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_info_description',
            [
                'label' => __( 'Section Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Get in touch with us today. We\'re ready to help with your dumpster rental needs.', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Phone Section
        $this->start_controls_section(
            'phone_section',
            [
                'label' => __( 'Phone', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_phone',
            [
                'label' => __( 'Show Phone', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'advanced-rolloffs' ),
                'label_off' => __( 'Hide', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'phone_label',
            [
                'label' => __( 'Phone Label', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Phone', 'advanced-rolloffs' ),
                'condition' => [
                    'show_phone' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'phone_number',
            [
                'label' => __( 'Phone Number', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '317-564-3094', 'advanced-rolloffs' ),
                'condition' => [
                    'show_phone' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'phone_link',
            [
                'label' => __( 'Phone Link (for tel: href)', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '+317-564-3094', 'advanced-rolloffs' ),
                'description' => __( 'Enter the phone number in tel: format (e.g., +317-564-3094)', 'advanced-rolloffs' ),
                'condition' => [
                    'show_phone' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Email Section
        $this->start_controls_section(
            'email_section',
            [
                'label' => __( 'Email', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_email',
            [
                'label' => __( 'Show Email', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'advanced-rolloffs' ),
                'label_off' => __( 'Hide', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'email_label',
            [
                'label' => __( 'Email Label', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Email', 'advanced-rolloffs' ),
                'condition' => [
                    'show_email' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'email_address',
            [
                'label' => __( 'Email Address', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'info@advancedrolloffs.com', 'advanced-rolloffs' ),
                'condition' => [
                    'show_email' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Service Area Section
        $this->start_controls_section(
            'service_area_section',
            [
                'label' => __( 'Service Area', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_service_area',
            [
                'label' => __( 'Show Service Area', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'advanced-rolloffs' ),
                'label_off' => __( 'Hide', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'service_area_label',
            [
                'label' => __( 'Service Area Label', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Service Area', 'advanced-rolloffs' ),
                'condition' => [
                    'show_service_area' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'service_area_text',
            [
                'label' => __( 'Service Area Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Indianapolis, Indiana<br>and surrounding areas', 'advanced-rolloffs' ),
                'rows' => 2,
                'condition' => [
                    'show_service_area' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Business Hours Section
        $this->start_controls_section(
            'hours_section',
            [
                'label' => __( 'Business Hours', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_hours',
            [
                'label' => __( 'Show Business Hours', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'advanced-rolloffs' ),
                'label_off' => __( 'Hide', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'hours_label',
            [
                'label' => __( 'Hours Label', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Business Hours', 'advanced-rolloffs' ),
                'condition' => [
                    'show_hours' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'hours_text',
            [
                'label' => __( 'Hours Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Monday - Friday: 7:00 AM - 6:00 PM<br>Saturday: 8:00 AM - 4:00 PM<br>Sunday: Closed', 'advanced-rolloffs' ),
                'rows' => 3,
                'condition' => [
                    'show_hours' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Contact Form Section
        $this->start_controls_section(
            'contact_form_section',
            [
                'label' => __( 'Contact Form', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'form_title',
            [
                'label' => __( 'Form Section Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Send Us a Message', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'form_description',
            [
                'label' => __( 'Form Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Fill out the form below and we\'ll get back to you as soon as possible.', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'form_shortcode',
            [
                'label' => __( 'Contact Form 7 Shortcode', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '[contact-form-7 id="4f46e14" title="Contact form 1"]', 'advanced-rolloffs' ),
                'description' => __( 'Enter your Contact Form 7 shortcode', 'advanced-rolloffs' ),
                'label_block' => true,
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
                    '{{WRAPPER}} .contact-section' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .contact-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Contact Info Card
        $this->start_controls_section(
            'contact_info_style_section',
            [
                'label' => __( 'Contact Info Card', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contact_info_background',
            [
                'label' => __( 'Background Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .contact-info' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_info_padding',
            [
                'label' => __( 'Padding', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', 'rem' ],
                'default' => [
                    'top' => '3',
                    'right' => '3',
                    'bottom' => '3',
                    'left' => '3',
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#dc143c',
                'selectors' => [
                    '{{WRAPPER}} .contact-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_background',
            [
                'label' => __( 'Icon Background Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f8f9fa',
                'selectors' => [
                    '{{WRAPPER}} .contact-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Contact Form Card
        $this->start_controls_section(
            'contact_form_style_section',
            [
                'label' => __( 'Contact Form Card', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contact_form_background',
            [
                'label' => __( 'Background Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrapper' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_form_padding',
            [
                'label' => __( 'Padding', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', 'rem' ],
                'default' => [
                    'top' => '3',
                    'right' => '3',
                    'bottom' => '3',
                    'left' => '3',
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Typography
        $this->start_controls_section(
            'typography_style_section',
            [
                'label' => __( 'Typography', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_typography',
                'label' => __( 'Section Title Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .section-header-left h2',
            ]
        );

        $this->add_control(
            'section_title_color',
            [
                'label' => __( 'Section Title Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header-left h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_description_typography',
                'label' => __( 'Section Description Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .section-header-left p',
            ]
        );

        $this->add_control(
            'section_description_color',
            [
                'label' => __( 'Section Description Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header-left p' => 'color: {{VALUE}}',
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

        <section class="contact-section">
            <div class="container">
                <div class="contact-wrapper">

                    <!-- Contact Information -->
                    <div class="contact-info">
                        <div class="section-header-left">
                            <h2><?php echo esc_html( $settings['contact_info_title'] ); ?></h2>
                            <p><?php echo esc_html( $settings['contact_info_description'] ); ?></p>
                        </div>

                        <div class="contact-details">

                            <?php if ( 'yes' === $settings['show_phone'] ) : ?>
                            <!-- Phone -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4><?php echo esc_html( $settings['phone_label'] ); ?></h4>
                                    <a href="tel:<?php echo esc_attr( $settings['phone_link'] ); ?>"><?php echo esc_html( $settings['phone_number'] ); ?></a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if ( 'yes' === $settings['show_email'] ) : ?>
                            <!-- Email -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4><?php echo esc_html( $settings['email_label'] ); ?></h4>
                                    <a href="mailto:<?php echo esc_attr( $settings['email_address'] ); ?>"><?php echo esc_html( $settings['email_address'] ); ?></a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if ( 'yes' === $settings['show_service_area'] ) : ?>
                            <!-- Service Area -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4><?php echo esc_html( $settings['service_area_label'] ); ?></h4>
                                    <p><?php echo wp_kses_post( $settings['service_area_text'] ); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if ( 'yes' === $settings['show_hours'] ) : ?>
                            <!-- Business Hours -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4><?php echo esc_html( $settings['hours_label'] ); ?></h4>
                                    <p><?php echo wp_kses_post( $settings['hours_text'] ); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form-wrapper">
                        <div class="section-header-left">
                            <h2><?php echo esc_html( $settings['form_title'] ); ?></h2>
                            <p><?php echo esc_html( $settings['form_description'] ); ?></p>
                        </div>

                        <div class="contact-form-container">
                            <?php echo do_shortcode( $settings['form_shortcode'] ); ?>
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
        <section class="contact-section">
            <div class="container">
                <div class="contact-wrapper">

                    <!-- Contact Information -->
                    <div class="contact-info">
                        <div class="section-header-left">
                            <h2>{{{ settings.contact_info_title }}}</h2>
                            <p>{{{ settings.contact_info_description }}}</p>
                        </div>

                        <div class="contact-details">

                            <# if ( 'yes' === settings.show_phone ) { #>
                            <!-- Phone -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4>{{{ settings.phone_label }}}</h4>
                                    <a href="tel:{{{ settings.phone_link }}}">{{{ settings.phone_number }}}</a>
                                </div>
                            </div>
                            <# } #>

                            <# if ( 'yes' === settings.show_email ) { #>
                            <!-- Email -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4>{{{ settings.email_label }}}</h4>
                                    <a href="mailto:{{{ settings.email_address }}}">{{{ settings.email_address }}}</a>
                                </div>
                            </div>
                            <# } #>

                            <# if ( 'yes' === settings.show_service_area ) { #>
                            <!-- Service Area -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4>{{{ settings.service_area_label }}}</h4>
                                    <p>{{{ settings.service_area_text }}}</p>
                                </div>
                            </div>
                            <# } #>

                            <# if ( 'yes' === settings.show_hours ) { #>
                            <!-- Business Hours -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <div class="contact-details-text">
                                    <h4>{{{ settings.hours_label }}}</h4>
                                    <p>{{{ settings.hours_text }}}</p>
                                </div>
                            </div>
                            <# } #>

                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form-wrapper">
                        <div class="section-header-left">
                            <h2>{{{ settings.form_title }}}</h2>
                            <p>{{{ settings.form_description }}}</p>
                        </div>

                        <div class="contact-form-container">
                            <p style="padding: 1rem; background: #f0f0f0; border-radius: 8px; text-align: center;">
                                Contact Form 7 Preview<br>
                                <small>{{{ settings.form_shortcode }}}</small>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php
    }
}
