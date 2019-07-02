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
        "name" => __( 'الموضوعات', 'illdy' ),
        "singular_name" => __( 'موضوع', 'illdy' ),
        "menu_name" => __( 'الموضوعات', 'illdy' ),
        "all_items" => __( 'الموضوعات', 'illdy' ),
        "add_new" => __( 'موضوع جديد', 'illdy' ),
        "add_new_item" => __( 'إضافة موضوع جديد', 'illdy' ),
        "edit_item" => __( 'تعديل موضوع', 'illdy' ),
        "new_item" => __( 'موضوع جديد', 'illdy' ),
        "view_item" => __( 'عرض الموضوع', 'illdy' ),
        "search_items" => __( 'بحث عن موضوع', 'illdy' ),
        "not_found" => __( 'لم نجد الموضوع', 'illdy' ),
        "featured_image" => __( 'صورة الموضوع', 'illdy' ),
        "use_featured_image" => __( 'استعملها ك صورة للموضوع', 'illdy' ),
        "archives" => __( 'أرشيف الموضوعات', 'illdy' ),
        "insert_into_item" => __( 'إضافة إلى الموضوع', 'illdy' ),
        "uploaded_to_this_item" => __( 'المرفوع لهذا الموضوع', 'illdy' ),
        "items_list" => __( 'قائمة الموضوعات', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'الموضوعات', 'illdy' ),
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
        "name" => __( 'الأخبار', 'illdy' ),
        "singular_name" => __( 'خبر', 'illdy' ),
        "menu_name" => __( 'الأخبار', 'illdy' ),
        "all_items" => __( 'كل الأخبار', 'illdy' ),
        "add_new" => __( 'خبر جديد', 'illdy' ),
        "add_new_item" => __( 'إضافة خبر جديد', 'illdy' ),
        "edit_item" => __( 'تعديل خبر', 'illdy' ),
        "new_item" => __( 'خبر جديد', 'illdy' ),
        "view_item" => __( 'عرض الخبر', 'illdy' ),
        "search_items" => __( 'بحث عن خبر', 'illdy' ),
        "not_found" => __( 'لم نجد الخبر', 'illdy' ),
        "featured_image" => __( 'صورة الخبر', 'illdy' ),
        "use_featured_image" => __( 'استعملها ك صورة للخبر', 'illdy' ),
        "archives" => __( 'أرشيف الأخبار', 'illdy' ),
        "insert_into_item" => __( 'إضافة إلى الخبر', 'illdy' ),
        "uploaded_to_this_item" => __( 'المرفوع لهذا الخبر', 'illdy' ),
        "items_list" => __( 'قائمة الأخبار', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'الأخبار', 'illdy' ),
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
        "name" => __( 'أرشيف المعالم والصور', 'illdy' ),
        "singular_name" => __( 'صورة/معلم', 'illdy' ),
        "menu_name" => __( 'المعالم والصور', 'illdy' ),
        "all_items" => __( 'كل الصور', 'illdy' ),
        "add_new" => __( 'معلم/صورة جديدة', 'illdy' ),
        "add_new_item" => __( 'إضافة معلم/صورة جديدة', 'illdy' ),
        "edit_item" => __( 'تعديل معلم/صورة', 'illdy' ),
        "new_item" => __( 'معلم/صورة جديدة', 'illdy' ),
        "view_item" => __( 'عرض المعلم/الصورة', 'illdy' ),
        "featured_image" => __( 'اختر الصورة من هنا', 'illdy' ),
        "archives" => __( 'أرشيف المعالم والصور', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'أرشيف المعالم والصور', 'illdy' ),
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
        "name" => __( 'المعلومات الصوتية', 'illdy' ),
        "singular_name" => __( 'معلومة صوتية', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'المعلومات الصوتية', 'illdy' ),
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
        "name" => __( 'المعلومات المرئية', 'illdy' ),
        "singular_name" => __( 'معلومة مرئية', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'المعلومات المرئية', 'illdy' ),
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
        "name" => __( 'منتجاتنا', 'illdy' ),
        "singular_name" => __( 'منتج', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'منتجاتنا', 'illdy' ),
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
        "name" => __( 'الكتب', 'illdy' ),
        "singular_name" => __( 'كتاب', 'illdy' ),
        "menu_name" => __( 'المكتبة', 'illdy' ),
        "all_items" => __( 'جميع الكتب', 'illdy' ),
        "add_new" => __( 'كتاب جديد', 'illdy' ),
        "add_new_item" => __( 'إضافة كتاب جديد', 'illdy' ),
        "edit_item" => __( 'تعديل كتاب', 'illdy' ),
        "new_item" => __( 'كتاب جديد', 'illdy' ),
        "view_item" => __( 'عرض الكتاب', 'illdy' ),
        "search_items" => __( 'بحص عن كتاب', 'illdy' ),
        "not_found" => __( 'لم نجد الكتاب الذي تبحث عنه', 'illdy' ),
        "featured_image" => __( 'غلاف الكتاب', 'illdy' ),
        "set_featured_image" => __( 'اختر صورة غلاف', 'illdy' ),
        "remove_featured_image" => __( 'إزالة صورة الغلاف', 'illdy' ),
        "use_featured_image" => __( 'اختيار كصورة غلاف', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'الكتب', 'illdy' ),
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
        "name" => __( 'المدونات', 'illdy' ),
        "singular_name" => __( 'مدونة', 'illdy' ),
        "menu_name" => __( 'المدونات', 'illdy' ),
        "all_items" => __( 'كل المدونات', 'illdy' ),
        "add_new" => __( 'مدونة جديدة', 'illdy' ),
        "add_new_item" => __( 'إضافة مدونة جديدة', 'illdy' ),
        "edit_item" => __( 'تعديل المدونة', 'illdy' ),
        "new_item" => __( 'مدونة جديدة', 'illdy' ),
        "view_item" => __( 'عرض المدونة', 'illdy' ),
        "search_items" => __( 'بحث عن مدونة', 'illdy' ),
        "not_found" => __( 'لا يوجد مدونات', 'illdy' ),
        "not_found_in_trash" => __( 'لا يوجد مدونات في المحذوفات', 'illdy' ),
        "featured_image" => __( 'صورة المدونة', 'illdy' ),
        "set_featured_image" => __( 'تحديد صورة المدونة', 'illdy' ),
        "remove_featured_image" => __( 'إزالة صورة المدونة', 'illdy' ),
        "use_featured_image" => __( 'استخدام كصورة للمدونة', 'illdy' ),
        "archives" => __( 'أرشيف المدونات', 'illdy' ),
        "insert_into_item" => __( 'إدراج في المدونة', 'illdy' ),
        "uploaded_to_this_item" => __( 'مرفوع لهذه المدونة', 'illdy' ),
        "filter_items_list" => __( 'تصفية قائمة المدونات', 'illdy' ),
        "items_list" => __( 'قائمة المدونات', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'المدونات', 'illdy' ),
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
        "name" => __( 'الخلفيات', 'illdy' ),
        "singular_name" => __( 'خلفية', 'illdy' ),
        "menu_name" => __( 'الخلفيات', 'illdy' ),
        "all_items" => __( 'كل الخلفيات', 'illdy' ),
        "add_new" => __( 'خلفية جديدة', 'illdy' ),
        "add_new_item" => __( 'إضافة خلفية جديدة', 'illdy' ),
        "edit_item" => __( 'تعديل الخلفية', 'illdy' ),
        "new_item" => __( 'خلفية جديدة', 'illdy' ),
        "view_item" => __( 'عرض الخلفية', 'illdy' ),
        "search_items" => __( 'بحث عن خلفية', 'illdy' ),
        "not_found" => __( 'لا يوجد خلفيات', 'illdy' ),
        "not_found_in_trash" => __( 'لا يوجد خلفيات في المحذوفات', 'illdy' ),
        "archives" => __( 'أرشيف الخلفيات', 'illdy' ),
        "uploaded_to_this_item" => __( 'مرفوع لهذه الخلفية', 'illdy' ),
        "filter_items_list" => __( 'تصفية قائمة الخلفيات', 'illdy' ),
        "items_list" => __( 'قائمة الخلفيات', 'illdy' ),
    );

    $args = array(
        "label" => __( 'الخلفيات', 'illdy' ),
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
        "name" => __( 'الأسئلة الشائعة', 'illdy' ),
        "singular_name" => __( 'سؤال', 'illdy' ),
        "menu_name" => __( 'الأسئلة الشائعة', 'illdy' ),
        "all_items" => __( 'كل الأسئلة', 'illdy' ),
        "add_new" => __( 'سؤال جديد', 'illdy' ),
        "add_new_item" => __( 'إضافة سؤال جديد', 'illdy' ),
        "edit_item" => __( 'تعديل السؤال', 'illdy' ),
        "new_item" => __( 'سؤال جديد', 'illdy' ),
        "view_item" => __( 'عرض السؤال', 'illdy' ),
        "search_items" => __( 'بحث عن سؤال', 'illdy' ),
        "not_found" => __( 'لا يوجد أسئلة', 'illdy' ),
        "not_found_in_trash" => __( 'لا يوجد أسئلة في المحذوفات', 'illdy' ),
        "archives" => __( 'أرشيف الأسئلة', 'illdy' ),
        "uploaded_to_this_item" => __( 'مرفوع لهذا السؤال', 'illdy' ),
        "filter_items_list" => __( 'تصفية قائمة الأسئلة', 'illdy' ),
        "items_list" => __( 'قائمة الأسئلة', 'illdy' ),
    );

    $args = array(
        "label" => __( 'الأسئلة الشائعة', 'illdy' ),
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
        "name" => __( 'تصنيفات الأخبار', 'illdy' ),
        "singular_name" => __( 'تصنيف الخبر', 'illdy' ),
        "menu_name" => __( 'تصنيفات الأخبار', 'illdy' ),
        "all_items" => __( 'كل تصنيفات الأخبار', 'illdy' ),
        "edit_item" => __( 'تعديل التصنيف', 'illdy' ),
        "view_item" => __( 'عرض التصنيف', 'illdy' ),
        "update_item" => __( 'تحديث اسم التصنيف', 'illdy' ),
        "add_new_item" => __( 'إضافة تصنيف خبر', 'illdy' ),
        "new_item_name" => __( 'اسم التصنيف', 'illdy' ),
        "parent_item" => __( 'التصنيف الأب', 'illdy' ),
        "search_items" => __( 'بحث في تصنيفات الأخبار', 'illdy' ),
        "popular_items" => __( 'تصنيفات أخبار مشهورة', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'تصنيفات الأخبار', 'illdy' ),
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
        "name" => __( 'مجموعات الأخبار', 'illdy' ),
        "singular_name" => __( 'مجموعة', 'illdy' ),
        "menu_name" => __( 'مجموعات الأخبار', 'illdy' ),
        "all_items" => __( 'كل مجموعات الأخبار', 'illdy' ),
        "edit_item" => __( 'تعديل المجموعة', 'illdy' ),
        "view_item" => __( 'عرض المجموعة', 'illdy' ),
        "update_item" => __( 'تحديث اسم المجموعة', 'illdy' ),
        "add_new_item" => __( 'إضافة مجموعة أخبار', 'illdy' ),
        "new_item_name" => __( 'اسم المجموعة', 'illdy' ),
        "parent_item" => __( 'المجموعة الأب', 'illdy' ),
        "search_items" => __( 'بحث في مجموعات الأخبار', 'illdy' ),
        "popular_items" => __( 'مجموعات أخبار مشهورة', 'illdy' ),
    );

    $args = array(
        "label" => __( 'مجموعات الأخبار', 'illdy' ),
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
        "name" => __( 'هاشتاجات الأخبار', 'illdy' ),
        "singular_name" => __( 'هاشتاج خبر', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'هاشتاجات الأخبار', 'illdy' ),
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
        "name" => __( 'تصنيفات الصور', 'illdy' ),
        "singular_name" => __( 'تصنيف صورة', 'illdy' ),
        "menu_name" => __( 'تصنيفات الصور', 'illdy' ),
        "all_items" => __( 'كل التصنفات', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'تصنيفات الصور', 'illdy' ),
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
        "name" => __( 'هاشتاجات الصور', 'illdy' ),
        "singular_name" => __( 'هاشتاج صورة', 'illdy' ),
        "menu_name" => __( 'هاشتاجات الصور', 'illdy' ),
        "all_items" => __( 'كل الهاشتاجات', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'هاشتاجات الصور', 'illdy' ),
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
        "name" => __( 'مؤلفين الكتب', 'illdy' ),
        "singular_name" => __( 'كاتب', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'مؤلفين الكتب', 'illdy' ),
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
        "name" => __( 'أقسام المكتبة', 'illdy' ),
        "singular_name" => __( 'قسم', 'illdy' ),
        "menu_name" => __( 'أقسام المكتبة', 'illdy' ),
        "all_items" => __( 'جميع الأقسام', 'illdy' ),
        "edit_item" => __( 'تعديل قسم', 'illdy' ),
        "view_item" => __( 'عرض قسم', 'illdy' ),
        "update_item" => __( 'تغيير اسم القسم', 'illdy' ),
        "add_new_item" => __( 'إضافة قسم جديد', 'illdy' ),
        "new_item_name" => __( 'اسم القسم الجديد', 'illdy' ),
        "parent_item" => __( 'اسم القسم الأب', 'illdy' ),
        "parent_item_colon" => __( 'القسم الأب:', 'illdy' ),
        "search_items" => __( 'بحث في الأقسام', 'illdy' ),
        "popular_items" => __( 'أكثر الأقسام تفاعلا', 'illdy' ),
        "separate_items_with_commas" => __( 'افصل الأقسام بفواصل', 'illdy' ),
        "add_or_remove_items" => __( 'إضافة أو حذف قسم', 'illdy' ),
        "choose_from_most_used" => __( 'اختر من أكثر الأقسام استخداما', 'illdy' ),
        "not_found" => __( 'لا يوجد أقسام', 'illdy' ),
        "no_terms" => __( 'لا يوجد أقسام', 'illdy' ),
    );
    
    $args = array(
        "label" => __( 'أقسام المكتبة', 'illdy' ),
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
        "name" => __( 'تصنيفات الأسئلة', 'illdy' ),
        "singular_name" => __( 'تصنيف', 'illdy' ),
        "menu_name" => __( 'تصنيفات الأسئلة', 'illdy' ),
        "all_items" => __( 'جميع التصنيفات', 'illdy' ),
        "edit_item" => __( 'تعديل تصنيف', 'illdy' ),
        "view_item" => __( 'عرض التصنيف', 'illdy' ),
        "update_item" => __( 'تغيير اسم التصنيف', 'illdy' ),
        "add_new_item" => __( 'إضافة تصنيف جديد', 'illdy' ),
        "new_item_name" => __( 'اسم التصنيف الجديد', 'illdy' ),
        "parent_item" => __( 'اسم التصنيف الأب', 'illdy' ),
        "parent_item_colon" => __( 'التصنيف الأب:', 'illdy' ),
        "search_items" => __( 'بحث في التصنيفات', 'illdy' ),
        "popular_items" => __( 'أكثر التصنيفات تفاعلا', 'illdy' ),
        "separate_items_with_commas" => __( 'افصل التصنيفات بفواصل', 'illdy' ),
        "add_or_remove_items" => __( 'إضافة أو حذف تصنيف', 'illdy' ),
        "choose_from_most_used" => __( 'اختر من أكثر التصنيفات استخداما', 'illdy' ),
        "not_found" => __( 'لا يوجد تصنيفات', 'illdy' ),
        "no_terms" => __( 'لا يوجد تصنيفات', 'illdy' ),
    );

    $args = array(
        "label" => __( 'تصنيفات الأسئلة', 'illdy' ),
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
