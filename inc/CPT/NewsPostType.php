<?php


namespace QITheme\CPT;


use QITheme\CPT\Taxonomies\NewsCategories;
use QITheme\CPT\Taxonomies\NewsGroups;
use QITheme\CPT\Taxonomies\NewsHashtags;

class NewsPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "news";
    }

    protected function postTypeLabels(): array
    {
        return array(
            "name"                  => __('الأخبار', 'qi-theme'),
            "singular_name"         => __('خبر', 'qi-theme'),
            "menu_name"             => __('الأخبار', 'qi-theme'),
            "all_items"             => __('كل الأخبار', 'qi-theme'),
            "add_new"               => __('خبر جديد', 'qi-theme'),
            "add_new_item"          => __('إضافة خبر جديد', 'qi-theme'),
            "edit_item"             => __('تعديل خبر', 'qi-theme'),
            "new_item"              => __('خبر جديد', 'qi-theme'),
            "view_item"             => __('عرض الخبر', 'qi-theme'),
            "search_items"          => __('بحث عن خبر', 'qi-theme'),
            "not_found"             => __('لم نجد الخبر', 'qi-theme'),
            "featured_image"        => __('صورة الخبر', 'qi-theme'),
            "use_featured_image"    => __('استعملها ك صورة للخبر', 'qi-theme'),
            "archives"              => __('أرشيف الأخبار', 'qi-theme'),
            "insert_into_item"      => __('إضافة إلى الخبر', 'qi-theme'),
            "uploaded_to_this_item" => __('المرفوع لهذا الخبر', 'qi-theme'),
            "items_list"            => __('قائمة الأخبار', 'qi-theme'),
        );
    }

    public function postTypeArgs(): array
    {
        return array(
            "label"               => __('الأخبار', 'qi-theme'),
            "description"         => "آخر الأخبار",
            "public"              => true,
            "publicly_queryable"  => true,
            "show_ui"             => true,
            "show_in_rest"        => true,
            "rest_base"           => "news",
            "has_archive"         => "news-archive",
            "show_in_menu"        => true,
            "exclude_from_search" => false,
            "capability_type"     => "post",
            "map_meta_cap"        => true,
            "hierarchical"        => false,
            "rewrite"             => array("slug" => "news", "with_front" => true),
            "query_var"           => true,
            "menu_position"       => 6,
            "menu_icon"           => "dashicons-format-aside",
            "supports"            => array("title", "editor", "thumbnail", "excerpt", "comments", "revisions"),
            "taxonomies"          => array("news-cat", "news-hashtags"),
        );
    }

    public function taxonomies(): array
    {
        $postTypes = [$this->postTypeName()];
        return [
            NewsCategories::getInstance($postTypes),
            NewsGroups::getInstance($postTypes),
            NewsHashtags::getInstance($postTypes),
        ];
    }

}
