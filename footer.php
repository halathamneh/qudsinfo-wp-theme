<?php
/**
 *    The template for dispalying the footer.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>

<?php
$display_copyright = get_theme_mod('illdy_general_footer_display_copyright', 1);
$footer_copyright = get_theme_mod('illdy_footer_copyright', __('&copy; Copyright 2016. All Rights Reserved.', 'qi-theme'));
$img_footer_logo = get_theme_mod('illdy_img_footer_logo', esc_url(get_template_directory_uri() . '/layout/images/footer-logo.png'));
?>

<?= do_shortcode("[on-this-day]") ?>
<?php //get_template_part('template-parts/user','utils'); ?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <?php
            $the_widget_args = array(
                'before_widget' => '<div class="widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title"><h3>',
                'after_title'   => '</h3></div>',
            );
            ?>
            <div class="col-sm-3">
                <?php
                echo Helpers::polylang_languages();

                if ( is_active_sidebar('footer-sidebar-1') ):
                    dynamic_sidebar('footer-sidebar-1');
                else:
                    the_widget('WP_Widget_Text', 'title=' . __('Products', 'qi-theme') . '&text=<ul><li><a href="' . esc_url('#') . '" title="' . __('Our work', 'qi-theme') . '">' . __('Our work', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('Club', 'qi-theme') . '">' . __('Club', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('News', 'qi-theme') . '">' . __('News', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('Announcement', 'qi-theme') . '">' . __('Announcement', 'qi-theme') . '</a></li></ul>', $the_widget_args);
                endif;
                ?>
            </div><!--/.col-sm-3-->
            <div class="col-sm-3">
                <?php
                if ( is_active_sidebar('footer-sidebar-2') ):
                    dynamic_sidebar('footer-sidebar-2');
                else:
                    the_widget('WP_Widget_Text', 'title=' . __('Information', 'qi-theme') . '&text=<ul><li><a href="' . esc_url('#') . '" title="' . __('Pricing', 'qi-theme') . '">' . __('Pricing', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('Terms', 'qi-theme') . '">' . __('Terms', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('Affiliates', 'qi-theme') . '">' . __('Affiliates', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('Blog', 'qi-theme') . '">' . __('Blog', 'qi-theme') . '</a></li></ul>', $the_widget_args);
                endif;
                ?>
            </div><!--/.col-sm-3-->
            <div class="col-sm-3">
                <?php
                if ( is_active_sidebar('footer-sidebar-3') ):
                    dynamic_sidebar('footer-sidebar-3');
                else:
                    the_widget('WP_Widget_Text', 'title=' . __('Support', 'qi-theme') . '&text=<ul><li><a href="' . esc_url('#') . '" title="' . __('Documentation', 'qi-theme') . '">' . __('Documentation', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('FAQs', 'qi-theme') . '">' . __('FAQs', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('Forums', 'qi-theme') . '">' . __('Forums', 'qi-theme') . '</a></li><li><a href="' . esc_url('#') . '" title="' . __('Contact', 'qi-theme') . '">' . __('Contact', 'qi-theme') . '</a></li></ul>', $the_widget_args);
                endif;
                ?>
            </div><!--/.col-sm-3-->
            <div class="col-sm-3">
                <?php if ( $img_footer_logo ): ?>
                    <a href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"
                       class="footer-logo"><img src="<?php echo esc_url($img_footer_logo); ?>"
                                                alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                                                title="<?php echo esc_attr(get_bloginfo('name')); ?>"/></a>
                <?php endif; ?>
                <?php if ( $display_copyright == 1 ): ?>
                    <p class="copyright"><span
                                data-customizer="copyright-credit"><?php printf('%s <a href="%s" title="%s" target="_blank">%s</a>.', __('Theme:', 'qi-theme'), esc_url('http://colorlib.com/wp/themes/illdy'), __('qi-theme', 'qi-theme'), __('qi-theme', 'qi-theme')); ?></span> <?php echo illdy_sanitize_html($footer_copyright); ?>
                    </p>
                <?php else: ?>
                    <p class="copyright">© <?= __('All rights reserved - Qudsinfo.com', 'qi-theme') ?> <?= date("Y") ?></p>
                <?php endif; ?>
            </div><!--/.col-sm-3-->
        </div><!--/.row-->
    </div><!--/.container-->
<!--    <div class="green-m"></div>-->
</footer><!--/#footer-->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-78329806-1', 'auto');
    ga('require', 'linkid');
    //ga('set', 'userId', {{USER_ID}}); // Set the user ID using signed-in user_id.
    ga('send', 'pageview');

</script>
<?php wp_footer(); ?>
<?php if ( is_front_page() ) : ?>
    <script>
        (function ($) {
            $(document).ready(function () {
                $('.header-news-carousel').owlCarousel({
                    items: 1,
                    thumbs: false,
                    loop: true,
                    nav: true,
                    navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
                    dots: true,
                    rtl: <?= is_rtl() ? "true" : "false" ?>,
                    autoplay: true,
                    autoplayHoverPause: true
                });
                $('.infos-owl-carousel').owlCarousel({
                    loop: true,
                    nav: false,
                    autoHeight: true,
                    dots: true,
                    rtl: <?= is_rtl() ? "true" : "false" ?>,
                    margin: 15,
                    autoplay: true,
                    autoplayHoverPause: true,
                    responsive: {
                        // breakpoint from 0 up
                        0: {
                            items: 1
                        },
                        650: {
                            items: 2
                        },
                        900: {
                            items: 3
                        }
                    }
                });
            });
        })(jQuery);
    </script>
    <?php if ( ! wp_is_mobile() ) : ?>
        <script>
            var options = {
                stringsElement: "#to_type",
                typeSpeed: 40
            };

            var typed = new Typed(".iot-data span", options);
        </script>
    <?php endif; ?>
<?php endif; ?>

<?php if ( is_page_template('page-templates/lectures.php') ) : ?>
    <script>
        (function ($) {
            $(document).ready(function () {
                $('.lectures-carousel').owlCarousel({
                    items: 3,
                    loop: true,
                    nav: true,
                    navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
                    dots: false,
                    rtl: <?= is_rtl() ? "true" : "false" ?>,
                    autoplayHoverPause: true,
                    lazyLoad: true
                });
            });
        })(jQuery);
    </script>
<?php endif; ?>
<?php if ( is_singular("pics") ) : ?>
    <script>
        (function ($) {
            $(document).ready(function () {
                $('.pics-carousel').owlCarousel({
                    items: 1,
                    loop: false,
                    nav: true,
                    dots: false,
                    navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
                    rtl: <?= is_rtl() ? "true" : "false" ?>,
                    thumbs: true,
                    thumbsPrerendered: true
                });
            });
        })(jQuery);
    </script>
<?php endif; ?>
<?php if ( is_page_template('page-templates/audio.php') ) : ?>
    <script>
        (function ($) {
            $(document).ready(function () {
                $('.sound-carousel').owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
                    dots: true,
                    rtl: <?= is_rtl() ? "true" : "false" ?>,
                    autoplayHoverPause: true
                });
            });
        })(jQuery);
    </script>
<?php endif; ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-572a3fb987f33e31"></script>

</body>
</html>