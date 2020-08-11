<?php

namespace QITheme\Components;

class URLRewrites
{

    public function __construct()
    {
        add_action('init', [$this, 'flushRewrite']);
        add_action('init', [$this, 'custom_rewrite_rule'], 10, 0);


        $matches = [];
        $input_line = $_SERVER['REQUEST_URI'];
        preg_match("/our-info\/category\/([0-9]+)\/([^\/]+)\/?(.*)$/", $input_line, $matches);
        if (count($matches)) {
            wp_safe_redirect(site_url('category/' . $matches[2] . '/' . (isset($matches[3]) ? $matches[3] : '')), 301);
            exit;
        }

    }

    function custom_rewrite_rule()
    {
        global $wp, $wp_rewrite;
        $wp->add_query_var('cat');
        $wp->add_query_var('paged');
        add_rewrite_rule('^our-info/category/([0-9]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?page_id=34&cat=$matches[1]&paged=$matches[3]', 'top');
        add_rewrite_rule('^our-info/category/([0-9]+)/([^/]+)/?$', 'index.php?page_id=34&cat=$matches[1]', 'top');
        add_rewrite_rule('^library/section/([0-9]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?page_id=4022&cat=$matches[1]&paged=$matches[3]', 'top');
        add_rewrite_rule('^library/section/([0-9]+)/([^/]+)/?$', 'index.php?page_id=4022&cat=$matches[1]', 'top');

    }


    public function flushRewrite()
    {
        flush_rewrite_rules();
    }

}
