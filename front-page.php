<?php
/**
 * Front Page Template
 * Shows hardcoded homepage content when page slug is 'home'
 * Otherwise shows the page content for page builder compatibility
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();

// Check if this is the 'home' page slug - if so, show hardcoded template
global $post;
if ( isset( $post->post_name ) && $post->post_name === 'home' ) :

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
                        <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn btn-primary">Get a Free Quote</a>
                        <a href="tel:+317-564-3094" class="btn btn-secondary">
                            <span>
                                <svg version="1.1" id="fi_597177" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 513.64 513.64" style="enable-background:new 0 0 513.64 513.64;width:20px;fill:currentColor;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
                                            c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
                                            c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
                                            l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"></path>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                </svg>
                            </span> Call Now
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
                    <h2>Roll Off Dumpsters:  Local Indianapolis Dumpster Rentals for Any Size Project</h2>
                    <p class="service-area-description">Advanced Roll Offs locally rents out **roll-off dumpsters** for projects of any size in the **Indianapolis, Indiana area**. Our waste disposal solutions are hassle-free, secure, and hygienic. We offer 4 types of **roll-off dumpster rentals**, ranging from 10-yard to 40-yard dumpsters to fit residential cleanouts, construction debris, remodeling, and more.</p><br>
                    <p class="service-area-description">Advanced Roll Offs is the reliable choice for your **dumpster rental needs in Indianapolis, IN**, ensuring a seamless, secure, and sanitary experience with prompt delivery and pickup across the greater Indy metro area. Contact us today for affordable **roll off dumpster rental in Indianapolis, Indiana**!</p>
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
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn btn-primary">Get Your Free Quote</a>
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
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn-link">Get Quote →</a>
                </div>
                <div class="size-card">
                    
                    <h3>20 Yard</h3>
                    <p class="size-dimensions">22' L × 8' W × 4.5' H</p>
                    <p>Perfect for medium-sized projects and renovations</p>
                    <ul class="size-features">
                        <li>Kitchen remodels</li>
                        <li>Roof replacements</li>
                        <li>Large cleanouts</li>
                    </ul>
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn-link">Get Quote →</a>
                </div>
                <div class="size-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <h3>30 Yard</h3>
                    <p class="size-dimensions">22' L × 8' W × 6' H</p>
                    <p>Great for large residential or commercial projects</p>
                    <ul class="size-features">
                        <li>New construction</li>
                        <li>Major demolitions</li>
                        <li>Estate cleanouts</li>
                    </ul>
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn-link">Get Quote →</a>
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
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn-link">Get Quote →</a>
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


    <!-- Map section -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6129.187804323374!2d-86.33020102252102!3d39.81610017154237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca922490160a3%3A0x7e426579d2fd117e!2sAdvanced%20Roll%20Offs!5e0!3m2!1sen!2sus!4v1766080894480!5m2!1sen!2sus" style="border:0;width: 100%; height:450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Get Started?</h2>
                <p>Contact us today for a free quote and fast delivery</p>
                <div class="cta-buttons">
                    <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn btn-primary">Request a Quote</a>
                    <a href="tel:+317-564-3094" class="btn btn-white">Call: 317-564-3094</a>
                </div>
            </div>
        </div>
    </section>


<?php
else :
    // For other pages, show the content area so page builders can work
    ?>
    <main id="main" class="site-main" style="padding: 75px 0;">
        <div class="container">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>
    </main>
    <?php
endif;

get_footer();
?>
