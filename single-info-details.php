<?php
/**
 *	The template for dispalying the info details single.
 *
 *	@package WordPress
 *	@subpackage QudsInfoTheme
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div class="container">
    
				<?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'template-parts/content', 'single-info-details' );
					endwhile;
				endif;
				?>
            </section><!--/#blog-->
    
    </div><!--/.container-->
<?php get_footer(); ?>