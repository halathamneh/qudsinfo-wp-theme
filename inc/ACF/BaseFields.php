<?php


namespace QITheme\ACF;


abstract class BaseFields extends \QITheme\Lib\Singleton
{
    protected function __construct()
    {
        parent::__construct();

        add_action('acf/init', [$this, 'fields']);

    }

    abstract public function fields();
}
