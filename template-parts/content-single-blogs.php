<?php
/**
 *    The template for displaying the single content.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post pt-4'); ?>>


    <div class="blog-post-entry markup-format">
        <div class="card shadow-lg mb-5 pb-4">
            <?php get_template_part('sections/blog', 'bottom-header'); ?>
            <?php do_action('mtl_single_blog_entry_meta'); ?>
            <div class="card-body px-4 pb-5">
                <?php echo wpautop(get_the_content()); ?>
                <hr>
                <hr>
                <div class="mt-3">
                    <b class="d-block mb-3">مشاركة التدوينة:</b>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            </div>
        </div>
        <?php
        wp_link_pages(array(
            'before' => '<div class="link-pages">' . __('Pages:', 'qi-theme'),
            'after' => '</div><!--/.link-pages-->'
        ));
        ?>
    </div><!--/.blog-post-entry.markup-format-->
    <?php do_action('QITheme/SingleAfterContent'); ?>
    <div class="py-5">
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->
