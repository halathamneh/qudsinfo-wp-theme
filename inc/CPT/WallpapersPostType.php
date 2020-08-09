<?php


namespace QITheme\CPT;


use QITheme\CPT\Taxonomies\NewsCategories;
use QITheme\CPT\Taxonomies\NewsGroups;
use QITheme\CPT\Taxonomies\NewsHashtags;

class WallpapersPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "wallpapers";
    }

    protected function postTypeLabels(): array
    {
        return array(
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
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'الخلفيات', 'qi-theme' ),
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
    }

}
