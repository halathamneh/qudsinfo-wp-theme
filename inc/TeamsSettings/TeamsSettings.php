<?php

namespace QITheme\TeamsSettings;

use QITheme\Helpers;

class TeamsSettings
{
    private static $instance;

    public $plugin_name = 'teams-settings';

    /** @var Team[] */
    private $teams = [];

    protected function __construct()
    {
        $this->teams = [
            'media'    => new MediaTeam(),
            'lectures' => new LecturesTeam(),
            'content'  => new ContentTeam(),
            'news'     => new NewsTeam(),
        ];

        add_action('admin_post_setTeamsSettings', [$this, 'setTeamsSettings']);
        add_action('admin_menu', [$this, 'register_admin_pages']);
        add_action('admin_init', array($this, 'registerAndBuildFields'));
        add_action('rest_api_init', [$this, 'registerToApi']);
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (!isset(static::$instance) || !(static::$instance instanceof self)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * @return Team[]
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @return Team
     */
    public function getTeam($name)
    {
        return $this->teams[$name];
    }

    public function register_admin_pages()
    {
        add_menu_page(
            __('Qudsinfo Teams', 'qi-theme'),
            'Qudsinfo Teams',
            'edit_posts',
            $this->plugin_name,
            array($this, 'render_admin_page'),
            'dashicons-groups', 30);

    }

    public function render_admin_page()
    {
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'media';
        if (isset($_GET['error_message'])) {
            add_action('admin_notices', array($this, 'TeamsSettingsMessages'));
            do_action('admin_notices', $_GET['error_message']);
        }
        $data = [
            'title' => esc_html(get_admin_page_title()),
            'tab'   => $active_tab,
            'teams' => $this->teams,
        ];

        Helpers::view('teams-settings', $data);
    }

    public function TeamsSettingsMessages($error_message)
    {
        switch ($error_message) {
            case '1':
                $message = __('There was an error adding this setting. Please try again.  If this persists, shoot us an email.', 'qi-theme');
                $err_code = esc_attr('plugin_name_example_setting');
                $setting_field = 'plugin_name_example_setting';
                break;
        }
        $type = 'error';
        add_settings_error(
            $setting_field,
            $err_code,
            $message,
            $type
        );
    }

    public function registerAndBuildFields()
    {

        foreach ($this->teams as $team) {
            $team->registerAndBuildFields();
        }

    }

    function registerToApi()
    {
        try {
            global $qudsinfoWpApi;
            if (!($qudsinfoWpApi instanceof \QWA\QudsinfoWpApi)) {
                throw new \Exception('Qudsinfo API is not found!');
            }
            $todayInfoEndpoint = new \QWA\lib\EndPoint([
                'path'     => '/teams/',
                'method'   => 'GET',
                'callback' => [$this, 'getTeamsApi'],
            ]);
            $qudsinfoWpApi->registerCustomEndPoint('v2', $todayInfoEndpoint);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function getTeamsApi(\WP_REST_Request $request)
    {
        $lang = $request->get_header('Accept-Language') ?? 'ar';

        $data = [];
        foreach ($this->teams as $name => $team) {
            $data[$name] = $team->getSettingsForAPI($lang);
        }

        return new \QWA\v2\Response($data, 200);
    }


}

