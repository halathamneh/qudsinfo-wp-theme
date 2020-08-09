<?php


namespace QITheme\Components\ThemeSettings;


use QITheme\Helpers;

class ServicesSettings extends \QITheme\Lib\Singleton
{
    private const SERVICES_OPTION_NAME = 'qi-theme_services';

    protected function __construct()
    {
        parent::__construct();

        add_action( 'admin_action_services_form', [$this, 'setServicesData'] );
        add_action('rest_api_init', [$this, 'registerToApi']);

    }

    private function defaultServices() {
        return [
            'our_info' => [
                'title' => __('Our Info', 'qi-theme'),
                'enable' => false,
            ],
            'news' => [
                'title' => __('News', 'qi-theme'),
                'enable' => false,
            ],
            'library' => [
                'title' => __('Library', 'qi-theme'),
                'enable' => false,
            ],
            'know_quds' => [
                'title' => __('Closer to Jerusalem', 'qi-theme'),
                'enable' => false,
            ],
            'quizzes' => [
                'title' => __('Quizzes', 'qi-theme'),
                'enable' => false,
            ],
            'landmarks' => [
                'title' => __('Landmarks', 'qi-theme'),
                'enable' => false,
            ],
            'aqsa_distance' => [
                'title' => __('Aqsa Distance', 'qi-theme'),
                'enable' => false,
            ],
            'wallpapers' => [
                'title' => __('Wallpapers', 'qi-theme'),
                'enable' => false,
            ],
            'onthisday' => [
                'title' => __('On this day', 'qi-theme'),
                'enable' => false,
            ],
        ];
    }

    public function render()
    {
        $data = [
            'services' => $this->getServicesData(),
        ];

        Helpers::view('services-tab', $data);
    }

    public function setServicesData()
    {
        $services = $_POST['services'];
        foreach ($services as $name => $service) {
            $services[$name]['enable'] = isset($service['enable']);
        }
        $data = array_replace_recursive($this->defaultServices(), $services);
        update_option(self::SERVICES_OPTION_NAME, $data);
        wp_redirect( $_SERVER['HTTP_REFERER'] );
        exit();
    }

    public function getServicesData()
    {
        return get_option(self::SERVICES_OPTION_NAME, $this->defaultServices());
    }

    function registerToApi()
    {
        try {
            global $qudsinfoWpApi;
            if (!($qudsinfoWpApi instanceof \QWA\QudsinfoWpApi)) {
                throw new \Exception('Qudsinfo API is not found!');
            }
            $servicesEndpoint = new \QWA\lib\EndPoint([
                'path'     => '/services/',
                'method'   => 'GET',
                'callback' => [$this, 'getServicesForApi'],
            ]);
            $qudsinfoWpApi->registerCustomEndPoint('v2', $servicesEndpoint);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function getServicesForApi()
    {
        return new \QWA\v2\Response($this->getServicesData(), 200);
    }

}
