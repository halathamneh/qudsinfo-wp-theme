<?php


namespace QITheme\CPT;


class InfoDetailsPostType extends BaseCPT
{

    protected function __construct()
    {
        parent::__construct();
        add_action( 'admin_menu', [$this, 'removeCategories'] );
    }

    public function removeCategories() {
        if ( ! current_user_can( 'manage_options' ) ) {
            remove_meta_box('categorydiv',"info-details",'normal');
        }
    }

    protected function postTypeName(): string
    {
        return "info-details";
    }

    protected function postTypeLabels(): array
    {
        return array(
            "name"                  => __('الموضوعات', 'qi-theme'),
            "singular_name"         => __('موضوع', 'qi-theme'),
            "menu_name"             => __('الموضوعات', 'qi-theme'),
            "all_items"             => __('الموضوعات', 'qi-theme'),
            "add_new"               => __('موضوع جديد', 'qi-theme'),
            "add_new_item"          => __('إضافة موضوع جديد', 'qi-theme'),
            "edit_item"             => __('تعديل موضوع', 'qi-theme'),
            "new_item"              => __('موضوع جديد', 'qi-theme'),
            "view_item"             => __('عرض الموضوع', 'qi-theme'),
            "search_items"          => __('بحث عن موضوع', 'qi-theme'),
            "not_found"             => __('لم نجد الموضوع', 'qi-theme'),
            "featured_image"        => __('صورة الموضوع', 'qi-theme'),
            "use_featured_image"    => __('استعملها ك صورة للموضوع', 'qi-theme'),
            "archives"              => __('أرشيف الموضوعات', 'qi-theme'),
            "insert_into_item"      => __('إضافة إلى الموضوع', 'qi-theme'),
            "uploaded_to_this_item" => __('المرفوع لهذا الموضوع', 'qi-theme'),
            "items_list"            => __('قائمة الموضوعات', 'qi-theme'),
        );
    }

    public function postTypeArgs(): array
    {
        return array(
            "label"               => __('الموضوعات', 'qi-theme'),
            "description"         => "موضوعات تصنيفات المعلومات",
            "public"              => true,
            "publicly_queryable"  => true,
            "show_ui"             => true,
            "show_in_rest"        => true,
            "rest_base"           => "info-details",
            "has_archive"         => "news-archive",
            'show_in_menu'        => 'edit.php',
            "exclude_from_search" => true,
            "capability_type"     => "post",
            "map_meta_cap"        => true,
            "hierarchical"        => false,
            "rewrite"             => array("slug" => "info-details", "with_front" => true),
            "query_var"           => true,
            "menu_position"       => 0,
            "menu_icon"           => "dashicons-media-text",
            "supports"            => array("title", "comments", "author"),
            "taxonomies"          => array("category"),
        );
    }

}
