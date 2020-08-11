<?php


namespace QITheme\CPT\Taxonomies;


class FaqCategories extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return 'faq-category';
    }

    protected function taxonomyLabels(): array
    {
        return array(
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
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label" => __( 'تصنيفات الأسئلة', 'qi-theme' ),
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
    }
}
