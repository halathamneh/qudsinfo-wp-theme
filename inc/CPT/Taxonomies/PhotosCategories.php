<?php


namespace QITheme\CPT\Taxonomies;


class PhotosCategories extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return 'pics-cats';
    }

    protected function taxonomyLabels(): array
    {
        return array(
            "name" => __( 'تصنيفات الصور', 'qi-theme' ),
            "singular_name" => __( 'تصنيف صورة', 'qi-theme' ),
            "menu_name" => __( 'تصنيفات الصور', 'qi-theme' ),
            "all_items" => __( 'كل التصنفات', 'qi-theme' ),
        );
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label" => __( 'تصنيفات الصور', 'qi-theme' ),
            "public" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'pics-cats', 'with_front' => true, ),
            "show_admin_column" => true,
            "show_in_rest" => true,
            "rest_base" => "pics-cats",
            "show_in_quick_edit" => true,
        );
    }
}
