<?php
/**
 * Custom Testimonials Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_Testimonials_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_testimonials';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Testimonials', 'advanced-rolloffs' );
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
        return [ 'testimonials', 'reviews', 'rating', 'customers', 'feedback', 'advanced rolloffs' ];
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
                'default' => __( 'What Our Customers Say', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __( 'Section Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Don\'t just take our word for it - hear from our satisfied customers', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Testimonials Section
        $this->start_controls_section(
            'testimonials_section',
            [
                'label' => __( 'Testimonials', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'rating',
            [
                'label' => __( 'Rating (Stars)', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'testimonial_text',
            [
                'label' => __( 'Testimonial Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Outstanding company with great service!', 'advanced-rolloffs' ),
                'rows' => 5,
            ]
        );

        $repeater->add_control(
            'author_avatar',
            [
                'label' => __( 'Author Avatar (Initials)', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'JD',
                'description' => __( 'Enter 1-3 characters (e.g., JD, SM, ABC)', 'advanced-rolloffs' ),
            ]
        );

        $repeater->add_control(
            'author_name',
            [
                'label' => __( 'Author Name', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'John Doe', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'author_role',
            [
                'label' => __( 'Author Role/Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Homeowner', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'testimonials_list',
            [
                'label' => __( 'Testimonials', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'rating' => 5,
                        'testimonial_text' => __( 'Outstanding company with great service! They delivered on time, placed the dumpster exactly where I needed it, and picked it up promptly. The pricing was transparent with no hidden fees. Highly recommend!', 'advanced-rolloffs' ),
                        'author_avatar' => 'JD',
                        'author_name' => __( 'John Doe', 'advanced-rolloffs' ),
                        'author_role' => __( 'Homeowner', 'advanced-rolloffs' ),
                    ],
                    [
                        'rating' => 5,
                        'testimonial_text' => __( 'We\'ve used Advanced Rolloffs for multiple construction projects. Their team is professional, reliable, and always goes above and beyond. The dumpsters are clean and well-maintained.', 'advanced-rolloffs' ),
                        'author_avatar' => 'SM',
                        'author_name' => __( 'Sarah Martinez', 'advanced-rolloffs' ),
                        'author_role' => __( 'Contractor', 'advanced-rolloffs' ),
                    ],
                    [
                        'rating' => 5,
                        'testimonial_text' => __( 'Best dumpster rental experience I\'ve had! The driver was courteous, made sure not to damage my driveway, and the whole process was hassle-free. Will definitely use them again!', 'advanced-rolloffs' ),
                        'author_avatar' => 'RJ',
                        'author_name' => __( 'Robert Johnson', 'advanced-rolloffs' ),
                        'author_role' => __( 'Business Owner', 'advanced-rolloffs' ),
                    ],
                ],
                'title_field' => '{{{ author_name }}} - {{{ author_role }}}',
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
                    '{{WRAPPER}} .testimonials-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
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
                    '{{WRAPPER}} .testimonials-grid' => 'gap: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __( 'Border Radius', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 12,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Rating
        $this->start_controls_section(
            'rating_style_section',
            [
                'label' => __( 'Rating Stars', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'star_color',
            [
                'label' => __( 'Star Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFD700',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-rating .star' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'star_size',
            [
                'label' => __( 'Star Size', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                    'rem' => [
                        'min' => 0.5,
                        'max' => 5,
                    ],
                ],
                'default' => [
                    'size' => 1.3,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-rating .star' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'rating_margin',
            [
                'label' => __( 'Rating Margin Bottom', 'advanced-rolloffs' ),
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
                    '{{WRAPPER}} .testimonial-rating' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Testimonial Text
        $this->start_controls_section(
            'text_style_section',
            [
                'label' => __( 'Testimonial Text', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_text_typography',
                'label' => __( 'Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .testimonial-text',
            ]
        );

        $this->add_control(
            'testimonial_text_color',
            [
                'label' => __( 'Text Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Author
        $this->start_controls_section(
            'author_style_section',
            [
                'label' => __( 'Author', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'avatar_bg_color',
            [
                'label' => __( 'Avatar Background', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .author-avatar' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'avatar_text_color',
            [
                'label' => __( 'Avatar Text Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .author-avatar' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'avatar_size',
            [
                'label' => __( 'Avatar Size', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 50,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .author-avatar' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'author_name_typography',
                'label' => __( 'Name Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .author-info h4',
            ]
        );

        $this->add_control(
            'author_name_color',
            [
                'label' => __( 'Name Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .author-info h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'author_role_typography',
                'label' => __( 'Role Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .author-info p',
            ]
        );

        $this->add_control(
            'author_role_color',
            [
                'label' => __( 'Role Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .author-info p' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .custom-testimonials-section' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .custom-testimonials-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <section class="custom-testimonials-section">
            <div class="container">
                <div class="section-header">
                    <h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
                    <p><?php echo esc_html( $settings['section_description'] ); ?></p>
                </div>
                <?php if ( $settings['testimonials_list'] ) : ?>
                    <div class="testimonials-grid">
                        <?php foreach ( $settings['testimonials_list'] as $testimonial ) : ?>
                            <div class="testimonial-card">
                                <div class="testimonial-rating">
                                    <?php
                                    $rating = intval( $testimonial['rating'] );
                                    for ( $i = 0; $i < $rating; $i++ ) :
                                    ?>
                                        <span class="star">★</span>
                                    <?php endfor; ?>
                                </div>
                                <p class="testimonial-text">"<?php echo esc_html( $testimonial['testimonial_text'] ); ?>"</p>
                                <div class="testimonial-author">
                                    <div class="author-avatar"><?php echo esc_html( $testimonial['author_avatar'] ); ?></div>
                                    <div class="author-info">
                                        <h4><?php echo esc_html( $testimonial['author_name'] ); ?></h4>
                                        <p><?php echo esc_html( $testimonial['author_role'] ); ?></p>
                                    </div>
                                </div>
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
        <section class="custom-testimonials-section">
            <div class="container">
                <div class="section-header">
                    <h2>{{{ settings.section_title }}}</h2>
                    <p>{{{ settings.section_description }}}</p>
                </div>
                <# if ( settings.testimonials_list.length ) { #>
                    <div class="testimonials-grid">
                        <# _.each( settings.testimonials_list, function( testimonial ) { #>
                            <div class="testimonial-card">
                                <div class="testimonial-rating">
                                    <# for ( var i = 0; i < testimonial.rating; i++ ) { #>
                                        <span class="star">★</span>
                                    <# } #>
                                </div>
                                <p class="testimonial-text">"{{{ testimonial.testimonial_text }}}"</p>
                                <div class="testimonial-author">
                                    <div class="author-avatar">{{{ testimonial.author_avatar }}}</div>
                                    <div class="author-info">
                                        <h4>{{{ testimonial.author_name }}}</h4>
                                        <p>{{{ testimonial.author_role }}}</p>
                                    </div>
                                </div>
                            </div>
                        <# }); #>
                    </div>
                <# } #>
            </div>
        </section>

        <?php
    }
}
