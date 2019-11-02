<?php
/**
 * Information Handler
 * User: haitham
 * Date: 9/30/17
 * Time: 3:23 PM
 *
 */

/**
 * @param WP_Term|bool $category
 * @param int $page
 * @return string
 */
function render_infos($page = 0, $category = false)
{
    global $post;

    $thoughts_catid = 2351;
    $term_slug = "all";
    $out = "";
    if ($category === false) {
        $out .= '<h2 class="current-cat-name">'.__('All Infos', 'qi-theme').'</h2>';
    } else {
        $term_slug = $category->slug;
        $out .= '<h2 class="current-cat-name">' . $category->name . '</h2>';
        $wiki_args = array(
            'cat'       => $category->term_id,
            'post_type' => 'info-details',
        );
        $wiki_query = new WP_Query($wiki_args);
        if ($wiki_query->have_posts()) : $wiki_query->the_post();
            if (have_rows('paragraphs')) {
                the_row();
                $out .= '<hr>' .
                    '<div class="current-cat-wiki">' .
                    wp_trim_words(get_sub_field('text'), 100) .
                    '<div class="read-more-part"><a href="' . get_permalink() . '" class="btn btn-success">'.__('Continue Reading', 'qi-theme').'</a></div></div>';
            }
        endif;
    }
    $out .= '<hr>';

    $paged = $page ? $page : 1;
    $info_args = array(
        'paged' => $paged,
        'cat'   => $category->term_id,
    );
    $info_query = new WP_Query($info_args);

    $out .= '<div class="masonry-grid">';
    $out .= '<div class="grid-sizer"></div>';
    $out .= '<div class="grid-gutter"></div>';
    $i = 0;
    if ($info_query->have_posts()) {
        while ($info_query->have_posts()) :
            $info_query->the_post();
            //get_template_part( 'template-parts/content', get_post_format() );
            $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info-post');
            $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
            $out .= '<div class="card grid-item">';
            if ($post_thumbnail):
                $out .= '<a class="card-img-top" href="' . $post_image[0] . '" data-fancybox="' . $term_slug . '"' .
                    'style="background-image: url(' . esc_url($post_thumbnail[0]) . ')"' .
                    'data-caption="' . get_the_title() . "<br>" . nl2br(esc_attr__(get_the_content())) . '">' .
                    '</a>';
            endif;
            $out .= '<div class="card-body">' .
                '<h4>' . get_the_title() . '</h4>' .
                '<p class="card-text">' . get_the_excerpt() . '</p>' .
                '<a href="' . get_the_permalink() . '" class="btn btn-outline-success">'.__('Continue Reading', 'qi-theme').' <i class="fa fa-chevron-circle-left"></i></a>' .
                '</div>';
            $out .= '</div><!--/.card-->';
        endwhile;
    }

    $out .= '</div>' . pagination_output_f($info_query);

    return $out;
}

function render_books($page = 0, $section = 0)
{
    global $post;

    $term_slug = "all";
    $out = "";
    if ($section == 0) {
        $out .= '<h2 class="current-cat-name">جميع الكتب</h2>';
    } else {
        $term = get_term($section);
        $term_slug = $term->slug;
        $out .= '<h2 class="current-cat-name">' . $term->name . '</h2>';
    }
    $out .= '<hr>';

    $paged = $page ? $page : 1;
    $books_args = array(
        'paged'     => $paged,
        'post_type' => 'book',
    );
    if ($section) {
        $books_args['tax_query'] = [
            [
                'taxonomy' => "library_sections",
                'field'    => 'term_id',
                'terms'    => $section,
            ],
        ];
    }
    $books_query = new WP_Query($books_args);

    $out .= '<div class="masonry-grid">';
    $out .= '<div class="grid-sizer"></div>';
    $out .= '<div class="grid-gutter"></div>';
    if ($books_query->have_posts()) {
        while ($books_query->have_posts()) :
            $books_query->the_post();
            //get_template_part( 'template-parts/content', get_post_format() );
            $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info-post');
            $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');

            $out .= '<div class="card grid-item">';
            if ($post_thumbnail):
                $out .= '<a class="card-img-top" href="' . $post_image[0] . '" data-fancybox="' . $term_slug . '"' .
                    'style="background-image: url(' . esc_url($post_thumbnail[0]) . ')"' .
                    'data-caption="' . get_the_title() . "<br>" . nl2br(esc_attr__(get_the_content())) . '">' .
                    '</a>';
            endif;
            $out .= '<div class="card-body">' .
                '<h4>' . get_the_title() . '</h4>' .
                '<p class="card-text">' . get_the_excerpt() . '</p>' .
                '<a href="' . get_the_permalink() . '" class="btn btn-outline-success">قراءة وتنزيل الكتاب <i class="fa fa-chevron-circle-left"></i></a>' .
                '</div>';
            $out .= '</div><!--/.card-->';
        endwhile;
    }
    $out .= '</div>' . pagination_output_f($books_query);

    return $out;
}


/*
 * Ajax Getting info
 */
add_action('wp_ajax_nopriv_ajax_info', 'get_ajax_info');
add_action('wp_ajax_ajax_info', 'get_ajax_info');

function get_ajax_info()
{
    $html = "";
    $url = "";
    $title = "";
    $term_name = "";
    $image = "";


    $ptype = isset($_POST['post_type']) ? $_POST['post_type'] : 'post';

    $page_url = '';
    $page_num = 0;
    if (isset($_POST['page'])) {
        $page_num = intval($_POST['page']);
        $page_url = 'page/' . $page_num . '/';
    }

    if (isset($_POST['cat'])) {
        switch ($ptype) {
            case 'post':
                $tid = intval($_POST['cat']);
                if ($tid) {
                    $term = get_term($tid);
                    $html = render_infos($page_num, $term);
                    $url = get_term_link($term) . $page_url;
                    $term_name = $term->name;
                    $title = $term_name . ' - معلوماتنا - ' . get_bloginfo('name');
                    $image = function_exists('z_taxonomy_image_url') ? z_taxonomy_image_url($tid) : "";
                } else {
                    $html = render_infos($page_num);
                    $url = home_url('/our-info/' . $page_url);
                    $term_name = 'معلوماتنا';
                    $title = 'معلوماتنا - ' . get_bloginfo('name');
                }
                break;
            case 'book':
                $tid = intval($_POST['cat']);
                if ($tid) {
                    $term = get_term($tid);
                    $html = render_books($page_num, $term->term_id);
                    $url = home_url('/library/section/' . $term->term_id . '/' . $term->slug . '/' . $page_url);
                    $term_name = $term->name;
                    $title = $term->name . ' - المكتبة - ' . get_bloginfo('name');
                    $image = function_exists('z_taxonomy_image_url') ? z_taxonomy_image_url($tid) : "";
                } else {
                    $html = render_books($page_num);
                    $url = home_url('/library/' . $page_url);
                    $term_name = 'المكتبة';
                    $title = 'معلوماتنا - ' . get_bloginfo('name');
                }
        }

    }

    $out = array(
        'html'      => $html,
        'url'       => $url,
        'title'     => $title,
        'term_name' => $term_name,
        'image'     => $image
    );

    echo json_encode($out);

    die();
}

function cat_description_before(WP_Term $item)
{

    $content = $item->description;
    $readmore_link = '<button type="button" class="btn btn-outline-success d-block mt-3" data-toggle="modal" data-target="#catWiki">
  أكمل القراءة
</button>';
    if (preg_match('/<!--more(.*?)?-->/', $content, $matches)) {
        $content = explode($matches[0], $content, 2);
        $output = $content[0] . $readmore_link;
    } else {
        $output = $content;
    }

    return $output;
}

function pagination_output_f($query = NULL)
{
    $o = '';

    $prev_arrow = is_rtl() ? '&rarr;' : '<i class="fa fa-angle-right"></i>';
    $next_arrow = is_rtl() ? '&larr;' : '<i class="fa fa-angle-left"></i>';

    global $wp_query;
    if ($query == NULL) $query = $wp_query;
    $total = $query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if ($total > 1) {
        if (!$current_page = $query->get('paged'))
            $current_page = 1;
        if (get_option('permalink_structure')) {
            $format = 'page/%#%/';
        } else {
            $format = '&paged=%#%';
        }

        $o = '<nav class="paginate-links">';
        $o .= paginate_links(array(
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => $format,
            'current'   => max(1, $query->get('paged')),
            'total'     => $total,
            'mid_size'  => 3,
            'type'      => 'plain',
            'prev_text' => $prev_arrow,
            'next_text' => $next_arrow,
        ));
        $o .= '</nav><!--/.paginate-links-->';

    }
    return $o;
}