<?php

namespace QITheme\Components;

use QITheme\Lib\Singleton;

class TodayInfo extends Singleton
{

    public $today_info;

    private $excluded = [QI_THOUGHTS_CAT_ID, QI_POETRY_CAT_ID];

    protected function __construct()
    {
        parent::__construct();

        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
        add_action('admin_menu', [$this, 'register_admin_pages']);
        add_action('admin_post_set_today_info', [$this, 'set_today_info']);
        add_action('wp_ajax_TI_load_more_infos', [$this, 'load_more_infos']);
        add_action('wp_ajax_nopriv_TI_load_more_infos', [$this, 'load_more_infos']);
        add_action('wp_ajax_TI_search_infos', [$this, 'search_infos']);
        add_action('wp_ajax_nopriv_TI_search_infos', [$this, 'search_infos']);

        register_setting('frontpage_settings', 'todays_info');

//        $this->today_info = $this->getTodaysInfo();
        add_action('rest_api_init', [$this, 'registerToApi']);
    }

    function registerToApi()
    {
        try {
            global $qudsinfoWpApi;
            if (!($qudsinfoWpApi instanceof \QWA\QudsinfoWpApi)) {
                throw new \Exception('Qudsinfo API is not found!');
            }
            $todayInfoEndpoint = new \QWA\lib\EndPoint([
                'path'     => '/today-info/',
                'method'   => 'GET',
                'callback' => [$this, 'getTodaysInfoApi'],
            ]);
            $qudsinfoWpApi->registerCustomEndPoint('v2', $todayInfoEndpoint);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
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

    public function getTodaysInfo($lang = 'ar')
    {
        $info_id = get_option('todays_info', null);
        if (function_exists('pll_get_post')) {
            $info_id = pll_get_post($info_id, $lang);
        }

        if ($info_id) {
            return get_post($info_id);
        }

        $query_args = array(
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'posts_per_page'   => 1,
            'orderby'          => 'rand',
            'category__not_in' => $this->excluded,
            'lang'             => $lang,

        );
        $res = new \WP_Query($query_args);
        if ($res->have_posts())
            return $res->post;

        return false;
    }

    public function getTodaysInfoApi(\WP_REST_Request $request)
    {
        $lang = $request->get_header('Accept-Language');
        $wp_post = $this->getTodaysInfo($lang);
        if (!$wp_post) {
            return new \QWA\v2\Response([
                'error' => "Cannot find today's post",
            ]);
        }
        $post = new \QWA\v2\Models\Info($wp_post);
        return new \QWA\v2\Response($post->toArray(false, ['imageSize' => 'info-of-the-day-image']), 200);
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

    public function load_more_infos()
    {
        $offset = $_GET['offset'] ?? false;
        if (!$offset) {
            echo json_encode(['status' => 1, 'result' => 'some thing wrong']);
            exit;
        }

        echo json_encode(['status' => 0, 'result' => $this->get_posts_array($offset)]);
        exit;
    }

    public function search_infos()
    {
        $s = $_GET['s'] ?? false;
        if (!$s) {
            echo json_encode(['status' => 1, 'result' => 'some thing wrong']);
            exit;
        }

        echo json_encode(['status' => 0, 'result' => $this->get_posts_array(0, $s)]);
        exit;
    }

}
