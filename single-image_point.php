<?php
/**
 *    The template for dispalying the single.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
<?php
if (have_posts()):
    while (have_posts()):
        the_post() ?>
        <div class="container-fluid">
            <div class="row">
                <?php get_template_part('template-parts/knowquds','list'); ?>
                <div class="col-md-10">
                    <section id="blog">
                        <?= do_shortcode('[image_point id="' . $post->ID . '"]'); ?>
                    </section><!--/#blog-->
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    <?php
    endwhile;
endif;

get_footer(); ?>