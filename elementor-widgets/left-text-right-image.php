<?php
/**
 * Left Text Right Image Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Left_Text_Right_Image_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'left_text_right_image';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Left Text Right Image', 'advanced-rolloffs' );
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
        return [ 'text', 'image', 'content', 'section', 'advanced rolloffs' ];
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
            'heading',
            [
                'label' => __( 'Heading', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Roll Off Dumpsters:  Local Indianapolis Dumpster Rentals for Any Size Project', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Advanced Roll Offs is the reliable choice for your dumpster rental needs in Indianapolis, IN, ensuring a seamless, secure, and sanitary experience with prompt delivery and pickup across the greater Indy metro area. Contact us today for affordable roll off dumpster rental in Indianapolis, Indiana!', 'advanced-rolloffs' ),
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

        $this->add_control(
            'show_features',
            [
                'label' => __( 'Show Features', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'no',
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
                        'feature_text' => __( 'Professional board placement', 'advanced-rolloffs' ),
                        'feature_icon' => '✓',
                    ],
                    [
                        'feature_text' => __( 'Light, compact trucks', 'advanced-rolloffs' ),
                        'feature_icon' => '✓',
                    ],
                    [
                        'feature_text' => __( 'Damage-free guarantee', 'advanced-rolloffs' ),
                        'feature_icon' => '✓',
                    ],
                ],
                'title_field' => '{{{ feature_text }}}',
                'condition' => [
                    'show_features' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Button Section
        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_button',
            [
                'label' => __( 'Show Button', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Your Free Quote', 'advanced-rolloffs' ),
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __( 'Button URL', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'advanced-rolloffs' ),
                'default' => [
                    'url' => 'https://app.icans.ai/customer-portal/advanced-roll-offs/book/',
                    'is_external' => true,
                    'nofollow' => false,
                ],
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Image Section
        $this->start_controls_section(
            'image_section',
            [
                'label' => __( 'Image', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/img/3.webp',
                ],
            ]
        );

        $this->add_control(
            'image_alt',
            [
                'label' => __( 'Image Alt Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Roll Off Dumpster Rental in Indianapolis', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'Image Height', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 800,
                    ],
                ],
                'default' => [
                    'size' => 500,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 400,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 300,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .featured-image' => 'height: {{SIZE}}{{UNIT}};',
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
            'show_decorative_gradient',
            [
                'label' => __( 'Show Decorative Gradient', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .left-text-right-image-section' => 'background-color: {{VALUE}}',
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
                'name' => 'heading_typography',
                'label' => __( 'Heading Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .content-text h2',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-text h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .content-description',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-description' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .left-text-right-image-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_gap',
            [
                'label' => __( 'Content Gap', 'advanced-rolloffs' ),
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
                    'size' => 4,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .content-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
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

        <section class="left-text-right-image-section <?php echo 'yes' === $settings['show_decorative_gradient'] ? 'has-gradient' : ''; ?>">
            <div class="container">
                <div class="content-wrapper">
                    <div class="content-text">
                        <h2><?php echo esc_html( $settings['heading'] ); ?></h2>
                        <div class="content-description"><?php echo $settings['description']; ?></div>

                        <?php if ( 'yes' === $settings['show_features'] && $settings['features_list'] ) : ?>
                            <div class="driveway-features">
                                <?php foreach ( $settings['features_list'] as $feature ) : ?>
                                    <div class="driveway-feature">
                                        <span class="check-icon"><?php echo esc_html( $feature['feature_icon'] ); ?></span>
                                        <span><?php echo esc_html( $feature['feature_text'] ); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( 'yes' === $settings['show_button'] ) :
                            $button_url = $settings['button_url']['url'];
                            $button_target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';
                            $button_nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';
                        ?>
                            <a href="<?php echo esc_url( $button_url ); ?>" class="btn btn-primary"<?php echo $button_target . $button_nofollow; ?>>
                                <?php echo esc_html( $settings['button_text'] ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="featured-image-wrapper">
                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['image_alt'] ); ?>" class="featured-image">
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
        var hasGradient = 'yes' === settings.show_decorative_gradient ? 'has-gradient' : '';
        var buttonTarget = settings.button_url.is_external ? ' target="_blank"' : '';
        var buttonNofollow = settings.button_url.nofollow ? ' rel="nofollow"' : '';
        #>

        <section class="left-text-right-image-section {{{ hasGradient }}}">
            <div class="container">
                <div class="content-wrapper">
                    <div class="content-text">
                        <h2>{{{ settings.heading }}}</h2>
                        <div class="content-description">{{{ settings.description }}}</div>

                        <# if ( 'yes' === settings.show_features && settings.features_list.length ) { #>
                            <div class="driveway-features">
                                <# _.each( settings.features_list, function( feature ) { #>
                                    <div class="driveway-feature">
                                        <span class="check-icon">{{{ feature.feature_icon }}}</span>
                                        <span>{{{ feature.feature_text }}}</span>
                                    </div>
                                <# }); #>
                            </div>
                        <# } #>

                        <# if ( 'yes' === settings.show_button ) { #>
                            <a href="{{ settings.button_url.url }}" class="btn btn-primary"{{{ buttonTarget }}}{{{ buttonNofollow }}}>
                                {{{ settings.button_text }}}
                            </a>
                        <# } #>
                    </div>
                    <div class="featured-image-wrapper">
                        <img src="{{ settings.image.url }}" alt="{{ settings.image_alt }}" class="featured-image">
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}
