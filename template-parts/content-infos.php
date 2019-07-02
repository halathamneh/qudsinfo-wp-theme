<?php
/**
 *	The template for dispalying the content.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>

	<?php $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'illdy-front-page-latest-news' ); ?>
<article id="post-<?php the_ID(); ?>" class="col-md-4 col-sm-6 col-xs-12" >
		<div <?php post_class(); ?> style="<?php if( !$post_thumbnail ): echo 'padding-top: 40px;'; endif; ?>">
			<?php if( $post_thumbnail ): ?>
				<div class="post-image" style="background-image: url('<?php echo esc_url( $post_thumbnail[0] ); ?>');"></div>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-title"><?php the_title(); ?></a>
			<div class="post-entry">
				<?php the_excerpt(); ?>
			</div><!--/.post-entry-->
			<a href="<?php the_permalink(); ?>" title="<?php _e( 'أكمل القراءة', 'illdy' ); ?>" class="post-button"><?php _e( 'أكمل القراءة', 'illdy' ); ?><i class="fa fa-chevron-circle-left"></i></a>
		</div><!--/.post-->
</article><!--/#post-<?php the_ID(); ?>.blog-post-->