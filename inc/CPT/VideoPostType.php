<?php


namespace QITheme\CPT;



class VideoPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "videos";
    }

    protected function postTypeLabels(): array
    {
        return array(
            "name" => __( 'المعلومات المرئية', 'qi-theme' ),
            "singular_name" => __( 'معلومة مرئية', 'qi-theme' ),
        );
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'المعلومات المرئية', 'qi-theme' ),
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "videos",
            "has_archive" => true,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => true,
            "rewrite" => array( "slug" => "videos", "with_front" => true ),
            "query_var" => true,
            "menu_position" => 5,
            "menu_icon" => "dashicons-video-alt3",
            "supports" => array( "title", "editor", "comments", "thumbnail" ),
        );
    }

}
