<?php

namespace QITheme\ACF;

class AudioFields extends BaseFields {

    public function fields()
    {
        acf_add_local_field_group(array(
            'key' => 'group_596f648e6d656',
            'title' => 'audio fields',
            'fields' => array(
                array(
                    'key' => 'field_57421cca56e8c',
                    'label' => 'رابط الساوند كلاود',
                    'name' => 'sc_link',
                    'type' => 'text',
                    'instructions' => 'رابط المقطع الصوتي على الساوند كلاود',
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
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'audio',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(),
            'active' => 1,
            'description' => '',
        ));

    }
}
