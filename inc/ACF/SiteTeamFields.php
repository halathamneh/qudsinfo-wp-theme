<?php

namespace QITheme\ACF;

define('SITE_POSITIONS', [
    'photographer' => __('Photographer', 'qi-theme'),// 'مصور معالم',
    'developer'    => __("Main Website Developer", 'qi-theme'),// 'مبرمج ومصمم الموقع',
    'editor'       => __("Content Editor", 'qi-theme'), // 'محرر ومنسق محتوى',
    'news'         => __("News Publisher", 'qi-theme'), // 'ناشر أخبار',
]);

class SiteTeamFields extends BaseFields
{

    public function fields()
    {
        acf_add_local_field_group(array(
            'key'                   => 'group_5c17f3a268c70',
            'title'                 => 'فريق عمل الموقع',
            'fields'                => array(
                array(
                    'key'               => 'field_5c17f3d93c8fd',
                    'label'             => 'أعضاء فريق الموقع',
                    'name'              => 'members',
                    'type'              => 'repeater',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'collapsed'         => 'field_5c17f4733c8fe',
                    'min'               => 0,
                    'max'               => 0,
                    'layout'            => 'table',
                    'button_label'      => 'إضافة عضو',
                    'sub_fields'        => array(
                        array(
                            'key'               => 'field_5c17f4733c8fe',
                            'label'             => 'اسم العضو',
                            'name'              => 'name',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 1,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => '',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                        array(
                            'key'               => 'field_5c17f48f3c8ff',
                            'label'             => 'الوظيفة',
                            'name'              => 'job',
                            'type'              => 'select',
                            'instructions'      => '',
                            'required'          => 1,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'choices'           => SITE_POSITIONS,
                            'default_value'     => array(),
                            'allow_null'        => 0,
                            'multiple'          => 0,
                            'ui'                => 0,
                            'return_format'     => 'value',
                            'ajax'              => 0,
                            'placeholder'       => '',
                        ),
                        array(
                            'key'               => 'field_5c17f533727e2',
                            'label'             => 'صورة',
                            'name'              => 'picture',
                            'type'              => 'image',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'return_format'     => 'url',
                            'preview_size'      => 'thumbnail',
                            'library'           => 'uploadedTo',
                            'min_width'         => '',
                            'min_height'        => '',
                            'min_size'          => '',
                            'max_width'         => '',
                            'max_height'        => '',
                            'max_size'          => '',
                            'mime_types'        => '',
                        ),
                        array(
                            'key'               => 'field_5c17f4733c8aa',
                            'label'             => 'للتواصل',
                            'name'              => 'contact',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => '',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                    ),
                ),
            ),
            'location'              => array(
                array(
                    array(
                        'param'    => 'post_template',
                        'operator' => '==',
                        'value'    => 'page-templates/team.php',
                    ),
                ),
            ),
            'menu_order'            => 0,
            'position'              => 'acf_after_title',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => 1,
            'description'           => '',
        ));

    }
}
