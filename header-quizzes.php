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
$text_logo = get_theme_mod('illdy_text_logo', __('qi-theme', 'qi-theme'));
$jumbotron_general_image = get_theme_mod('illdy_jumbotron_general_image', esc_url(get_template_directory_uri() . '/layout/images/front-page/front-page-header.png'));
$preloader_enable = get_theme_mod('illdy_preloader_enable', 1);
$category = get_query_var('cat') != '' ? get_query_var('cat') : 0;
$object = $wp_query->get_queried_object();
if (is_search())
    $title = esc_html__(get_search_query() . " - نتائج البحث");
elseif($object instanceof WP_Term)
    $title = single_term_title('', false) . ' - ' . get_bloginfo('name');
else
    $title = get_the_title() . ' - ' . get_bloginfo('name');
if (Helpers::is_avi() && $category)
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

<?php $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>

<?php

$header_classes = "";
$header_attr = "";
$overlay_attr = "";
if (!is_404()) {
    if (is_front_page()):
        global $FP;
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($FP->today_info->ID), 'large');
        $image_bg = $image[0];
    elseif (function_exists('z_taxonomy_image_url') && !empty($image = z_taxonomy_image_url())) :
        $image_bg = $image;
    elseif (has_post_thumbnail())://(get_post_type() == 'news' || get_post_type() == 'pics'):
        $image_bg = esc_url($post_thumbnail[0]);
    else:
        $rand_image = get_rnd_header_image();
        $image_bg = esc_url($rand_image["img_url"]);
    endif;

    if (is_front_page())
        $header_classes .= 'header-front-page';
    else
        $header_classes .= 'header-blog';


    $no_header = get_field('no_header');
    if ($no_header)
        $header_classes .= ' small-header';
    else {
        if (!Helpers::is_lectures() && !(get_post_type() == 'pics' && is_single()) || is_search()) {
            $header_attr = ' data-parallax="scroll" data-image-src="' . $image_bg . '" ';
        } elseif (Helpers::is_lectures()) {
            $header_attr = ' style="background-image: url(' . $image_bg . ')"';
        }
        if (is_front_page()) {
            $overlay_attr = ' style="background-image: url(\'' . get_template_directory_uri() . '/layout/images/patterns/footer.png\')" ';
        }
    }
    if (!wp_is_mobile()) $header_classes .= ' not-mobile';
}
?>

<header id="header" class="sticky page-start <?= $header_classes ?>"
    <?= $header_attr ?> >
    <div class="header-overlay" <?= $overlay_attr ?>></div>
    <div class="top-header fixed transparent-nav">
        <div class="container">
            <div class="d-flex">
                <div class="logo-image">
                    <?php if ($img_logo): ?>
                        <a href="<?php echo esc_url(home_url()); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="header-logo"><img
                                    src="<?php echo esc_url($img_logo); ?>"
                                    alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                                    title="<?php echo esc_attr(get_bloginfo('name')); ?>"/></a>
                    <?php else: ?>
                        <a href="<?php echo esc_url(home_url()); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name')); ?>"
                           class="header-logo"><?php echo illdy_sanitize_html($text_logo); ?></a>
                    <?php endif; ?>
                </div><!--/.col-sm-2-->
                <div class="mr-auto">
                    <?php
                    get_template_part('template-parts/header', 'top-nav');
                    ?>
                </div><!--/.col-sm-10-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.top-header-->
    <nav class="responsive-menu">
        <div class="responsive-menu-overlay"></div>
        <div class="responsive-menu-content">
            <form role="search" method="get" class="search-form responsive-menu-search"
                  action="<?php echo home_url('/'); ?>">
                <?php
                $placeholder = esc_attr_x('بحث...', 'placeholder', 'qi-theme'); ?>
                <input type="search" id="s"
                       placeholder="<?php echo $placeholder; ?>"
                       value="<?php echo esc_attr(get_search_query()); ?>" name="s"
                       title="<?php echo esc_attr_x('بحث عن:', 'label', 'qi-theme'); ?>"/>
                <span class="sbutton"><i class="fa fa-search"></i></span>
            </form><!--/.search-form-->
            <ul>
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'primary-menu',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'items_wrap'      => '%3$s',
                    'walker'          => new MTL_Extended_Menu_Walker(),
                    'fallback_cb'     => 'MTL_Extended_Menu_Walker::fallback',
                ));
                ?>
            </ul>
        </div>
    </nav><!--/.responsive-menu-->
</header><!--/#header-->
