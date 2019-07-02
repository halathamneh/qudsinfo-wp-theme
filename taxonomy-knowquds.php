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
        <div class="row">
            <?php get_template_part('template-parts/knowquds', 'list'); ?>
            <div class="col-md-8">
                <section id="blog">
                    <div class="card mb-3">
                        <?php if (function_exists('z_taxonomy_image_url') && !empty($image = z_taxonomy_image_url())) : ?>
                            <img class="card-img-top" src="<?= $image ?>" alt="">
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <i class="fa fa-info-circle"></i> اختر من القائمة
                            </div>
                            <?php echo term_description(); ?>
                        </div>
                    </div>

                </section><!--/#blog-->
            </div>

        </div><!--/.row-->
    </div><!--/.container-->
<?php get_footer(); ?>