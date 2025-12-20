<?php
/**
 * Custom Pricing Tables Elementor Widget
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_Pricing_Tables_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'custom_pricing_tables';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __( 'Custom Pricing Tables', 'advanced-rolloffs' );
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
        return [ 'pricing', 'tables', 'sizes', 'dumpster', 'cards', 'advanced rolloffs' ];
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
                'default' => __( 'Choose Your Dumpster Size', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __( 'Section Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We offer a variety of dumpster sizes to fit any project', 'advanced-rolloffs' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Pricing Tables Section
        $this->start_controls_section(
            'tables_section',
            [
                'label' => __( 'Pricing Tables', 'advanced-rolloffs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'table_title',
            [
                'label' => __( 'Title', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '10 Yard', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'table_dimensions',
            [
                'label' => __( 'Dimensions', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '12\' L × 8\' W × 3.5\' H', 'advanced-rolloffs' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'table_description',
            [
                'label' => __( 'Description', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Ideal for small cleanouts and minor renovations', 'advanced-rolloffs' ),
                'rows' => 2,
            ]
        );

        $repeater->add_control(
            'is_featured',
            [
                'label' => __( 'Featured/Popular', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-rolloffs' ),
                'label_off' => __( 'No', 'advanced-rolloffs' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $repeater->add_control(
            'popular_badge_text',
            [
                'label' => __( 'Popular Badge Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Most Popular', 'advanced-rolloffs' ),
                'condition' => [
                    'is_featured' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'features_heading',
            [
                'label' => __( 'Features', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'features_list',
            [
                'label' => __( 'Features (one per line)', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Garage cleanouts\nSmall bathroom remodels\nYard waste",
                'rows' => 5,
                'description' => __( 'Enter each feature on a new line', 'advanced-rolloffs' ),
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Quote →', 'advanced-rolloffs' ),
            ]
        );

        $repeater->add_control(
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
            ]
        );

        $this->add_control(
            'pricing_tables',
            [
                'label' => __( 'Pricing Tables', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'table_title' => __( '10 Yard', 'advanced-rolloffs' ),
                        'table_dimensions' => __( '12\' L × 8\' W × 3.5\' H', 'advanced-rolloffs' ),
                        'table_description' => __( 'Ideal for small cleanouts and minor renovations', 'advanced-rolloffs' ),
                        'features_list' => "Garage cleanouts\nSmall bathroom remodels\nYard waste",
                        'button_text' => __( 'Get Quote →', 'advanced-rolloffs' ),
                        'is_featured' => 'no',
                    ],
                    [
                        'table_title' => __( '20 Yard', 'advanced-rolloffs' ),
                        'table_dimensions' => __( '22\' L × 8\' W × 4.5\' H', 'advanced-rolloffs' ),
                        'table_description' => __( 'Perfect for medium-sized projects and renovations', 'advanced-rolloffs' ),
                        'features_list' => "Kitchen remodels\nRoof replacements\nLarge cleanouts",
                        'button_text' => __( 'Get Quote →', 'advanced-rolloffs' ),
                        'is_featured' => 'no',
                    ],
                    [
                        'table_title' => __( '30 Yard', 'advanced-rolloffs' ),
                        'table_dimensions' => __( '22\' L × 8\' W × 6\' H', 'advanced-rolloffs' ),
                        'table_description' => __( 'Great for large residential or commercial projects', 'advanced-rolloffs' ),
                        'features_list' => "New construction\nMajor demolitions\nEstate cleanouts",
                        'button_text' => __( 'Get Quote →', 'advanced-rolloffs' ),
                        'is_featured' => 'yes',
                        'popular_badge_text' => __( 'Most Popular', 'advanced-rolloffs' ),
                    ],
                    [
                        'table_title' => __( '40 Yard', 'advanced-rolloffs' ),
                        'table_dimensions' => __( '22\' L × 8\' W × 8\' H', 'advanced-rolloffs' ),
                        'table_description' => __( 'Our largest dumpster for major commercial projects', 'advanced-rolloffs' ),
                        'features_list' => "Large construction sites\nCommercial demolitions\nMajor cleanups",
                        'button_text' => __( 'Get Quote →', 'advanced-rolloffs' ),
                        'is_featured' => 'no',
                    ],
                ],
                'title_field' => '{{{ table_title }}}',
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
                    '{{WRAPPER}} .sizes-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
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
                    'size' => 2,
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sizes-grid' => 'gap: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .size-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'featured_border_color',
            [
                'label' => __( 'Featured Border Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .size-card.featured' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'popular_badge_bg_color',
            [
                'label' => __( 'Popular Badge Background', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-badge' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'popular_badge_text_color',
            [
                'label' => __( 'Popular Badge Text Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-badge' => 'color: {{VALUE}}',
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
                    'top' => '2',
                    'right' => '2',
                    'bottom' => '2',
                    'left' => '2',
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .size-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'label' => __( 'Card Title Typography', 'advanced-rolloffs' ),
                'selector' => '{{WRAPPER}} .size-card h3',
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => __( 'Card Title Color', 'advanced-rolloffs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .size-card h3' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .custom-pricing-tables-section' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .custom-pricing-tables-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <section class="custom-pricing-tables-section">
            <div class="container">
                <div class="section-header">
                    <h2><?php echo esc_html( $settings['section_title'] ); ?></h2>
                    <p><?php echo esc_html( $settings['section_description'] ); ?></p>
                </div>
                <?php if ( $settings['pricing_tables'] ) : ?>
                    <div class="sizes-grid">
                        <?php foreach ( $settings['pricing_tables'] as $table ) :
                            $button_url = $table['button_url']['url'];
                            $button_target = $table['button_url']['is_external'] ? ' target="_blank"' : '';
                            $button_nofollow = $table['button_url']['nofollow'] ? ' rel="nofollow"' : '';
                            $featured_class = 'yes' === $table['is_featured'] ? ' featured' : '';
                        ?>
                            <div class="size-card<?php echo esc_attr( $featured_class ); ?>">
                                <?php if ( 'yes' === $table['is_featured'] && ! empty( $table['popular_badge_text'] ) ) : ?>
                                    <div class="popular-badge"><?php echo esc_html( $table['popular_badge_text'] ); ?></div>
                                <?php endif; ?>

                                <h3><?php echo esc_html( $table['table_title'] ); ?></h3>

                                <?php if ( ! empty( $table['table_dimensions'] ) ) : ?>
                                    <p class="size-dimensions"><?php echo esc_html( $table['table_dimensions'] ); ?></p>
                                <?php endif; ?>

                                <p><?php echo esc_html( $table['table_description'] ); ?></p>

                                <?php if ( ! empty( $table['features_list'] ) ) :
                                    $features = explode( "\n", $table['features_list'] );
                                ?>
                                    <ul class="size-features">
                                        <?php foreach ( $features as $feature ) :
                                            $feature = trim( $feature );
                                            if ( ! empty( $feature ) ) :
                                        ?>
                                            <li><?php echo esc_html( $feature ); ?></li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                                <?php endif; ?>

                                <a href="<?php echo esc_url( $button_url ); ?>" class="btn-link"<?php echo $button_target . $button_nofollow; ?>>
                                    <?php echo esc_html( $table['button_text'] ); ?>
                                </a>
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
        <section class="custom-pricing-tables-section">
            <div class="container">
                <div class="section-header">
                    <h2>{{{ settings.section_title }}}</h2>
                    <p>{{{ settings.section_description }}}</p>
                </div>
                <# if ( settings.pricing_tables.length ) { #>
                    <div class="sizes-grid">
                        <# _.each( settings.pricing_tables, function( table ) {
                            var buttonTarget = table.button_url.is_external ? ' target="_blank"' : '';
                            var buttonNofollow = table.button_url.nofollow ? ' rel="nofollow"' : '';
                            var featuredClass = 'yes' === table.is_featured ? ' featured' : '';
                        #>
                            <div class="size-card{{{ featuredClass }}}">
                                <# if ( 'yes' === table.is_featured && table.popular_badge_text ) { #>
                                    <div class="popular-badge">{{{ table.popular_badge_text }}}</div>
                                <# } #>

                                <h3>{{{ table.table_title }}}</h3>

                                <# if ( table.table_dimensions ) { #>
                                    <p class="size-dimensions">{{{ table.table_dimensions }}}</p>
                                <# } #>

                                <p>{{{ table.table_description }}}</p>

                                <# if ( table.features_list ) {
                                    var features = table.features_list.split('\n');
                                #>
                                    <ul class="size-features">
                                        <# _.each( features, function( feature ) {
                                            feature = feature.trim();
                                            if ( feature ) {
                                        #>
                                            <li>{{{ feature }}}</li>
                                        <#
                                            }
                                        });
                                        #>
                                    </ul>
                                <# } #>

                                <a href="{{ table.button_url.url }}" class="btn-link"{{{ buttonTarget }}}{{{ buttonNofollow }}}>
                                    {{{ table.button_text }}}
                                </a>
                            </div>
                        <# }); #>
                    </div>
                <# } #>
            </div>
        </section>

        <?php
    }
}
