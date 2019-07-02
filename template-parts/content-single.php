<?php
/**
 *	The template for displaying the single content.
 *
 *	@package WordPress
 *	@subpackage illdy
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>

	<?php //do_action( 'mtl_single_news_entry_meta' ); ?>
	<h2 class="blog-post-title"><?php the_title(); ?></h2>

	<div class="blog-post-entry markup-format">
		<?php
		echo wpautop( get_the_content() );

		wp_link_pages( array(
			'before'	=> '<div class="link-pages">' . __( 'Pages:', 'illdy' ),
			'after'		=> '</div><!--/.link-pages-->'
		) );
		?>
	</div><!--/.blog-post-entry.markup-format-->
    <?php if( has_post_thumbnail() ): ?>
        <div class="blog-post-image">
            <?php the_post_thumbnail( 'large' ); ?>
        </div><!--/.blog-post-image-->
    <?php endif; ?>

	<?php do_action( 'mtl_single_after_content' );

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->