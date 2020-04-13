<?php
/**
 * Created by PhpStorm.
 * User: haitham
 * Date: 10/16/17
 * Time: 8:27 PM
 */

class TodayInfo
{

    public $today_info;

    private $excluded = [QI_THOUGHTS_CAT_ID, QI_POETRY_CAT_ID];

    public function __construct()
    {

        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
        add_action('admin_menu', [$this, 'register_admin_pages']);
        add_action('admin_post_set_today_info', [$this, 'set_today_info']);
        add_action('wp_ajax_fb_load_more_infos', [$this, 'load_more_infos']);
        add_action('wp_ajax_nopriv_fb_load_more_infos', [$this, 'load_more_infos']);
        add_action('wp_ajax_fb_search_infos', [$this, 'search_infos']);
        add_action('wp_ajax_nopriv_fb_search_infos', [$this, 'search_infos']);

        register_setting('frontpage_settings', 'todays_info');

        $this->today_info = $this->getTodaysInfo();

    }

    public function enqueueAdminScripts($hook)
    {
        if ($hook != 'toplevel_page_frontpage_settings') {
            return;
        }
        wp_register_style('bootstrap4_css', get_template_directory_uri() . '/inc/css/main.css', false, '1.0.0');
        wp_enqueue_style('bootstrap4_css');
        wp_enqueue_script('popperjs', get_template_directory_uri() . '/inc/js/popper.min.js');
        wp_enqueue_script('bootstrap4_js', get_template_directory_uri() . '/inc/js/bootstrap.min.js', ['jquery', 'popperjs']);
        wp_enqueue_script('frontpage_js', get_template_directory_uri() . '/inc/js/frontpage.js', ['jquery']);
    }

    public function register_admin_pages()
    {
        add_menu_page(
            'اختر معلومة اليوم',
            'معلومة اليوم',
            'edit_posts',
            'frontpage_settings',
            [$this, 'render_admin_page'],
            "dashicons-pressthis",
            5
        );
    }

    public function render_admin_page()
    {

        $info_array = $this->get_posts_array();

        $data = [
            'title'      => esc_html(get_admin_page_title()),
            'info_array' => $info_array,
        ];

        Helpers::view('today-info', $data);
    }

    public function set_today_info()
    {
        $info_id = $_POST['selected_info'] ?? false;
        $redirect_to = admin_url('/admin.php?page=frontpage_settings');
        if (!$info_id)
            $redirect_to .= '&failed';
        else {
            update_option('todays_info', $info_id);
            $redirect_to .= '&success';
        }
        wp_redirect($redirect_to);
    }

    public function getTodaysInfo()
    {
        $info_id = get_option('todays_info', null);
        if ($info_id !== null && function_exists('pll_get_post')) {
            $info_id = pll_get_post($info_id);
            return get_post($info_id);
        }
        $query_args = array(
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'posts_per_page'   => 1,
            'orderby'          => 'post_date',
            'order'            => 'desc',
            'category__not_in' => $this->excluded,

        );
        $res = new WP_Query($query_args);
        if ($res->have_posts())
            return $res->post;

        return false;
    }

    public function get_posts_array($offset = 0, $s = false)
    {
        $args = ['category__not_in' => $this->excluded, 'offset' => $offset, 'numberposts' => 15, 'post_type' => 'post'];
        if ($s) $args['s'] = $s;
        $infos = get_posts($args);
        $info_array = [];
        foreach ($infos as $info) {
            $large_image = wp_get_attachment_image_src(get_post_thumbnail_id($info->ID), 'illdy-info-post');
            $thumb_image = wp_get_attachment_image_src(get_post_thumbnail_id($info->ID), 'yarpp-thumbnail');
            $info_array[] = (object)([
                'id'      => $info->ID,
                'title'   => $info->post_title,
                'content' => wp_trim_words($info->post_content, 12),
                'image'   => $large_image[0],
                'thumb'   => $thumb_image[0],
            ]);
        }
        return $info_array;
    }

}

$GLOBALS['todayInfo'] = new TodayInfo();