// Smooth Scroll Anchors
export function smoothScrollAnchors() {
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

// Set Color on Front Page Service
export function setColorOnFrontPageService() {
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

export function sticky_index() {
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