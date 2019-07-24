<?php
/**
 *    The template for displaying the single content.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <div class="row no-gutters">
        <div class="col-sm-4">
            <div class="blog-post-entry markup-format">
                <div class="info-main-text d-sm-none">
                    <h2><?php the_title() ?></h2>
                    <?php
                    echo nl2br(get_the_content());

                    $source = get_field('source');
                    if ($source !== '') : ?>
                        <div class="alert alert-secondary mt-5">
                            <b><?= __('Source:', 'illdy') ?></b>
                            <p><?= $source ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (has_post_thumbnail()): ?>
                    <div class="blog-post-image col-xs-12 col-sm-12">
                        <?php //the_post_thumbnail( 'illdy-blog-list' ); ?>
                        <?php
                        $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'team-list-item');
                        $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                        ?>
                        <a href="<?php echo esc_url($post_image[0]); ?>" data-fancybox
                           data-caption="<?= get_the_title() . '<br>' . wp_strip_all_tags(get_the_content()) ?>"><img
                                    src="<?php echo esc_url($post_thumbnail[0]); ?>"/></a>
                    </div><!--/.blog-post-image-->
                <?php endif; ?>
                <div class="sharing-buttons"><i>انشر المعلومة: </i>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                </div>

            </div><!--/.blog-post-entry.markup-format-->
            <div class="py-3">
                <?php dynamic_sidebar('infos-page'); ?>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="info-main-text d-sm-block d-none">
                <h2><?php the_title() ?></h2>
                <?php
                echo nl2br(get_the_content());

                if ($source !== '') : ?>
                    <div class="alert alert-secondary mt-5">
                        <b><?= __('Source:', 'illdy') ?></b>
                        <p><?= $source ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="info-extra">
                <?php
                $category = get_the_category();
                $wiki_args = array(
                    'cat'       => $category[0]->term_id . ",-" . $thoughts_catid,
                    'post_type' => 'info-details',
                );
                $wiki_query = new WP_Query($wiki_args);
                if ($wiki_query->have_posts()) : $wiki_query->the_post(); ?>
                    <a href="<?= get_permalink() ?>">اعرف أكثر</a>
                <?php endif;
                ?>

                <?php
                do_action('mtl_single_after_content');
                //                if ( comments_open() || get_comments_number() ) :
                //                    comments_template();
                //                endif;
                ?>
            </div>
        </div>
    </div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->