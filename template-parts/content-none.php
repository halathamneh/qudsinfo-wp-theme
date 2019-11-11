<?php
/**
 *	Template part for displaying a message that posts cannot be found.
 *
 *	@package WordPress
 *	@subpackage QudsInfoTheme
 */
?>
<article <?php post_class( 'blog-post' ); ?>>
	<a href="<?php echo esc_url( home_url() ); ?>" title="<?php _e( 'Nothing found', 'qi-theme' ); ?>" class="blog-post-title"><?php _e( 'Nothing found', 'qi-theme' ); ?></a>
	<div class="blog-post-entry">
		<p>
			<?= __('Try with different keywords', 'qi-theme') ?>
		</p>
	</div><!--/.blog-post-entry-->
</article><!--/#post-<?php the_ID(); ?>.blog-post-->