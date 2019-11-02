<?php
/**
 *    Template name: News Team
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header(); ?>
<div class="news-team">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <div class="news-team__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center h-100">
                                <div class="my-5">
                                    <div class="card shadow-lg">
                                        <div class="card-body">
                                            <h2 class="mb-4"><?= __("News Team", 'qi-theme') ?></h2>
                                            <div>
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <?php $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
                                <img style="max-width: 100%;" src="<?= $post_thumbnail[0] ?>" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="news-team__stats py-5">
                <div class="container">
                    <h2 class="text-center"><?= __("News Statistics", 'qi-theme') ?></h2>
                    <div class="news-stats">
                        <div class="news-stats__item">
                            <span><?= __("No. of published news", 'qi-theme') ?></span>
                            <div class="shadow-lg circle fill"><?= get_field('news_count') ?></div>
                        </div>
                        <div class="news-stats__item">
                            <span><?= __("No. of reports written", 'qi-theme') ?></span>
                            <div class="shadow-lg circle outline"><?= get_field('reports_count') ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-team__image"></div>
            <?php if (pll_current_language() !== "en") : ?>
                <div class="news-team__latest">
                    <div class="container">
                        <h2><?= __("Latest News", 'qi-theme') ?></h2>
                        <?php
                        $post_query_args = array(
                            'post_type' => array('news'),
                            'nopaging' => false,
                            'posts_per_page' => 3,
                            'ignore_sticky_posts' => true,
                            'cache_results' => true,
                            'update_post_meta_cache' => true,
                            'update_post_term_cache' => true,
                        );
                        ?>

                        <?php $post_query = new WP_Query($post_query_args); ?>

                        <div class="row">
                            <?php while ($post_query->have_posts()): ?>
                                <?php $post_query->the_post(); ?>
                                <?php $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-front-page-latest-news'); ?>
                                <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                                    <div class="post card shadow-lg h-100"
                                         style="<?php if (!$post_thumbnail): echo 'padding-top: 40px;'; endif; ?>">
                                        <?php if ($post_thumbnail): ?>
                                            <div class="post-image card-img-top"
                                                 style="background-image: url(<?php echo esc_url($post_thumbnail[0]); ?>)"></div>
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column">
                                            <div class="post-meta">
                                                <span class="post-meta-time"><i
                                                            class="fa fa-clock-o"></i> <?= get_the_date(); ?></span>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                                               class="post-title card-title" ><?php the_title(); ?></a>
                                            <div class="post-entry">
                                                <?php the_excerpt(); ?>
                                            </div><!--/.post-entry-->
                                            <a href="<?php the_permalink(); ?>"
                                               title="<?php _e('Continue Reading', 'qi-theme'); ?>"
                                               class="btn btn-outline-success mb-3 mt-auto"><?php _e('Continue Reading', 'qi-theme'); ?> <i
                                                        class="fa fa-chevron-circle-left"></i></a>
                                        </div>
                                    </div><!--/.post-->
                                </div><!--/.col-sm-4-->
                            <?php endwhile; ?>
                        </div><!--/.row-->
                        <div class="d-flex justify-content-center mt-5">
                            <a href="/qudsnews" class="btn btn-secondary btn-lg mt-3"><?= __("Open News Page", 'qi-theme') ?> <i
                                        class="fa fa-chevron-circle-left"></i></a>
                        </div>

                    </div>
                </div>
            <?php
            endif;
        endwhile;
    endif;
    ?>

</div><!--/.container-->
<?php get_footer(); ?>

