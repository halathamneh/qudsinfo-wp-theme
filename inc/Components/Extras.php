<?php


namespace QITheme\Components;


class Extras extends \QITheme\Lib\Singleton
{
    protected function __construct()
    {
        parent::__construct();

        new URLRewrites();

        add_theme_support( 'post-thumbnails' );
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        add_action('login_enqueue_scripts', [$this, 'LoginLogo']);
        add_action('admin_menu', [$this, 'changePostLabelsToInfo']);
        add_action('init', [$this, 'changePostObjectToInfo']);
        add_filter('excerpt_length', [$this, 'changeExcerptLength']);
        add_action('pre_get_posts', [$this, 'postsOrder']);

    }

    public function LoginLogo()
    { ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/layout/src/images/sLogo.png);
                height: 65px;
                width: 320px;
                background-repeat: no-repeat;
                padding-bottom: 30px;
                background-size: contain;
            }
        </style>
    <?php }


    function changePostLabelsToInfo()
    {
        global $menu;
        global $submenu;
        $menu[5][0] = 'المعلومات';
        $submenu['edit.php'][5][0] = 'كل المعلومات';
        $submenu['edit.php'][10][0] = 'إضافة معلومة';
        $submenu['edit.php'][16][0] = 'معلومة Tags';
        echo '';
    }

    function changePostObjectToInfo()
    {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'المعلومات';
        $labels->singular_name = 'معلومة';
        $labels->add_new = 'إضافة جديد';
        $labels->add_new_item = 'إضافة معلومة جديدة';
        $labels->edit_item = 'تعديل معلومة';
        $labels->new_item = 'معلومة';
        $labels->view_item = 'عرض المعلومة';
        $labels->search_items = 'بحث في المعلومات';
        $labels->not_found = 'لم نجد معلومات';
        $labels->not_found_in_trash = 'لم تجد معلومات في المهملات';
        $labels->all_items = 'كل المعلومات';
        $labels->menu_name = 'المعلومات';
        $labels->name_admin_bar = 'المعلومات';
    }

    function changeExcerptLength($length)
    {
        return 25;
    }


// Apply numeric post ordering for posts in admin and front end.
// Adapted from https://www.fldtrace.com/custom-post-types-numeric-title-order
    public function postsOrder($wp_query)
    {
        if (isset($wp_query->query['post_type']) && $wp_query->query['post_type'] == 'pics') {
            add_filter('posts_orderby', [$this, 'orderByPostTitleInt']);
        }
    }

    // Cast the post_title field as an integer in SQL.
    public function orderByPostTitleInt( $orderby ) {
        global $wpdb;
        return "({$wpdb->prefix}posts.post_title+0) ASC";
    }
}
