    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Footer Widget Area 1 - About -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php else : ?>
                        <?php if ( has_custom_logo() ) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/Logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="footer-logo">
                        <?php endif; ?>
                        <p class="footer-about"><?php bloginfo( 'description' ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 2 - Quick Links -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php else : ?>
                        <h4>Quick Links</h4>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ) );
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 3 - Company -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    <?php else : ?>
                        <h4>Company</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About Us</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>">FAQ</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 4 - Contact -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-4' ); ?>
                    <?php else : ?>
                        <h4>Contact Info</h4>
                        <ul class="footer-contact">
                            <li>📞 <a href="tel:+1234567890">(123) 456-7890</a></li>
                            <li>✉️ <a href="mailto:info@advancedrolloffs.com">info@advancedrolloffs.com</a></li>
                            <li>📍 Your City, State 12345</li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-bottom">
                <!-- Footer Bottom Left - Copyright -->
                <div class="footer-bottom-left">
                    <?php if ( is_active_sidebar( 'footer-bottom-left' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-bottom-left' ); ?>
                    <?php else : ?>
                        <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
                    <?php endif; ?>
                </div>

                <!-- Footer Bottom Right - Links -->
                <div class="footer-bottom-right">
                    <?php if ( is_active_sidebar( 'footer-bottom-right' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-bottom-right' ); ?>
                    <?php else : ?>
                        <div class="footer-bottom-links">
                            <a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy Policy</a>
                            <a href="<?php echo esc_url( home_url( '/terms' ) ); ?>">Terms of Service</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
