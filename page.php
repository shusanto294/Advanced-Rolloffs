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
                <header class="entry-header" style="margin-bottom: 2rem;">
                    <h1 class="entry-title" style="font-size: 2.5rem; font-weight: 700; color: var(--black); line-height: 1.3; margin-bottom: 1rem;"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php
                    the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links" style="margin: 2rem 0; padding-top: 1rem; border-top: 1px solid #e0e0e0;">' . esc_html__( 'Pages:', 'advanced-rolloffs' ),
                        'after'  => '</div>',
                        'link_before' => '<span style="display: inline-block; margin: 0 0.5rem; padding: 0.5rem 1rem; background: var(--light-gray); border-radius: 5px;">',
                        'link_after' => '</span>',
                    ) );
                    ?>
                </div>
                <!-- <footer class="entry-footer">
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
                </footer> -->
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

<style>
/* Post Content Typography - Proper Heading Sizes and Spacing */
.entry-content {
    line-height: 1.8;
    color: var(--text-gray);
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

/* Headings - Proper hierarchy and spacing */
.entry-content h1 {
    font-size: 2.25rem;
    font-weight: 700;
    color: var(--black);
    line-height: 1.3;
    margin-top: 2.5rem;
    margin-bottom: 1.25rem;
}

.entry-content h2 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--black);
    line-height: 1.3;
    margin-top: 2.25rem;
    margin-bottom: 1rem;
}

.entry-content h3 {
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--black);
    line-height: 1.4;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.entry-content h4 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--black);
    line-height: 1.4;
    margin-top: 1.75rem;
    margin-bottom: 0.875rem;
}

.entry-content h5 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--black);
    line-height: 1.5;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}

.entry-content h6 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--black);
    line-height: 1.5;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* First heading has no top margin */
.entry-content > h1:first-child,
.entry-content > h2:first-child,
.entry-content > h3:first-child,
.entry-content > h4:first-child,
.entry-content > h5:first-child,
.entry-content > h6:first-child {
    margin-top: 0;
}

/* Paragraphs - Proper spacing */
.entry-content p {
    margin-bottom: 1.5rem;
    line-height: 1.8;
}

.entry-content p:last-child {
    margin-bottom: 0;
}

/* Lists - Proper spacing and styling */
.entry-content ul,
.entry-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
    line-height: 1.8;
}

.entry-content ul li,
.entry-content ol li {
    margin-bottom: 0.75rem;
}

.entry-content ul li:last-child,
.entry-content ol li:last-child {
    margin-bottom: 0;
}

.entry-content ul {
    list-style-type: disc;
}

.entry-content ul ul {
    list-style-type: circle;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}

.entry-content ol {
    list-style-type: decimal;
}

.entry-content ol ol {
    list-style-type: lower-alpha;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}

/* Blockquotes - Highlighted styling */
.entry-content blockquote {
    margin: 2rem 0;
    padding: 1.5rem 2rem;
    background: var(--light-gray);
    border-left: 4px solid var(--primary-red);
    border-radius: 0 8px 8px 0;
    font-size: 1.15rem;
    font-style: italic;
    color: var(--text-gray);
}

.entry-content blockquote p:last-child {
    margin-bottom: 0;
}

.entry-content blockquote cite {
    display: block;
    margin-top: 1rem;
    font-size: 0.9rem;
    font-style: normal;
    color: var(--black);
    font-weight: 600;
}

/* Images - Responsive and styled */
.entry-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1.5rem 0;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
}

.entry-content figure {
    margin: 2rem 0;
}

.entry-content figcaption {
    font-size: 0.9rem;
    color: var(--text-gray);
    text-align: center;
    margin-top: 0.75rem;
    font-style: italic;
}

/* Links in post content */
.entry-content a {
    color: var(--primary-red) !important;
    text-decoration: underline;
    transition: all 0.2s ease;
}

.entry-content a:hover {
    color: #b81547 !important;
    text-decoration-thickness: 2px;
}

/* Page Links */
.page-links a {
    color: var(--primary-red) !important;
    text-decoration: none;
}

.page-links a:hover {
    color: #b81547 !important;
}

/* Code blocks - Monospace styling */
.entry-content code {
    background: var(--light-gray);
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    font-family: 'Courier New', Courier, monospace;
    font-size: 0.95rem;
    color: var(--primary-red);
}

.entry-content pre {
    background: #2d2d2d;
    color: #f8f8f2;
    padding: 1.5rem;
    border-radius: 8px;
    overflow-x: auto;
    margin: 1.5rem 0;
    line-height: 1.6;
}

.entry-content pre code {
    background: transparent;
    padding: 0;
    color: inherit;
    border-radius: 0;
}

/* Tables - Clean and responsive */
.entry-content table {
    width: 100%;
    margin: 2rem 0;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.entry-content table thead {
    background: var(--primary-red);
    color: var(--white);
}

.entry-content table th {
    padding: 1rem;
    text-align: left;
    font-weight: 600;
}

.entry-content table td {
    padding: 1rem;
    border-bottom: 1px solid #e0e0e0;
}

.entry-content table tbody tr:hover {
    background: var(--light-gray);
}

.entry-content table tbody tr:last-child td {
    border-bottom: none;
}

/* Horizontal Rules */
.entry-content hr {
    margin: 2.5rem 0;
    border: none;
    border-top: 2px solid #e0e0e0;
}

/* Strong and Emphasis */
.entry-content strong,
.entry-content b {
    font-weight: 700;
    color: var(--black);
}

.entry-content em,
.entry-content i {
    font-style: italic;
}

/* Responsive Design and Typography */
@media (max-width: 768px) {
    /* Main Container - Add padding */
    #main.site-main {
        padding: 50px 0 !important;
    }

    #main .container {
        padding: 0 1.5rem;
    }

    .entry-content {
        font-size: 1.05rem;
    }

    .entry-content h1 {
        font-size: 1.9rem;
        margin-top: 2rem;
    }

    .entry-content h2 {
        font-size: 1.65rem;
        margin-top: 1.75rem;
    }

    .entry-content h3 {
        font-size: 1.45rem;
        margin-top: 1.5rem;
    }

    .entry-content h4 {
        font-size: 1.3rem;
        margin-top: 1.25rem;
    }

    .entry-content h5 {
        font-size: 1.15rem;
    }

    .entry-content h6 {
        font-size: 1.05rem;
    }

    .entry-content blockquote {
        padding: 1rem 1.25rem;
        font-size: 1.05rem;
    }

    .entry-content ul,
    .entry-content ol {
        padding-left: 1.5rem;
    }

    /* Page Title on Tablet */
    .entry-title {
        font-size: 2rem !important;
    }
}

@media (max-width: 480px) {
    /* Main Container - Less padding on small mobile */
    #main.site-main {
        padding: 40px 0 !important;
    }

    #main .container {
        padding: 0 1rem;
    }

    .entry-content {
        font-size: 1rem;
    }

    .entry-content h1 {
        font-size: 1.75rem;
    }

    .entry-content h2 {
        font-size: 1.5rem;
    }

    .entry-content h3 {
        font-size: 1.35rem;
    }

    .entry-content h4 {
        font-size: 1.2rem;
    }

    /* Page Title on Mobile - Much Smaller */
    .entry-title {
        font-size: 1.75rem !important;
        line-height: 1.2 !important;
        margin-bottom: 1rem !important;
    }
}
</style>

<?php
get_footer();
?>
