<?php
/**
 *    The template for displaying the bottom header section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */

global $todayInfo;
$image = wp_get_attachment_image_src(get_post_thumbnail_id($todayInfo->today_info->ID), 'large');
$image_bg = esc_url($image[0]);
$header_attr = ' style="background-image: url(' . $image_bg . ')" ';
$overlay_attr = ' style="background-image: url(\'' . get_template_directory_uri() . '/layout/images/patterns/footer.png\')" ';
?>
<div class="bottom-header front-page" <?= $header_attr ?>>
    <div class="header-overlay" <?= $overlay_attr ?>></div>

    <?php
    $post = $todayInfo->today_info;
    ?>
    <div class="info-of-today">
        <div class="container">
            <div class="row no-gutters">

                <div class="iot-content col-sm-12 p-3">
                    <div class="iot-headline">
                        <span class="badge badge-success"><i class="fa fa-asterisk"></i> <?= __('Info Of Today', 'illdy') ?></span>
                    </div>
                    <a href="<?php the_permalink($post->ID) ?>"><h3 class="iot-title"><?= $post->post_title ?></h3></a>
                    <div class="iot-data">
                        <span><?php echo wp_is_mobile() ? wp_strip_all_tags($post->post_content) : "" ?></span>
                    </div>
                    <div id="to_type" style="display: none;">
                        <p><?php echo wp_strip_all_tags($post->post_content) ?></p>
                    </div>
                    <a href="<?= get_permalink($post->ID) ?>" class="btn btn-success"><?= __('View Info', 'illdy') ?> <i
                                class="fa <?= is_rtl() ? "fa-angle-left" : "fa-angle-right" ?>"></i></a>
                    <a href="/our-info/" class="btn btn-link text-white"><?= __("View All Information", 'illdy') ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div><!--/.bottom-header.front-page-->