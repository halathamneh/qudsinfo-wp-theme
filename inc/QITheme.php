<?php

namespace QITheme;

use QITheme\Components\{Extras,
    ImageSizes,
    InfosHandler,
    Pagination,
    RelatedPosts,
    SearchFilter,
    TeamsSettings\TeamsSettings,
    NewsBar,
    ThemeSettings\ThemeSettings,
    TodayInfo};
use QITheme\ACF\ACF;
use QITheme\CPT\CustomPostTypes;
use QITheme\Lib\Singleton;
use QITheme\Sidebars\Sidebars;
use QITheme\Widgets\Widgets;

class QITheme extends Singleton
{

    protected function __construct()
    {
        parent::__construct();

        add_action('after_setup_theme', [$this, 'setup']);
    }

    public function setup()
    {
        // language
        $this->loadTextDomain();

        Extras::getInstance();
        
        Widgets::register();
        Sidebars::register();
        Assets::register();
        CustomPostTypes::register();
        ACF::register();

        // components
        ThemeSettings::getInstance();
        TeamsSettings::getInstance();
        SearchFilter::getInstance();
        Pagination::getInstance();
        RelatedPosts::getInstance();
        ImageSizes::getInstance();
        NewsBar::getInstance();
        TodayInfo::getInstance();
        InfosHandler::getInstance();

    }

    public function loadTextDomain()
    {
        // Load Theme Textdomain
        load_theme_textdomain('qi-theme', get_template_directory() . '/languages');
    }



}
