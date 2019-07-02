<?php
/**
 *    The template for dispalying the single.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header(); ?>
    <div class="container photo-page">
        <section id="blog">
            <?php
            if ( have_posts() ):
                while ( have_posts() ):
                    the_post();
                    get_template_part('template-parts/content', 'single-pics');
                endwhile;
            endif;
            ?>
        </section><!--/#blog-->

    </div><!--/.container-->
<?php get_footer(); ?>