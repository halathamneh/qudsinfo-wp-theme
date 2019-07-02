<?php
/**
 *    The template for dispalying the archive.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div class="container">

        <section id="blog" class="cat-posts">
            <?php get_template_part('template-parts/infos','drawer'); ?>
        </section><!--/#blog-->

    </div><!--/.container-->
<?php get_footer(); ?>