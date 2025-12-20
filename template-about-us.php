<?php
/**
 * Template Name: About Us
 * Template for the About Us page
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

    <!-- About Hero Section -->
    <section class="hero about-hero">
        <div class="hero-overlay"></div>
        <div class="hero-shapes-bg">
            <div class="hero-shape hero-shape-1"></div>
            <div class="hero-shape hero-shape-2"></div>
        </div>
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-content" style="text-align: center;">
                    <h1>About Advanced Roll Offs</h1>
                    <p class="hero-subtitle">A Family Legacy of Service, Reliability, and Excellence</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .about-hero {
            min-height: auto !important;
            max-height: 400px !important;
            height: 400px !important;
            padding: 100px 0 80px !important;
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.85) 0%, rgba(26, 26, 26, 0.85) 50%, rgba(10, 10, 10, 0.85) 100%), url('<?php echo esc_url( get_template_directory_uri() . '/img/about-hero.webp' ); ?>') !important;
            background-size: cover !important;
            background-position: center !important;
        }
        .about-hero .hero-overlay {
            background: radial-gradient(circle at 20% 50%, rgba(220, 20, 60, 0.1) 0%, transparent 50%);
        }
        .about-hero .hero-content-wrapper {
            min-height: auto !important;
        }
        .about-hero .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .about-hero .hero-subtitle {
            font-size: 1.1rem;
        }
        @media (max-width: 768px) {
            .about-hero {
                height: 300px !important;
                max-height: 300px !important;
                padding: 60px 0 50px !important;
            }
            .about-hero .hero-content h1 {
                font-size: 1.8rem;
            }
            .about-hero .hero-subtitle {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Our Story Section -->
    <section class="kentucky-service-area">
        <div class="container">
            <div class="service-area-content">
                <div class="service-area-text">
                    <h2>Our Story</h2>
                    <p class="service-area-description">Founded by brothers Dennis and Daniel Nottingham, Advanced Roll Offs builds on a remarkable journey that began in 2016 with just one truck. Through relentless drive and expertise, they expanded their Indianapolis based trucking operation into a powerhouse fleet of over 40 trucks.</p><br>
                    <p class="service-area-description">In 2025, that same visionary spirit led to the launch of our specialized roll off division delivering reliable, efficient, dumpster and waste management solutions to homes and businesses across the Indianapolis area.</p>
                </div>
                <div class="featured-image-wrapper">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/about.webp' ); ?>" alt="Advanced Roll Offs Team" class="featured-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="why-choose-us">
        <div class="container">
            <div class="section-header">
                <h2>Our Core Values</h2>
                <p>The principles that guide everything we do</p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-number">01</div>
                    <h3>Reliability</h3>
                    <p>From a single truck to a fleet of 40+, we've built our reputation on dependable service you can count on.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-number">02</div>
                    <h3>Family-Owned Excellence</h3>
                    <p>As a family business, we treat every customer like family and every project with personal care.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-number">03</div>
                    <h3>Innovation</h3>
                    <p>Continuously evolving our services to meet the changing needs of our Indianapolis community.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-number">04</div>
                    <h3>Community Commitment</h3>
                    <p>Proud to serve Indianapolis with professional waste management solutions that keep our city clean.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="driveway-protection">
        <div class="container">
            <div class="driveway-content">
                <div class="driveway-text">
                    <h2>Experience You Can Trust</h2>
                    <p>With decades of combined experience in the trucking and waste management industry, Dennis and Daniel Nottingham bring unmatched expertise to every dumpster rental. Our journey from a single truck to a thriving fleet demonstrates our commitment to growth, quality, and customer satisfaction.</p>
                    <div class="driveway-features">
                        <div class="driveway-feature">
                            <span class="check-icon">✓</span>
                            <span>40+ truck fleet</span>
                        </div>
                        <div class="driveway-feature">
                            <span class="check-icon">✓</span>
                            <span>Years of industry expertise</span>
                        </div>
                        <div class="driveway-feature">
                            <span class="check-icon">✓</span>
                            <span>Indianapolis area specialists</span>
                        </div>
                    </div>
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn btn-primary">Get Your Free Quote</a>
                </div>
                <div class="featured-image-wrapper">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/about-2.webp' ); ?>" alt="Advanced Roll Offs Fleet" class="featured-image">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Experience the Advanced Roll Offs Difference?</h2>
                <p>Contact us today and discover why Indianapolis trusts us for their waste management needs</p>
                <div class="cta-buttons">
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn btn-primary">Request a Quote</a>
                    <a href="tel:+317-564-3094" class="btn btn-white">Call: 317-564-3094</a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
?>
