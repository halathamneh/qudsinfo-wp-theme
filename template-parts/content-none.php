<?php
/**
 *	Template part for displaying a message that posts cannot be found.
 *
 *	@package WordPress
 *	@subpackage QudsInfoTheme
 */
?>
<article <?php post_class( 'blog-post' ); ?>>
	<a href="<?php echo esc_url( home_url() ); ?>" title="<?php _e( 'لم يتم العثور على شيء', 'qi-theme' ); ?>" class="blog-post-title"><?php _e( 'لم يتم العثور على شيء', 'qi-theme' ); ?></a>
	<div class="blog-post-entry">
		<p>
			حاول بكلمات مختلفة
		</p>
	</div><!--/.blog-post-entry-->
</article><!--/#post-<?php the_ID(); ?>.blog-post-->