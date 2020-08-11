<?php


namespace QITheme\CPT\Taxonomies;


class NewsCategories extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return 'news-cat';
    }

    protected function taxonomyLabels(): array
    {
        return array(
            "name"          => __('تصنيفات الأخبار', 'qi-theme'),
            "singular_name" => __('تصنيف الخبر', 'qi-theme'),
            "menu_name"     => __('تصنيفات الأخبار', 'qi-theme'),
            "all_items"     => __('كل تصنيفات الأخبار', 'qi-theme'),
            "edit_item"     => __('تعديل التصنيف', 'qi-theme'),
            "view_item"     => __('عرض التصنيف', 'qi-theme'),
            "update_item"   => __('تحديث اسم التصنيف', 'qi-theme'),
            "add_new_item"  => __('إضافة تصنيف خبر', 'qi-theme'),
            "new_item_name" => __('اسم التصنيف', 'qi-theme'),
            "parent_item"   => __('التصنيف الأب', 'qi-theme'),
            "search_items"  => __('بحث في تصنيفات الأخبار', 'qi-theme'),
            "popular_items" => __('تصنيفات أخبار مشهورة', 'qi-theme'),
        );
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label"              => __('تصنيفات الأخبار', 'qi-theme'),
            "public"             => true,
            "hierarchical"       => true,
            "show_ui"            => true,
            "show_in_menu"       => true,
            "show_in_nav_menus"  => true,
            "query_var"          => true,
            "rewrite"            => array('slug' => 'news-cat', 'with_front' => true,),
            "show_admin_column"  => false,
            "show_in_rest"       => true,
            "rest_base"          => "news-cats",
            "show_in_quick_edit" => false,
        );
    }
}
