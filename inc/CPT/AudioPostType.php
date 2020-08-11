<?php


namespace QITheme\CPT;



class AudioPostType extends BaseCPT
{

    protected function postTypeName(): string
    {
        return "audio";
    }

    protected function postTypeLabels(): array
    {
        return array(
            "name" => __( 'المعلومات الصوتية', 'qi-theme' ),
            "singular_name" => __( 'معلومة صوتية', 'qi-theme' ),
        );
    }

    public function postTypeArgs(): array
    {
        return array(
            "label" => __( 'المعلومات الصوتية', 'qi-theme' ),
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "audios",
            "has_archive" => false,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "audio", "with_front" => true ),
            "query_var" => true,
            "menu_position" => 5,
            "menu_icon" => "dashicons-format-audio",
            "supports" => array( "title", "editor", "comments", "thumbnail" ),
        );
    }

}
