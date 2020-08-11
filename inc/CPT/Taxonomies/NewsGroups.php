<?php


namespace QITheme\CPT\Taxonomies;


class NewsGroups extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return 'news-groups';
    }

    protected function taxonomyLabels(): array
    {
        return array(
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
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label" => __( 'مجموعات الأخبار', 'qi-theme' ),
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
    }
}
