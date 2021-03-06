<?php

namespace QITheme\Widgets;

class FaqWidget extends \WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct('qudsinfo-faq', __('FAQs', 'qi-theme'), array('description' => __('This widget will show random FAQs.', 'qi-theme'),));
    }

    /**
     * Front-end display of widget.
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     * @see \WP_Widget::widget()
     *
     */
    public function widget($args, $instance)
    {

        if(pll_current_language() === "en") {
            return;
        }

        echo $args['before_widget'];

        $numberofposts = !empty($instance['numberofposts']) ? absint($instance['numberofposts']) : '';

        echo '<div class="widget-title"><h3>' . __('Frequent Questions', 'qi-theme') . '</h3></div>';


        $post_query_args = array(
            'post_type'           => array('faq'),
            'pagination'          => false,
            'posts_per_page'      => $numberofposts,
            'ignore_sticky_posts' => true,
            'orderby'             => 'rand',
        );

        $post_query = new \WP_Query($post_query_args);

        if ($post_query->have_posts()) {
            while ($post_query->have_posts()) {
                $post_query->the_post();

                global $post;

                $output = '';

                $output .= '<div class="widget-faq-item clearfix">';
                $output .= '<button data-target="#faq-item-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '" class="widget-faq-item-btn btn"><span>' . esc_html(get_the_title()) . '</span></button>';
                $output .= '<div class="widget-faq-item-overlay" id="faq-item-' . $post->ID . '">' .
                    '<div class="faq-content">' .
                    '   <h2 class="faq-question">' . esc_html(get_the_title()) . '</h2>' .
                    '   <div class="faq-answer">' . get_the_content() . '</div>' .
                    '   <button type="button" data-target="#faq-item-' . $post->ID . '" class="btn faq-hide-btn btn-outline-secondary">' . __('Close', 'qi-theme') . '</button>' .
                    '</div>' .
                    '</div>';
                $output .= '</div><!--/.widget-recent-post.clearfix-->';

                echo $output;
            }
            echo '<script>
                    document.querySelectorAll(".faq-hide-btn").forEach(
                        el => el.addEventListener("click", 
                            function(e) {
                                e.preventDefault();
                                var target = e.target.dataset.target;
                                var elem = document.querySelector(target);
                                elem.classList.remove("show"); 
                            }
                        )
                    )
                    document.querySelectorAll(".widget-faq-item-btn").forEach(
                        el => el.addEventListener("click", 
                            function(e) {
                                e.preventDefault();
                                var target = e.target.dataset.target;
                                var elem = document.querySelector(target);
                                elem.classList.add("show"); 
                            }
                        )
                    )
                </script>';
        } else {
            echo __('No FAQs found.', 'qi-theme');
        }

        wp_reset_postdata();

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @param array $instance Previously saved values from database.
     * @see \WP_Widget::form()
     *
     */
    public function form($instance)
    {
        $display_title = !empty($instance['display_title']) ? $instance['display_title'] : '';
        $title         = !empty($instance['title']) ? sanitize_text_field($instance['title']) : __('[Illdy] - Recent Posts', 'qi-theme');
        $numberofposts = !empty($instance['numberofposts']) ? absint($instance['numberofposts']) : __('4', 'qi-theme');
        ?>

        <p>
            <input class="checkbox"
                   type="checkbox" <?php if ($display_title == 'on'): echo 'checked="checked"'; endif; ?>
                   id="<?php echo $this->get_field_id('display_title'); ?>"
                   name="<?php echo $this->get_field_name('display_title'); ?>"/>
            <label for="<?php echo $this->get_field_id('display_title'); ?>"><?php _e('Display title?', 'qi-theme'); ?></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'qi-theme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('numberofposts'); ?>"><?php _e('Number of posts:', 'qi-theme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('numberofposts'); ?>"
                   name="<?php echo $this->get_field_name('numberofposts'); ?>" type="number"
                   value="<?php echo esc_attr($numberofposts); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     * @see \WP_Widget::update()
     *
     */
    public function update($new_instance, $old_instance)
    {
        $instance                  = array();
        $instance['display_title'] = $new_instance['display_title'];
        $instance['title']         = (!empty($new_instance['title'])) ? esc_html($new_instance['title']) : '';
        $instance['numberofposts'] = (!empty($new_instance['numberofposts']) ? absint($new_instance['numberofposts']) : '');

        return $instance;
    }

}
