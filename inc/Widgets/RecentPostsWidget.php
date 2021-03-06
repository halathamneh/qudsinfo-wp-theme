<?php

namespace QITheme\Widgets;

class RecentPostsWidget extends \WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'illdy_recent_posts', __( '[QudsInfo] - Recent Infos', 'qi-theme' ), array( 'description' => __( 'Thiw widget will display the latest infos with thumbnail image on the left side.', 'qi-theme' ), ) );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        $display_title = !empty( $instance['display_title'] ) ? $instance['display_title'] : '';
        $numberofposts = !empty( $instance['numberofposts'] ) ? absint( $instance['numberofposts'] ) : '';

        if( $display_title == 'on' ) {
            if ( !empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }
        }

        $post_query_args = array (
            'post_type'              => array( 'post' ),
            'pagination'             => false,
            'posts_per_page'         => $numberofposts,
            'ignore_sticky_posts'    => true,
            'cache_results'          => true,
            'update_post_meta_cache' => true,
            'update_post_term_cache' => true,
        );

        $post_query = new \WP_Query( $post_query_args );

        if( $post_query->have_posts() ) {
            while( $post_query->have_posts() ) {
                $post_query->the_post();

                global $post;

                $output = '';

                $output .= '<div class="widget-recent-post clearfix">';
                    $output .= ( has_post_thumbnail( $post->ID ) ? '<div class="recent-post-image">' : '' );
                        $output .= ( has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail( $post->ID, 'illdy-widget-recent-posts' ) : '' );
                    $output .= ( has_post_thumbnail( $post->ID ) ? '</div><!--/.recent-post-image-->' : '' );
                    $output .= '<a href="'. esc_url( get_the_permalink() ) .'" title="'. esc_attr( get_the_title() ) .'" class="recent-post-title">'. esc_html( get_the_title() ) .'</a>';
                    $output .= '<a href="'. esc_url( get_category_link(get_the_category($post->ID)[0]->term_id) ) .'" title="'. get_the_category($post->ID)[0]->name .'" class="recent-post-button">'. get_the_category($post->ID)[0]->name .'</a>';
                $output .= '</div><!--/.widget-recent-post.clearfix-->';

                echo $output;

            }
        } else {
            echo __( 'No posts found.', 'qi-theme' );
        }

        wp_reset_postdata();

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $display_title = !empty( $instance['display_title'] ) ? $instance['display_title'] : '';
        $title = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : __( '[Illdy] - Recent Posts', 'qi-theme' );
        $numberofposts = !empty( $instance['numberofposts'] ) ? absint( $instance['numberofposts'] ) : __( '4', 'qi-theme' );
        ?>

        <p>
            <input class="checkbox" type="checkbox" <?php if( $display_title == 'on' ): echo 'checked="checked"'; endif; ?> id="<?php echo $this->get_field_id( 'display_title' ); ?>" name="<?php echo $this->get_field_name( 'display_title' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'display_title' ); ?>"><?php _e( 'Display title?', 'qi-theme' ); ?></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'qi-theme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'numberofposts' ); ?>"><?php _e( 'Number of posts:', 'qi-theme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'numberofposts' ); ?>" name="<?php echo $this->get_field_name( 'numberofposts' ); ?>" type="number" value="<?php echo esc_attr( $numberofposts ); ?>">
        </p>
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['display_title'] = $new_instance['display_title'];
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['numberofposts'] = ( !empty( $new_instance['numberofposts'] ) ? absint( $new_instance['numberofposts'] ) : '' );

        return $instance;
    }

}
