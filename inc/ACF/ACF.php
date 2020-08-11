<?php

namespace QITheme\ACF;

class ACF {

    public static function register()
    {
        AudioFields::getInstance();
        VideoFields::getInstance();
        SocialMediaFields::getInstance();
        LecturesFields::getInstance();
        ContentFields::getInstance();
        NewsTeamFields::getInstance();
        AboutusFields::getInstance();
        ArticlesFields::getInstance();
        BooksFields::getInstance();
        InfoFields::getInstance();
        LandmarksFields::getInstance();
        ProductsFields::getInstance();
        SiteTeamFields::getInstance();
        TeamsFields::getInstance();
        WallpapersFields::getInstance();
    }

}
