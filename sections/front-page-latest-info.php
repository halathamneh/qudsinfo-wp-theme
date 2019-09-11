<?php
/**
 *    The template for displaying the latest info section in front page.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php
$general_title = __('Our Info', 'qi-theme'); //get_theme_mod('illdy_latest_info_general_title', __('Latest Info', 'qi-theme'));
$general_entry = get_theme_mod('illdy_latest_info_general_entry', __('If you are interested in the latest articles in the industry, take a sneak peek at our blog. You’ve got nothing to loose!', 'qi-theme'));
$button_text = __('Browse all Our Info', 'qi-theme'); //get_theme_mod('illdy_latest_info_button_text', __('See blog', 'qi-theme'));
$button_url = get_theme_mod('illdy_latest_info_button_url', esc_url('#'));
$number_of_posts = get_theme_mod('illdy_latest_info_number_of_posts', absint(3));
?>
<section id="latest-info" class="front-page-section">
    <div class="section-header">
        <div class="container">
            <?php
            //on_this_day();
            ?>
            <div class="row">
                <?php if ( $general_title ): ?>
                    <div class="col-sm-12 title">
                        <h3><?php echo illdy_sanitize_html($general_title); ?></h3>
                    </div><!--/.col-sm-12-->
                <?php endif; ?>
                <?php if ( $general_entry ): ?>
                    <div class="col-sm-10 col-sm-offset-1">
                        <p><?php echo illdy_sanitize_html($general_entry); ?></p>
                    </div><!--/.col-sm-10.col-sm-offset-1-->
                <?php endif; ?>
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.section-header-->

    <div class="container">
        <?php
        //putRevSlider( 'infosSlider' );
        
        //do_shortcode('[wp_posts_carousel template="light.css" post_types="post" all_items="16" show_only="popular" exclude="" posts="" ordering="desc" categories="2355,2458,2449" relation="and" tags="" show_title="true" show_created_date="false" show_description="excerpt" allow_shortcodes="false" show_category="true" show_tags="false" show_more_button="false" show_featured_image="true" image_source="illdy-blog-post-related-articles" image_height="100" image_width="100" items_to_show_mobiles="1" items_to_show_tablets="2" items_to_show="3" slide_by="1" margin="5" loop="true" stop_on_hover="false" auto_play="true" auto_play_timeout="3000" auto_play_speed="800" nav="true" nav_speed="100" dots="true" dots_speed="200" lazy_load="true" mouse_drag="true" mouse_wheel="false" touch_drag="true" easing="linear" auto_height="false" custom_breakpoints=""]');
        
        $infos_slide_query = new WP_Query([
            'posts_per_page' => 8,
            'order'          => 'random',
        ]);
        if ( $infos_slide_query->have_posts() ) : ?>
            <div class="frontpage-infos-slider infos-owl-carousel">
                <?php while ( $infos_slide_query->have_posts() ) : $infos_slide_query->the_post();
                    $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-front-page-latest-news');
                    $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                    ?>
                    <div class="infos-owl-item card">
                        <a href="<?= $post_image[0] ?>" data-fancybox="infos" class="infos-image"
                           data-caption="<?= get_the_title() . "<br>" . nl2br(esc_attr__(get_the_content())) ?>">
                            <img class="card-img-top" src="<?= $post_thumbnail[0] ?>" alt="">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title"><?= get_the_title() ?></h4>
                            <p class="card-text"><?= get_the_excerpt() ?></p>
                            <a href="<?= get_permalink() ?>" class="btn btn-light"><?= __("View Info", 'qi-theme') ?></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    if ( $button_text && $button_url ): ?>
        <a href="<?php echo esc_url($button_url); ?>" title="<?php echo esc_attr($button_text); ?>"
           class="latest-info-button"><?php echo esc_html($button_text); ?> <i class="fa fa-chevron-circle-<?= is_rtl() ? "left" : "right" ?>"></i></a>
    <?php endif; ?>
    
    <?php wp_reset_postdata(); ?>
</section><!--/#latest-info.front-page-section-->