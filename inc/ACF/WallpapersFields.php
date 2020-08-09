<?php

namespace QITheme\ACF;

class WallpapersFields extends BaseFields {

    public function fields()
    {
        acf_add_local_field_group(array(
            'key' => 'group_5c5336e5473bc',
            'title' => 'الخلفيات',
            'fields' => array(
                array(
                    'key' => 'field_5c5336f9d2cff',
                    'label' => 'صورة سطح المكتب',
                    'name' => 'desktop',
                    'type' => 'image',
                    'instructions' => 'خلفية سطح المكتب',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'illdy-info',
                    'library' => 'uploadedTo',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5c533780d2cdd',
                    'label' => 'صورة الهاتف المحمول',
                    'name' => 'mobile',
                    'type' => 'image',
                    'instructions' => 'خلفية الموبايل',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'illdy-info',
                    'library' => 'uploadedTo',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'wallpapers',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

    }
}
