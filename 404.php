<?php
/**
 * 404 Error Page Template
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<section class="error-404-section" style="padding: 100px 0; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); min-height: 60vh; display: flex; align-items: center; position: relative; overflow: hidden;">
    <div class="hero-shapes-bg">
        <div class="hero-shape hero-shape-1"></div>
        <div class="hero-shape hero-shape-2"></div>
    </div>
    <div class="container" style="position: relative; z-index: 2;">
        <div style="text-align: center; color: #fff; max-width: 700px; margin: 0 auto;">
            <h1 style="font-size: 120px; font-weight: 800; margin: 0 0 20px 0; color: #fff; line-height: 1;">404</h1>
            <h2 style="font-size: 36px; font-weight: 700; margin: 0 0 20px 0; color: #fff;">Page Not Found</h2>
            <p style="font-size: 18px; margin: 0 0 40px 0; color: rgba(255,255,255,0.9); line-height: 1.6;">
                Oops! The page you're looking for seems to have been moved or doesn't exist.
                Don't worry, we'll help you find what you need.
            </p>

            <div class="hero-buttons" style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-bottom: 50px;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Go to Homepage</a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-secondary">Contact Us</a>
            </div>

    
        </div>
    </div>
</section>



<?php
get_footer();
?>
