<?php

namespace QITheme\Sidebars;

use QITheme\Lib\Singleton;

class Sidebars extends Singleton {

    public static function register()
    {
        self::getInstance();
    }

    protected function __construct()
    {
        parent::__construct();

        add_action('widgets_init', [$this, 'registerSidebars']);

    }

    public function registerSidebars()
    {

        // Blog Sidebar
        register_sidebar(array(
            'name'          => __('Blog Sidebar', 'qi-theme'),
            'id'            => 'blog-sidebar',
            'description'   => __('The widgets added in this sidebar will appear in blog page.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        register_sidebar(array(
            'name'          => __('Info Page', 'qi-theme'),
            'id'            => 'infos-page',
            'description'   => __('The widgets added in this sidebar will appear in blog page.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        // Footer Sidebar 1
        register_sidebar(array(
            'name'          => __('Footer Sidebar 1', 'qi-theme'),
            'id'            => 'footer-sidebar-1',
            'description'   => __('The widgets added in this sidebar will appear in first block from footer.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        // Footer Sidebar 2
        register_sidebar(array(
            'name'          => __('Footer Sidebar 2', 'qi-theme'),
            'id'            => 'footer-sidebar-2',
            'description'   => __('The widgets added in this sidebar will appear in second block from footer.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        // Footer Sidebar 3
        register_sidebar(array(
            'name'          => __('Footer Sidebar 3', 'qi-theme'),
            'id'            => 'footer-sidebar-3',
            'description'   => __('The widgets added in this sidebar will appear in third block from footer.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h3>',
            'after_title'   => '</h3></div>',
        ));

        // About Sidebar
        register_sidebar(array(
            'name'          => __('Front page - About Sidebar', 'qi-theme'),
            'id'            => 'front-page-about-sidebar',
            'description'   => __('The widgets added in this sidebar will appear in about section from front page.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-0 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ));

        // Projects Sidebar
        register_sidebar(array(
            'name'          => __('Front page - Projects Sidebar', 'qi-theme'),
            'id'            => 'front-page-projects-sidebar',
            'description'   => __('The widgets added in this sidebar will appear in projects section from front page.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="col-sm-3 col-xs-6 no-padding %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ));

        // Services Sidebar
        register_sidebar(array(
            'name'          => __('Front page - Services Sidebar', 'qi-theme'),
            'id'            => 'front-page-services-sidebar',
            'description'   => __('The widgets added in this sidebar will appear in services section from front page.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-4 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ));

        // Counter Sidebar
        register_sidebar(array(
            'name'          => __('Front page - Counter Sidebar', 'qi-theme'),
            'id'            => 'front-page-counter-sidebar',
            'description'   => __('The widgets added in this sidebar will appear in counter section from front page.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="col-sm-4 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ));

        // Team Sidebar
        register_sidebar(array(
            'name'          => __('Front page - Team Sidebar', 'qi-theme'),
            'id'            => 'front-page-team-sidebar',
            'description'   => __('The widgets added in this sidebar will appear in team section from front page.', 'qi-theme'),
            'before_widget' => '<div id="%1$s" class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ));
    }
}
