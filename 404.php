<?php
/**
 * 404 Error Page Template
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<section class="error-404-section" role="main">
    <div class="container">
        <div class="error-404-content">
            <header class="error-header">
                <h1 class="error-code">404</h1>
                <h2 class="error-title"><?php esc_html_e( 'Page Not Found', 'advanced-rolloffs' ); ?></h2>
            </header>
            
            <div class="error-description">
                <p><?php esc_html_e( 'Oops! The page you\'re looking for seems to have been moved or doesn\'t exist. Don\'t worry, we\'ll help you find what you need.', 'advanced-rolloffs' ); ?></p>
            </div>

            <div class="error-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'Go to Homepage', 'advanced-rolloffs' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-secondary">
                    <?php esc_html_e( 'Contact Us', 'advanced-rolloffs' ); ?>
                </a>
            </div>

            <div class="search-404">
                <h3><?php esc_html_e( 'Search for what you need:', 'advanced-rolloffs' ); ?></h3>
                <?php get_search_form(); ?>
            </div>

            <div class="popular-links">
                <h3><?php esc_html_e( 'Popular Pages:', 'advanced-rolloffs' ); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'advanced-rolloffs' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About Us', 'advanced-rolloffs' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php esc_html_e( 'Services', 'advanced-rolloffs' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'advanced-rolloffs' ); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
