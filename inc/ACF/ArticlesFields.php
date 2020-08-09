<?php

namespace QITheme\ACF;

class ArticlesFields extends BaseFields {

    public function fields()
    {
        acf_add_local_field_group(array(
            'key' => 'group_59dbba6db00bd',
            'title' => 'الموضوعات',
            'fields' => array(
                array(
                    'key' => 'field_59dbbb2d90387',
                    'label' => 'التصنيف',
                    'name' => 'category',
                    'type' => 'taxonomy',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'taxonomy' => 'category',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'object',
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_59dbba7f90384',
                    'label' => 'الفقرات',
                    'name' => 'paragraphs',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'row',
                    'button_label' => 'إضافة فقرة',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_59dbbaae90385',
                            'label' => 'العنوان',
                            'name' => 'title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
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
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_59dbbadd90386',
                            'label' => 'نص الفقرة',
                            'name' => 'text',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'tabs' => 'visual',
                            'toolbar' => 'basic',
                            'media_upload' => 0,
                            'delay' => 0,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'info-details',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

    }
}
