<?php
/**
 * Template Name: Homepage
 * Description: Homepage template for Advanced Rolloffs
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-shapes-bg">
            <div class="hero-shape hero-shape-1"></div>
            <div class="hero-shape hero-shape-2"></div>
        </div>
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-content">
                    <h1>Professional Roll-Off Dumpster Rentals</h1>
                    <p class="hero-subtitle">Fast, Reliable, and Affordable Waste Management Solutions for Your Home or Business</p>

                    <div class="hero-features">
                        <div class="hero-feature">
                            <span class="feature-icon">✓</span>
                            <span>Multiple Sizes Available</span>
                        </div>
                        <div class="hero-feature">
                            <span class="feature-icon">✓</span>
                            <span>Same-Day Delivery</span>
                        </div>
                        <div class="hero-feature">
                            <span class="feature-icon">✓</span>
                            <span>Competitive Pricing</span>
                        </div>
                    </div>

                    <div class="hero-buttons">
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Get a Free Quote</a>
                        <a href="tel:+1234567890" class="btn btn-secondary">
                            <span>📞</span> Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kentucky Service Area Section -->
    <section class="kentucky-service-area">
        <div class="container">
            <div class="service-area-content">
                <div class="service-area-text">
                    <h2>Roll Off Dumpsters: Local Kentucky Dumpster Rentals for Any Size Project</h2>
                    <p class="service-area-description">Advanced Rolloffs locally rents out roll-off dumpsters for projects of any size in Louisville and Lexington, Kentucky. Our waste disposal solutions are hassle-free, secure, and hygienic. We present 7 types of roll-off dumpster rentals from 6-yard to 40-yard dumpsters. Advanced Rolloffs is the reliable choice for your Kentucky dumpster rental needs, ensuring a seamless, secure, and sanitary experience.</p>
                </div>
                <div class="featured-image-wrapper">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/3.webp' ); ?>" alt="Roll Off Dumpster Rental in Kentucky" class="featured-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="services-overview">
        <div class="container">
            <div class="section-header">
                <h2>Our Dumpster Rental Services</h2>
                <p>We provide reliable roll-off dumpster rentals for all your waste management needs</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🏠</div>
                    <h3>Residential Projects</h3>
                    <p>Perfect for home renovations, cleanouts, and landscaping projects. We make residential waste removal simple and stress-free.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏗️</div>
                    <h3>Commercial & Construction</h3>
                    <p>Heavy-duty dumpsters for construction sites, demolition projects, and commercial waste management needs.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">♻️</div>
                    <h3>Eco-Friendly Disposal</h3>
                    <p>We're committed to responsible waste disposal and recycling to protect our environment.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Driveway Protection Section -->
    <section class="driveway-protection">
        <div class="container">
            <div class="driveway-content">
                <div class="driveway-text">
                    <h2>Protect Your Driveway</h2>
                    <p>At Advanced Rolloffs, we prioritize a seamless experience. Our drivers skillfully position dumpsters on boards to safeguard your pavement. Our light, compact trucks guarantee a secure and damage-free operation, setting us apart from the typical heavy dumpster trucks.</p>
                    <div class="driveway-features">
                        <div class="driveway-feature">
                            <span class="check-icon">✓</span>
                            <span>Professional board placement</span>
                        </div>
                        <div class="driveway-feature">
                            <span class="check-icon">✓</span>
                            <span>Light, compact trucks</span>
                        </div>
                        <div class="driveway-feature">
                            <span class="check-icon">✓</span>
                            <span>Damage-free guarantee</span>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Get Your Free Quote</a>
                </div>
                <div class="featured-image-wrapper">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/2.webp' ); ?>" alt="Driveway Protection with Advanced Rolloffs" class="featured-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Dumpster Sizes -->
    <section class="dumpster-sizes">
        <div class="container">
            <div class="section-header">
                <h2>Choose Your Dumpster Size</h2>
                <p>We offer a variety of dumpster sizes to fit any project</p>
            </div>
            <div class="sizes-grid">
                <div class="size-card">
                    <h3>10 Yard</h3>
                    <p class="size-dimensions">12' L × 8' W × 3.5' H</p>
                    <p>Ideal for small cleanouts and minor renovations</p>
                    <ul class="size-features">
                        <li>Garage cleanouts</li>
                        <li>Small bathroom remodels</li>
                        <li>Yard waste</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-link">Get Quote →</a>
                </div>
                <div class="size-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <h3>20 Yard</h3>
                    <p class="size-dimensions">22' L × 8' W × 4.5' H</p>
                    <p>Perfect for medium-sized projects and renovations</p>
                    <ul class="size-features">
                        <li>Kitchen remodels</li>
                        <li>Roof replacements</li>
                        <li>Large cleanouts</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-link">Get Quote →</a>
                </div>
                <div class="size-card">
                    <h3>30 Yard</h3>
                    <p class="size-dimensions">22' L × 8' W × 6' H</p>
                    <p>Great for large residential or commercial projects</p>
                    <ul class="size-features">
                        <li>New construction</li>
                        <li>Major demolitions</li>
                        <li>Estate cleanouts</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-link">Get Quote →</a>
                </div>
                <div class="size-card">
                    <h3>40 Yard</h3>
                    <p class="size-dimensions">22' L × 8' W × 8' H</p>
                    <p>Our largest dumpster for major commercial projects</p>
                    <ul class="size-features">
                        <li>Large construction sites</li>
                        <li>Commercial demolitions</li>
                        <li>Major cleanups</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-link">Get Quote →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose Advanced Rolloffs?</h2>
                <p>Experience the difference with our professional dumpster rental service</p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-number">01</div>
                    <h3>Fast Delivery</h3>
                    <p>Same-day or next-day delivery available. We work on your schedule to keep your project moving.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-number">02</div>
                    <h3>Competitive Pricing</h3>
                    <p>Transparent pricing with no hidden fees. Get the best value for your dumpster rental.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-number">03</div>
                    <h3>Flexible Rental Periods</h3>
                    <p>Rent for as long as you need. We offer flexible rental periods to accommodate any project timeline.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-number">04</div>
                    <h3>Professional Service</h3>
                    <p>Our experienced team ensures safe, reliable delivery and pickup. Customer satisfaction guaranteed.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>What Our Customers Say</h2>
                <p>Don't just take our word for it - hear from our satisfied customers</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="testimonial-text">"Outstanding company with great service! They delivered on time, placed the dumpster exactly where I needed it, and picked it up promptly. The pricing was transparent with no hidden fees. Highly recommend!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">JD</div>
                        <div class="author-info">
                            <h4>John Doe</h4>
                            <p>Homeowner</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="testimonial-text">"We've used Advanced Rolloffs for multiple construction projects. Their team is professional, reliable, and always goes above and beyond. The dumpsters are clean and well-maintained."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SM</div>
                        <div class="author-info">
                            <h4>Sarah Martinez</h4>
                            <p>Contractor</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="testimonial-text">"Best dumpster rental experience I've had! The driver was courteous, made sure not to damage my driveway, and the whole process was hassle-free. Will definitely use them again!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">RJ</div>
                        <div class="author-info">
                            <h4>Robert Johnson</h4>
                            <p>Business Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Get Started?</h2>
                <p>Contact us today for a free quote and fast delivery</p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Request a Quote</a>
                    <a href="tel:+1234567890" class="btn btn-white">Call: (123) 456-7890</a>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
?>
