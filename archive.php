<?php
/**
 * Archive Template
 * Displays archives for categories, tags, authors, dates, and custom post types
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main" role="main" style="padding: 75px 0;">
    <div class="container">

        <!-- Archive Header -->
        <header class="archive-header" style="max-width: 800px; margin: 0 auto 3rem; text-align: center;">
            <?php
            // Get archive title and description
            $archive_title = '';
            $archive_description = '';

            if ( is_category() ) {
                $archive_title = single_cat_title( '', false );
                $archive_description = category_description();
            } elseif ( is_tag() ) {
                $archive_title = single_tag_title( '', false );
                $archive_description = tag_description();
            } elseif ( is_author() ) {
                $archive_title = get_the_author();
                $archive_description = get_the_author_meta( 'description' );
            } elseif ( is_date() ) {
                if ( is_year() ) {
                    $archive_title = get_the_date( 'Y' );
                } elseif ( is_month() ) {
                    $archive_title = get_the_date( 'F Y' );
                } elseif ( is_day() ) {
                    $archive_title = get_the_date( 'F j, Y' );
                }
            } elseif ( is_post_type_archive() ) {
                $archive_title = post_type_archive_title( '', false );
                $post_type = get_post_type_object( get_queried_object()->name );
                if ( $post_type && isset( $post_type->description ) ) {
                    $archive_description = $post_type->description;
                }
            } else {
                $archive_title = get_the_archive_title();
                $archive_description = get_the_archive_description();
            }
            ?>

            <!-- Archive Icon -->
            <div style="margin-bottom: 1.5rem;">
                <?php if ( is_category() ) : ?>
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                <?php elseif ( is_tag() ) : ?>
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                        <line x1="7" y1="7" x2="7.01" y2="7"></line>
                    </svg>
                <?php elseif ( is_author() ) : ?>
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                <?php elseif ( is_date() ) : ?>
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                <?php else : ?>
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                <?php endif; ?>
            </div>

            <h1 class="archive-title" style="font-size: 2.5rem; font-weight: 700; color: var(--black); line-height: 1.3; margin-bottom: 1rem;">
                <?php
                if ( is_category() ) {
                    echo esc_html( $archive_title );
                } elseif ( is_tag() ) {
                    echo '<span style="color: var(--primary-red);">#</span>' . esc_html( $archive_title );
                } elseif ( is_author() ) {
                    echo 'Posts by ' . esc_html( $archive_title );
                } elseif ( is_date() ) {
                    echo 'Archive: ' . esc_html( $archive_title );
                } else {
                    echo esc_html( $archive_title );
                }
                ?>
            </h1>

            <?php if ( $archive_description ) : ?>
                <div class="archive-description" style="color: var(--text-gray); font-size: 1.1rem; line-height: 1.8; max-width: 600px; margin: 0 auto;">
                    <?php echo wp_kses_post( $archive_description ); ?>
                </div>
            <?php endif; ?>

            <!-- Post count -->
            <div style="margin-top: 1.5rem; color: var(--text-gray); font-size: 0.95rem;">
                <?php
                global $wp_query;
                $total_posts = $wp_query->found_posts;
                echo '<strong>' . number_format_i18n( $total_posts ) . '</strong> ' . ( $total_posts === 1 ? 'post' : 'posts' );
                ?>
            </div>
        </header>

        <?php if ( have_posts() ) : ?>

            <!-- Posts Grid -->
            <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem; margin-bottom: 3rem;">

                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?> style="background: var(--white); border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden; transition: all 0.3s ease; display: flex; flex-direction: column;">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-card-thumbnail" style="overflow: hidden; height: 220px;">
                                <a href="<?php the_permalink(); ?>" style="display: block; height: 100%;">
                                    <?php
                                    the_post_thumbnail( 'medium_large', array(
                                        'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;',
                                        'alt' => get_the_title()
                                    ) );
                                    ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-card-content" style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">

                            <!-- Post Meta -->
                            <div class="post-card-meta" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap; font-size: 0.85rem; color: var(--text-gray);">
                                <span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    <?php echo get_the_date(); ?>
                                </span>

                                <?php if ( ! is_author() ) : ?>
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <?php the_author(); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ( ! is_category() && has_category() ) : ?>
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;">
                                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                        </svg>
                                        <?php the_category( ', ' ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Post Title -->
                            <h2 class="post-card-title" style="font-size: 1.4rem; font-weight: 600; line-height: 1.4; margin-bottom: 1rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--black); text-decoration: none; transition: color 0.2s ease;">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Post Excerpt -->
                            <div class="post-card-excerpt" style="color: var(--text-gray); line-height: 1.7; margin-bottom: 1.5rem; flex: 1;">
                                <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                            </div>

                            <!-- Read More Link -->
                            <a href="<?php the_permalink(); ?>" class="read-more-link" style="color: var(--primary-red); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: gap 0.3s ease;">
                                Read More
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>

            <!-- Pagination -->
            <nav class="archive-pagination" role="navigation" aria-label="Posts pagination" style="margin: 3rem 0;">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg> Previous',
                    'next_text' => 'Next <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>',
                    'before_page_number' => '<span class="screen-reader-text">Page </span>',
                ) );
                ?>
            </nav>

        <?php else : ?>

            <!-- No Posts Found -->
            <div class="no-posts-found" style="text-align: center; padding: 4rem 2rem; max-width: 600px; margin: 0 auto;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="var(--text-gray)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 2rem; opacity: 0.5;">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    <line x1="11" y1="8" x2="11" y2="14"></line>
                    <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>

                <h2 style="font-size: 2rem; font-weight: 700; color: var(--black); margin-bottom: 1rem;">
                    No Posts Found
                </h2>

                <p style="color: var(--text-gray); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
                    <?php
                    if ( is_category() ) {
                        echo 'There are no posts in this category yet.';
                    } elseif ( is_tag() ) {
                        echo 'There are no posts with this tag yet.';
                    } elseif ( is_author() ) {
                        echo 'This author hasn\'t published any posts yet.';
                    } else {
                        echo 'No posts were found in this archive.';
                    }
                    ?>
                </p>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" style="display: inline-block; background: var(--primary-red); color: var(--white); padding: 1rem 2rem; border-radius: 12px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Back to Home
                </a>
            </div>

        <?php endif; ?>

    </div>
</main>

<style>
/* Archive Page Specific Styles */
.post-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.post-card-thumbnail img:hover {
    transform: scale(1.05);
}

.post-card-title a:hover {
    color: var(--primary-red);
}

.read-more-link:hover {
    gap: 0.75rem;
    text-decoration: underline;
}

/* Archive meta links */
.post-card-meta a {
    color: var(--text-gray);
    text-decoration: none;
    transition: color 0.2s ease;
}

.post-card-meta a:hover {
    color: var(--primary-red);
}

/* Pagination Styles */
.archive-pagination {
    display: flex;
    justify-content: center;
}

.archive-pagination .nav-links {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    flex-wrap: wrap;
}

.archive-pagination .page-numbers {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    background: var(--white);
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    color: var(--text-gray);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.archive-pagination .page-numbers:hover,
.archive-pagination .page-numbers.current {
    background: var(--primary-red);
    border-color: var(--primary-red);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 20, 60, 0.25);
}

.archive-pagination .page-numbers.dots {
    border: none;
    background: transparent;
}

.archive-pagination .page-numbers.dots:hover {
    transform: none;
    box-shadow: none;
    background: transparent;
}

/* Responsive */
@media (max-width: 768px) {
    .archive-header {
        margin-bottom: 2rem !important;
    }

    .archive-title {
        font-size: 2rem !important;
    }

    .posts-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }

    .post-card-thumbnail {
        height: 200px !important;
    }

    .archive-pagination .page-numbers {
        padding: 0.625rem 1rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .archive-title {
        font-size: 1.75rem !important;
    }

    .post-card-content {
        padding: 1.25rem !important;
    }

    .post-card-title {
        font-size: 1.25rem !important;
    }
}
</style>

<?php
get_footer();
?>
