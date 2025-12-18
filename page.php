<?php
/**
 * Template for displaying pages
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main" style="padding: 75px 0;">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    the_content();
                    ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
?>
