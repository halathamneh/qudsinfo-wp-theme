<?php
/**
 *	The template for dispalying the content.
 *
 *	@package WordPress
 *	@subpackage QudsInfoTheme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<div class="blog-post-title-text">
		<?php if( has_post_thumbnail() ): ?>
		<div class="blog-post-image">
			<?php the_post_thumbnail( 'illdy-blog-list' ); ?>
		</div><!--/.blog-post-image-->
		<?php endif; ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-post-title"><?php the_title(); ?></a>
		<?php do_action( 'mtl_archive_news_meta_content' ); ?>
		<div class="blog-post-entry">
			<?php the_excerpt(); ?>
		</div><!--/.blog-post-entry-->
		<a href="<?php the_permalink(); ?>" title="<?php _e( 'أكمل القراءة', 'qi-theme' ); ?>" class="blog-post-button"><?php _e( 'أكمل القراءة', 'qi-theme' ); ?></a>

	</div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->