<?php
/**
 *    The template for displaying the latest news section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>

<section id="news-bar" class="front-page-section">
    <?php
    $post_query_args = array(
        'post_type'              => array('news'),
        'nopaging'               => false,
        'posts_per_page'         => 5,
        'ignore_sticky_posts'    => true,
        'cache_results'          => true,
        'update_post_meta_cache' => true,
        'update_post_term_cache' => true,
    );
    ?>

    <?php $post_query = new WP_Query($post_query_args); ?>
    <?php if ($post_query->have_posts()): ?>
        <div class="container">
            <div class="news-bar-content">
                <h3><?= __('Latest News', 'illdy') ?></h3>
                <div class="news-list-wrapper">
                    <ul class="news-list">
                        <?php while ($post_query->have_posts()): ?>
                            <?php $post_query->the_post(); ?>
                            <li><a href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>"><?= get_the_excerpt() ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div><!--/.container-->
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</section><!--/#latest-news.front-page-section-->