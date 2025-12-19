    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer-content">
                <!-- Footer Widget Area 1 - About -->
                <div class="footer-section" role="complementary">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php else : ?>
                        <?php if ( has_custom_logo() ) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/Logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="footer-logo" width="188" height="60">
                        <?php endif; ?>
                        <p class="footer-about"><?php bloginfo( 'description' ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 2 - Quick Links -->
                <div class="footer-section" role="complementary">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Quick Links', 'advanced-rolloffs' ); ?></h4>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'depth'          => 1,
                            'walker'         => new Advanced_Rolloffs_Nav_Walker(),
                            'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
                        ) );
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 3 - Company -->
                <div class="footer-section" role="complementary">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Company', 'advanced-rolloffs' ); ?></h4>
                        <ul class="footer-links" role="list">
                            <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About Us', 'advanced-rolloffs' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'advanced-rolloffs' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'advanced-rolloffs' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'advanced-rolloffs' ); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 4 - Contact -->
                <div class="footer-section" role="complementary">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-4' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Contact Info', 'advanced-rolloffs' ); ?></h4>
                        <ul class="footer-contact" role="list">
                            <li><span aria-hidden="true">📞</span> <a href="tel:+317-564-3094">(317) 564-3094</a></li>
                            <li><span aria-hidden="true">✉️</span> <a href="mailto:info@advancedrolloffs.com">info@advancedrolloffs.com</a></li>
                            <li><span aria-hidden="true">📍</span> <?php esc_html_e( 'Indianapolis, IN', 'advanced-rolloffs' ); ?></li>
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
                        <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'advanced-rolloffs' ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Footer Bottom Right - Links -->
                <div class="footer-bottom-right">
                    <?php if ( is_active_sidebar( 'footer-bottom-right' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-bottom-right' ); ?>
                    <?php else : ?>
                        <div class="footer-bottom-links" role="list">
                            <a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'advanced-rolloffs' ); ?></a>
                            <a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'advanced-rolloffs' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
