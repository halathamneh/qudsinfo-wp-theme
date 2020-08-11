<?php


namespace QITheme\CPT;


use QITheme\CPT\Taxonomies\NewsCategories;
use QITheme\CPT\Taxonomies\NewsGroups;
use QITheme\CPT\Taxonomies\NewsHashtags;

class BlogPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "blogs";
    }

    protected function postTypeLabels(): array
    {
        return array(
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
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'المدونات', 'qi-theme' ),
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
    }

}
