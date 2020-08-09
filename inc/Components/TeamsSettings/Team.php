<?php

namespace QITheme\Components\TeamsSettings;

abstract class Team
{

    private $fieldRenderer;
    protected $title;
    protected $prefix;
    private $pagesList;

    private $fields = [];

    public function __construct()
    {
        $this->fieldRenderer = [$this, 'teams_render_settings_field'];
        $this->prepareFields();
    }

    protected function prepareFields()
    {
        $this->extraFields();
        $this->pageInput();
        $this->descriptionInput();
    }

    public function getTitle()
    {
        return __($this->title, 'qi-theme');
    }

    public function registerAndBuildFields()
    {
        add_settings_section(
            $this->prefix . 'section',
            $this->getTitle(),
            array($this, 'renderSubtitle'),
            $this->prefix . 'settings'
        );

        foreach ($this->fields as $field) {
            $this->registerField($field);
        }
    }

    protected function extraFields()
    {
    }

    protected function renderSubtitle()
    {
        return '';
    }

    public function getFields()
    {
        return $this->fields;
    }

    protected function addField($fieldArgs)
    {
        $args = array(
            'type'             => $fieldArgs['type'] ?? 'input',
            'subtype'          => $fieldArgs['subtype'] ?? '',
            'id'               => $this->prefix . $fieldArgs['id'],
            'name'             => $this->prefix . $fieldArgs['id'],
            'title'            => $fieldArgs['title'],
            'required'         => isset($fieldArgs['required']) ? 'required' : '',
            'get_options_list' => $fieldArgs['get_options_list'] ?? [],
            'value_type'       => $fieldArgs['value_type'] ?? 'normal',
            'wp_data'          => $fieldArgs['wp_data'] ?? 'option',
            'api_field'        => $fieldArgs['api_field'] ?? $fieldArgs['id'],
            'lang'             => $fieldArgs['lang'] ?? false,
        );
        $this->fields[] = $args;
    }

    protected function registerField($args)
    {

        add_settings_field(
            $args['id'],
            __($args['title'], 'qi-theme'),
            $this->fieldRenderer,
            $this->prefix . 'settings',
            $this->prefix . 'section',
            $args
        );

        register_setting(
            $this->prefix . 'settings',
            $args['id']
        );

    }

    public function pageInput()
    {
        $this->addField(array(
            'id'        => 'ar_page_link_setting',
            'api_field' => 'pageLink',
            'lang'      => 'ar',
            'title'     => 'Arabic Page',
            'type'      => 'select',
            'subtype'   => 'page',
            'required'  => true,
        ));

        $this->addField(array(
            'id'        => 'en_page_link_setting',
            'api_field' => 'pageLink',
            'lang'      => 'en',
            'title'     => 'English Page',
            'type'      => 'select',
            'subtype'   => 'page',
            'required'  => true,
        ));
    }


    public function descriptionInput()
    {
        $this->addField(array(
            'id'        => 'ar_description_setting',
            'api_field' => 'description',
            'lang'      => 'ar',
            'title'     => 'Arabic Description',
            'type'      => 'textarea',
        ));
        $this->addField(array(
            'id'        => 'en_description_setting',
            'api_field' => 'description',
            'lang'      => 'en',
            'title'     => 'English Description',
            'type'      => 'textarea',
        ));
    }


    public function teams_render_settings_field($args)
    {

        $value = $this->getFieldValue($args);

        switch ($args['type']) {

            case 'input':
                $this->renderInputType($args, $value);
                break;
            case 'select':
                $this->renderSelectType($args, $value);
                break;
            case 'textarea':
                $this->renderTextareaType($args, $value);
                break;
            default:
                # code...
                break;
        }
    }

    private function renderInputType($args, $value)
    {
        if ($args['subtype'] != 'checkbox') {
            $prependStart = (isset($args['prepend_value'])) ? '<div class="input-prepend"> <span class="add-on">' . $args['prepend_value'] . '</span>' : '';
            $prependEnd = (isset($args['prepend_value'])) ? '</div>' : '';
            $step = (isset($args['step'])) ? 'step="' . $args['step'] . '"' : '';
            $min = (isset($args['min'])) ? 'min="' . $args['min'] . '"' : '';
            $max = (isset($args['max'])) ? 'max="' . $args['max'] . '"' : '';
            if (isset($args['disabled'])) {
                echo $prependStart . '<input type="' . $args['subtype'] . '" id="' . $args['id'] . '_disabled" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '_disabled" size="40" disabled value="' . esc_attr($value) . '" /><input type="hidden" id="' . $args['id'] . '" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '" size="40" value="' . esc_attr($value) . '" />' . $prependEnd;
            } else {
                echo $prependStart . '<input type="' . $args['subtype'] . '" id="' . $args['id'] . '" ' . $args['required'] . ' ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '" size="40" value="' . esc_attr($value) . '" />' . $prependEnd;
            }
        } else {
            $checked = ($value) ? 'checked' : '';
            echo '<input type="' . $args['subtype'] . '" id="' . $args['id'] . '" ' . $args['required'] . ' name="' . $args['name'] . '" size="40" value="1" ' . $checked . ' />';
        }
    }

    private function renderSelectType($args, $value)
    {
        if ($args['subtype'] == 'page') {
            $values = $this->getPagesList();
        } else {
            $values = $this->isAssocArray($args['get_options_list']) ? $args['get_options_list'] : [];
        }
        echo '<select id="' . $args['id'] . '" "' . $args['required'] . '" name="' . $args['name'] . '">';
        foreach ($values as $key => $text) {
            echo '<option value="' . $key . '" ' . ($value == $key ? 'selected' : '') . '>' . $text . '</option>';
        }
        echo '</select>';
    }

    private function renderTextareaType($args, $value)
    {

        echo '<textarea id="' . $args['id'] . '" "' . $args['required'] . '" name="' . $args['name'] . '" cols="60" rows="6">' . esc_html($value) . '</textarea>';

    }

    private function isAssocArray($array)
    {
        // bail ealry if not array
        if (!is_array($array)) return false;
        // loop
        foreach ($array as $key => $value) {
            // bail ealry if is string
            if (is_string($key)) return true;
        }
        // return
        return false;
    }


    private function getPagesList()
    {
        if (!empty($this->pagesList)) return $this->pagesList;

        $pages = get_pages();
        $out = ['' => '--- Select ---'];
        foreach ($pages as $page) {
            $out[get_page_link($page->ID)] = $page->post_title;
        }
        $this->pagesList = $out;
        return $out;
    }

    private function getFieldValue($field)
    {
        $wp_data_value = '';
        if ($field['wp_data'] == 'option') {
            $wp_data_value = get_option($field['name']);
        } elseif ($field['wp_data'] == 'post_meta') {
            $wp_data_value = get_post_meta($field['post_id'], $field['name'], true);
        }
        return ($field['value_type'] == 'serialized') ? serialize($wp_data_value) : $wp_data_value;

    }

    public function getSettingsForAPI($lang = 'ar')
    {
        $defaultFields = ['pageLink', 'description'];
        $out = [
            'title' => $this->title,
            'stats' => [],
        ];
        foreach ($this->fields as $field) {
            if (is_string($field['lang']) && $field['lang'] != $lang) continue;
            $name = $field['api_field'];
            $value = $this->getFieldValue($field);
            if (in_array($name, $defaultFields))
                $out[$name] = $value;
            else
                $out['stats'][] = [
                    'name'   => $name,
                    'number' => $value,
                ];
        }
        return $out;
    }

}
