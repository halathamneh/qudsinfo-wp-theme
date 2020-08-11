<?php


namespace QITheme\CPT;


use QITheme\CPT\Taxonomies\FaqCategories;

class FaqPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "faq";
    }

    protected function postTypeLabels(): array
    {
        return array(
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
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'الأسئلة الشائعة', 'qi-theme' ),
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
    }

    public function taxonomies(): array
    {
        $postTypes = [$this->postTypeName()];
        return [
            FaqCategories::getInstance($postTypes),
        ];
    }

}
