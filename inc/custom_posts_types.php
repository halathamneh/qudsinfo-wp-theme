<?php
/**
 * Created by PhpStorm.
 * User: haitham
 * Date: 2/10/17
 * Time: 9:50 PM
 */


function cptui_register_my_cpts_infos_details() {
    
    /**
     * Post Type: الأخبار.
     */
    
    $labels = array(
        "name" => __( 'الموضوعات', 'qi-theme' ),
        "singular_name" => __( 'موضوع', 'qi-theme' ),
        "menu_name" => __( 'الموضوعات', 'qi-theme' ),
        "all_items" => __( 'الموضوعات', 'qi-theme' ),
        "add_new" => __( 'موضوع جديد', 'qi-theme' ),
        "add_new_item" => __( 'إضافة موضوع جديد', 'qi-theme' ),
        "edit_item" => __( 'تعديل موضوع', 'qi-theme' ),
        "new_item" => __( 'موضوع جديد', 'qi-theme' ),
        "view_item" => __( 'عرض الموضوع', 'qi-theme' ),
        "search_items" => __( 'بحث عن موضوع', 'qi-theme' ),
        "not_found" => __( 'لم نجد الموضوع', 'qi-theme' ),
        "featured_image" => __( 'صورة الموضوع', 'qi-theme' ),
        "use_featured_image" => __( 'استعملها ك صورة للموضوع', 'qi-theme' ),
        "archives" => __( 'أرشيف الموضوعات', 'qi-theme' ),
        "insert_into_item" => __( 'إضافة إلى الموضوع', 'qi-theme' ),
        "uploaded_to_this_item" => __( 'المرفوع لهذا الموضوع', 'qi-theme' ),
        "items_list" => __( 'قائمة الموضوعات', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'الموضوعات', 'qi-theme' ),
        "labels" => $labels,
        "description" => "موضوعات تصنيفات المعلومات",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "info-details",
        "has_archive" => "news-archive",
        'show_in_menu' => 'edit.php',
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "info-details", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 0,
        "menu_icon" => "dashicons-media-text",
        "supports" => array( "title", "comments", "author" ),
        "taxonomies" => array( "category" ),
    );
    
    register_post_type( "info-details", $args );
}

add_action( 'init', 'cptui_register_my_cpts_infos_details' );

function my_remove_meta_boxes() {
    if ( ! current_user_can( 'manage_options' ) ) {
        remove_meta_box('categorydiv',"info-details",'normal');
    }
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );

function cptui_register_my_cpts_news() {
    
    /**
     * Post Type: الأخبار.
     */
    
    $labels = array(
        "name" => __( 'الأخبار', 'qi-theme' ),
        "singular_name" => __( 'خبر', 'qi-theme' ),
        "menu_name" => __( 'الأخبار', 'qi-theme' ),
        "all_items" => __( 'كل الأخبار', 'qi-theme' ),
        "add_new" => __( 'خبر جديد', 'qi-theme' ),
        "add_new_item" => __( 'إضافة خبر جديد', 'qi-theme' ),
        "edit_item" => __( 'تعديل خبر', 'qi-theme' ),
        "new_item" => __( 'خبر جديد', 'qi-theme' ),
        "view_item" => __( 'عرض الخبر', 'qi-theme' ),
        "search_items" => __( 'بحث عن خبر', 'qi-theme' ),
        "not_found" => __( 'لم نجد الخبر', 'qi-theme' ),
        "featured_image" => __( 'صورة الخبر', 'qi-theme' ),
        "use_featured_image" => __( 'استعملها ك صورة للخبر', 'qi-theme' ),
        "archives" => __( 'أرشيف الأخبار', 'qi-theme' ),
        "insert_into_item" => __( 'إضافة إلى الخبر', 'qi-theme' ),
        "uploaded_to_this_item" => __( 'المرفوع لهذا الخبر', 'qi-theme' ),
        "items_list" => __( 'قائمة الأخبار', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'الأخبار', 'qi-theme' ),
        "labels" => $labels,
        "description" => "آخر الأخبار",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "news",
        "has_archive" => "news-archive",
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "news", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 6,
        "menu_icon" => "dashicons-format-aside",
        "supports" => array( "title", "editor", "thumbnail", "excerpt", "comments", "revisions" ),
        "taxonomies" => array( "news-cat", "news-hashtags" ),
    );
    
    register_post_type( "news", $args );
}

add_action( 'init', 'cptui_register_my_cpts_news' );

function cptui_register_my_cpts_pics() {
    
    /**
     * Post Type: أرشيف الصور.
     */
    
    $labels = array(
        "name" => __( 'أرشيف المعالم والصور', 'qi-theme' ),
        "singular_name" => __( 'صورة/معلم', 'qi-theme' ),
        "menu_name" => __( 'المعالم والصور', 'qi-theme' ),
        "all_items" => __( 'كل الصور', 'qi-theme' ),
        "add_new" => __( 'معلم/صورة جديدة', 'qi-theme' ),
        "add_new_item" => __( 'إضافة معلم/صورة جديدة', 'qi-theme' ),
        "edit_item" => __( 'تعديل معلم/صورة', 'qi-theme' ),
        "new_item" => __( 'معلم/صورة جديدة', 'qi-theme' ),
        "view_item" => __( 'عرض المعلم/الصورة', 'qi-theme' ),
        "featured_image" => __( 'اختر الصورة من هنا', 'qi-theme' ),
        "archives" => __( 'أرشيف المعالم والصور', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'أرشيف المعالم والصور', 'qi-theme' ),
        "labels" => $labels,
        "description" => "أرشيف صور معالم الأقصى",
        "public" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "pics",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "pics", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-format-gallery",
        "supports" => array( "title", "editor", "thumbnail", "comments" ),
        "taxonomies" => array( "pics-cats", "pics-hashtags" ),
    );
    
    register_post_type( "pics", $args );
}

add_action( 'init', 'cptui_register_my_cpts_pics' );

function cptui_register_my_cpts_audio() {
    
    /**
     * Post Type: المعلومات الصوتية.
     */
    
    $labels = array(
        "name" => __( 'المعلومات الصوتية', 'qi-theme' ),
        "singular_name" => __( 'معلومة صوتية', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'المعلومات الصوتية', 'qi-theme' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "audios",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "audio", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-format-audio",
        "supports" => array( "title", "editor", "comments", "thumbnail" ),
    );
    
    register_post_type( "audio", $args );
}

add_action( 'init', 'cptui_register_my_cpts_audio' );

function cptui_register_my_cpts_videos() {
    
    /**
     * Post Type: المعلومات المرئية.
     */
    
    $labels = array(
        "name" => __( 'المعلومات المرئية', 'qi-theme' ),
        "singular_name" => __( 'معلومة مرئية', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'المعلومات المرئية', 'qi-theme' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "videos",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "videos", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-video-alt3",
        "supports" => array( "title", "editor", "comments", "thumbnail" ),
    );
    
    register_post_type( "videos", $args );
}

add_action( 'init', 'cptui_register_my_cpts_videos' );

function cptui_register_my_cpts_products() {
    
    /**
     * Post Type: منتجاتنا.
     */
    
    $labels = array(
        "name" => __( 'منتجاتنا', 'qi-theme' ),
        "singular_name" => __( 'منتج', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'منتجاتنا', 'qi-theme' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "products",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "products", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 25,
        "menu_icon" => "dashicons-cart",
        "supports" => array( "title", "editor", "thumbnail", "comments" ),
    );
    
    register_post_type( "products", $args );
}

add_action( 'init', 'cptui_register_my_cpts_products' );

function cptui_register_my_cpts_book() {
    
    /**
     * Post Type: الكتب.
     */
    
    $labels = array(
        "name" => __( 'الكتب', 'qi-theme' ),
        "singular_name" => __( 'كتاب', 'qi-theme' ),
        "menu_name" => __( 'المكتبة', 'qi-theme' ),
        "all_items" => __( 'جميع الكتب', 'qi-theme' ),
        "add_new" => __( 'كتاب جديد', 'qi-theme' ),
        "add_new_item" => __( 'إضافة كتاب جديد', 'qi-theme' ),
        "edit_item" => __( 'تعديل كتاب', 'qi-theme' ),
        "new_item" => __( 'كتاب جديد', 'qi-theme' ),
        "view_item" => __( 'عرض الكتاب', 'qi-theme' ),
        "search_items" => __( 'بحص عن كتاب', 'qi-theme' ),
        "not_found" => __( 'لم نجد الكتاب الذي تبحث عنه', 'qi-theme' ),
        "featured_image" => __( 'غلاف الكتاب', 'qi-theme' ),
        "set_featured_image" => __( 'اختر صورة غلاف', 'qi-theme' ),
        "remove_featured_image" => __( 'إزالة صورة الغلاف', 'qi-theme' ),
        "use_featured_image" => __( 'اختيار كصورة غلاف', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'الكتب', 'qi-theme' ),
        "labels" => $labels,
        "description" => "مكتبة مقدسية",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "books",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "book", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 4,
        "menu_icon" => "dashicons-book",
        "supports" => array( "title", "editor", "thumbnail", "comments" ),
        "taxonomies" => array( "book_authors", "library_sections" ),
    );
    
    register_post_type( "book", $args );
}

add_action( 'init', 'cptui_register_my_cpts_book' );

function cptui_register_my_cpts_blogs() {
    
    /**
     * Post Type: المدونات.
     */
    
    $labels = array(
        "name" => __( 'المدونات', 'qi-theme' ),
        "singular_name" => __( 'مدونة', 'qi-theme' ),
        "menu_name" => __( 'المدونات', 'qi-theme' ),
        "all_items" => __( 'كل المدونات', 'qi-theme' ),
        "add_new" => __( 'مدونة جديدة', 'qi-theme' ),
        "add_new_item" => __( 'إضافة مدونة جديدة', 'qi-theme' ),
        "edit_item" => __( 'تعديل المدونة', 'qi-theme' ),
        "new_item" => __( 'مدونة جديدة', 'qi-theme' ),
        "view_item" => __( 'عرض المدونة', 'qi-theme' ),
        "search_items" => __( 'بحث عن مدونة', 'qi-theme' ),
        "not_found" => __( 'لا يوجد مدونات', 'qi-theme' ),
        "not_found_in_trash" => __( 'لا يوجد مدونات في المحذوفات', 'qi-theme' ),
        "featured_image" => __( 'صورة المدونة', 'qi-theme' ),
        "set_featured_image" => __( 'تحديد صورة المدونة', 'qi-theme' ),
        "remove_featured_image" => __( 'إزالة صورة المدونة', 'qi-theme' ),
        "use_featured_image" => __( 'استخدام كصورة للمدونة', 'qi-theme' ),
        "archives" => __( 'أرشيف المدونات', 'qi-theme' ),
        "insert_into_item" => __( 'إدراج في المدونة', 'qi-theme' ),
        "uploaded_to_this_item" => __( 'مرفوع لهذه المدونة', 'qi-theme' ),
        "filter_items_list" => __( 'تصفية قائمة المدونات', 'qi-theme' ),
        "items_list" => __( 'قائمة المدونات', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'المدونات', 'qi-theme' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "blogs",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "blog", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-format-status",
        "supports" => array( "title", "editor", "thumbnail", "comments", "revisions", "author" ),
    );
    
    register_post_type( "blogs", $args );
}

add_action( 'init', 'cptui_register_my_cpts_blogs' );



function cptui_register_my_cpts_wallpapers() {

    /**
     * Post Type: wallpapers.
     */

    $labels = array(
        "name" => __( 'الخلفيات', 'qi-theme' ),
        "singular_name" => __( 'خلفية', 'qi-theme' ),
        "menu_name" => __( 'الخلفيات', 'qi-theme' ),
        "all_items" => __( 'كل الخلفيات', 'qi-theme' ),
        "add_new" => __( 'خلفية جديدة', 'qi-theme' ),
        "add_new_item" => __( 'إضافة خلفية جديدة', 'qi-theme' ),
        "edit_item" => __( 'تعديل الخلفية', 'qi-theme' ),
        "new_item" => __( 'خلفية جديدة', 'qi-theme' ),
        "view_item" => __( 'عرض الخلفية', 'qi-theme' ),
        "search_items" => __( 'بحث عن خلفية', 'qi-theme' ),
        "not_found" => __( 'لا يوجد خلفيات', 'qi-theme' ),
        "not_found_in_trash" => __( 'لا يوجد خلفيات في المحذوفات', 'qi-theme' ),
        "archives" => __( 'أرشيف الخلفيات', 'qi-theme' ),
        "uploaded_to_this_item" => __( 'مرفوع لهذه الخلفية', 'qi-theme' ),
        "filter_items_list" => __( 'تصفية قائمة الخلفيات', 'qi-theme' ),
        "items_list" => __( 'قائمة الخلفيات', 'qi-theme' ),
    );

    $args = array(
        "label" => __( 'الخلفيات', 'qi-theme' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "wallpapers",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "wallpapers-item", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-images-alt",
        "supports" => array( "title", "comments", "revisions", "author" ),
    );

    register_post_type( "wallpapers", $args );
}

add_action( 'init', 'cptui_register_my_cpts_wallpapers' );


function cptui_register_my_cpts_faq() {

    /**
     * Post Type: wallpapers.
     */

    $labels = array(
        "name" => __( 'الأسئلة الشائعة', 'qi-theme' ),
        "singular_name" => __( 'سؤال', 'qi-theme' ),
        "menu_name" => __( 'الأسئلة الشائعة', 'qi-theme' ),
        "all_items" => __( 'كل الأسئلة', 'qi-theme' ),
        "add_new" => __( 'سؤال جديد', 'qi-theme' ),
        "add_new_item" => __( 'إضافة سؤال جديد', 'qi-theme' ),
        "edit_item" => __( 'تعديل السؤال', 'qi-theme' ),
        "new_item" => __( 'سؤال جديد', 'qi-theme' ),
        "view_item" => __( 'عرض السؤال', 'qi-theme' ),
        "search_items" => __( 'بحث عن سؤال', 'qi-theme' ),
        "not_found" => __( 'لا يوجد أسئلة', 'qi-theme' ),
        "not_found_in_trash" => __( 'لا يوجد أسئلة في المحذوفات', 'qi-theme' ),
        "archives" => __( 'أرشيف الأسئلة', 'qi-theme' ),
        "uploaded_to_this_item" => __( 'مرفوع لهذا السؤال', 'qi-theme' ),
        "filter_items_list" => __( 'تصفية قائمة الأسئلة', 'qi-theme' ),
        "items_list" => __( 'قائمة الأسئلة', 'qi-theme' ),
    );

    $args = array(
        "label" => __( 'الأسئلة الشائعة', 'qi-theme' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "faq",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "faq-item", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-lightbulb",
        "supports" => array( "title", "editor", "thumbnail", "comments", "revisions", "author" ),
    );

    register_post_type( "faq", $args );
}

add_action( 'init', 'cptui_register_my_cpts_faq' );



// TAXONOMIES
function cptui_register_my_taxes() {
    
    /**
     * Taxonomy: تصنيفات الأخبار.
     */
    
    $labels = array(
        "name" => __( 'تصنيفات الأخبار', 'qi-theme' ),
        "singular_name" => __( 'تصنيف الخبر', 'qi-theme' ),
        "menu_name" => __( 'تصنيفات الأخبار', 'qi-theme' ),
        "all_items" => __( 'كل تصنيفات الأخبار', 'qi-theme' ),
        "edit_item" => __( 'تعديل التصنيف', 'qi-theme' ),
        "view_item" => __( 'عرض التصنيف', 'qi-theme' ),
        "update_item" => __( 'تحديث اسم التصنيف', 'qi-theme' ),
        "add_new_item" => __( 'إضافة تصنيف خبر', 'qi-theme' ),
        "new_item_name" => __( 'اسم التصنيف', 'qi-theme' ),
        "parent_item" => __( 'التصنيف الأب', 'qi-theme' ),
        "search_items" => __( 'بحث في تصنيفات الأخبار', 'qi-theme' ),
        "popular_items" => __( 'تصنيفات أخبار مشهورة', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'تصنيفات الأخبار', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'news-cat', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "news-cats",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "news-cat", array( "news" ), $args );


    /**
     * Taxonomy: مجموعات الأخبار.
     */

    $labels = array(
        "name" => __( 'مجموعات الأخبار', 'qi-theme' ),
        "singular_name" => __( 'مجموعة', 'qi-theme' ),
        "menu_name" => __( 'مجموعات الأخبار', 'qi-theme' ),
        "all_items" => __( 'كل مجموعات الأخبار', 'qi-theme' ),
        "edit_item" => __( 'تعديل المجموعة', 'qi-theme' ),
        "view_item" => __( 'عرض المجموعة', 'qi-theme' ),
        "update_item" => __( 'تحديث اسم المجموعة', 'qi-theme' ),
        "add_new_item" => __( 'إضافة مجموعة أخبار', 'qi-theme' ),
        "new_item_name" => __( 'اسم المجموعة', 'qi-theme' ),
        "parent_item" => __( 'المجموعة الأب', 'qi-theme' ),
        "search_items" => __( 'بحث في مجموعات الأخبار', 'qi-theme' ),
        "popular_items" => __( 'مجموعات أخبار مشهورة', 'qi-theme' ),
    );

    $args = array(
        "label" => __( 'مجموعات الأخبار', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'news-groups', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "news-groups",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "news-groups", array( "news" ), $args );


    /**
     * Taxonomy: هاشتاجات الأخبار.
     */
    
    $labels = array(
        "name" => __( 'هاشتاجات الأخبار', 'qi-theme' ),
        "singular_name" => __( 'هاشتاج خبر', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'هاشتاجات الأخبار', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "هاشتاجات الأخبار",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'news-hashtags', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "news-tags",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "news-hashtags", array( "news" ), $args );
    
    /**
     * Taxonomy: تصنيفات الصور.
     */
    
    $labels = array(
        "name" => __( 'تصنيفات الصور', 'qi-theme' ),
        "singular_name" => __( 'تصنيف صورة', 'qi-theme' ),
        "menu_name" => __( 'تصنيفات الصور', 'qi-theme' ),
        "all_items" => __( 'كل التصنفات', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'تصنيفات الصور', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'pics-cats', 'with_front' => true, ),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "pics-cats",
        "show_in_quick_edit" => true,
    );
    register_taxonomy( "pics-cats", array( "pics" ), $args );
    
    /**
     * Taxonomy: هاشتاجات الصور.
     */
    
    $labels = array(
        "name" => __( 'هاشتاجات الصور', 'qi-theme' ),
        "singular_name" => __( 'هاشتاج صورة', 'qi-theme' ),
        "menu_name" => __( 'هاشتاجات الصور', 'qi-theme' ),
        "all_items" => __( 'كل الهاشتاجات', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'هاشتاجات الصور', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'pics-hashtags', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "pics-tags",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "pics-hashtags", array( "pics" ), $args );
    
    /**
     * Taxonomy: مؤلفين الكتب.
     */
    
    $labels = array(
        "name" => __( 'مؤلفين الكتب', 'qi-theme' ),
        "singular_name" => __( 'كاتب', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'مؤلفين الكتب', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'book_authors', 'with_front' => true, ),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "books-authors",
        "show_in_quick_edit" => true,
    );
    register_taxonomy( "book_authors", array( "book" ), $args );
    
    /**
     * Taxonomy: أقسام المكتبة.
     */
    
    $labels = array(
        "name" => __( 'أقسام المكتبة', 'qi-theme' ),
        "singular_name" => __( 'قسم', 'qi-theme' ),
        "menu_name" => __( 'أقسام المكتبة', 'qi-theme' ),
        "all_items" => __( 'جميع الأقسام', 'qi-theme' ),
        "edit_item" => __( 'تعديل قسم', 'qi-theme' ),
        "view_item" => __( 'عرض قسم', 'qi-theme' ),
        "update_item" => __( 'تغيير اسم القسم', 'qi-theme' ),
        "add_new_item" => __( 'إضافة قسم جديد', 'qi-theme' ),
        "new_item_name" => __( 'اسم القسم الجديد', 'qi-theme' ),
        "parent_item" => __( 'اسم القسم الأب', 'qi-theme' ),
        "parent_item_colon" => __( 'القسم الأب:', 'qi-theme' ),
        "search_items" => __( 'بحث في الأقسام', 'qi-theme' ),
        "popular_items" => __( 'أكثر الأقسام تفاعلا', 'qi-theme' ),
        "separate_items_with_commas" => __( 'افصل الأقسام بفواصل', 'qi-theme' ),
        "add_or_remove_items" => __( 'إضافة أو حذف قسم', 'qi-theme' ),
        "choose_from_most_used" => __( 'اختر من أكثر الأقسام استخداما', 'qi-theme' ),
        "not_found" => __( 'لا يوجد أقسام', 'qi-theme' ),
        "no_terms" => __( 'لا يوجد أقسام', 'qi-theme' ),
    );
    
    $args = array(
        "label" => __( 'أقسام المكتبة', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'library_sections', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "library-sections",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "library_sections", array( "book" ), $args );


    /**
     * Taxonomy: تصنيفات الأسئلة الشائعة.
     */

    $labels = array(
        "name" => __( 'تصنيفات الأسئلة', 'qi-theme' ),
        "singular_name" => __( 'تصنيف', 'qi-theme' ),
        "menu_name" => __( 'تصنيفات الأسئلة', 'qi-theme' ),
        "all_items" => __( 'جميع التصنيفات', 'qi-theme' ),
        "edit_item" => __( 'تعديل تصنيف', 'qi-theme' ),
        "view_item" => __( 'عرض التصنيف', 'qi-theme' ),
        "update_item" => __( 'تغيير اسم التصنيف', 'qi-theme' ),
        "add_new_item" => __( 'إضافة تصنيف جديد', 'qi-theme' ),
        "new_item_name" => __( 'اسم التصنيف الجديد', 'qi-theme' ),
        "parent_item" => __( 'اسم التصنيف الأب', 'qi-theme' ),
        "parent_item_colon" => __( 'التصنيف الأب:', 'qi-theme' ),
        "search_items" => __( 'بحث في التصنيفات', 'qi-theme' ),
        "popular_items" => __( 'أكثر التصنيفات تفاعلا', 'qi-theme' ),
        "separate_items_with_commas" => __( 'افصل التصنيفات بفواصل', 'qi-theme' ),
        "add_or_remove_items" => __( 'إضافة أو حذف تصنيف', 'qi-theme' ),
        "choose_from_most_used" => __( 'اختر من أكثر التصنيفات استخداما', 'qi-theme' ),
        "not_found" => __( 'لا يوجد تصنيفات', 'qi-theme' ),
        "no_terms" => __( 'لا يوجد تصنيفات', 'qi-theme' ),
    );

    $args = array(
        "label" => __( 'تصنيفات الأسئلة', 'qi-theme' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'faq-category', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "faq-category",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "faq-category", array( "faq" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );

function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'init', 'my_rewrite_flush' );
