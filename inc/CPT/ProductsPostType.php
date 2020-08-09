<?php


namespace QITheme\CPT;



class ProductsPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "products";
    }

    protected function postTypeLabels(): array
    {
        return array(
            "name" => __( 'منتجاتنا', 'qi-theme' ),
            "singular_name" => __( 'منتج', 'qi-theme' ),
        );
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'منتجاتنا', 'qi-theme' ),
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "products",
            "has_archive" => true,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "products", "with_front" => true ),
            "query_var" => true,
            "menu_position" => 25,
            "menu_icon" => "dashicons-cart",
            "supports" => array( "title", "editor", "thumbnail", "comments" ),
        );
    }

}
