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
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<section id="blog">
				<?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'template-parts/content', 'single' );
					endwhile;
				endif;
				?>
			</section><!--/#blog-->
		</div><!--/.col-sm-7-->
		<?php get_sidebar(); ?>
	</div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>