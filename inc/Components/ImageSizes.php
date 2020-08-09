<?php


namespace QITheme\Components;


class ImageSizes extends \QITheme\Lib\Singleton
{

    protected function __construct()
    {
        parent::__construct();

        $this->setup();
    }


    public function setup()
    {
        set_post_thumbnail_size(150, 150, true);
        add_image_size('illdy-blog-list', 653, 435, true);
        add_image_size('illdy-widget-recent-posts', 70, 70, true);
        add_image_size('illdy-blog-post-related-articles', 240, 206, true);
        add_image_size('illdy-front-page-latest-news', 360, 213, true);
        add_image_size('illdy-front-page-testimonials', 127, 127, true);
        add_image_size('illdy-front-page-projects', 476, 476, true);
        add_image_size('illdy-front-page-person', 125, 125, true);
        add_image_size('info-of-the-day-image', 330, 300, true);
        add_image_size('illdy-info-post', 360, 360, false);
        add_image_size('illdy-info', 650, 650, true);
        add_image_size('illdy-info-large', 1000, 1000, true);
        add_image_size('large', 1000, 1000, false);
        add_image_size('illdy-image-cat', 270, 270, true);
        add_image_size('team-list-item', 485, 270, false);

    }


}
