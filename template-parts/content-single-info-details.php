<?php
/**
 *    The template for displaying the single info details content.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<div class="row flex-row-reverse">
    <div class="col-sm-4 p-0">

        <div class="toc-widget widget">
            <div class="widget-container">
                <div class="widget-title">
                    <h3><i class="fa fa-book"></i> الفهرس</h3>
                    <button class="btn btn-link slide-down"><i class="fa fa-angle-down"></i></button>
                </div>
                <ul class="toc-items">
                    <?php $i = 0;
                    while (have_rows('paragraphs')) : the_row(); ?>
                        <li class="toc-item"><a href="#paragraph-<?= ++$i ?>"
                                                class="toc-link"><?= get_sub_field('title') ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

    </div>

    <div class="col-sm-8">
        <section id="blog">
            <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

                <?php //do_action( 'mtl_single_news_entry_meta' ); ?>
                <div class="blog-post-entry markup-format info-details">
                    <h3><?php the_title() ?></h3>
                    <?php
                    if (have_rows('paragraphs')) {
                        $i = 0;
                        while (have_rows('paragraphs')) : the_row();
                            echo '<h3 class="info-details-heading" id="paragraph-' . ++$i . '">' . get_sub_field('title') . '</h3>' .
                                get_sub_field('text');
                        endwhile;
                    }

                    wp_link_pages(array(
                        'before' => '<div class="link-pages">' . __('Pages:', 'qi-theme'),
                        'after'  => '</div><!--/.link-pages-->',
                    ));
                    ?>
                </div><!--/.blog-post-entry.markup-format-->
                <?php if (has_post_thumbnail()): ?>
                    <div class="blog-post-image">
                        <?php the_post_thumbnail('illdy-blog-list'); ?>
                    </div><!--/.blog-post-image-->
                <?php endif; ?>
                <?php do_action('mtl_single_after_content');

                //                if ( comments_open() || get_comments_number() ) :
                //                    comments_template();
                //                endif;
                ?>
            </article><!--/#post-<?php the_ID(); ?>.blog-post-->
    </div><!--/.col-sm-7-->
</div><!--/.row-->