<?php
/**
 *    The template for dispalying the bottom header section in blog.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */

use QITheme\Helpers;

?>
<?php

$BH_classes = Helpers::is_lectures() ? " lectures-header" : "";
$post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(isset($post) ? $post->ID : null), 'large');

$header_attr = "";
$overlay_attr = "";
$image_bg = "";
if (function_exists('z_taxonomy_image_url') && !empty($image = z_taxonomy_image_url())) :
    $image_bg = $image;
elseif (has_post_thumbnail())://(get_post_type() == 'news' || get_post_type() == 'pics'):
    $image_bg = esc_url($post_thumbnail[0]);
endif;
if (Helpers::is_avi()) {
    $rand_image = \QITheme\Helpers::getRandomHeaderImage();
    $image_bg = esc_url($rand_image["img_url"]);
}

if ($image_bg != "")
    $header_attr = ' style="background-image: url(' . $image_bg . ')"';

?>
<div class="bottom-header parallax-window blog<?= $BH_classes ?>" <?= $header_attr ?>>
    <div class="header-overlay"></div>

    <div class="container">
        <div class="row">

            <?php if (!Helpers::is_avi() && !Helpers::is_photos() && !Helpers::is_lectures() && (is_page_template('page-templates/blog.php') ||
                    is_page_template('page-templates/page-news.php') ||
                    is_singular())): ?>
                <div class="col-sm-12 top-page-title">
                    <h2><?php the_title(); ?></h2>

                    <?php if (is_singular('post')) {
                        $cat = get_the_category()[0]; ?>
                        <p><a class="blog-header-catlink"
                              href="<?php echo home_url('/our-info/category/' . $cat->term_id . '/' . $cat->slug . '/'); ?>"><?php echo get_the_category()[0]->name; ?></a>
                        </p>
                    <?php } elseif (is_singular('news')) {
                        do_action('mtl_single_news_entry_meta');
                    } ?>
                </div><!--/.col-sm-12-->
            <?php elseif (is_404()): ?>
                <div class="col-sm-12 top-page-title"><h2 style="font-size: 8rem;">404 :(</h2></div>
            <?php elseif (Helpers::is_avi()) : ?>
                <div class="col-sm-12 top-page-title">
                    <h2><?= __("Our Information", 'qi-theme') ?></h2>
                </div>
            <?php elseif (Helpers::is_photos()) : ?>
                <div class="col-sm-12 top-page-title">
                    <h2><?= __("Milestones and Pictures", 'qi-theme') ?></h2>
                </div>
            <?php elseif (Helpers::is_lectures()) :
                get_template_part('template-parts/lectures', 'header');
            else : ?>
                <div class="col-sm-12 top-page-title">
                    <?php Helpers::archive_title('<h2>', '</h2>'); ?>
                </div><!--/.col-sm-12-->
            <?php endif; ?>
        </div><!--/.row-->
        <?php if (Helpers::is_avi() && pll_current_language() === "ar") : ?>
            <?php $pt = basename(get_page_template()); ?>
            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link<?= $pt == 'infos.php' || get_query_var('cat') != '' ? ' active' : '' ?>"
                       href="<?= home_url('/our-info/') ?>"><i class="fa fa-database"></i>
                        <span><?= __("Written", "qi-theme") ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= $pt == 'videos.php' ? ' active' : '' ?>"
                       href="<?= home_url('/our-info/videos/') ?>"><i class="fa fa-video-camera"></i>
                        <span><?= __("Videos", "qi-theme") ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= $pt == 'audio.php' ? ' active' : '' ?>"
                       href="<?= home_url('/our-info/audio/') ?>"><i class="fa fa-headphones"></i>
                        <span><?= __("Audio", "qi-theme") ?></span></a>
                </li>
            </ul>
        <?php endif; ?>
    </div><!--/.container-->
</div><!--/.bottom-header.blog-->
