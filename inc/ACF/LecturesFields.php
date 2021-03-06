<?php

namespace QITheme\ACF;

class LecturesFields extends BaseFields {

    public function fields()
    {
        acf_add_local_field_group(array(
            'key' => 'group_5a77fcad3b0d9',
            'title' => 'المحاضرات',
            'fields' => array(
                array(
                    'key' => 'field_5a77fcba419ae',
                    'label' => 'عنوان فرعي',
                    'name' => 'subtitle',
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
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-templates/lectures.php',
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

        acf_add_local_field_group(array(
            'key' => 'group_596f648e80ec2',
            'title' => 'فريق المحاضرات',
            'fields' => array(
                array(
                    'key' => 'field_57544577d06af',
                    'label' => 'عدد المحاضرات',
                    'name' => 'numlects',
                    'type' => 'number',
                    'instructions' => 'عدد المحاضرات التي تم إعطاءها',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 5,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 0,
                    'max' => '',
                    'step' => 1,
                ),
                array(
                    'key' => 'field_575445e0d06b0',
                    'label' => 'عدد الساعات',
                    'name' => 'numhours',
                    'type' => 'number',
                    'instructions' => 'مجموع الساعات التي تم إعطاءها من قبل الفريق',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 3,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 0,
                    'max' => '',
                    'step' => 1,
                ),
                array(
                    'key' => 'field_57544649d06b1',
                    'label' => 'مجموع اعداد الحضور',
                    'name' => 'aud_sum',
                    'type' => 'number',
                    'instructions' => 'مجموع اعداد حضور جميع المحاضرات',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 1,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 0,
                    'max' => '',
                    'step' => 1,
                ),
                array(
                    'key' => 'field_59e2558eac455',
                    'label' => 'رقم التواصل مع الفريق',
                    'name' => 'phone_num',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
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
                    'key' => 'field_59e25aa5eac455',
                    'label' => 'البريد الإلكتروني',
                    'name' => 'email_add',
                    'type' => 'email',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
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
                    'key' => 'field_5a22x9870c519',
                    'label' => 'أهداف الفريق',
                    'name' => 'goals',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => 'field_5a63ax65d3591',
                    'min' => 1,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => 'إضافة هدف',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5a63ax65d3591',
                            'label' => 'نص الهدف',
                            'name' => 'goal_name',
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
                    ),
                ),
                array(
                    'key' => 'field_5a63a9870c519',
                    'label' => 'ماذا نقدم؟',
                    'name' => 'offers',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => 'field_5a63aa65d3591',
                    'min' => 1,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => 'إضافة خدمة',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5a63aa65d3591',
                            'label' => 'اسم الخدمة',
                            'name' => 'service_name',
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
                            'key' => 'field_5a63ab77446f5',
                            'label' => 'وصف صغير',
                            'name' => 'short_desc',
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
                    ),
                ),
                array(
                    'key' => 'field_596f5a0aaf9f9',
                    'label' => 'صور المحاضرات',
                    'name' => 'gallery',
                    'type' => 'gallery',
                    'instructions' => 'ارفع صور محاضرات معلومة مقدسية السابقة هنا',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'min' => '',
                    'max' => '',
                    'insert' => 'append',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5a7b545a71ee7',
                    'label' => 'مادة المحاضرات',
                    'name' => 'material',
                    'type' => 'file',
                    'instructions' => 'ارفع ملف مادة المحاضرات هنا',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'library' => 'uploadedTo',
                    'min_size' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5a7b5745832dd',
                    'label' => 'رابط الانضمام',
                    'name' => 'join_link',
                    'type' => 'page_link',
                    'instructions' => 'اختر صفحة الانضمام لفريق المحاضرات',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array(
                        0 => 'page',
                    ),
                    'taxonomy' => array(),
                    'allow_null' => 0,
                    'allow_archives' => 1,
                    'multiple' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-templates/lectures.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'field',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

    }
}
