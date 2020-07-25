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

<?php //get_template_part('template-parts/user','utils'); ?>
<footer id="footer"></footer><!--/#footer-->
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
