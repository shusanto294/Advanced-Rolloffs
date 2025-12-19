<?php
/**
 * Comments Template
 * Displays comments and comment form with messenger-style design
 *
 * @package Advanced_Rolloffs
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}

/**
 * Custom comment callback for modern messenger-style design
 */
function advanced_rolloffs_custom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'modern-comment' ); ?>>
		<div class="comment-wrapper" style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
			<!-- Avatar -->
			<div class="comment-avatar" style="flex-shrink: 0;">
				<?php
				echo get_avatar( $comment, 48, '', '', array(
					'style' => 'width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary-red);'
				) );
				?>
			</div>

			<!-- Comment Content -->
			<div class="comment-body" style="flex: 1; min-width: 0;">
				<!-- Author & Date Header -->
				<div class="comment-meta" style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem; flex-wrap: wrap;">
					<span class="comment-author-name" style="font-weight: 600; color: var(--black); font-size: 0.95rem;">
						<?php echo get_comment_author_link(); ?>
					</span>
					<span class="comment-date" style="font-size: 0.8rem; color: var(--text-gray);">
						<?php echo human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) . ' ago'; ?>
					</span>
				</div>

				<!-- Comment Text in Bubble -->
				<div class="comment-content-bubble" style="background: var(--white); border-radius: 18px; padding: 1rem 1.25rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); position: relative; border: 1px solid #f0f0f0;">
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation" style="background: #fff3cd; color: #856404; padding: 0.75rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.9rem;">
							<?php esc_html_e( 'Your comment is awaiting moderation.', 'advanced-rolloffs' ); ?>
						</p>
					<?php endif; ?>

					<div class="comment-text" style="color: var(--text-gray); line-height: 1.6; word-wrap: break-word;">
						<?php comment_text(); ?>
					</div>
				</div>

				<!-- Actions -->
				<div class="comment-actions" style="display: flex; gap: 1rem; margin-top: 0.75rem; font-size: 0.85rem;">
					<?php
					comment_reply_link( array_merge( $args, array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<span class="reply-link" style="color: var(--primary-red); cursor: pointer; font-weight: 500; transition: all 0.2s ease;">',
						'after'     => '</span>',
					) ) );
					?>
					<?php edit_comment_link( __( 'Edit', 'advanced-rolloffs' ), '<span class="edit-link" style="color: var(--text-gray); cursor: pointer; font-weight: 500; transition: all 0.2s ease;">', '</span>' ); ?>
				</div>
			</div>
		</div>
	<?php
}
?>

<div id="comments" class="comments-area" style="margin: 3rem 0; padding: 2rem 0; border-top: 1px solid #e0e0e0;">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title" style="font-size: 1.8rem; font-weight: 700; color: var(--black); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem;">
			<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--primary-red);">
				<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
			</svg>
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				echo esc_html__( '1 Comment', 'advanced-rolloffs' );
			} else {
				printf(
					esc_html__( '%s Comments', 'advanced-rolloffs' ),
					number_format_i18n( $comment_count )
				);
			}
			?>
		</h2>

		<div class="comment-list-wrapper" style="margin-bottom: 3rem;">
			<?php
			wp_list_comments( array(
				'style'       => 'div',
				'short_ping'  => true,
				'callback'    => 'advanced_rolloffs_custom_comment',
				'avatar_size' => 48,
			) );
			?>
		</div>

		<?php
		the_comments_navigation( array(
			'prev_text' => '<span style="color: var(--primary-red);">←</span> Older Comments',
			'next_text' => 'Newer Comments <span style="color: var(--primary-red);">→</span>',
		) );
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments" style="color: var(--text-gray); font-style: italic; text-align: center; padding: 2rem; background: var(--light-gray); border-radius: 12px; margin-top: 2rem;">
				<?php esc_html_e( 'Comments are closed.', 'advanced-rolloffs' ); ?>
			</p>
		<?php endif; ?>

	<?php endif; // Check for have_comments(). ?>

	<!-- Comment Form Section -->
	<div class="comment-form-wrapper" style="background: var(--light-gray); border-radius: 16px; padding: 2rem; margin-top: 3rem;">
		<?php
		comment_form( array(
			'title_reply'         => __( 'Join the Conversation', 'advanced-rolloffs' ),
			'title_reply_to'      => __( 'Reply to %s', 'advanced-rolloffs' ),
			'title_reply_before'  => '<h3 id="reply-title" class="comment-reply-title" style="font-size: 1.5rem; font-weight: 700; color: var(--black); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--primary-red);"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>',
			'title_reply_after'   => '</h3>',
			'comment_field'       => '<div class="comment-form-comment" style="margin-bottom: 1.5rem;"><label for="comment" style="display: block; font-weight: 600; color: var(--black); margin-bottom: 0.5rem; font-size: 0.95rem;">Your Comment *</label><textarea id="comment" name="comment" rows="5" placeholder="Share your thoughts..." required="required" style="width: 100%; padding: 1rem; border: 2px solid #e0e0e0; border-radius: 12px; font-family: inherit; font-size: 1rem; line-height: 1.6; resize: vertical; transition: all 0.3s ease; background: var(--white);"></textarea></div>',
			'fields'              => array(
				'author' => '<div class="comment-form-author" style="margin-bottom: 1.5rem;"><label for="author" style="display: block; font-weight: 600; color: var(--black); margin-bottom: 0.5rem; font-size: 0.95rem;">Name *</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="John Doe" required="required" style="width: 100%; padding: 1rem; border: 2px solid #e0e0e0; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: var(--white);"></div>',
				'email'  => '<div class="comment-form-email" style="margin-bottom: 1.5rem;"><label for="email" style="display: block; font-weight: 600; color: var(--black); margin-bottom: 0.5rem; font-size: 0.95rem;">Email *</label><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" placeholder="you@example.com" required="required" style="width: 100%; padding: 1rem; border: 2px solid #e0e0e0; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: var(--white);"></div>',
				'url'    => '<div class="comment-form-url" style="margin-bottom: 1.5rem;"><label for="url" style="display: block; font-weight: 600; color: var(--black); margin-bottom: 0.5rem; font-size: 0.95rem;">Website <span style="font-weight: 400; color: var(--text-gray);">(Optional)</span></label><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="https://yourwebsite.com" style="width: 100%; padding: 1rem; border: 2px solid #e0e0e0; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: var(--white);"></div>',
			),
			'comment_notes_before' => '<p class="comment-notes" style="color: var(--text-gray); font-size: 0.9rem; margin-bottom: 1.5rem; line-height: 1.5;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem; color: var(--primary-red);"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>' . __( 'Your email address will not be published. Required fields are marked *', 'advanced-rolloffs' ) . '</p>',
			'comment_notes_after'  => '',
			'action'               => site_url( '/wp-comments-post.php' ),
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_form'           => 'comment-form modern-comment-form',
			'class_submit'         => 'btn btn-primary comment-submit-btn',
			'submit_field'         => '<div class="form-submit" style="margin-top: 1.5rem;">%1$s %2$s</div>',
			'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" style="background: var(--primary-red); color: var(--white); border: none; padding: 1rem 2.5rem; border-radius: 12px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.5rem;">%4$s <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>',
			'format'               => 'html5',
		) );
		?>
	</div>
	<?php
	?>

</div><!-- #comments -->


<style>
/* Modern Comments Section Styling */
.comments-area {
	font-family: inherit;
}

/* Modern Comment Structure */
.modern-comment {
	margin-bottom: 2rem;
	animation: fadeInUp 0.4s ease-out;
}

@keyframes fadeInUp {
	from {
		opacity: 0;
		transform: translateY(10px);
	}
	to {
		opacity: 1;
		transform: translateY(0);
	}
}

/* Comment Wrapper */
.comment-wrapper {
	display: flex;
	gap: 1rem;
	margin-bottom: 1.5rem;
}

/* Avatar with border */
.comment-avatar img {
	border: 2px solid var(--primary-red);
	transition: transform 0.3s ease;
}

.comment-avatar img:hover {
	transform: scale(1.05);
}

/* Comment Body */
.comment-body {
	flex: 1;
	min-width: 0;
}

/* Author & Meta Info */
.comment-meta {
	display: flex;
	align-items: center;
	gap: 0.75rem;
	margin-bottom: 0.5rem;
	flex-wrap: wrap;
}

.comment-author-name a {
	color: var(--primary-red);
	text-decoration: none;
	font-weight: 600;
	transition: color 0.2s ease;
}

.comment-author-name a:hover {
	color: #b81547;
	text-decoration: underline;
}

/* Modern Comment Bubble */
.comment-content-bubble {
	background: var(--white);
	border-radius: 18px;
	padding: 1rem 1.25rem;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
	border: 1px solid #f0f0f0;
	transition: all 0.3s ease;
	position: relative;
}

.comment-content-bubble:hover {
	box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
	border-color: #e0e0e0;
}

/* Comment Text */
.comment-text p {
	margin: 0;
	line-height: 1.6;
	color: var(--text-gray);
}

.comment-text p:not(:last-child) {
	margin-bottom: 0.75rem;
}

/* Links in comment text */
.comment-text a {
	color: var(--primary-red);
	text-decoration: underline;
	transition: color 0.2s ease;
}

.comment-text a:hover {
	color: #b81547;
}

/* Action Links */
.comment-actions {
	display: flex;
	gap: 1rem;
	margin-top: 0.75rem;
	font-size: 0.85rem;
}

.reply-link,
.edit-link {
	text-decoration: none;
	font-weight: 500;
	transition: all 0.2s ease;
}

.reply-link:hover {
	text-decoration: underline;
}

.edit-link:hover {
	color: var(--primary-red) !important;
	text-decoration: underline;
}

/* Nested Comments (Replies) */
.children {
	margin-left: 3rem;
	margin-top: 1rem;
	padding-left: 1.5rem;
	border-left: 2px solid #e0e0e0;
}

/* Modern Comment Form */
.comment-form-wrapper {
	background: var(--light-gray);
	border-radius: 16px;
	padding: 2rem;
	margin-top: 3rem;
}

.modern-comment-form input:not([type="submit"]),
.modern-comment-form textarea {
	background: var(--white);
	border: 2px solid #e0e0e0;
	border-radius: 12px;
	padding: 1rem;
	font-size: 1rem;
	transition: all 0.3s ease;
	width: 100%;
}

.modern-comment-form input:focus,
.modern-comment-form textarea:focus {
	outline: none;
	border-color: var(--primary-red);
	box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.08);
	transform: translateY(-1px);
}

.modern-comment-form textarea {
	min-height: 120px;
}

/* Submit Button */
.comment-submit-btn {
	background: var(--primary-red) !important;
	color: var(--white) !important;
	border: none !important;
	padding: 1rem 2.5rem !important;
	border-radius: 12px !important;
	font-size: 1rem !important;
	font-weight: 600 !important;
	cursor: pointer;
	transition: all 0.3s ease !important;
	display: inline-flex !important;
	align-items: center;
	gap: 0.5rem;
}

.comment-submit-btn:hover {
	background: #b81547 !important;
	transform: translateY(-2px);
	box-shadow: 0 6px 20px rgba(220, 20, 60, 0.25) !important;
}

.comment-submit-btn:active {
	transform: translateY(0);
}

/* Comment Navigation */
.comment-navigation,
.comments-pagination {
	margin: 2rem 0;
	text-align: center;
}

.comment-navigation .nav-links,
.comments-pagination {
	display: flex;
	gap: 1rem;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
}

.comment-navigation a,
.comments-pagination a {
	display: inline-flex;
	align-items: center;
	gap: 0.5rem;
	padding: 0.75rem 1.5rem;
	background: var(--white);
	border: 2px solid var(--primary-red);
	border-radius: 12px;
	color: var(--primary-red) !important;
	text-decoration: none;
	font-weight: 600;
	transition: all 0.3s ease;
}

.comment-navigation a:hover,
.comments-pagination a:hover,
.comments-pagination .current {
	background: var(--primary-red);
	border-color: var(--primary-red);
	color: var(--white) !important;
	transform: translateY(-2px);
	box-shadow: 0 4px 12px rgba(220, 20, 60, 0.25);
}

/* Logged in as link in comment form - only links, not text */
.logged-in-as a,
.comment-form .logged-in-as a {
	color: var(--primary-red) !important;
}

.logged-in-as a:hover,
.comment-form .logged-in-as a:hover {
	color: #b81547 !important;
	text-decoration: underline;
}

/* Keep regular text normal color */
.logged-in-as {
	color: var(--text-gray);
}

/* Comment reply cancel link */
#cancel-comment-reply-link {
	color: var(--primary-red) !important;
	text-decoration: none;
	font-weight: 600;
}

#cancel-comment-reply-link:hover {
	color: #b81547 !important;
	text-decoration: underline;
}

/* Comment specific links - NOT all links in comments area */
.comment-author-name a,
.comment-text a,
.reply-link,
.edit-link {
	color: var(--primary-red) !important;
}

.comment-author-name a:hover,
.comment-text a:hover,
.reply-link:hover,
.edit-link:hover {
	color: #b81547 !important;
}

/* Ensure comment notes and form text stay normal color */
.comment-notes,
.comment-form label,
.comment-form p,
.comment-form-comment label,
.comment-form-author label,
.comment-form-email label,
.comment-form-url label {
	color: var(--text-gray) !important;
}

/* Awaiting Moderation Notice */
.comment-awaiting-moderation {
	background: #fff3cd;
	color: #856404;
	padding: 0.75rem;
	border-radius: 8px;
	margin-bottom: 1rem;
	font-size: 0.9rem;
	border-left: 4px solid #ffc107;
}

/* No Comments Message */
.no-comments {
	background: var(--light-gray);
	border-radius: 12px;
	padding: 2rem;
	text-align: center;
	color: var(--text-gray);
}

/* Responsive Design */
@media (max-width: 768px) {
	.children {
		margin-left: 1.5rem;
		padding-left: 1rem;
	}

	.comment-content-bubble {
		border-radius: 14px;
		padding: 0.875rem 1rem;
	}

	.comment-form-wrapper {
		padding: 1.5rem;
		border-radius: 12px;
	}

	.comment-submit-btn {
		width: 100%;
		justify-content: center;
		padding: 1rem 1.5rem !important;
	}

	.comments-title {
		font-size: 1.5rem !important;
	}

	.comment-meta {
		font-size: 0.85rem;
	}

	/* Comment reply title */
	.comment-reply-title {
		font-size: 1.3rem !important;
	}

	/* Form labels */
	.modern-comment-form label {
		font-size: 0.9rem !important;
	}

	/* Form inputs and textarea */
	.modern-comment-form input:not([type="submit"]),
	.modern-comment-form textarea {
		font-size: 0.95rem !important;
		padding: 0.875rem !important;
	}
}

@media (max-width: 480px) {
	.comment-wrapper {
		gap: 0.75rem;
	}

	.comment-avatar img {
		width: 40px !important;
		height: 40px !important;
	}

	.children {
		margin-left: 1rem;
		padding-left: 0.75rem;
	}

	/* Comments area - reduced spacing */
	.comments-area {
		padding: 1.5rem 0 !important;
		margin: 2rem 0 !important;
	}

	/* Comments title - smaller on mobile */
	.comments-title {
		font-size: 1.3rem !important;
		flex-wrap: wrap;
		gap: 0.5rem !important;
	}

	.comments-title svg {
		width: 22px !important;
		height: 22px !important;
	}

	/* Comment form wrapper - less padding */
	.comment-form-wrapper {
		padding: 1.25rem !important;
		border-radius: 10px;
		margin-top: 2rem !important;
	}

	/* Comment reply title - smaller and better spacing */
	.comment-reply-title {
		font-size: 1.15rem !important;
		margin-bottom: 1rem !important;
		flex-wrap: wrap;
	}

	.comment-reply-title svg {
		width: 20px !important;
		height: 20px !important;
	}

	/* Comment notes - smaller */
	.comment-notes {
		font-size: 0.85rem !important;
		margin-bottom: 1rem !important;
	}

	.comment-notes svg {
		width: 14px !important;
		height: 14px !important;
	}

	/* Form fields - better mobile spacing */
	.comment-form-author,
	.comment-form-email,
	.comment-form-url,
	.comment-form-comment {
		margin-bottom: 1rem !important;
	}

	.modern-comment-form label {
		font-size: 0.85rem !important;
		margin-bottom: 0.4rem !important;
	}

	.modern-comment-form input:not([type="submit"]),
	.modern-comment-form textarea {
		font-size: 0.9rem !important;
		padding: 0.75rem !important;
		border-radius: 10px !important;
	}

	.modern-comment-form textarea {
		min-height: 100px !important;
	}

	/* Submit button - full width and smaller */
	.comment-submit-btn {
		width: 100%;
		padding: 0.875rem 1.25rem !important;
		font-size: 0.95rem !important;
		border-radius: 10px !important;
	}

	.comment-submit-btn svg {
		width: 18px !important;
		height: 18px !important;
	}

	/* Comment actions - smaller text */
	.comment-actions {
		font-size: 0.8rem !important;
		gap: 0.75rem !important;
	}

	/* Comment navigation */
	.comment-navigation a,
	.comments-pagination a {
		padding: 0.625rem 1rem !important;
		font-size: 0.85rem !important;
		border-radius: 8px !important;
		color: var(--primary-red) !important;
	}

	.comment-navigation a:hover,
	.comments-pagination a:hover {
		color: var(--white) !important;
	}
}
</style>
