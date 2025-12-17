<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<main class="site-main">
    <div class="container" style="padding: 80px 20px;">

        <?php if ( have_posts() ) : ?>

            <div class="posts-wrapper">
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 3rem; padding-bottom: 3rem; border-bottom: 1px solid #e0e0e0;">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail" style="margin-bottom: 1.5rem;">
                                <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; border-radius: 8px;' ) ); ?>
                            </div>
                        <?php endif; ?>

                        <header class="entry-header" style="margin-bottom: 1.5rem;">
                            <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--black); text-decoration: none;">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="entry-meta" style="color: var(--text-gray); font-size: 0.9rem;">
                                <span>Posted on <?php echo get_the_date(); ?></span>
                                <span> | By <?php the_author(); ?></span>
                            </div>
                        </header>

                        <div class="entry-content" style="line-height: 1.8; color: var(--text-gray);">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="display: inline-block; margin-top: 1rem;">
                                Read More
                            </a>
                        </footer>

                    </article>

                <?php endwhile; ?>

                <div class="pagination" style="margin-top: 2rem;">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                    ) );
                    ?>
                </div>

            </div>

        <?php else : ?>

            <div class="no-posts" style="text-align: center; padding: 4rem 2rem;">
                <h2 style="font-size: 2rem; margin-bottom: 1rem;">Nothing Found</h2>
                <p style="color: var(--text-gray); font-size: 1.1rem;">It seems we can't find what you're looking for. Perhaps searching can help.</p>
                <?php get_search_form(); ?>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
?>
