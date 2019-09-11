<?php
/**
 *    The template for dispalying the single.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
?>

    <section class="bg-light">
        <div class="container">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    get_template_part('template-parts/content', 'single-blogs');
                endwhile;
            endif;
            ?>
        </div><!--/.container-->
    </section><!--/#blog-->
<?php get_footer(); ?>