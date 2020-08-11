<?php


namespace QITheme\CPT\Taxonomies;


class NewsHashtags extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return 'news-hashtags';
    }

    protected function taxonomyLabels(): array
    {
        return array(
            "name" => __( 'هاشتاجات الأخبار', 'qi-theme' ),
            "singular_name" => __( 'هاشتاج خبر', 'qi-theme' ),
        );
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label" => __( 'هاشتاجات الأخبار', 'qi-theme' ),
            "public" => true,
            "hierarchical" => false,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'news-hashtags', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "news-tags",
            "show_in_quick_edit" => false,
        );
    }
}
