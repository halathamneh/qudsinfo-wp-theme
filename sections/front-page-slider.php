<?php
/**
 *    The template for displaying the latest info section in front page.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */

$thoughts_catid = 2351;
?>

<section id="slider-section" class="slider-section">
    <div class="container">
        <div class="header-quick row no-gutters">
            <div class="quick-section news-section col-md-8 pl-md-2">
                <h3 class="header-quick-title"><i class="fa fa-newspaper-o"></i> <?= __("Latest Quds News", 'qi-theme') ?></h3>
                
                <?php $query_args = array(
                    'post_type'      => 'news',
                    'post_status'    => 'publish',
                    'posts_per_page' => 8,
                    'no_found_rows'  => 1,
                    'orderby'        => 'post_date',
                    'order'          => 'desc',
                );
                $news_query = new WP_Query($query_args);
                ?>
                <div class="header-news-carousel">
                    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                        <?php
                        $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info-large');
                        ?>
                        <div class="news-carousel-item"
                             style="background-image: url('<?= $post_thumbnail[0] ?>');">
                            <div class="news-item-details">
                                        <span class="post-meta-time"><i
                                                    class="fa fa-clock-o"></i> <?= get_the_date() ?></span>
                                <a href="<?php the_permalink() ?>"><h3><?= mb_strimwidth(get_the_title(),0,70,'...') ?></h3></a>
                                <div class="news-description"><?php the_excerpt() ?></div>
                                <a href="<?php the_permalink() ?>" class="btn btn-outline-dark"><?= __("Continue Reading", 'qi-theme') ?> <i
                                            class="fa fa-angle-<?= is_rtl() ? "left" : "right" ?>"></i></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

            </div>
            <div class="quick-section thought-section col-md-4">
                <h3 class="header-quick-title"><i class="fa fa-heart-o"></i> <?= __("Thought of the day", 'qi-theme') ?></h3>
                <?php $query_args = array(
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => 1,
                    'orderby'        => 'rand',
                    'cat'            => $thoughts_catid,
                
                );
                $info_query = new WP_Query($query_args);
                if ( $info_query->have_posts() ) : $info_query->the_post();
                    $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info-post');
                    $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                    ?>

                    <a class="qt-image" href="<?= $post_image[0] ?>"
                       data-fancybox data-caption="<?= get_the_title() . "<br>" . nl2br(wp_strip_all_tags(get_the_content())) ?>">
                        <img src="<?= $post_thumbnail[0] ?>" alt="">
                    </a>
                    <div class="qt-content">
                        <a href="<?= the_permalink() ?>"><h3><?= get_the_title() ?></h3></a>
                        <p>
                            <?php echo wp_strip_all_tags(get_the_content()) ?>
                        </p>
                    </div>
                
                <?php endif; ?>
            </div>

            <!--<div class="quick-section event-section">
                <h3 class="header-quick-title"><i class="fa fa-calendar"></i>حدث في مثل هذا اليوم</h3>
                <div class="quick-event-today">
                    <?php
            /*                    $event_query = otd_get_events();
                                if ( $event_query->have_posts() ) : $event_query->the_post();
                                    $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info');
                                    */ ?>
                        <ul class="qet-items">
                            <li class="qet-item">
                                <h3><?php /*the_title() */ ?></h3>
                                <span><?php /*the_field('the_year');
                                    echo $type == 'm' ? " م" : " هـ"; */ ?></span>
                            </li>
                        </ul>
                    <?php /*else : */ ?>
                        <div class="qet-empty">
                            <div class="wrapper">
                                لا يوجد أحداث لهذا اليوم
                            </div>
                        </div>
                    <?php /*endif; */ ?>
                </div>

            </div>-->
        </div>
    </div>
</section><!--/#latest-info.front-page-section-->