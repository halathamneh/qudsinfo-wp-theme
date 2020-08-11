<?php
/**
 *    The template for displaying the single content.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post book-post'); ?>>
    <?php
    $dl = get_field('download_link');
    $dl_ex = get_field('external_link');
    $author = get_field('book_author_f');
    ?>
    <div class="row flex-row-reverse">

        <div class="col-md-9">
            <?php //do_action( 'mtl_single_entry_meta' ); ?>
            <h2 class="blog-post-title"><?php the_title(); ?></h2>
            <div class="row book-extras">
                <div class="col-md-6 col-12">
                    <div class="books-meta">
                    <span class="bk-author">تأليف: <a
                                href="<?= get_term_link($author) ?>"><?= $author->name; ?></a></span>
                        <span class="bk-release-date">تاريخ الإصدار: <?= get_field('release_date'); ?></span>
                        <span class="bk-num-pages">عدد الصفحات: <?= get_field('num_pages'); ?></span>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="sharing-buttons"><i>انشر الكتاب: </i>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
            </div>
            <div class="blog-post-entry">
                <?php $quote = get_field('quote'); ?>
                <?php if (!empty($quote)) : ?>
                    <blockquote class="blockquote">
                        <h3><b>اقتباس من الكتاب:</b></h3>
                        <div>
                            <?= $quote ?>
                        </div>
                    </blockquote>
                <?php endif; ?>
                <h3><i>نبذة عن الكتاب:</i></h3>
                <div>
                    <?php
                    echo wpautop(get_the_content());
                    ?>
                </div>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="link-pages">' . __('Pages:', 'qi-theme'),
                    'after'  => '</div><!--/.link-pages-->',
                ));
                ?>
            </div><!--/.blog-post-entry.markup-format-->
            <?php
            if (has_post_thumbnail()): ?>
                <div class="blog-post-image">
                    <?php the_post_thumbnail('illdy-blog-list'); ?>
                </div><!--/.blog-post-image-->
            <?php endif; ?>
            <?php //do_action( 'QITheme/SingleAfterContent' ); ?>
        </div>
        <div class="col-md-3">
            <div class="bk-download-links">
                <?php if ($dl != '') : ?>
                    <a href="<?= $dl ?>" class="btn btn-success bk-download py-md-2 py-4"><i class="fa fa-download"></i>
                        تنزيل الكتاب</a>
                <?php endif; ?>
                <?php if ($dl_ex['url'] != '') : ?>
                    <a href="<?= $dl_ex['url'] ?>" class="btn btn-default bk-download py-md-2 py-4"><i
                                class="fa fa-download"></i>
                        تنزيل من رابط خارجي</a>
                <?php endif; ?>
            </div>
            <div class="author-bar p-3 my-3">
                <h3>نبذة عن المؤلف</h3>
                <blockquote class="blockquote">
                    <?php
                    if ('' != $author->description) echo wpautop($author->description);
                    else echo "لا يوجد وصف لهذا المؤلف";
                    ?>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 mr-auto col-12">
            <?php
            //            if ( comments_open() || get_comments_number() ) :
            //                comments_template();
            //            endif;
            ?>
        </div>
    </div>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->
