<?php


namespace QITheme\CPT;


class CustomPostTypes
{
    public static function register()
    {
        AudioPostType::getInstance();
        BlogPostType::getInstance();
        BooksPostType::getInstance();
        FaqPostType::getInstance();
        InfoDetailsPostType::getInstance();
        NewsPostType::getInstance();
        PhotosPostType::getInstance();
        ProductsPostType::getInstance();
        VideoPostType::getInstance();
        WallpapersPostType::getInstance();
    }
}
