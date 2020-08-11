<?php


namespace QITheme\CPT\Taxonomies;


class PhotosTags extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return 'pics-hashtags';
    }

    protected function taxonomyLabels(): array
    {
        return array(
            "name" => __( 'هاشتاجات الصور', 'qi-theme' ),
            "singular_name" => __( 'هاشتاج صورة', 'qi-theme' ),
            "menu_name" => __( 'هاشتاجات الصور', 'qi-theme' ),
            "all_items" => __( 'كل الهاشتاجات', 'qi-theme' ),
        );
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label" => __( 'هاشتاجات الصور', 'qi-theme' ),
            "public" => true,
            "hierarchical" => false,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'pics-hashtags', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "pics-tags",
            "show_in_quick_edit" => false,
        );
    }
}
