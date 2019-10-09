<?php
/**
 *    The template for displaying the single content.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */

$post_term = wp_get_post_terms(get_the_ID(), 'pics-cats');
$is_building = $post_term->slug != 'beauty';
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
                    if (has_post_thumbnail()) {
	                    $post_image  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	                    $thumb_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                    }
                    ?>
                    <div class="pics-carousel owl-carousel owl-theme" data-slider-id="1">
                        <?php
                        if(pll_current_language() === 'ar') {
                            $images = get_field('gallery_images');
                        } else {
                            global $polylang;
                            $translationIds = $polylang->model->get_translations('post', get_the_ID());
                            $images = get_field('gallery_images', $translationIds['ar']);
                        }
                        if (!empty($images) && is_array($images) && count($images)) {
                            foreach ($images as $image) : ?>
                                <a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fancybox="images"
                                   data-caption="<?= get_the_title() ?>"><img
                                            src="<?php echo esc_url($image['sizes']['large']); ?>"/></a>
                            <?php endforeach;
                        } elseif(isset($post_image)) { ?>
                            <a href="<?php echo esc_url($post_image[0]); ?>"
                               data-fancybox="images"
                               data-caption="<?= get_the_title() ?>"><img
                                        src="<?php echo esc_url($post_image[0]); ?>"/></a>
                        <?php } ?>
                    </div>
                    <div class="owl-thumbs" data-slider-id="1">
                        <?php
                        if (!empty($images) && is_array($images) && count($images)) {
                            foreach ($images as $image) : ?>
                                <button class="owl-thumb-item"><img src="<?= $image['sizes']['thumbnail'] ?>" alt="">
                                </button>
                            <?php endforeach;
                        } elseif (isset($thumb_image)) { ?>
                            <button class="owl-thumb-item"><img src="<?= $thumb_image[0] ?>" alt=""></button>
                        <?php } ?>
                    </div>

                </div>
        </div>
        <div class="col-md-5 content-col col-sm-12">
            <div class="d-flex flex-wrap-reverse">
                <div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('photos') ?>"><?= __("Photos & Landmarks", 'qi-theme') ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="<?php echo get_term_link(get_the_terms(get_the_ID(), 'pics-cats')[0]); ?>"
                                ><?php echo get_the_terms(get_the_ID(), 'pics-cats')[0]->name; ?></a>
                            </li>
                        </ol>
                    </nav>

                </div>
                <?php navigation_links(true, false); ?>
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
            do_action("mtl_single_after_content");


            //            if ( comments_open() || get_comments_number() ) :
            //                comments_template();
            //            endif;
            ?>
        </div>
    </div>

</article><!--/#post-<?php the_ID(); ?>.blog-post-->