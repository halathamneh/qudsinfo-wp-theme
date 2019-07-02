<?php
/**
 *    The template for displaying the header.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php
$img_logo = get_theme_mod('illdy_img_logo', esc_url(get_template_directory_uri() . '/layout/images/header-logo.png'));
$text_logo = get_theme_mod('illdy_text_logo', __('Illdy', 'illdy'));
$jumbotron_general_image = get_theme_mod('illdy_jumbotron_general_image', esc_url(get_template_directory_uri() . '/layout/images/front-page/front-page-header.png'));
$preloader_enable = get_theme_mod('illdy_preloader_enable', 1);
$category = get_query_var('cat') != '' ? get_query_var('cat') : 0;
$object = $wp_query->get_queried_object();
if (is_search())
    $title = esc_html__(get_search_query() . " - Search Results", 'illdy');
elseif($object instanceof WP_Term)
    $title = single_term_title('', false) . ' - ' . get_bloginfo('name');
else
    $title = get_the_title() . ' - ' . get_bloginfo('name');
if (is_avi() && $category)
    $title = get_term($category)->name . " - " . $title;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title><?= $title; ?></title>
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
                <div class="navigation-wrapper">
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
                $placeholder = esc_attr_x('Search...', 'placeholder', 'illdy'); ?>
                <input type="search" id="s"
                       placeholder="<?php echo $placeholder; ?>"
                       value="<?php echo esc_attr(get_search_query()); ?>" name="s"
                       title="<?php echo esc_attr_x('Search for:', 'label', 'illdy'); ?>"/>
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
