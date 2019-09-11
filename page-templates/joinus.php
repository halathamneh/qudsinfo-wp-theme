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
                                    <h2>فريق المحتوى العلمي</h2>
                                    <div class="team-item-description">
                                        <?php the_field('content_description'); ?>
                                    </div>
                                    <div class="team-list-link">
                                        <a class="btn btn-success btn-lg" href="<?php the_field('content_form_link') ?>">
                                            انضم لفريق المحتوى
                                        </a>
                                    </div>
                                </div>
                                <div class="team-item col-sm-4 col-xs-12 py-3">
                                    <?php
                                    $img_id = get_field('lectures_image');
                                    $image = wp_get_attachment_image_url($img_id, 'team-list-item');
                                    ?>
                                    <div class="team-item-image" style="background-image: url('<?= $image ?>')"></div>
                                    <h2>فريق المحاضرات</h2>
                                    <div class="team-item-description">
                                        <?php the_field('lectures_description'); ?>
                                    </div>
                                    <div class="team-list-link">
                                        <a class="btn btn-success btn-lg" href="<?php the_field('lectures_form_link') ?>">
                                            انضم لفريق المحاضرات
                                        </a>
                                    </div>
                                </div>
                                <div class="team-item col-sm-4 col-xs-12 py-3">
                                    <?php
                                    $img_id = get_field('media_image');
                                    $image = wp_get_attachment_image_url($img_id, 'thumbnail');
                                    ?>
                                    <div class="team-item-image" style="background-image: url('<?= $image ?>')"></div>
                                    <h2>الفريق الإعلامي</h2>
                                    <div class="team-item-description">
                                        <?php the_field('media_description'); ?>
                                    </div>
                                    <div class="team-list-link">
                                        <a class="btn btn-success btn-lg mb-2" href="<?php the_field('media_form_link') ?>">
                                            انضم لفريق النشر
                                        </a>
                                        <a class="btn btn-success btn-lg" href="<?php the_field('news_form_link') ?>">
                                            انضم لفريق الأخبار
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

