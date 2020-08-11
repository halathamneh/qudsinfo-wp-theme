<?php


namespace QITheme\Components\ThemeSettings;

use QITheme\Helpers;
use QITheme\Lib\Singleton;

/**
 * Class ThemeSettings
 * @package QITheme
 */
class ThemeSettings extends Singleton
{

    public static $slug = 'qudsinfo-settings';
    private const DEFAULT_TAB = 'services';

    protected function __construct()
    {
        parent::__construct();
        add_action('admin_menu', [$this, 'register_admin_pages']);

        ServicesSettings::getInstance();
    }

    public function getTitle()
    {
        return __('Qudsinfo Settings', 'qi-theme');
    }

    public function register_admin_pages()
    {
        add_menu_page(
            $this->getTitle(),
            $this->getTitle(),
            'edit_posts',
            self::$slug,
            array($this, 'render_admin_page'),
            'dashicons-groups', 30);
    }

    public function getCurrentTabName()
    {
        if(!isset($_GET['tab']) || $_GET['tab'] === '') return self::DEFAULT_TAB;
        return $_GET['tab'];
    }

    public function getTabs()
    {
        return [
            'services' => [
                'title'    => __('Our Services', 'qi-theme'),
                'instance' => ServicesSettings::getInstance(),
                'active'   => 'services' === $this->getCurrentTabName(),
            ],
        ];
    }

    public function getActiveTab()
    {
        $tab = $this->getCurrentTabName();
        return $this->getTabs()[$tab];
    }

    public function render_admin_page()
    {
        $data = [
            'title'     => $this->getTitle(),
            'tabs'      => $this->getTabs(),
            'activeTab' => $this->getActiveTab(),
        ];

        Helpers::view('qudsinfo-settings', $data);
    }


}
