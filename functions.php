<?php
/**
 *    Sets up theme defaults and registers support for various WordPress features.
 *
 *    Note that this function is hooked into the after_setup_theme hook, which
 *    runs before the init hook. The init hook is too late for some features, such
 *    as indicating support for post thumbnails.
 */
if (!function_exists('illdy_setup')) {
    add_action('after_setup_theme', 'illdy_setup');
    function illdy_setup()
    {

        // Extras
        require_once('inc/extras.php');

        // Template Tags
        require_once('inc/template-tags.php');

        // Customizer
        require_once('inc/customizer/customizer.php');

        // TGM Plugin Activation
        //require_once('inc/tgm-plugin-activation/tgm-plugin-activation.php');

        // Components
        require_once('inc/components/pagination/class.mt-pagination.php');
        require_once('inc/components/entry-meta/class.mt-entry-meta.php');
        require_once('inc/components/author-box/class.mt-author-box.php');
        require_once('inc/components/related-posts/class.mt-related-posts.php');
        require_once('inc/components/nav-walker/class.mt-nav-walker.php');

        // Widgets
        require_once('widgets/class-widget-recent-posts.php');
        require_once('widgets/class-widget-faq.php');
        require_once('widgets/class-widget-skill.php');
        require_once('widgets/class-widget-project.php');
        require_once('widgets/class-widget-service.php');
        require_once('widgets/class-widget-counter.php');
        require_once('widgets/class-widget-person.php');

        // Load Theme Textdomain
        load_theme_textdomain('qi-theme', get_template_directory() . '/languages');

        // Add Theme Support
        add_theme_support('woocommerce');
        add_theme_support('automatic-feed-links');
        //add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        add_theme_support('custom-header', array(
            'default-image'  => esc_url(get_template_directory_uri() . '/layout/images/blog/blog-header.png'),
            'width'          => 1920,
            'height'         => 532,
            'flex-height'    => true,
            'random-default' => false,
            'header-text'    => false,
        ));

        // Add Image Size
        set_post_thumbnail_size(150, 150, true);
        add_image_size('yarpp-thumbnail', 50, 50, true);
        add_image_size('illdy-blog-list', 653, 435, true);
        add_image_size('illdy-widget-recent-posts', 70, 70, true);
        add_image_size('illdy-blog-post-related-articles', 240, 206, true);
        add_image_size('illdy-front-page-latest-news', 360, 213, true);
        add_image_size('illdy-front-page-testimonials', 127, 127, true);
        add_image_size('illdy-front-page-projects', 476, 476, true);
        add_image_size('illdy-front-page-person', 125, 125, true);
        add_image_size('info-of-the-day-image', 330, 300, true);
        add_image_size('illdy-info-post', 360, 360, false);
        add_image_size('illdy-info', 650, 650, true);
        add_image_size('illdy-info-large', 1000, 1000, true);
        add_image_size('large', 1000, 1000, false);
        add_image_size('illdy-image-cat', 270, 270, true);
        add_image_size('team-list-item', 485, 270, false);

        // Register Nav Menus
        register_nav_menus(array(
            'primary-menu' => __('Primary Menu', 'qi-theme'),
        ));
    }
}

/*
add_action('init', 'my_rewrite_tags',9,0);
function my_rewrite_tags() {
	add_rewrite_tag('%cat%', '([^&]+)');
}*/

function custom_rewrite_rule()
{
    global $wp, $wp_rewrite;
    $wp->add_query_var('cat');
    $wp->add_query_var('paged');
    add_rewrite_rule('^our-info/category/([0-9]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?page_id=34&cat=$matches[1]&paged=$matches[3]', 'top');
    add_rewrite_rule('^our-info/category/([0-9]+)/([^/]+)/?$', 'index.php?page_id=34&cat=$matches[1]', 'top');
    add_rewrite_rule('^library/section/([0-9]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?page_id=4022&cat=$matches[1]&paged=$matches[3]', 'top');
    add_rewrite_rule('^library/section/([0-9]+)/([^/]+)/?$', 'index.php?page_id=4022&cat=$matches[1]', 'top');

    // Once you get working, remove this next line
    //$wp_rewrite->flush_rules(true);

}

add_action('init', 'custom_rewrite_rule', 10, 0);


/**
 *    Set the content width in pixels, based on the theme's design and stylesheet.
 *
 *    Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!function_exists('illdy_content_width')) {
    add_action('after_setup_theme', 'illdy_content_width', 0);
    function illdy_content_width()
    {
        $GLOBALS['content_width'] = apply_filters('illdy_content_width', 1000);
    }
}

/**
 *    WP Enqueue Stylesheets
 */
if (!function_exists('illdy_enqueue_stylesheets')) {
    add_action('wp_enqueue_scripts', 'illdy_enqueue_stylesheets');

    function illdy_enqueue_stylesheets()
    {
        // WP Enqueue Style
        wp_enqueue_style('fancybox', get_template_directory_uri() . '/layout/stylesheets/jquery.fancybox.min.css', array(), filemtime(get_template_directory() . '/layout/stylesheets/jquery.fancybox.min.css') + 1, 'all');
        $deps = [];
        wp_enqueue_style('illdy-style', get_template_directory_uri() . '/layout/dist/main.css', $deps, filemtime(get_template_directory() . '/layout/stylesheets/main.min.css') + 2, 'all');
    }
}

/**
 *    WP Enqueue JavaScripts
 */
if (!function_exists('illdy_enqueue_javascripts')) {
    add_action('wp_enqueue_scripts', 'illdy_enqueue_javascripts');

    function illdy_enqueue_javascripts()
    {
        $scripts_deps = ['jquery', 'masonry'];
        if (get_theme_mod('illdy_preloader_enable', 1) == 1) {
            wp_enqueue_script('illdy-pace', get_template_directory_uri() . '/layout/js/pace/pace.min.js', array('jquery'), '', false);
        }
        wp_enqueue_script('popper', get_template_directory_uri() . '/layout/js/popper.min.js', false, '1', true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/layout/js/bootstrap.min.js', array('jquery', 'popper'), '1.0.8', true);
        wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/layout/js/bootstrap-select/bootstrap-select.min.js', array('bootstrap'), '1.12.4', true);
        wp_enqueue_script('parallax-js', get_template_directory_uri() . '/layout/js/parallax.min.js', array('jquery'), '', true);
        wp_enqueue_script('owl-thumbs', get_template_directory_uri() . '/layout/js/owl-carousel/owl.carousel2.thumbs.min.js', array('jquery'), '', true);
        if (is_front_page()) {
            $scripts_deps[] = 'typed-js';
            wp_enqueue_script('typed-js', get_template_directory_uri() . '/layout/js/typed.min.js', false, '1.2', true);
            wp_enqueue_script('illdy-count-to', get_template_directory_uri() . '/layout/js/count-to/count-to.min.js', array('jquery'), '1.0.8', true);
            wp_enqueue_script('illdy-visible', get_template_directory_uri() . '/layout/js/visible/visible.min.js', array('jquery'), '', true);
        }
        if (function_exists('otd_get_events'))
            $scripts_deps[] = 'onthisday-script';

        wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/layout/js/jquery.fancybox.min.js', array('jquery'), '4', true);

        wp_enqueue_script('masonry');

        wp_enqueue_script('my-scripts', get_template_directory_uri() . '/layout/js/scripts.js', $scripts_deps, filemtime(get_template_directory() . '/layout/js/scripts.min.js') + 3, true);

        wp_localize_script('my-scripts', 'scripts_data', array(
            'ajaxurl'    => admin_url('admin-ajax.php'),
            'isFront'    => is_front_page(),
            'page_title' => get_the_title() . ' - ' . get_bloginfo('name'),
            'lang' => getLanguagesForJS()
        ));


        /*if ( is_singular() && comments_open() && get_option('thread_comments') ) {
            wp_enqueue_script('comment-reply');
        }*/
    }
}

add_filter('wp_default_scripts', 'dequeue_jquery_migrate');

function dequeue_jquery_migrate(&$scripts)
{
    if (!is_admin()) {
        $scripts->remove('jquery');
        $scripts->add('jquery', false, array('jquery-core'), '1.10.2');
    }
}

/**
 *  Checkbox helper function
 */
if (!function_exists('illdy_value_checkbox_helper')) {
    function illdy_value_checkbox_helper($value)
    {
        if ($value == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}

function revcon_change_post_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = 'المعلومات';
    $submenu['edit.php'][5][0] = 'كل المعلومات';
    $submenu['edit.php'][10][0] = 'إضافة معلومة';
    $submenu['edit.php'][16][0] = 'معلومة Tags';
    echo '';
}

function revcon_change_post_object()
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

add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');

function new_excerpt_length($length)
{
    return 25;
}

add_filter('excerpt_length', 'new_excerpt_length');


function get_rnd_header_image()
{

    $cq_args = array(
        'orderby'     => 'rand',
        'showposts'   => 1,
        'numberposts' => 1,
        'nopaging'    => true
    );
    $cquery = new WP_Query($cq_args);
    $img_obj = wp_get_attachment_image_src(get_post_thumbnail_id($cquery->post->ID), 'illdy-info-large');
    $out = array(
        "img_url"  => $img_obj[0],
        "post_url" => get_the_permalink($cquery->post),
        "title"    => get_the_title($cquery->post->ID),
    );

    return $out;
}

function filter_search($query)
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

add_filter('pre_get_posts', 'filter_search');

$matches = [];
$input_line = $_SERVER['REQUEST_URI'];
preg_match("/our-info\/category\/([0-9]+)\/([^\/]+)\/?(.*)$/", $input_line, $matches);
if (count($matches)) {
    wp_safe_redirect(site_url('category/' . $matches[2] . '/' . (isset($matches[3]) ? $matches[3] : '')), 301);
    exit;
}

function navigation_links($next = true, $previous = true)
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

function jwt_token_expiration()
{
    return time() + (YEAR_IN_SECONDS * 10);
}

add_filter('jwt_auth_expire', 'jwt_token_expiration');

function getLanguagesForJS() {
    return [
        'aqsa_distance.permission' => __("Please allow location permission to find your distance from Aqsa", 'qi-theme'),
        'aqsa_distance.enable_gps' => __("Please enable location to find your distance from Aqsa", 'qi-theme'),
        'aqsa_distance.error' => __("Something went wrong, please try again!", 'qi-theme'),
    ];
}


// Apply numeric post ordering for posts in admin and front end.
// Adapted from https://www.fldtrace.com/custom-post-types-numeric-title-order
function post_order( $wp_query ) {
	if ( $wp_query->query['post_type'][0] == 'pics' ) {
		add_filter( 'posts_orderby', 'orderby_post_title_int' );
	}
}
add_action('pre_get_posts', 'post_order');

// Cast the post_title field as an integer in SQL.
function orderby_post_title_int( $orderby ) {
	global $wpdb;
	return "({$wpdb->prefix}posts.post_title+0) ASC";
}

include_once "inc/featured-posts.php";

require 'inc/Helpers.php';
require 'inc/register.sidebars.php';
require 'inc/infos-handler.php';
require 'inc/custom_posts_types.php';
require 'inc/acf.php';
require 'inc/theme.classes.php';

