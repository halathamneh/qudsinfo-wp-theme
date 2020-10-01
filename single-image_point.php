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
    <div id="knowquds-wrapper"></div>
<?php
if (have_posts()):
    while (have_posts()):
        the_post() ?>
        <div class="container-fluid">
            <div class="row">
                <?php get_template_part('template-parts/knowquds','list'); ?>
                <div class="col-md-10">
                    <section id="blog">
                        <?= do_shortcode('[knowquds id="' . $post->ID . '"]'); ?>
                    </section><!--/#blog-->
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    <?php
    endwhile;
endif;

get_footer(); ?>
