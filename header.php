<?php
/**
 *    The template for displaying the header.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php
$img_logo = get_theme_mod('qi-theme_img_logo', esc_url(get_template_directory_uri() . '/layout/images/header-logo.png'));
$text_logo = get_theme_mod('qi-theme_text_logo', __('qi-theme', 'qi-theme'));
$jumbotron_general_image = get_theme_mod('qi-theme_jumbotron_general_image', esc_url(get_template_directory_uri() . '/layout/images/front-page/front-page-header.png'));
$preloader_enable = get_theme_mod('qi-theme_preloader_enable', 1);
$category = get_query_var('cat') != '' ? get_query_var('cat') : 0;
$object = $wp_query->get_queried_object();
if (is_search())
    $title = esc_html__(get_search_query() . " - Search Results", 'qi-theme');
elseif ($object instanceof WP_Term)
    $title = single_term_title('', false) . ' - ' . get_bloginfo('name');
else
    $title = get_the_title() . ' - ' . get_bloginfo('name');
if (\QITheme\Helpers::is_avi() && $category)
    $title = get_term($category)->name . " - " . $title;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        .blackwhite header *, .blackwhite section, .blackwhite footer,
        .blackwhite .onthisday *, .blackwhite .parallax-mirror, .blackwhite .fancybox-container {
            -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
            filter: grayscale(100%);
        }

        .blackwhite #onthisday {
            background: #333;
        }
    </style>
</head>
<body <?php body_class(); ?>>

<?php if ($preloader_enable == 1): ?>
    <div class="pace-overlay"></div>
<?php endif; ?>


<?php

$header_classes = "";
$header_attr = "";

if (!is_404()) {

    if (is_front_page())
        $header_classes .= 'header-front-page';
    else
        $header_classes .= 'header-blog';


    $no_header = get_field('no_header');
    if ($no_header)
        $header_classes .= ' small-header';

    if (!wp_is_mobile()) $header_classes .= ' not-mobile';
}
?>

<header id="header" class="sticky page-start <?= $header_classes ?>"
    <?= $header_attr ?> >
    <div class="top-header fixed transparent-nav">
        <div id="header-component"></div>
    </div><!--/.top-header-->
    <?php
    get_template_part('template-parts/header', 'responsive-menu');
    ?>

</header><!--/#header-->
