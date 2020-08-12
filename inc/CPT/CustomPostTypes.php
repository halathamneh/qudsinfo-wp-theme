<?php


namespace QITheme\CPT;


class CustomPostTypes
{
    public static function register()
    {
        InfoDetailsPostType::getInstance();
        NewsPostType::getInstance();
        PhotosPostType::getInstance();
        BooksPostType::getInstance();
        WallpapersPostType::getInstance();
        AudioPostType::getInstance();
        VideoPostType::getInstance();
        FaqPostType::getInstance();
        ProductsPostType::getInstance();
        BlogPostType::getInstance();
    }
}
