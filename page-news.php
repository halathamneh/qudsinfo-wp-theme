<?php
/**
 *    Template Name: news
 *
 *    The template for dispalying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="news-header mt-5 d-flex align-items-center pb-3 mb-3 border-bottom"
                     style="border-color: #eee;">
                    <h1 class="flex-grow-1 mb-0"><?= __("Latest News", 'illdy') ?></h1>
                    <div class="sortby d-flex align-items-center">
                        <label for="sort-by" class="mx-2 mb-0 text-nowrap"><?= __('Sort By:', 'illdy') ?></label>
                        <?php
                        $cats = get_terms('news-groups');
                        $selected = isset($_GET['news-groups']) ? intval($_GET['news-groups']) : false;
                        ?>
                        <select class="form-control" name="sort-by" id="sort-by">
                            <option <?= !$selected ? 'selected' : '' ?> value="all"><?= __('All', 'illdy') ?></option>
                            <?php foreach ($cats as $cat) : ?>
                                <option <?= $selected === $cat->term_id ? 'selected' : '' ?> value="<?= $cat->term_id ?>"><?= $cat->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <section id="blog" class="news-team__latest">
                    <?php
                    $news = true;
                    do_action('mtl_above_content_after_header'); ?>
                    <?php
                    $paged         = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                    $wp_query_args = array(
                        'post_type'              => array('news'),
                        'cache_results'          => true,
                        'update_post_meta_cache' => true,
                        'update_post_term_cache' => true,
                        'paged'                  => $paged
                    );
                    if($selected) {
                        $wp_query_args['tax_query'] = [
                            [
                                'taxonomy' => 'news-groups',
                                'field'    => 'term_id', // Since WP 3.5
                                'terms'    => $selected,
                            ],
                        ];
                    }

                    $wp_query = new WP_Query($wp_query_args);

                    if ($wp_query->have_posts()): ?>
                        <div class="row">
                            <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                                <?php $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-front-page-latest-news'); ?>
                                <div class="col-sm-6 col-xs-12 mb-5">
                                    <div class="post card shadow h-100"
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
                                               class="post-title card-title"><?php the_title(); ?></a>
                                            <div class="post-entry">
                                                <?php the_excerpt(); ?>
                                            </div><!--/.post-entry-->
                                            <a href="<?php the_permalink(); ?>"
                                               title="<?php _e('أكمل القراءة', 'illdy'); ?>"
                                               class="btn btn-outline-success mb-3 mt-auto"><?php _e('أكمل القراءة ', 'illdy'); ?>
                                                <i
                                                        class="fa fa-chevron-circle-left"></i></a>
                                        </div>
                                    </div><!--/.post-->
                                </div><!--/.col-sm-4-->

                                <?php // get_template_part('template-parts/content', 'news'); ?>
                            <?php endwhile; ?>
                        </div>
                    <?php else:
                        get_template_part('template-parts/content', 'none');
                    endif;

                    wp_reset_postdata();
                    ?>
                    <?php do_action('mtl_after_content_above_footer'); ?>
                </section><!--/#blog-->
            </div><!--/.col-sm-7-->
            <?php get_sidebar(); ?>
        </div><!--/.row-->
    </div><!--/.container-->
<?php get_footer(); ?>