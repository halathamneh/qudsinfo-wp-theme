<?php


namespace QITheme\CPT;


use QITheme\CPT\Taxonomies\BookAuthors;
use QITheme\CPT\Taxonomies\LibrarySections;

class BooksPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "book";
    }

    protected function postTypeLabels(): array
    {
        return array(
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
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'الكتب', 'qi-theme' ),
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
    }

    public function taxonomies(): array
    {
        $postTypes = [$this->postTypeName()];
        return [
            BookAuthors::getInstance($postTypes),
            LibrarySections::getInstance($postTypes),
        ];
    }

}
