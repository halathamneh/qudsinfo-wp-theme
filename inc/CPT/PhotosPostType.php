<?php


namespace QITheme\CPT;


use QITheme\CPT\Taxonomies\PhotosCategories;
use QITheme\CPT\Taxonomies\PhotosTags;

class PhotosPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "pics";
    }

    protected function postTypeLabels(): array
    {
        return array(
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
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'أرشيف المعالم والصور', 'qi-theme' ),
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
    }

    public function taxonomies(): array
    {
        $postTypes = [$this->postTypeName()];
        return [
            PhotosCategories::getInstance($postTypes),
            PhotosTags::getInstance($postTypes),
        ];
    }

}
