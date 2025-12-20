<?php
/**
 * Template Name: Contact Page
 * Template for displaying contact page with form
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<!-- Page Hero Section -->
<section class="hero contact-hero">
    <div class="hero-overlay"></div>
    <div class="hero-shapes-bg">
        <div class="hero-shape hero-shape-1"></div>
        <div class="hero-shape hero-shape-2"></div>
    </div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-content" style="text-align: center;">
                <h1>Get In Touch</h1>
                <p class="hero-subtitle">Have questions? We're here to help!</p>
            </div>
        </div>
    </div>
</section>

<style>
        .contact-hero {
            min-height: auto !important;
            max-height: 400px !important;
            height: 400px !important;
            padding: 100px 0 80px !important;
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.85) 0%, rgba(26, 26, 26, 0.85) 50%, rgba(10, 10, 10, 0.85) 100%), url('<?php echo esc_url( get_template_directory_uri() . '/img/about-hero.webp' ); ?>') !important;
            background-size: cover !important;
            background-position: center !important;
        }
</style>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">

            <!-- Contact Information -->
            <div class="contact-info">
                <div class="section-header-left">
                    <h2>Contact Information</h2>
                    <p>Get in touch with us today. We're ready to help with your dumpster rental needs.</p>
                </div>

                <div class="contact-details">

                    <!-- Phone -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="contact-details-text">
                            <h4>Phone</h4>
                            <a href="tel:+317-564-3094">317-564-3094</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="contact-details-text">
                            <h4>Email</h4>
                            <a href="mailto:info@advancedrolloffs.com">info@advancedrolloffs.com</a>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="contact-details-text">
                            <h4>Service Area</h4>
                            <p>Indianapolis, Indiana<br>and surrounding areas</p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="contact-details-text">
                            <h4>Business Hours</h4>
                            <p>Monday - Friday: 7:00 AM - 6:00 PM<br>Saturday: 8:00 AM - 4:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <div class="section-header-left">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>

                <div class="contact-form-container">
                    <?php echo do_shortcode('[contact-form-7 id="4f46e14" title="Contact form 1"]'); ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Map Section -->
<section class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6129.187804323374!2d-86.33020102252102!3d39.81610017154237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca922490160a3%3A0x7e426579d2fd117e!2sAdvanced%20Roll%20Offs!5e0!3m2!1sen!2sus!4v1766080894480!5m2!1sen!2sus" style="border:0; width: 100%; height: 450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Need a Dumpster Right Away?</h2>
            <p>Call us now for same-day or next-day delivery!</p>
            <div class="cta-buttons">
                <a href="https://app.icans.ai/customer-portal/advanced-roll-offs/book/" target="_blank" class="btn btn-primary">Get a Quote</a>
                <a href="tel:+317-564-3094" class="btn btn-white">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 513.64 513.64" style="width:18px; fill:currentColor; margin-right: 0.5rem;">
                        <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"/>
                    </svg>
                    Call: 317-564-3094
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Contact Hero Section */
.contact-hero {
    min-height: auto !important;
    max-height: 400px !important;
    height: 400px !important;
    padding: 100px 0 80px !important;
}

.contact-hero .hero-overlay {
    background: radial-gradient(circle at 20% 50%, rgba(220, 20, 60, 0.1) 0%, transparent 50%);
}

.contact-hero .hero-content-wrapper {
    min-height: auto !important;
}

.contact-hero .hero-content h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.contact-hero .hero-subtitle {
    font-size: 1.1rem;
}

/* Contact Section */
.contact-section {
    padding: 80px 0;
    background: var(--light-gray);
}

.contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 4rem;
    align-items: stretch;
}

/* Contact Info */
.contact-info {
    background: var(--white);
    padding: 3rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.section-header-left {
    margin-bottom: 2rem;
}

.section-header-left h2 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--black);
    margin-bottom: 0.75rem;
}

.section-header-left p {
    color: var(--text-gray);
    font-size: 1.05rem;
    line-height: 1.6;
}

.contact-details {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    flex: 1;
}

.contact-item {
    display: flex;
    gap: 1.25rem;
    align-items: flex-start;
}

.contact-icon {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    background: var(--light-gray);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-red);
}

.contact-details-text h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--black);
    margin-bottom: 0.5rem;
}

.contact-details-text p,
.contact-details-text a {
    color: var(--text-gray);
    line-height: 1.6;
    font-size: 0.95rem;
}

.contact-details-text a {
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-details-text a:hover {
    color: var(--primary-red);
}

/* Contact Form */
.contact-form-wrapper {
    background: var(--white);
    padding: 3rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.contact-form-container {
    flex: 1;
    display: flex;
    flex-direction: column;
}

/* Form Styles - Compatible with Contact Form 7 */
.contact-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.contact-form .form-group {
    display: flex;
    flex-direction: column;
}

.contact-form label {
    font-weight: 600;
    color: var(--black);
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.contact-form .form-control,
.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form input[type="tel"],
.contact-form input[type="url"],
.contact-form textarea,
.wpcf7-form input[type="text"],
.wpcf7-form input[type="email"],
.wpcf7-form input[type="tel"],
.wpcf7-form input[type="url"],
.wpcf7-form textarea {
    padding: 1rem;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    font-family: inherit;
    transition: all 0.3s ease;
    background: var(--white);
    width: 100%;
}

.contact-form .form-control:focus,
.contact-form input:focus,
.contact-form textarea:focus,
.wpcf7-form input:focus,
.wpcf7-form textarea:focus {
    outline: none;
    border-color: var(--primary-red);
    box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.1);
}

.contact-form textarea {
    resize: vertical;
    min-height: 150px;
}

.form-submit {
    margin-top: 2rem;
}

/* Button Styles */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 1rem 2.5rem;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    cursor: pointer;
    font-family: inherit;
}

.btn-primary {
    background: var(--primary-red);
    color: var(--white);
    border-color: var(--primary-red);
}

.btn-primary:hover {
    background: #b81547;
    border-color: #b81547;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(220, 20, 60, 0.3);
}

.btn-large {
    padding: 1.25rem 3rem;
    font-size: 1.1rem;
}

.btn-white {
    background: var(--white);
    color: var(--primary-red);
    border-color: var(--white);
}

.btn-white:hover {
    background: transparent;
    color: var(--white);
    border-color: var(--white);
}

/* Contact Form 7 Specific Styles */
.wpcf7-form {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.wpcf7-form p {
    margin-bottom: 1.5rem;
}

.wpcf7-form p:last-of-type {
    margin-bottom: 0;
    margin-top: 1rem;
}

.wpcf7-form label {
    display: block;
    font-weight: 600;
    color: var(--black);
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.wpcf7-form .wpcf7-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 1.25rem 3rem;
    font-size: 1.1rem;
    font-weight: 600;
    background: var(--primary-red);
    color: var(--white);
    border: 2px solid var(--primary-red);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: inherit;
}

.wpcf7-form .wpcf7-submit:hover {
    background: #b81547;
    border-color: #b81547;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(220, 20, 60, 0.3);
}

.wpcf7-form .wpcf7-not-valid-tip {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.wpcf7-form .wpcf7-validation-errors,
.wpcf7-form .wpcf7-mail-sent-ok {
    border: 2px solid;
    padding: 1rem;
    border-radius: 8px;
    margin: 1.5rem 0;
}

.wpcf7-form .wpcf7-validation-errors {
    border-color: #dc3545;
    background: #f8d7da;
    color: #721c24;
}

.wpcf7-form .wpcf7-mail-sent-ok {
    border-color: #28a745;
    background: #d4edda;
    color: #155724;
}

/* Map Section */
.contact-map {
    margin: 0;
    padding: 0;
}

.contact-map iframe {
    display: block;
}

/* CTA Section */
.cta-section {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--black) 0%, var(--dark-red) 100%);
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(220, 20, 60, 0.2) 0%, transparent 70%);
    border-radius: 50%;
}

.cta-content {
    text-align: center;
    position: relative;
    z-index: 1;
}

.cta-content h2 {
    font-size: 3rem;
    color: var(--white);
    margin-bottom: 1rem;
    font-weight: 700;
}

.cta-content p {
    font-size: 1.3rem;
    color: var(--light-gray);
    margin-bottom: 2.5rem;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 992px) {
    .contact-wrapper {
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    .contact-hero h1 {
        font-size: 2.5rem;
    }

    .contact-hero .hero-subtitle {
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    .contact-hero {
        height: 300px !important;
        max-height: 300px !important;
        padding: 60px 0 50px !important;
    }

    .contact-hero .hero-content h1 {
        font-size: 1.8rem;
    }

    .contact-hero .hero-subtitle {
        font-size: 1rem;
    }

    .contact-section {
        padding: 60px 0;
    }

    .contact-info,
    .contact-form-wrapper {
        padding: 2rem;
    }

    .contact-form .form-row {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .section-header-left h2 {
        font-size: 1.75rem;
    }

    .cta-section {
        padding: 60px 0;
    }

    .cta-content h2 {
        font-size: 2.25rem;
    }

    .cta-content p {
        font-size: 1.15rem;
    }

    .cta-buttons {
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .contact-info,
    .contact-form-wrapper {
        padding: 1.5rem;
    }

    .contact-item {
        gap: 1rem;
    }

    .contact-icon {
        width: 45px;
        height: 45px;
    }

    .btn {
        padding: 0.875rem 2rem;
        font-size: 0.95rem;
    }

    .btn-large {
        padding: 1rem 2.5rem;
        font-size: 1rem;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .cta-buttons .btn {
        width: 100%;
        max-width: 100%;
    }

    .cta-content h2 {
        font-size: 1.8rem;
    }

    .cta-content p {
        font-size: 1.05rem;
    }
}
</style>

<?php
get_footer();
?>
