<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Skip to main content link for accessibility -->
    <a class="skip-link screen-reader-text" href="#main-content">
        <?php esc_html_e( 'Skip to content', 'advanced-rolloffs' ); ?>
    </a>

    <!-- Header -->
    <header class="header" role="banner">
        <div class="container">
            <nav class="navbar" role="navigation" aria-label="Main navigation">
                <div class="logo">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/Logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="logo-img" width="250" height="80">
                        </a>
                    <?php endif; ?>
                </div>
                <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e( 'Toggle mobile menu', 'advanced-rolloffs' ); ?>" aria-expanded="false" aria-controls="primary-menu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'walker'         => new Advanced_Rolloffs_Nav_Walker(),
                    'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                ) );
                ?>
                <?php
                $button_style = get_theme_mod( 'header_button_style', 'button' );
                if ( $button_style !== 'hide' ) :
                    $button_text = get_theme_mod( 'header_button_text', 'Call Now' );
                    $button_url = get_theme_mod( 'header_button_url', 'tel:+1234567890' );
                ?>
                    <a href="<?php echo esc_url( $button_url ); ?>" class="cta-button" rel="nofollow" aria-label="<?php echo esc_attr( $button_text ); ?>">
                        <?php echo esc_html( $button_text ); ?>
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
