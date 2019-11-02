<?php
/**
 *    Template name: Join Us
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <section id="blog">
                <?php
                if ( have_posts() ):
                    while ( have_posts() ):
                        the_post();
                        
                        ?>
                        <div class="entry-content">
                            <div class="teams-list row">
                                <div class="team-item col-sm-4 col-xs-12 py-3">
                                    <?php
                                    $img_id = get_field('content_image');
                                    $image = wp_get_attachment_image_url($img_id, 'team-list-item');
                                    ?>
                                    <div class="team-item-image" style="background-image: url('<?= $image ?>')"></div>
                                    <h2><?= __("Content Team", "qi-theme") ?></h2>
                                    <div class="team-item-description">
                                        <?php the_field('content_description'); ?>
                                    </div>
                                    <div class="team-list-link">
                                        <a class="btn btn-success btn-lg" href="<?php the_field('content_form_link') ?>">
                                            <?= __("Join Content Team", 'qi-theme') ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="team-item col-sm-4 col-xs-12 py-3">
                                    <?php
                                    $img_id = get_field('lectures_image');
                                    $image = wp_get_attachment_image_url($img_id, 'team-list-item');
                                    ?>
                                    <div class="team-item-image" style="background-image: url('<?= $image ?>')"></div>
                                    <h2><?= __("Lectures Team", 'qi-theme') ?></h2>
                                    <div class="team-item-description">
                                        <?php the_field('lectures_description'); ?>
                                    </div>
                                    <div class="team-list-link">
                                        <a class="btn btn-success btn-lg" href="<?php the_field('lectures_form_link') ?>">
                                            <?= __("Join Lectures Team", 'qi-theme') ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="team-item col-sm-4 col-xs-12 py-3">
                                    <?php
                                    $img_id = get_field('media_image');
                                    $image = wp_get_attachment_image_url($img_id, 'thumbnail');
                                    ?>
                                    <div class="team-item-image" style="background-image: url('<?= $image ?>')"></div>
                                    <h2><?= __("Media Team", 'qi-theme') ?></h2>
                                    <div class="team-item-description">
                                        <?php the_field('media_description'); ?>
                                    </div>
                                    <div class="team-list-link">
                                        <a class="btn btn-success btn-lg mb-2" href="<?php the_field('media_form_link') ?>">
                                            <?= __("Join Publishing Team", 'qi-theme') ?>
                                        </a>
                                        <a class="btn btn-success btn-lg" href="<?php the_field('news_form_link') ?>">
                                            <?= __("Join News Team", 'qi-theme') ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </section><!--/#blog-->
        </div><!--/.col-sm-12-->
    </div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>

