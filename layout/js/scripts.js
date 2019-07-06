/**
 *    jQuery Document Ready
 */
jQuery(document).ready(function ($) {
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    var documentWidth = $(document).width();
    var documentHeight = $(document).height();

    // If is IOS
    /*function isIsIOS() {
        $.browser.device = (/iphone|ipad|ipod/i.test(navigator.userAgent.toLowerCase()));
        if ($.browser.device == true) {
            $('#counter').css('background-attachment', 'scroll');
            $('#testimonials').css('background-attachment', 'scroll');
        }
    }*/

    // Smooth Scroll Anchors
    function smoothScrollAnchors() {
        $('a[href*="#"]:not([href="#"]):not([role="tab"]):not(.widget-faq-item-btn)').on('click', function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 56
                    }, 1000);
                    return false;
                }
            }
        });
    }

    // Open Responsive Menu
    function openResponsiveMenu() {
        $('.open-responsive-menu,.responsive-menu-overlay').click(function () {
            if (!$('.responsive-menu').hasClass('active')) {
                $('.responsive-menu').addClass('active');
                $('.open-responsive-menu .wrapper').addClass('change');
            } else {
                $('.responsive-menu').removeClass('active');
                $('.open-responsive-menu .wrapper').removeClass('change');
            }
        });
        $('.responsive-menu').find('li.has-sub').click(function (e) {
            e.preventDefault();
            //$(this).toggleClass('expanded');
            var $this = $(this);
            if ($(this).hasClass('expanded')) {
                $(this).find('.sub-menu').slideUp('fast', function () {
                    $this.removeClass('expanded');
                });
            } else {
                $(this).find('.sub-menu').slideDown('fast', function () {
                    $this.addClass('expanded');
                });
            }
        });
        $('.responsive-menu').find('li.has-sub li a').click(function (e) {
            e.stopPropagation();
        });
    }

    // Add Height To Front Page
    function addHeightToFrontPageProject() {
        var project = $('#projects .project');
        var projectWidth = $(project).width();

        $(project).css('height', projectWidth);
    }

    // Set Color on Front Page Service
    function setColorOnFrontPageService() {
        if ($('#services .section-content .service').length) {
            $('#services .section-content .service').each(function () {
                var service = $(this);
                var serviceIcon = $(service).children('.service-icon-w');
                var serviceTitle = $(service).children('.service-title');
                var dataServiceColor = $(service).data('service-color');

                $(serviceIcon).css('color', dataServiceColor);
                $(serviceTitle).css('color', dataServiceColor);
            });
        }
    }

    function sticky_menu() {
        var header = $('header#header');
        var wrap = $('header.sticky .top-header, .open-responsive-menu');
        var otd = $('#onthisday');
        var timer = null;
        $(window).on('scroll', function () {
            if (timer !== null) {
                clearTimeout(timer);
            }
            timer = setTimeout(function () {
                if ($(this).scrollTop() > 70) {
                    header.removeClass("page-start");
                    wrap.removeClass("transparent-nav");
                    otd.removeClass('notshown');
                } else {
                    header.addClass("page-start");
                    wrap.addClass("transparent-nav");
                    otd.addClass('notshown');
                }
            }, 150);
        });

    }

    function sticky_index() {
        if ($('.toc-widget').length) {
            var toc = $('.toc-widget');
            var offset = toc.offset().top - 56;

            if ($(window).width() < 768)
                $(window).on('scroll', function () {
                    if (timer !== null) {
                        clearTimeout(timer);
                    }
                    timer = setTimeout(function () {
                        if ($(window).scrollTop() > offset) {
                            toc.addClass('fixed');
                        } else {
                            toc.removeClass('fixed');
                        }
                    }, 150);
                });

            toc.on('click', '.widget-title', function () {
                toc.find('.widget-container').toggleClass('expanded');
            });
            toc.find('.toc-link').off();
            toc.on('click', '.toc-link', function (e) {
                e.preventDefault();
                offset = toc.hasClass('fixed') ? 56 : 0;
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        toc.find('.widget-container').removeClass('expanded');
                        $('html,body').animate({
                            scrollTop: target.offset().top - 56 - offset
                        }, 1000);
                        return false;
                    }
                }
            });
        }
    }

    // Align Sub Sub Menu
    function alignSubSubMenu() {
        if ($('#header .top-header .header-navigation ul li.menu-item-has-children').length) {
            var subSubMenu = $('#header .top-header .header-navigation ul li.menu-item-has-children ul');

            $(subSubMenu).each(function () {
                if ((windowWidth - $(this).offset()['left']) < 250) {
                    $(this).css('left', '-250px');
                }
            });
        }
    }


// Counter Number
    function counterNumber() {
        if ($('#counter .counter-number').length) {
            $('#counter .counter-number').countTo();
        }
    }

    function newsSort() {
        var $select = $('select[name="sort-by"]');
        $select.on('change', function () {
            var value = $(this).val();
            var url = '/qudsnews';
            if(value !== "all") {
                url += "?news-groups=" + value;
            }
            window.location.href = url;
        })
    }

    function newsbar() {
        const elem = document.querySelector('#news-bar .news-list');
        const width = elem.getBoundingClientRect().width;
        const maxMargin = -1 * elem.scrollWidth + width;
        elem.style.marginRight = width + "px";
        window.stopBar = false;
        elem.addEventListener('mouseenter', function () {
            window.stopBar = true;
        });
        elem.addEventListener('mouseleave', function () {
            window.stopBar = false;
        });
        setInterval(function () {
            if(window.stopBar) return;
            var newMargin = parseInt(elem.style.marginRight) - 1;
            elem.style.marginRight = newMargin + "px";
            if(newMargin <= maxMargin) {
                elem.style.marginRight = width + "px";
            } 
        }, 10)
    }

    // Called Functions
    $(function () {
        smoothScrollAnchors();
        openResponsiveMenu();
        addHeightToFrontPageProject();
        setColorOnFrontPageService();
        sticky_menu();
        sticky_index();
        // alignSubSubMenu();

        if(document.querySelectorAll('#news-bar').length) {
            newsbar();
        }

        if (otd_handler) {
            otd_handler.init();
        }

        masonryInit();
        fancyboxInit();
        if ($(".aqsa-distance").length)
            $(".aqsa-distance").show();
            $('#aqsa-distance-button').on('click', function () {
                getLocation()
            });

        $('[data-toggle="tooltip"]').tooltip();

        if (scripts_data.isFront)
            counterNumber();

        if($('select[name="sort-by"]').length)
            newsSort();
    });

    // Window Resize
    if (scripts_data.isFront)
        $(window).resize(function () {
            // Called Functions
            $(function () {
                addHeightToFrontPageProject();
            });
        });

    function find_page_number(element) {
        return parseInt(element.html());
    }

    $(document).on('click', '.info-list .paginate-links a', function (event) {
        var current_page = find_page_number($('.paginate-links span.current'));
        var $infolist = $('.info-list');
        event.preventDefault();
        var page;
        if ($(this).hasClass('prev'))
            page = current_page - 1;
        else if ($(this).hasClass('next'))
            page = current_page + 1;
        else
            page = find_page_number($(this).clone());
        var cat = parseInt($('.cats-list li.active a').data('catid'));
        var post_type;
        if ($infolist.hasClass('books')) {
            post_type = 'book';
        } else {
            post_type = 'post';
        }
        $.ajax({
            url: scripts_data.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_info',
                page: page,
                cat: cat,
                post_type: post_type
            },
            beforeSend: function () {
                $infolist.find('.content').remove();
                $('html, body').animate({
                    scrollTop: ($(".info-list").offset().top - 20)
                }, 200);
                $infolist.append('<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> يرجى الانتظار</div>');
            },
            success: function (data) {
                if (data != '') {
                    var _json = $.parseJSON(data);
                    history.pushState({"pageTitle": _json.title}, _json.title, _json.url);
                    $infolist.addClass('transit');
                    $infolist.find('#loader.content').remove();
                    $infolist.append('<div class="content">' + _json.html + '</div>');
                    masonryInit();
                    setTimeout(function () {
                        $infolist.removeClass('transit');
                    }, 300);
                }
            }
        });
    });

    $('.cats-list').on('click', 'li:not(.active) a', function (e) {
        e.preventDefault();

        // initialize vars
        var $infolist = $('.info-list');
        var $header = $('#header');
        var $this = $(this);
        var $current = $(this).closest("li");
        var cat_name = $this.find('.front-cat-name').text();
        var cat = parseInt($this.data('catid'));
        var titleOffset = $(".current-cat-name").offset();

        // if force redirect
        if ($this.data('override-redirect')) {
            window.location.href = $this.data('override-redirect');
            $('html, body').animate({
                scrollTop: titleOffset.top - 150
            }, 200);
            $infolist.append('<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> يرجى الانتظار</div>');
            return;
        }

        // set active items
        $('.cats-list li.active').removeClass('active');
        $current.addClass('active');
        if ($current.hasClass('child-cat'))
            $current.closest("li.parent").addClass('expanded');
        else if ($current.hasClass('parent'))
            $current.addClass('expanded');
        else
            $('.cats-list li.expanded').removeClass('expanded');


        // load category name in the heading of dropdown
        $('.cats-list button .selected-value').text(cat_name);

        // determine post type
        var post_type;
        if ($this.closest('.books').length) {
            post_type = 'book';
        } else {
            post_type = 'post';
        }

        // prepare ajax data
        var _data = {
            action: 'ajax_info',
            cat: cat,
            post_type: post_type
        };

        // send ajax request
        $.ajax({
            url: scripts_data.ajaxurl,
            type: 'post',
            data: _data,
            beforeSend: function () {
                $infolist.find('.content').remove();
                $('html, body').animate({
                    scrollTop: titleOffset.top - 150
                }, 200);
                $infolist.append('<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> يرجى الانتظار</div>');
                $header.removeAttr('data-image-src');
                $header.removeAttr('data-parallax');
            },
            success: function (data) {
                if (data != '' && data != 0) {
                    var _json = $.parseJSON(data);
                    history.pushState(_data, _json.title, _json.url);

                    console.log(_json.image || "no image");
                    if (_json.image && _json.image !== "")
                        $header.siblings('.parallax-mirror').find('img.parallax-slider')[0].src = _json.image;
                    else
                        $header.siblings('.parallax-mirror').find('img.parallax-slider')[0].src = "";
                    //$header.parallax({imageSrc: _json.image});

                    document.title = _json.title;
                    $(".top-page-title h2").text(_json.term_name);
                    $infolist.addClass('transit');
                    $infolist.find('#loader.content').remove();
                    $infolist.append('<div class="content">' + _json.html + '</div>');
                    masonryInit();
                    setTimeout(function () {
                        $infolist.removeClass('transit');
                    }, 300);
                }

            }
        });
    });

    window.onpopstate = function (event) {
        if (event.state != '' && event.state != 0) {
            var _data = event.state;
            console.log(JSON.stringify(_data));
            if (_data.action == 'ajax_info') {
                var $infolist = $('.info-list');
                $.ajax({
                    url: scripts_data.ajaxurl,
                    type: 'post',
                    data: _data,
                    beforeSend: function () {
                        $infolist.find('.content').remove();
                        $('html, body').animate({
                            scrollTop: ($(".info-list").offset().top - 20)
                        }, 200);
                        $infolist.append('<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> يرجى الانتظار</div>');

                    },
                    success: function (data) {
                        if (data != '' && data != 0) {
                            var _json = $.parseJSON(data);
                            history.pushState(_data, _json.title, _json.url);
                            document.title = _json.title;
                            $(".top-page-title h2").text(_json.term_name);
                            $infolist.addClass('transit');
                            $infolist.find('#loader.content').remove();
                            $infolist.append('<div class="content">' + _json.html + '</div>');
                            masonryInit();
                            setTimeout(function () {
                                $infolist.removeClass('transit');
                            }, 300);
                        }


                    }
                });
            }
        }
    };

    /*function fixInfoWidth() {
        if (!$('body').hasClass("home")) {
            $(document).ready(function () {
                __fixInfoWidth();
            });
            $(window).resize(function () {
                __fixInfoWidth();
            });
        }
    }

    function __fixInfoWidth() {
        var $post = $(".dynamic-size");
        var width = $post.css("width");
        $post.css("height", width);
    }*/

    function masonryInit() {
        if ($('.masonry-grid').length) {
            var container = document.querySelector('.masonry-grid');
            var msnry = new Masonry(container, {
                columnWidth: '.grid-sizer',
                percentPosition: true,
                itemSelector: '.grid-item',
                gutter: '.grid-gutter',
                isOriginLeft: false
            });
        }
    }

    function fancyboxInit() {
        $("[data-fancybox]").fancybox({
            loop: true,
            thumbs: {
                autoStart: false,   // Display thumbnails on opening
                hideOnClose: true     // Hide thumbnail grid when closing animation starts
            },
            buttons: [
                "share",
                "download",
                "thumbs",
                "close"
            ]
        });
    }

    //var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showDistance, showError);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function showDistance(position) {
        var _data = {
            action: "ajax_distance",
            lat: position.coords.latitude,
            lon: position.coords.longitude,
        };
        var distance_section = $('.aqsa-distance');
        $.post({
            url: scripts_data.ajaxurl,
            data: _data,
            success: function (data) {
                if (data !== -1) {
                    var distance = Math.round(parseInt(data) * 100) / 100;

                    if (distance > 0) {
                        distance_section.find('.section-content').text(distance + " كيلو متر");
                        distance_section.find('span').hide();
                        distance_section.find('.section-content').show();
                        distance_section.slideDown();
                    }
                }
            }
        });
    }

    function distance_fallback(msg) {
        var distance_section = $('.aqsa-distance');
        distance_section.find('span').text(msg);
        distance_section.find('span').show();
        distance_section.find('.section-content').hide();
        distance_section.slideDown();
    }

    function showError(error) {
        var msg;
        switch (error.code) {
            case error.PERMISSION_DENIED:
                msg = scripts_data.lang['aqsa_distance.permission'];
                distance_fallback(msg);
                break;
            case error.POSITION_UNAVAILABLE:
                msg = scripts_data.lang['aqsa_distance.enable_gps'];
                distance_fallback(msg);
                break;
            case error.TIMEOUT:
                msg = scripts_data.lang['aqsa_distance.error'];
                distance_fallback(msg);
                break;
            case error.UNKNOWN_ERROR:
            default:
                msg = scripts_data.lang['aqsa_distance.error'];
                distance_fallback(msg);
                break;
        }
    }


    var $faq = $('.faq-item');
    if ($faq.length) {
        $faq.on('show.bs.collapse', function () {
            $(this).addClass('expanded');
        });
        $faq.on('hide.bs.collapse', function () {
            $(this).removeClass('expanded');
        });
    }

    if (typeof mixitup !== "undefined") {
        var elementMixitup = document.querySelector('.cats-container');
        var toggleDefault = elementMixitup.dataset.default;
        var mixer = mixitup(elementMixitup, {
            controls: {
                toggleDefault: toggleDefault
            }
        });
        mixer.toggleOn(toggleDefault)
            .then(function() {
                return mixer.toggleOff('all')
            })
    }
});