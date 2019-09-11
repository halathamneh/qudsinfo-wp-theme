<?php
/**
 *	The template for dispalying the single.
 *
 *	@package WordPress
 *	@subpackage QudsInfoTheme
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>

	<div class="info-post container">
			<section id="blog">
				<?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'template-parts/content', 'single-post' );
					endwhile;
				endif;
				?>
			</section><!--/#blog-->
	</div><!--/.row-->
<?php get_footer(); ?>