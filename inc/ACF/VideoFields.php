<?php


namespace QITheme\ACF;


class VideoFields extends BaseFields
{
    public function fields()
    {
        acf_add_local_field_group(array(
            'key' => 'group_596f648e9096b',
            'title' => 'Video Fields',
            'fields' => array(
                array(
                    'key' => 'field_5743702d5ee89',
                    'label' => 'رابط الفيديو',
                    'name' => 'yt_link',
                    'type' => 'text',
                    'instructions' => 'رابط الفيديو من اليوتيوب',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'videos',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(),
            'active' => 1,
            'description' => '',
        ));
    }
}
