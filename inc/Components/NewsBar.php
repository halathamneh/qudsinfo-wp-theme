<?php

namespace QITheme\Components;

use QITheme\Helpers;
use QITheme\Lib\Singleton;

class NewsBar extends Singleton
{


    protected function __construct()
    {
        parent::__construct();

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
        $redirect_to = admin_url('/edit.php?post_type=news&page=newsbar-settings');
        if ( isset($_POST['news_item']) ) {
	        $newsList = $_POST['news_item'];
        } else {
	        $newsList = [];
        }
        $option_name = 'news_list_ar'; // fallback
        if(isset($_POST['lang']) && in_array($_POST['lang'], ['ar', 'en'])){
            $option_name = 'news_list_' . $_POST['lang'];
        }
        update_option($option_name, $newsList);
        $redirect_to .= '&success';
        wp_redirect($redirect_to);
    }

    public function register_admin_pages()
    {
        add_submenu_page(
            'edit.php?post_type=news',
            __( 'News Bar', 'qi-theme' ),
            __( 'News Bar', 'qi-theme' ),
            'edit_posts',
            'newsbar-settings',
            [$this, 'render_admin_page']
        );

    }

    public function getNewsList($lang='ar')
    {
    	if(!in_array($lang, ['ar', 'en'])) $lang = 'ar';
        return get_option('news_list_' . $lang, []);
    }

    public function render_admin_page()
    {

        $data = [
            'title' => esc_html(get_admin_page_title()),
            'newsListAr' => $this->getNewsList('ar'),
            'newsListEn' => $this->getNewsList('en')
        ];

        Helpers::view('newsbar-settings', $data);
    }
}

