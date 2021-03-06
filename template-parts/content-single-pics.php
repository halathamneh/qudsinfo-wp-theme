<?php
/**
 *    The template for displaying the single content.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */

$post_terms = get_the_terms(get_the_ID(), 'pics-cats');
$post_term = $post_terms !== false ? $post_terms[0] : false;
$is_building = $post_term instanceof WP_Term && $post_term->slug != 'beauty';
$location_to_dome = $history = $name_reason = $builtby = false;
if ($is_building) {
    $location = get_field('location');
    $location_to_dome = get_field('location_to_dome');
    $history = get_field('build_history');
    $name_reason = get_field('name_reason');
    $builtby = get_field('builtby');
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <div class="row">
        <div class="col-md-7 image-col col-sm-12">
            <h2 class="d-md-none"><?php the_title(); ?></h2>
            <div class="image-holder">
                <?php
                $images = [];
                $originalPostId = get_the_ID();
                if (has_post_thumbnail()) {
                    $original_image = wp_get_attachment_image_src(get_post_thumbnail_id($originalPostId), 'full');
                    $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($originalPostId), 'large');
                    $thumb_image = wp_get_attachment_image_src(get_post_thumbnail_id($originalPostId), 'thumbnail');
                }

                if (pll_current_language() === 'ar') {
                    $images = get_field('gallery_images');
                } else {
                    global $polylang;
                    $translationIds = $polylang->model->get_translations('post', $originalPostId);
                    $images = get_field('gallery_images', $translationIds['ar']);
                }
                $json = ['title' => get_the_title(), 'images' => []];
                if (!empty($images) && is_array($images) && count($images)) {
                    foreach ($images as $image) {
                        $json['images'][] = ['original' => $image['url'], 'large' => $image['sizes']['large']];
                    }
                } elseif (isset($post_image)) {
                    $json['images'][] = ['original' => $original_image[0], 'large' => $post_image[0]];
                } ?>
                <div id="pics-image-slider" data-pics="<?= htmlspecialchars(json_encode($json)) ?>"></div>
            </div>
        </div>
        <div class="col-md-5 content-col col-sm-12">
            <div class="d-flex flex-wrap-reverse">
                <div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                        href="<?= site_url('photos') ?>"><?= __("Photos & Landmarks", 'qi-theme') ?></a>
                            </li>
                            <?php if ($post_terms !== false) :
                                foreach ($post_terms as $term) : ?>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="<?php echo get_term_link($term); ?>"
                                        ><?php echo $term->name; ?></a>
                                    </li>
                                <?php endforeach;
                            endif; ?>
                        </ol>
                    </nav>

                </div>
                <?php \QITheme\Helpers::navigationLinks(true, false, 'pics-cats'); ?>
            </div>
            <h2><?php the_title(); ?></h2>
            <div class="sharing-buttons"><i><?= __("Share Image:", 'qi-theme') ?> </i>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            </div>
            <hr>
            <div class="post-content">
                <?php
                if ($is_building && ($location || $location_to_dome || $history || $name_reason || $builtby)) {
                    if ($location) : ?>
                        <div class="b_group">
                            <span class="b_label"><?= __('Landmark Location:', 'qi-theme') ?></span>
                            <span class="b_text"><?= $location ?></span>
                        </div>
                    <?php endif;
                    if ($location_to_dome) : ?>
                        <div class="b_group">
                            <span class="b_label"><?= __("Landmark Location relative to Dome of the rock:", 'qi-theme') ?></span>
                            <span class="b_text"><?= $location_to_dome ?></span>
                        </div>
                    <?php endif;
                    if ($history) : ?>
                        <div class="b_group">
                            <span class="b_label"><?= __("Landmark History:", 'qi-theme') ?></span>
                            <span class="b_text b_textarea"><?= $history ?></span>
                        </div>
                    <?php endif;
                    if ($name_reason) : ?>
                        <div class="b_group">
                            <span class="b_label"><?= __("Reason of the name:", 'qi-theme') ?></span>
                            <span class="b_text b_textarea"><?= $name_reason ?></span>
                        </div>
                    <?php endif;
                    if ($builtby) : ?>
                        <div class="b_group">
                            <span class="b_label"><?= __("Builder Name:", 'qi-theme') ?></span>
                            <span class="b_text"><?= $builtby ?></span>
                        </div>
                    <?php endif;
                    //echo '<br><span class="b_label">عن المعلم:</span>';
                } ?>
                <span class="b_text"><?php the_content(); ?></span>
            </div>

            <?php
            do_action("QITheme/SingleAfterContent");


            //            if ( comments_open() || get_comments_number() ) :
            //                comments_template();
            //            endif;
            ?>
        </div>
    </div>

</article><!--/#post-<?php the_ID(); ?>.blog-post-->
