<?php


namespace QITheme\Widgets;


use QITheme\Lib\Singleton;

class Widgets extends Singleton
{
    public static function register()
    {
        self::getInstance();
    }

    public function __construct()
    {
        parent::__construct();

        add_action( 'widgets_init', [$this, 'registerWidgetsClasses'] );

    }

    public function registerWidgetsClasses()
    {
        register_widget(FaqWidget::class);
        register_widget(RecentPostsWidget::class);
    }
}
