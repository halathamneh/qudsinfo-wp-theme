<?php
/**
 *    The template for dispalying the content.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>

<?php
$featured = get_post_meta($post->ID, 'featured-blog')[0] == "yes";
?>
<article id="post-<?php the_ID(); ?>" class="blog-post<?= $featured ? ' featured' : ''; ?>">
    <div class="wrap shadow-lg">
        <?php if (has_post_thumbnail()):
            $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-front-page-latest-news');
            ?>
            <div class="blog-post-image" style="background-image: url(<?= $post_thumbnail[0] ?>);">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                   class="blog-post-title"><?php the_title(); ?></a>
            </div><!--/.blog-post-image-->
        <?php endif; ?>
        <div class="blog-post-title-text">
            <?php if (!has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                   class="blog-post-title"><?php the_title(); ?></a>
            <?php endif; ?>

            <?php do_action('mtl_archive_blog_meta_content'); ?>
            <div class="blog-post-entry">
                <?= wp_trim_words(get_the_content(), $featured ? 80 : 30); ?>
            </div><!--/.blog-post-entry-->

        </div>
        <a href="<?php the_permalink(); ?>" title="<?php _e('أكمل القراءة', 'illdy'); ?>"
           class="blog-post-button"><?php _e('أكمل القراءة', 'illdy'); ?></a>
    </div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->