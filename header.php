<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/Logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img">
                        </a>
                    <?php endif; ?>
                </div>
                <button class="mobile-menu-toggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ) );
                ?>
                <?php
                $button_style = get_theme_mod( 'header_button_style', 'button' );
                if ( $button_style !== 'hide' ) :
                    $button_text = get_theme_mod( 'header_button_text', 'Call Now' );
                    $button_url = get_theme_mod( 'header_button_url', 'tel:+1234567890' );
                ?>
                    <a href="<?php echo esc_url( $button_url ); ?>" class="cta-button"><?php echo esc_html( $button_text ); ?></a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
