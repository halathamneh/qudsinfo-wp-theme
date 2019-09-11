<?php
/**
 *    Template Name: Infos
 *
 *    The template for dispalying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div class="container">
        <section id="blog">
            <?php get_template_part('template-parts/infos', 'drawer'); ?>
        </section><!--/#blog-->

    </div><!--/.container-->

<?php get_footer(); ?>