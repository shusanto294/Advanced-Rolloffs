<?php
/**
 * Single Post Template
 * Displays individual blog posts with full content
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
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Article" role="article" style="max-width: 800px; margin: 0 auto;">

                <!-- Post Header -->
                <header class="entry-header" style="margin-bottom: 2rem;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="margin-bottom: 2rem;">
                            <?php
                            the_post_thumbnail( 'large', array(
                                'style' => 'width: 100%; height: auto; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);',
                                'itemprop' => 'image',
                                'alt' => get_the_title()
                            ) );
                            ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="entry-title" itemprop="headline" style="font-size: 2.5rem; font-weight: 700; color: var(--black); line-height: 1.3; margin-bottom: 1rem;">
                        <?php the_title(); ?>
                    </h1>

                    <div class="entry-meta" style="color: var(--text-gray); font-size: 0.95rem; margin-bottom: 1.5rem;">
                        <span style="margin-right: 1.5rem;">
                            <strong>Posted:</strong>
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished">
                                <?php echo get_the_date(); ?>
                            </time>
                        </span>
                        <span style="margin-right: 1.5rem;" itemprop="author" itemscope itemtype="https://schema.org/Person">
                            <strong>Author:</strong>
                            <span itemprop="name"><?php the_author(); ?></span>
                            <meta itemprop="url" content="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                        </span>
                        <?php if ( has_category() ) : ?>
                            <span>
                                <strong>Category:</strong>
                                <span itemprop="articleSection"><?php the_category(', '); ?></span>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if ( has_tag() ) : ?>
                        <div class="post-tags" style="margin-bottom: 1.5rem;">
                            <?php
                            $tags = get_the_tags();
                            if ( $tags ) {
                                echo '<span style="margin-right: 0.5rem;"><strong>Tags:</strong></span>';
                                $tag_list = array();
                                foreach ( $tags as $tag ) {
                                    $tag_list[] = '<span itemprop="keywords"><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></span>';
                                }
                                echo implode( ', ', $tag_list );
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- Hidden meta for SEO -->
                    <meta itemprop="dateModified" content="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
                    <meta itemprop="mainEntityOfPage" content="<?php echo esc_url( get_permalink() ); ?>">
                    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" style="display: none;">
                        <meta itemprop="name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        <meta itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                            <?php if ( has_custom_logo() ) : ?>
                                <meta itemprop="url" content="<?php echo esc_url( wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) ); ?>">
                            <?php else : ?>
                                <meta itemprop="url" content="<?php echo esc_url( get_template_directory_uri() . '/img/Logo.png' ); ?>">
                            <?php endif; ?>
                        </span>
                    </div>
                </header>

                <!-- Post Content -->
                <div class="entry-content" itemprop="articleBody">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'advanced-rolloffs' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        )
                    );

                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links" style="margin: 2rem 0; padding-top: 1rem; border-top: 1px solid #e0e0e0;">' . esc_html__( 'Pages:', 'advanced-rolloffs' ),
                            'after'  => '</div>',
                            'link_before' => '<span style="display: inline-block; margin: 0 0.5rem; padding: 0.5rem 1rem; background: var(--light-gray); border-radius: 5px;">',
                            'link_after' => '</span>',
                        )
                    );
                    ?>
                </div>

                <!-- Post Footer -->
                <footer class="entry-footer" style="margin-bottom: 3rem; padding-top: 2rem; border-top: 1px solid #e0e0e0;">
                    <?php
                    // Show last modified date for SEO
                    if ( get_the_modified_time() !== get_the_time() ) {
                        ?>
                        <p class="last-updated" style="color: var(--text-gray); font-size: 0.9rem; margin-bottom: 1rem;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span class="screen-reader-text"><?php esc_html_e( 'Last updated:', 'advanced-rolloffs' ); ?></span>
                            <strong>Last updated:</strong>
                            <time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>" itemprop="dateModified">
                                <?php echo esc_html( get_the_modified_date() ); ?>
                            </time>
                        </p>
                        <?php
                    }
                    ?>
                    
                    <!-- Social Share Buttons -->
                    <div class="post-share" style="margin: 2rem 0; padding: 2rem; background: var(--light-gray); border-radius: 12px;">
                        <h4 style="margin-bottom: 1.5rem; color: var(--black); font-size: 1.2rem; display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--primary-red);">
                                <circle cx="18" cy="5" r="3"></circle>
                                <circle cx="6" cy="12" r="3"></circle>
                                <circle cx="18" cy="19" r="3"></circle>
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                            </svg>
                            Share this post
                        </h4>
                        <div class="share-buttons" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 0.75rem;">
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="share-btn share-facebook" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1rem; background: #1877F2; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease; border: none;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook
                            </a>

                            <!-- Twitter/X -->
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="share-btn share-twitter" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1rem; background: #000000; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease; border: none;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                                Twitter
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="share-btn share-linkedin" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1rem; background: #0A66C2; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease; border: none;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                                LinkedIn
                            </a>

                            <!-- WhatsApp -->
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="share-btn share-whatsapp" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1rem; background: #25D366; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease; border: none;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                WhatsApp
                            </a>

                            <!-- Pinterest -->
                            <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&description=<?php echo urlencode(get_the_title()); ?><?php if (has_post_thumbnail()) { ?>&media=<?php echo urlencode(get_the_post_thumbnail_url()); ?><?php } ?>" target="_blank" rel="noopener noreferrer" class="share-btn share-pinterest" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1rem; background: #E60023; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease; border: none;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.219 0-2.363-.637-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/>
                                </svg>
                                Pinterest
                            </a>

                            <!-- Email -->
                            <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode('Check out this article: ' . get_permalink()); ?>" class="share-btn share-email" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1rem; background: #7f7f7f; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease; border: none;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                Email
                            </a>

                            <!-- Copy Link -->
                            <button onclick="copyPostLink()" class="share-btn share-copy" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1rem; background: var(--primary-red); color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease; border: none; cursor: pointer;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                </svg>
                                Copy Link
                            </button>
                        </div>
                    </div>

                    <script>
                    function copyPostLink() {
                        const postUrl = '<?php echo esc_js(get_permalink()); ?>';

                        if (navigator.clipboard && window.isSecureContext) {
                            navigator.clipboard.writeText(postUrl).then(function() {
                                showCopyNotification();
                            }, function(err) {
                                fallbackCopyTextToClipboard(postUrl);
                            });
                        } else {
                            fallbackCopyTextToClipboard(postUrl);
                        }
                    }

                    function fallbackCopyTextToClipboard(text) {
                        const textArea = document.createElement("textarea");
                        textArea.value = text;
                        textArea.style.position = "fixed";
                        textArea.style.top = "0";
                        textArea.style.left = "0";
                        textArea.style.width = "2em";
                        textArea.style.height = "2em";
                        textArea.style.padding = "0";
                        textArea.style.border = "none";
                        textArea.style.outline = "none";
                        textArea.style.boxShadow = "none";
                        textArea.style.background = "transparent";
                        document.body.appendChild(textArea);
                        textArea.focus();
                        textArea.select();

                        try {
                            document.execCommand('copy');
                            showCopyNotification();
                        } catch (err) {
                            alert('Failed to copy link');
                        }

                        document.body.removeChild(textArea);
                    }

                    function showCopyNotification() {
                        const btn = event.target.closest('.share-copy');
                        const originalHTML = btn.innerHTML;
                        btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!';
                        btn.style.background = '#10b981';

                        setTimeout(function() {
                            btn.innerHTML = originalHTML;
                            btn.style.background = 'var(--primary-red)';
                        }, 2000);
                    }
                    </script>

                    <style>
                    .share-btn,
                    .share-facebook,
                    .share-twitter,
                    .share-linkedin,
                    .share-whatsapp,
                    .share-pinterest,
                    .share-email,
                    .share-copy {
                        color: white !important;
                        text-decoration: none !important;
                    }

                    .share-btn:hover,
                    .share-facebook:hover,
                    .share-twitter:hover,
                    .share-linkedin:hover,
                    .share-whatsapp:hover,
                    .share-pinterest:hover,
                    .share-email:hover,
                    .share-copy:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                        opacity: 0.9;
                        color: white !important;
                        text-decoration: none !important;
                    }

                    .share-btn:active {
                        transform: translateY(0);
                    }

                    @media (max-width: 768px) {
                        .share-buttons {
                            grid-template-columns: repeat(2, 1fr);
                        }
                    }

                    @media (max-width: 480px) {
                        .share-buttons {
                            grid-template-columns: 1fr;
                        }
                    }
                    </style>
                </footer>

                <!-- Author Bio -->
                <div class="author-bio" style="background: var(--light-gray); padding: 2rem; border-radius: 12px; margin-bottom: 3rem;">
                    <h4 style="margin-bottom: 1rem; color: var(--black);">About the Author</h4>
                    <div class="author-info" style="display: flex; align-items: center; gap: 1.5rem;">
                        <div class="author-avatar" style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 3px solid var(--primary-red); object-fit: cover;">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 80, '', '', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                        </div>
                        <div class="author-details">
                            <h5 style="margin-bottom: 0.5rem; color: var(--black);"><?php the_author(); ?></h5>
                            <p style="color: var(--text-gray); line-height: 1.6; margin: 0;">
                                <?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
                            </p>
                        </div>
                    </div>
                </div>

            </article>

            <!-- Post Navigation -->
            <nav class="navigation post-navigation" role="navigation" style="margin: 3rem 0; padding: 2rem 0; border-top: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0;">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'advanced-rolloffs' ); ?></h2>
                <div class="nav-links" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <?php
                    $previous_post = get_previous_post();
                    if ( $previous_post ) :
                        ?>
                        <div class="nav-previous" style="text-align: left;">
                            <span style="display: block; color: var(--text-gray); font-size: 0.9rem; margin-bottom: 0.5rem;">← Previous Post</span>
                            <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" style="color: var(--primary-red); text-decoration: none; font-weight: 600;">
                                <?php echo esc_html( get_the_title( $previous_post->ID ) ); ?>
                            </a>
                        </div>
                        <?php
                    endif;

                    $next_post = get_next_post();
                    if ( $next_post ) :
                        ?>
                        <div class="nav-next" style="text-align: right;">
                            <span style="display: block; color: var(--text-gray); font-size: 0.9rem; margin-bottom: 0.5rem;">Next Post →</span>
                            <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" style="color: var(--primary-red); text-decoration: none; font-weight: 600;">
                                <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                            </a>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </nav>

            <!-- Related Posts -->
            <?php
            // Get related posts based on categories
            $categories = get_the_category();
            if ( $categories ) :
                $category_ids = array();
                foreach ( $categories as $category ) {
                    $category_ids[] = $category->term_id;
                }

                $related_args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array( get_the_ID() ),
                    'posts_per_page' => 3,
                    'orderby' => 'rand',
                );

                $related_query = new WP_Query( $related_args );

                if ( $related_query->have_posts() ) :
                    ?>
                    <section class="related-posts" style="margin: 3rem 0;">
                        <h3 style="margin-bottom: 2rem; color: var(--black); font-size: 1.8rem;">Related Posts</h3>
                        <div class="related-posts-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                            <?php
                            while ( $related_query->have_posts() ) :
                                $related_query->the_post();
                                ?>
                                <article class="related-post" style="background: var(--white); border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="related-post-thumbnail">
                                            <?php the_post_thumbnail( 'medium', array( 'style' => 'width: 100%; height: 200px; object-fit: cover;' ) ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="related-post-content" style="padding: 1.5rem;">
                                        <h4 style="margin-bottom: 0.5rem; font-size: 1.1rem;">
                                            <a href="<?php the_permalink(); ?>" style="color: var(--black); text-decoration: none; line-height: 1.4;">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                        <div class="related-post-meta" style="color: var(--text-gray); font-size: 0.85rem; margin-bottom: 1rem;">
                                            <?php echo get_the_date(); ?>
                                        </div>
                                        <div class="related-post-excerpt" style="color: var(--text-gray); line-height: 1.6; font-size: 0.95rem;">
                                            <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
                                        </div>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </section>
                    <?php
                endif;
            endif;
            ?>

            <!-- Comments Section -->
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
            
            <?php
        endwhile; // End of the loop.
        ?>
    </div>
</main>

<style>
/* SPECIFIC Red Link Styles - Only for content, meta, and logged-in areas */

/* Links in entry meta (category, author) */
.entry-meta a {
    color: var(--primary-red) !important;
    text-decoration: none;
    transition: all 0.2s ease;
    font-weight: 500;
}

.entry-meta a:hover {
    color: #b81547 !important;
    text-decoration: underline;
}

/* Links in post tags */
.post-tags a {
    color: var(--primary-red) !important;
    text-decoration: none;
    transition: all 0.2s ease;
    font-weight: 500;
}

.post-tags a:hover {
    color: #b81547 !important;
    text-decoration: underline;
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

/* Logged in as links */
.logged-in-as a {
    color: var(--primary-red) !important;
    text-decoration: none;
    transition: all 0.2s ease;
}

.logged-in-as a:hover {
    color: #b81547 !important;
    text-decoration: underline;
}

/* Author bio links */
.author-bio a {
    color: var(--primary-red) !important;
    text-decoration: none;
}

.author-bio a:hover {
    color: #b81547 !important;
    text-decoration: underline;
}

/* Related posts links */
.related-posts a {
    color: var(--primary-red) !important;
    text-decoration: none;
}

.related-posts a:hover {
    color: #b81547 !important;
}

/* Keep Related Posts titles black (not red) */
.related-posts .related-post-content h4 a {
    color: var(--black) !important;
    text-decoration: none;
}

.related-posts .related-post-content h4 a:hover {
    color: var(--primary-red) !important;
}

/* Post navigation links */
.post-navigation a {
    color: var(--primary-red) !important;
    text-decoration: none;
}

.post-navigation a:hover {
    color: #b81547 !important;
}

/* WordPress admin links (Edit Post, etc.) */
.post-edit-link,
.comment-edit-link {
    color: var(--primary-red) !important;
}

.post-edit-link:hover,
.comment-edit-link:hover {
    color: #b81547 !important;
}

/* Keep regular text normal color */
.entry-meta,
.entry-meta strong,
.post-tags strong,
.logged-in-as,
.comment-notes {
    color: var(--text-gray);
}

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

    /* Post Title on Tablet */
    .entry-title {
        font-size: 2rem !important;
    }

    /* Entry Meta - Stack on tablet */
    .entry-meta {
        font-size: 0.9rem !important;
    }

    .entry-meta span {
        display: inline-block;
        margin-right: 1rem !important;
        margin-bottom: 0.5rem;
    }

    /* Author Bio - Stack avatar and text */
    .author-info {
        flex-direction: column !important;
        text-align: center;
    }

    .author-avatar {
        margin: 0 auto 1rem !important;
    }

    /* Post Navigation - Stack */
    .nav-links {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }

    .nav-next {
        text-align: left !important;
    }

    /* Related Posts - 2 columns */
    .related-posts-grid {
        grid-template-columns: repeat(2, 1fr) !important;
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

    /* Post Title on Mobile - Much Smaller */
    .entry-title {
        font-size: 1.75rem !important;
        line-height: 1.2 !important;
        margin-bottom: 1rem !important;
    }

    /* Post Thumbnail - Smaller radius */
    .post-thumbnail img {
        border-radius: 8px !important;
    }

    /* Entry Meta - Stack vertically */
    .entry-meta {
        font-size: 0.85rem !important;
    }

    .entry-meta span {
        display: block !important;
        margin-right: 0 !important;
        margin-bottom: 0.5rem !important;
    }

    /* Author Bio - Smaller padding */
    .author-bio {
        padding: 1.5rem !important;
    }

    .author-avatar {
        width: 60px !important;
        height: 60px !important;
    }

    /* Share Buttons - Already handled in inline styles */
    .post-share {
        padding: 1.5rem !important;
    }

    .post-share h4 {
        font-size: 1.1rem !important;
    }

    /* Related Posts - 1 column */
    .related-posts-grid {
        grid-template-columns: 1fr !important;
    }

    /* Post Navigation - Better spacing */
    .post-navigation {
        padding: 1.5rem 0 !important;
    }

    .nav-links {
        gap: 1rem !important;
    }
}
</style>

<?php
get_footer();
?>
