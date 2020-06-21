<?php
/**
 *    The template for displaying the single content.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */

$categories = get_the_category();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="info-head">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/our-info"><?= __('Our Information', 'qi-theme') ?></a></li>
                    <?php foreach ($categories as $category) : ?>
                        <li class="breadcrumb-item"><a
                                    href="<?= get_category_link($category) ?>"><?= $category->name ?></a></li>
                    <?php endforeach; ?>
                    <li class="breadcrumb-item active"><?= get_the_title() ?></li>
                </ul>
                <div class="sharing-buttons"><i><?= __("Share", 'qi-theme') ?>: </i>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            </div>
            <div class="info-block">
                <?php if (has_post_thumbnail()): ?>
                    <div class="info-side">
                        <?php
                        $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info-post');
                        $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                        ?>
                        <a class="info-image" href="<?php echo esc_url($post_image[0]); ?>" data-fancybox
                           data-caption="<?= get_the_title() . '<br>' . wp_strip_all_tags(get_the_content()) ?>"><img
                                    src="<?php echo esc_url($post_thumbnail[0]); ?>"/></a>
                        <?php if (pll_current_language() === 'ar') :
                            $source = get_field('source');
                            if (!is_null($source) && $source !== '') : ?>
                                <div class="alert alert-light mt-3">
                                    <b><?= __('Source:', 'qi-theme') ?></b><br/>
                                    <span><?= $source ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                        if (pll_current_language() === "ar") {
                            $main_post = $GLOBALS['post'];
                            $wiki_args = array(
                                'cat'       => $categories[0]->term_id,
                                'post_type' => 'info-details',
                            );
                            $wiki_query = new WP_Query($wiki_args);
                            if ($wiki_query->have_posts()) : $post = $wiki_query->next_post(); ?>
                            <div class="mt-auto">
                                <b class="d-block mb-3"><?= __('For more, read our article about:', 'qi-theme') ?></b>
                                <a href="<?= get_permalink($post) ?>"
                                   class="btn btn-outline-primary"><?= get_the_title($post) ?></a>
                            </div>
                            <?php
                            $GLOBALS['post'] = $main_post;
                            endif;
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <div class="info-main-text">
                    <h1><?php the_title() ?></h1>
                    <?= get_the_content(); ?>
                </div>
            </div>

            <div class="info-extra">
                <div class="row">
                    <div class="col-sm-8">
                        <?php do_action('mtl_single_after_content'); ?>
                    </div>
                    <div class="col-sm-4">
                        <?php dynamic_sidebar('infos-page'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->