<?php

namespace QITheme\ACF;

class NewsTeamFields extends BaseFields {

    public function fields()
    {
        acf_add_local_field_group(array(
            'key' => 'group_5c51f35614dcf',
            'title' => 'إنجازات فريق الأخبار',
            'fields' => array(
                array(
                    'key' => 'field_5c51f35e7479e',
                    'label' => 'عدد الأخبار',
                    'name' => 'news_count',
                    'type' => 'number',
                    'instructions' => 'عدد الأخبار التي تم نشرها',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 0,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_5c51f3c47479f',
                    'label' => 'عدد التقارير',
                    'name' => 'reports_count',
                    'type' => 'number',
                    'instructions' => 'عدد التقارير التي تم إعدادها',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 0,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-templates/news-team.php',
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
