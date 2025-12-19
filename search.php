<?php
/**
 * Search Results Template
 * Displays search results for the site
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main search-results-page" role="main" style="padding: 75px 0;">
    <div class="container">

        <!-- Search Header -->
        <header class="search-header" style="max-width: 800px; margin: 0 auto 3rem; text-align: center;">

            <!-- Search Icon -->
            <div style="margin-bottom: 1.5rem;">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>

            <h1 class="search-title" style="font-size: 2.5rem; font-weight: 700; color: var(--black); line-height: 1.3; margin-bottom: 1rem;">
                <?php
                /* translators: %s: search query */
                printf( esc_html__( 'Search Results for: %s', 'advanced-rolloffs' ), '<span style="color: var(--primary-red);">"' . get_search_query() . '"</span>' );
                ?>
            </h1>

            <?php if ( have_posts() ) : ?>
                <div style="color: var(--text-gray); font-size: 1rem; margin-bottom: 2rem;">
                    <?php
                    global $wp_query;
                    $total_results = $wp_query->found_posts;
                    /* translators: %s: number of search results */
                    printf(
                        esc_html( _n( 'Found %s result', 'Found %s results', $total_results, 'advanced-rolloffs' ) ),
                        '<strong>' . number_format_i18n( $total_results ) . '</strong>'
                    );
                    ?>
                </div>
            <?php endif; ?>

            <!-- Search Form -->
            <div class="search-form-container" style="max-width: 600px; margin: 2rem auto;">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; gap: 0.5rem;">
                    <label for="search-field" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'advanced-rolloffs' ); ?></label>
                    <input
                        type="search"
                        id="search-field"
                        class="search-field"
                        placeholder="<?php esc_attr_e( 'Search again...', 'advanced-rolloffs' ); ?>"
                        value="<?php echo get_search_query(); ?>"
                        name="s"
                        style="flex: 1; padding: 1rem 1.5rem; border: 2px solid #e0e0e0; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease;"
                    />
                    <button
                        type="submit"
                        class="search-submit"
                        style="padding: 1rem 2rem; background: var(--primary-red); color: var(--white); border: none; border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.5rem;"
                    >
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <?php esc_html_e( 'Search', 'advanced-rolloffs' ); ?>
                    </button>
                </form>
            </div>

        </header>

        <?php if ( have_posts() ) : ?>

            <!-- Search Results Grid -->
            <div class="search-results-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem; margin-bottom: 3rem;">

                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-card' ); ?> style="background: var(--white); border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden; transition: all 0.3s ease; display: flex; flex-direction: column;">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="result-thumbnail" style="overflow: hidden; height: 220px; position: relative;">
                                <a href="<?php the_permalink(); ?>" style="display: block; height: 100%;">
                                    <?php
                                    the_post_thumbnail( 'medium_large', array(
                                        'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;',
                                        'alt' => get_the_title()
                                    ) );
                                    ?>
                                </a>

                                <!-- Post Type Badge -->
                                <span style="position: absolute; top: 1rem; right: 1rem; background: var(--primary-red); color: var(--white); padding: 0.25rem 0.75rem; border-radius: 6px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                    <?php echo esc_html( get_post_type() === 'page' ? 'Page' : 'Post' ); ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <!-- Post Type Badge for no image -->
                            <div style="padding: 1rem;">
                                <span style="display: inline-block; background: var(--light-gray); color: var(--text-gray); padding: 0.35rem 0.85rem; border-radius: 6px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                    <?php echo esc_html( get_post_type() === 'page' ? 'Page' : 'Post' ); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="result-content" style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">

                            <!-- Post Meta -->
                            <?php if ( get_post_type() === 'post' ) : ?>
                                <div class="result-meta" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap; font-size: 0.85rem; color: var(--text-gray);">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        <?php echo get_the_date(); ?>
                                    </span>

                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <?php the_author(); ?>
                                    </span>

                                    <?php if ( has_category() ) : ?>
                                        <span>
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;">
                                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                            </svg>
                                            <?php the_category( ', ' ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Post Title -->
                            <h2 class="result-title" style="font-size: 1.4rem; font-weight: 600; line-height: 1.4; margin-bottom: 1rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--black); text-decoration: none; transition: color 0.2s ease;">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Post Excerpt -->
                            <div class="result-excerpt" style="color: var(--text-gray); line-height: 1.7; margin-bottom: 1.5rem; flex: 1;">
                                <?php
                                // Show excerpt with search terms highlighted
                                $excerpt = get_the_excerpt();
                                if ( ! $excerpt ) {
                                    $excerpt = wp_trim_words( get_the_content(), 25, '...' );
                                }
                                echo wp_kses_post( $excerpt );
                                ?>
                            </div>

                            <!-- Read More Link -->
                            <a href="<?php the_permalink(); ?>" class="result-link" style="color: var(--primary-red); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: gap 0.3s ease;">
                                <?php echo esc_html( get_post_type() === 'page' ? 'View Page' : 'Read More' ); ?>
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
            <nav class="search-pagination" role="navigation" aria-label="Search results pagination" style="margin: 3rem 0;">
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

            <!-- No Results Found -->
            <div class="no-results" style="text-align: center; padding: 4rem 2rem; max-width: 600px; margin: 0 auto;">
                <svg width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="var(--text-gray)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 2rem; opacity: 0.4;">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    <line x1="11" y1="8" x2="11" y2="14"></line>
                    <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>

                <h2 style="font-size: 2rem; font-weight: 700; color: var(--black); margin-bottom: 1rem;">
                    <?php esc_html_e( 'Nothing Found', 'advanced-rolloffs' ); ?>
                </h2>

                <p style="color: var(--text-gray); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
                    <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'advanced-rolloffs' ); ?>
                </p>

                <!-- Search Tips -->
                <div style="background: var(--light-gray); padding: 2rem; border-radius: 12px; margin-bottom: 2rem; text-align: left;">
                    <h3 style="font-size: 1.2rem; font-weight: 600; color: var(--black); margin-bottom: 1rem;">
                        <?php esc_html_e( 'Search Tips:', 'advanced-rolloffs' ); ?>
                    </h3>
                    <ul style="list-style: none; padding: 0; margin: 0; color: var(--text-gray); line-height: 2;">
                        <li style="padding-left: 1.5rem; position: relative;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 0; top: 0.25rem;">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <?php esc_html_e( 'Check your spelling', 'advanced-rolloffs' ); ?>
                        </li>
                        <li style="padding-left: 1.5rem; position: relative;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 0; top: 0.25rem;">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <?php esc_html_e( 'Try more general keywords', 'advanced-rolloffs' ); ?>
                        </li>
                        <li style="padding-left: 1.5rem; position: relative;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 0; top: 0.25rem;">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <?php esc_html_e( 'Try different keywords', 'advanced-rolloffs' ); ?>
                        </li>
                        <li style="padding-left: 1.5rem; position: relative;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--primary-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 0; top: 0.25rem;">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <?php esc_html_e( 'Try fewer keywords', 'advanced-rolloffs' ); ?>
                        </li>
                    </ul>
                </div>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" style="display: inline-block; background: var(--primary-red); color: var(--white); padding: 1rem 2rem; border-radius: 12px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    <?php esc_html_e( 'Back to Home', 'advanced-rolloffs' ); ?>
                </a>
            </div>

        <?php endif; ?>

    </div>
</main>

<style>
/* Search Page Specific Styles */
.search-field:focus {
    outline: none;
    border-color: var(--primary-red);
    box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.1);
}

.search-submit:hover {
    background: #b81547;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 20, 60, 0.25);
}

.search-result-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.result-thumbnail img:hover {
    transform: scale(1.05);
}

.result-title a:hover {
    color: var(--primary-red);
}

.result-link:hover {
    gap: 0.75rem;
    text-decoration: underline;
}

/* Search result meta links */
.result-meta a {
    color: var(--text-gray);
    text-decoration: none;
    transition: color 0.2s ease;
}

.result-meta a:hover {
    color: var(--primary-red);
}

/* Pagination Styles */
.search-pagination {
    display: flex;
    justify-content: center;
}

.search-pagination .nav-links {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    flex-wrap: wrap;
}

.search-pagination .page-numbers {
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

.search-pagination .page-numbers:hover,
.search-pagination .page-numbers.current {
    background: var(--primary-red);
    border-color: var(--primary-red);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 20, 60, 0.25);
}

.search-pagination .page-numbers.dots {
    border: none;
    background: transparent;
}

.search-pagination .page-numbers.dots:hover {
    transform: none;
    box-shadow: none;
    background: transparent;
}

/* Responsive */
@media (max-width: 768px) {
    .search-header {
        margin-bottom: 2rem !important;
    }

    .search-title {
        font-size: 2rem !important;
    }

    .search-form {
        flex-direction: column !important;
    }

    .search-submit {
        width: 100%;
        justify-content: center;
    }

    .search-results-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }

    .result-thumbnail {
        height: 200px !important;
    }

    .search-pagination .page-numbers {
        padding: 0.625rem 1rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .search-title {
        font-size: 1.5rem !important;
    }

    .result-content {
        padding: 1.25rem !important;
    }

    .result-title {
        font-size: 1.25rem !important;
    }
}
</style>

<?php
get_footer();
?>
