<?php

class NewsBar
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
        add_action('admin_post_set_newsbar_settings', [$this, 'set_newsbar_settings']);
        add_action('admin_menu', [$this, 'register_admin_pages']);
        register_setting('newsbar_settings', 'news_list');
    }

    public function enqueueAdminScripts($hook)
    {
        if ( $hook != 'news_page_newsbar-settings' ) {
            return;
        }
        wp_enqueue_script(
            'newsbar-js',
            get_template_directory_uri() . '/inc/js/newsbar-js/dist/newsbar.js',
            [],
            filemtime(get_template_directory() . '/inc/js/newsbar-js/dist/newsbar.js'),
            true);

    }

    public function set_newsbar_settings()
    {
        $newsList = $_POST['news_item'];
        $redirect_to = admin_url('/edit.php?post_type=news&page=newsbar-settings');
        if ( ! $newsList )
            $redirect_to .= '&failed';
        else {
            update_option('news_list', $newsList);
            $redirect_to .= '&success';
        }
        wp_redirect($redirect_to);
    }

    public function register_admin_pages()
    {
        add_submenu_page(
            'edit.php?post_type=news',
            __( 'شريط الأخبار', 'qi-theme' ),
            __( 'شريط الأخبار', 'qi-theme' ),
            'edit_posts',
            'newsbar-settings',
            [$this, 'render_admin_page']
        );

    }

    public function getNewsList()
    {
        return get_option('news_list', []);
    }

    public function render_admin_page()
    {

        $data = [
            'title' => esc_html(get_admin_page_title()),
            'newsList' => $this->getNewsList()
        ];

        Helpers::view('newsbar-settings', $data);
    }
}

$GLOBALS['newsBar'] = new NewsBar();