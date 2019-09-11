<?php
/**
 *    The template for dispalying the archive.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */

?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div class="container photo-page">
        <div class="row no-gutters">
            <div class="col-sm-10 mx-auto">
                <section id="blog" class="cat-posts cat-pics">
<!--                    <div class="hint-title">-->
                        <?php //echo sprintf(__('تصفح جميع الصور في تصنيف %s'), single_cat_title('', false)); ?>
<!--                    </div>-->
                    <div class="mt-3 mb-5">
                        <?= term_description() ?>
                    </div>
                    <?php do_action('mtl_above_content_after_header'); ?>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    global $wp_query;
                    $wp_query_args = array(
                        'order' => 'asc',
                        'tax_query' => [
                            [
                                "taxonomy" => 'pics-cats',
                                "terms" => get_queried_object_id()
                            ]
                        ],
                        'paged' => $paged,
                        'posts_per_page' => 12,
                        'post_type' => array('pics'),
                    );
                    $wp_query = new WP_Query($wp_query_args);
                    ?>
                    <?php
                    if ($wp_query->have_posts()): ?>
                        <div class="row no-gutters">
                            <?php while ($wp_query->have_posts()):
                                $wp_query->the_post();
                                //get_template_part( 'template-parts/content', get_post_format() );
                                $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info-post');
                                ?>
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="card text-white text-center">
                                        <div class="card-img"
                                             style="background-image: url('<?= $post_thumbnail[0]; ?>')"></div>
                                        <a href="<?php the_permalink(); ?>" class="card-img-overlay">
                                            <h4 class="card-title"><?= get_the_title(); ?></h4>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            endwhile; ?>
                        </div>
                    <?php else:
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                    <?php do_action('mtl_after_content_above_footer'); ?>
                </section><!--/#blog-->
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
    <script>
        (function ($) {
            var width;
            $(document).ready(function () {
                width = $(".post").width();
                $(".post").height(width);
                $(".post h3").css("line-height", (width - 8) + "px");
                $(".post h3").height(width);
            });
            $(window).resize(function () {
                width = $(".post").width();
                $(".post").height(width);
                $(".post h3").css("line-height", (width - 8) + "px");
                $(".post h3").height(width);
            });
        })(jQuery);
    </script>
<?php get_footer(); ?>