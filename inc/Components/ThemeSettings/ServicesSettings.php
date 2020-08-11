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
                'ar' => false,
                'en' => false,
            ],
            'news' => [
                'title' => __('News', 'qi-theme'),
                'ar' => false,
                'en' => false,
            ],
            'library' => [
                'title' => __('Library', 'qi-theme'),
                'ar' => false,
                'en' => false,
            ],
            'know_quds' => [
                'title' => __('Closer to Jerusalem', 'qi-theme'),
                'ar' => false,
                'en' => false,
            ],
            'quizzes' => [
                'title' => __('Quizzes', 'qi-theme'),
                'ar' => false,
                'en' => false,
            ],
            'landmarks' => [
                'title' => __('Landmarks', 'qi-theme'),
                'ar' => false,
                'en' => false,
            ],
            'aqsa_distance' => [
                'title' => __('Aqsa Distance', 'qi-theme'),
                'ar' => false,
                'en' => false,
            ],
            'wallpapers' => [
                'title' => __('Wallpapers', 'qi-theme'),
                'ar' => false,
                'en' => false,
            ],
            'onthisday' => [
                'title' => __('On this day', 'qi-theme'),
                'ar' => false,
                'en' => false,
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
            $services[$name]['ar'] = isset($service['ar']) && $service['ar'] == 'on';
            $services[$name]['en'] = isset($service['en']) && $service['en'] == 'on';
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
