<?php


class Helpers
{
    public static function get_image_id($image_url)
    {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
        return $attachment[0];
    }

    public static function view(string $template, array $vars = [])
    {
        extract($vars);
        include('views/' . $template . '.php');
    }

    public static function is_avi()
    {
        return is_page_template('page-templates/infos.php') ||
            is_page_template('page-templates/audio.php') || is_page_template('page-templates/videos.php') ||
            get_query_var('cat') != '';
    }

    public static function is_photos() {
        return is_page_template('page-templates/photos.php');
    }

    public static function is_lectures()
    {
        return basename(get_page_template()) === 'lectures.php';
    }

}