<?php


namespace QITheme\Components;


class SearchFilter extends \QITheme\Lib\Singleton
{

    protected function __construct()
    {
        parent::__construct();

        add_filter('pre_get_posts', [$this, 'applyFilters']);

    }

    public function applyFilters($query)
    {
        if ($query->is_search && $query->is_main_query() && !is_admin() ) {
            if (isset($_GET['filter']))
                switch ($_GET['filter']) {
                    case "post":
                    case "book":
                    case "audio":
                    case "video":
                    case "pics":
                    case "news":
                        $search_for = array($_GET['filter']);
                        break;
                    default:
                        $search_for = array('post', 'news', 'pics', 'book');
                        break;
                }
            else
                $search_for = array('post', 'news', 'pics', 'book');
            $query->set('post_type', $search_for);

        };
        return $query;
    }

}
