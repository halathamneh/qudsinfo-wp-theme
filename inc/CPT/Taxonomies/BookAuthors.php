<?php


namespace QITheme\CPT\Taxonomies;


class BookAuthors extends BaseCustomTaxonomy
{

    protected function taxonomyName(): ?string
    {
        return 'book_authors';
    }

    protected function taxonomyLabels(): array
    {
        return array(
            "name" => __( 'مؤلفين الكتب', 'qi-theme' ),
            "singular_name" => __( 'كاتب', 'qi-theme' ),
        );
    }

    protected function taxonomyArgs(): array
    {
        return array(
            "label" => __( 'مؤلفين الكتب', 'qi-theme' ),
            "public" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'book_authors', 'with_front' => true, ),
            "show_admin_column" => true,
            "show_in_rest" => true,
            "rest_base" => "books-authors",
            "show_in_quick_edit" => true,
        );
    }
}
