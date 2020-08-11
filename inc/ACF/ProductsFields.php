<?php

namespace QITheme\ACF;

class ProductsFields extends BaseFields {

    public function fields()
    {
        acf_add_local_field_group(array(
            'key' => 'group_59e507d37ee42',
            'title' => 'تفاصيل المنتج',
            'fields' => array(
                array(
                    'key' => 'field_59e507f1dc251',
                    'label' => 'لون الخلفية',
                    'name' => 'bg_color',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'products',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));


    }
}
