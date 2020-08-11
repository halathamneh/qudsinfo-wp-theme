<?php


namespace QITheme;

define('LAYOUT_PATH', get_template_directory() . "/layout/");
define('LAYOUT_URI', get_template_directory_uri() . "/layout/");
define('ASSETS_FILENAME', "webpack-assets.json");

class Assets extends Lib\Singleton
{

    private $webpackAssets = null;

    public static function register()
    {
        self::getInstance();
    }

    protected function __construct()
    {
        parent::__construct();

        $this->loadWebpackAssets();

        add_filter('wp_default_scripts', [$this, 'dequeueJquery']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);

    }

    public function enqueue()
    {
        $this->CSS();
        $this->JS();
    }

    public function loadWebpackAssets()
    {
        $assetsPath = LAYOUT_PATH . ASSETS_FILENAME;
        if (file_exists($assetsPath)) {
            $json = file_get_contents($assetsPath);
            $this->webpackAssets = json_decode($json);
        }
    }

    public function CSS()
    {
        if(!is_null($this->webpackAssets)) {
            $cssFileURI = $this->webpackAssets->main->css;
        } else {
            $cssFilePath = glob(LAYOUT_PATH . 'dist/main.style.*.css');
            $cssFileURI = LAYOUT_URI . 'dist/' . basename($cssFilePath[0]);
        }
        wp_enqueue_style('qudsinfo-style', $cssFileURI);
    }

    public function JS()
    {
        wp_enqueue_script('masonry');

        if(!is_null($this->webpackAssets)) {
            $jsFileURI = $this->webpackAssets->main->js;
        } else {
            $jsFilePath = glob(LAYOUT_PATH . 'dist/main.bundle.*.js');
            $jsFileURI = LAYOUT_URI . 'dist/' . basename($jsFilePath[0]);
        }
        wp_enqueue_script('qudsinfo-scripts', $jsFileURI, [], null, true);
        wp_localize_script('qudsinfo-scripts', 'scripts_data', array(
            'ajaxurl'         => home_url() . '/wp-admin/admin-ajax.php',
            'isFront'         => is_front_page(),
            'page_title'      => get_the_title() . ' - ' . get_bloginfo('name'),
            'lang'            => $this->getLanguagesForJS(),
            'langCode'        => pll_current_language(),
            'translationUrls' => $this->getTranslationUrls(),
        ));
    }

    private function getLanguagesForJS() {
        return [
            'aqsa_distance.permission' => __("Please allow location permission to find your distance from Aqsa", 'qi-theme'),
            'aqsa_distance.enable_gps' => __("Please enable location to find your distance from Aqsa", 'qi-theme'),
            'aqsa_distance.error' => __("Something went wrong, please try again!", 'qi-theme'),
            'pleaseWait' => __("Please wait", 'qi-theme'),
            'km' => __("KM", 'qi-theme')
        ];
    }


    private function getTranslationUrls() {
        $translations = pll_the_languages(array('raw'=>1));
        $out = [];
        foreach ($translations as $translation) {
            $out[$translation['slug']] = $translation['url'];
        }
        return $out;
    }



    public function dequeueJquery(&$scripts)
    {
        if (!is_admin()) {
            $scripts->remove('jquery');
            $scripts->add('jquery', false, array('jquery-core'));
        }
    }

}
