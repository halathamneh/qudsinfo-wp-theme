<?php


namespace QITheme\CPT\Taxonomies;


class LibrarySections extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return "library_sections";
    }

    protected function taxonomyLabels(): array
    {
        return array(
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
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label" => __( 'أقسام المكتبة', 'qi-theme' ),
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
    }
}
