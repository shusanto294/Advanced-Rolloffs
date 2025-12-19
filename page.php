<?php
/**
 * Template for displaying pages
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main" role="main" style="padding: 75px 0;">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php
                    the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'advanced-rolloffs' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
                <footer class="entry-footer">
                    <?php
                    // Show last modified date for SEO
                    if ( get_the_modified_time() !== get_the_time() ) {
                        ?>
                        <p class="last-updated">
                            <span class="screen-reader-text"><?php esc_html_e( 'Last updated:', 'advanced-rolloffs' ); ?></span>
                            <time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
                                <?php echo esc_html( get_the_modified_date() ); ?>
                            </time>
                        </p>
                        <?php
                    }
                    ?>
                </footer>
            </article>
            
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
            
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
?>
