<?php

namespace QITheme\Components;

use QITheme\Lib\Singleton;

/**
 * Class MTL_Related_Posts_Output
 */
class RelatedPosts extends Singleton
{

    /**
     *
     */
    protected function __construct()
    {
        parent::__construct();

        add_action('QITheme/SingleAfterContent', array($this, 'renderRelatedPosts'), 3);
    }

    /**
     * Render related posts carousel
     *
     * @output string                    HTML markup to display related posts
     **/
    function renderRelatedPosts()
    {
        echo $this->getRelatedPostsMarkup();
    }

    public function getRelatedPosts()
    {
        global $post;

        $posts = [];

        $post_query_args = array(
            'post_type'              => array('post'),
            'category__in'           => wp_get_post_categories($post->ID),
            'nopaging'               => false,
            'posts_per_page'         => 3,
            'ignore_sticky_posts'    => true,
            'cache_results'          => true,
            'update_post_meta_cache' => true,
            'update_post_term_cache' => true,
            'post__not_in'           => array($post->ID),
            'meta_key'               => '_thumbnail_id',
        );

        $post_query = new \WP_Query($post_query_args);

        if ($post_query->have_posts()) {
            while ($post_query->have_posts()) {
                $posts[] = $post_query->next_post();
            }
        }

        return $posts;
    }

    public function getRelatedPostsMarkup()
    {
        $output = '';

        $posts = $this->getRelatedPosts();

        $output .= '<div class="blog-post-related-articles">';
        $output .= '<div class="row">';
        $output .= '<div class="col-sm-12">';
        $output .= '<div class="related-article-title">';
        $output .= __('معلومات ذات صلة', 'qi-theme');
        $output .= '</div><!--/.related-article-title-->';
        $output .= '</div><!--/.col-sm-12-->';

        foreach ($posts as $post) {

            $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-blog-post-related-articles');

            $output .= '<div class="col-sm-4">';
            $output .= '<a href="' . esc_url(get_permalink($post)) . '" title="' . esc_attr(get_the_title($post)) . '" class="related-post" style="background-image: url(' . ($post_thumbnail ? esc_url($post_thumbnail[0]) : '') . ');">';
            $output .= '<span class="related-post-title">' . esc_html(get_the_title($post)) . '</span>';
            $output .= '</a><!--/.related-post-->';
            $output .= '</div><!--/.col-sm-4-->';
        }
        $output .= '</div><!--/.row-->';
        $output .= '</div><!--/.blog-post-related-articles-->';

        return $output;
    }
}

