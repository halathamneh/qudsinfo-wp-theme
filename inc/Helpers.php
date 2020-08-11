<?php

namespace QITheme;

class Helpers
{
    public static function get_image_id($image_url)
    {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
        return $attachment[0];
    }

    public static function view(string $template, array $vars = [])
    {
        extract($vars);
        include('views/' . $template . '.php');
    }

    public static function is_avi()
    {
        return is_page_template('page-templates/infos.php') ||
            is_page_template('page-templates/audio.php') || is_page_template('page-templates/videos.php') ||
            get_query_var('cat') != '';
    }

    public static function is_photos() {
        return is_page_template('page-templates/photos.php');
    }

    public static function is_lectures()
    {
        return basename(get_page_template()) === 'lectures.php';
    }

    public static 	function archive_title($before = '', $after = '' ) {
        if ( is_category() ) {
            $title = sprintf( __( '%s', 'qi-theme' ), single_cat_title( '', false ) );
        } elseif ( is_tag() ) {
            $title = sprintf( __( 'تاغ: %s', 'qi-theme' ), single_tag_title( '', false ) );
        } elseif ( is_author() ) {
            $title = sprintf( __( 'الكاتب: %s', 'qi-theme' ), '<span class="vcard">' . get_the_author() . '</span>' );
        } elseif ( is_year() ) {
            $title = sprintf( __( 'السنة: %s', 'qi-theme' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'qi-theme' ) ) );
        } elseif ( is_month() ) {
            $title = sprintf( __( 'الشهر: %s', 'qi-theme' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'qi-theme' ) ) );
        } elseif ( is_day() ) {
            $title = sprintf( __( 'اليوم: %s', 'qi-theme' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'qi-theme' ) ) );
        } elseif ( is_tax( 'post_format' ) ) {
            if ( is_tax( 'post_format', 'post-format-aside' ) ) {
                $title = esc_html_x( 'Asides', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
                $title = esc_html_x( 'Galleries', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
                $title = esc_html_x( 'Images', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax('post_format', 'post-format-video' ) ) {
                $title = esc_html_x( 'Videos', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
                $title = esc_html_x( 'Quotes', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
                $title = esc_html_x( 'Links', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax( 'post_format', 'post-format-status') ) {
                $title = esc_html_x( 'Statuses', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
                $title = esc_html_x( 'Audio', 'post format archive title', 'qi-theme' );
            } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
                $title = esc_html_x( 'Chats', 'post format archive title', 'qi-theme' );
            }
        } elseif ( is_post_type_archive() ) {
            $title = sprintf( __( 'أرشيف: %s', 'qi-theme' ), post_type_archive_title( '', false ) );
        } elseif ( is_tax() ) {
            $tax = get_taxonomy(get_queried_object()->taxonomy);
            /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = sprintf(__('%1$s', 'qi-theme'), single_term_title('', false));
        } elseif ( is_search() ) {
            $title = sprintf(__('بحث عن : %1$s','qi-theme'),get_search_query());
        } else {
            $title = __( 'الأرشيف', 'qi-theme' );
        }

        /**
         * Filter the archive title.
         *
         * @param string $title Archive title to be displayed.
         */
        $title = apply_filters('get_the_archive_title', $title);

        if (!empty($title)) {
            echo $before . $title . $after;  // WPCS: XSS OK.
        }
    }

    public static function archive_description($before = '', $after = '' ) {
        $description = apply_filters( 'get_the_archive_description', term_description() );
        if ( !empty( $description ) ) {
            echo $before . $description . $after;
        }
    }

    public static function getRandomHeaderImage()
    {

        $cq_args = array(
            'orderby'     => 'rand',
            'showposts'   => 1,
            'numberposts' => 1,
            'nopaging'    => true
        );
        $cquery = new \WP_Query($cq_args);
        $img_obj = wp_get_attachment_image_src(get_post_thumbnail_id($cquery->post->ID), 'illdy-info-large');
        $out = array(
            "img_url"  => $img_obj[0],
            "post_url" => get_the_permalink($cquery->post),
            "title"    => get_the_title($cquery->post->ID),
        );

        return $out;
    }

    public static function navigationLinks($next = true, $previous = true, $taxonomy = 'category')
    {
        ?>
        <div class="navigation-links">
            <span><?= __("See more:", 'qi-theme') ?></span>
            <?php if ($previous) : ?>
                <div class="previous">
                    <?= get_previous_post_link('&laquo; %link', "%title", false, '59', 'pics-cats') ?>
                </div>
            <?php endif; ?>
            <?php if ($next) : ?>
                <div class="next">
                    <?= get_next_post_link('%link &raquo;', "%title", false, '59', 'pics-cats') ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

}
