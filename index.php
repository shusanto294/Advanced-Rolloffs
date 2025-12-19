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

<main class="site-main" style="background: var(--light-gray); padding: 60px 0;">
    <div class="container">
        
        <!-- Blog Header -->
        <header class="blog-header" style="text-align: center; margin-bottom: 4rem;">
            <h1 style="font-size: 3rem; font-weight: 700; color: var(--black); margin-bottom: 1rem;">Our Blog</h1>
            <p style="font-size: 1.2rem; color: var(--text-gray); max-width: 600px; margin: 0 auto;">Tips, insights, and industry news from the Advanced Rolloffs team</p>
        </header>

        <?php if ( have_posts() ) : ?>

            <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2.5rem; margin-bottom: 4rem;">
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?> style="background: var(--white); border-radius: 15px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; position: relative;">

                        <!-- Post Thumbnail -->
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail-wrapper" style="position: relative; overflow: hidden; height: 250px;">
                                <?php the_post_thumbnail( 'medium_large', array( 
                                    'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;' 
                                ) ); ?>
                                <div class="thumbnail-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.1) 100%);"></div>
                            </div>
                        <?php else : ?>
                            <div class="post-thumbnail-placeholder" style="position: relative; overflow: hidden; height: 250px; background: var(--light-gray);">
                            </div>
                        <?php endif; ?>

                        <!-- Post Content -->
                        <div class="post-content" style="padding: 2rem;">
                            
                            <!-- Post Categories -->
                            <?php if ( has_category() ) : ?>
                                <div class="post-categories" style="margin-bottom: 1rem;">
                                    <?php 
                                    $categories = get_the_category();
                                    if ( $categories ) :
                                        foreach ( $categories as $category ) :
                                            ?>
                                            <span class="category-tag" style="display: inline-block; background: var(--primary-red); color: var(--white); padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-right: 0.5rem; margin-bottom: 0.5rem;">
                                                <?php echo esc_html( $category->name ); ?>
                                            </span>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            <?php endif; ?>

                            <header class="entry-header" style="margin-bottom: 1rem;">
                                <h2 style="font-size: 1.5rem; font-weight: 700; line-height: 1.3; margin-bottom: 0.75rem;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--black); text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='var(--primary-red)'" onmouseout="this.style.color='var(--black)'">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="entry-meta" style="color: var(--text-gray); font-size: 0.85rem; display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                                    <span style="display: flex; align-items: center; gap: 0.3rem;">
                                        📅 <?php echo get_the_date(); ?>
                                    </span>
                                    <span style="display: flex; align-items: center; gap: 0.3rem;">
                                        👤 <?php the_author(); ?>
                                    </span>
                                    <?php if ( comments_open() ) : ?>
                                        <span style="display: flex; align-items: center; gap: 0.3rem;">
                                            💬 <?php echo get_comments_number(); ?> comments
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </header>

                            <div class="entry-content" style="line-height: 1.6; color: var(--text-gray); margin-bottom: 1.5rem; font-size: 0.95rem;">
                                <?php 
                                $excerpt = get_the_excerpt();
                                echo wp_trim_words( $excerpt, 20, '...' ); 
                                ?>
                            </div>

                            <footer class="entry-footer" style="display: flex; justify-content: space-between; align-items: center;">
                                <a href="<?php the_permalink(); ?>" class="read-more-btn" style="display: inline-flex; align-items: center; gap: 0.5rem; color: var(--primary-red); text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease;">
                                    Read More
                                    <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                                
                                <?php if ( has_tag() ) : ?>
                                    <div class="post-tags" style="display: flex; gap: 0.5rem;">
                                        <?php 
                                        $tags = get_the_tags();
                                        if ( $tags ) :
                                            $tag_count = 0;
                                            foreach ( $tags as $tag ) :
                                                if ( $tag_count < 2 ) : // Show max 2 tags
                                                    ?>
                                                    <span class="tag" style="display: inline-block; background: var(--light-gray); color: var(--text-gray); padding: 0.2rem 0.6rem; border-radius: 15px; font-size: 0.75rem;">
                                                        #<?php echo esc_html( $tag->name ); ?>
                                                    </span>
                                                    <?php
                                                    $tag_count++;
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </footer>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <!-- Enhanced Pagination -->
            <div class="pagination-wrapper" style="text-align: center; margin-top: 3rem;">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'type'      => 'array',
                    'class'     => 'pagination-nav'
                ) );
                ?>
            </div>

        <?php else : ?>

            <div class="no-posts" style="text-align: center; padding: 4rem 2rem;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">📭</div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem; color: var(--black);">No Posts Found</h2>
                <p style="color: var(--text-gray); font-size: 1.1rem; margin-bottom: 2rem;">It seems we can't find what you're looking for. Try searching below:</p>
                <div style="max-width: 400px; margin: 0 auto;">
                    <?php get_search_form(); ?>
                </div>
            </div>

        <?php endif; ?>

    </div>
</main>

<style>
/* Blog Grid Layout Styling */
.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(220, 20, 60, 0.15);
}

.blog-card:hover .post-thumbnail img,
.blog-card:hover .post-thumbnail-placeholder {
    transform: scale(1.05);
}

.read-more-btn:hover {
    gap: 0.8rem;
    color: var(--dark-red);
}

.read-more-btn:hover span {
    transform: translateX(3px);
}

/* Category Tags */
.category-tag {
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Pagination Styling */
.pagination-wrapper .nav-links {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.pagination-wrapper .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 45px;
    height: 45px;
    padding: 0 1rem;
    background: var(--white);
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    color: var(--text-gray);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-wrapper .page-numbers:hover,
.pagination-wrapper .page-numbers.current {
    background: var(--primary-red);
    border-color: var(--primary-red);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 20, 60, 0.3);
}

.pagination-wrapper .prev,
.pagination-wrapper .next {
    padding: 0 1.5rem;
}

/* Search Form Styling */
.search-form {
    display: flex;
    gap: 0.5rem;
}

.search-form .search-field {
    flex: 1;
    padding: 1rem;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.search-form .search-field:focus {
    outline: none;
    border-color: var(--primary-red);
}

.search-form .search-submit {
    background: var(--primary-red);
    color: var(--white);
    border: none;
    padding: 1rem 2rem;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-form .search-submit:hover {
    background: var(--dark-red);
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .blog-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .blog-header h1 {
        font-size: 2rem;
    }
    
    .blog-header p {
        font-size: 1rem;
    }
    
    .pagination-wrapper .nav-links {
        gap: 0.3rem;
    }
    
    .pagination-wrapper .page-numbers {
        min-width: 40px;
        height: 40px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .blog-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .post-content {
        padding: 1.5rem;
    }
    
    .entry-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
}
</style>

<?php
get_footer();
?>
