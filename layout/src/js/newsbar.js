function newsbar() {
    const elem = document.querySelector("#news-bar .news-list");
    const width = elem.getBoundingClientRect().width;
    let rtl = false;
    if (document.body.classList.contains("rtl")) {
        rtl = true;
    }
    let currentPos = width;
    const maxTranslate = elem.scrollWidth;
    elem.style.willChange = "transform";
    elem.style.transform = rtl ? "translateX(-" + currentPos + "px)" : "translateX(" + currentPos + "px)";
    window.stopBar = false;
    elem.addEventListener("mouseenter", function () {
        window.stopBar = true;
    });
    elem.addEventListener("mouseleave", function () {
        window.stopBar = false;
    });

    function animLoop(render, element) {
        var running,
            lastFrame = +new Date();

        function loop(now) {
            requestAnimationFrame(loop);
            running = render(now - lastFrame);
            lastFrame = now;
        }

        loop(lastFrame);
    }

    animLoop(function (deltaT) {
        if (window.stopBar) return;
        currentPos += rtl ? 1.25 : -1.25;
        elem.style.transform = "translateX(" + currentPos + "px)";
        if ((rtl && currentPos >= maxTranslate) || (!rtl && currentPos <= (-1 * maxTranslate))) {
            currentPos = (rtl ? -1 : 1) * width;
        }
    });
}


if (document.querySelectorAll("#news-bar").length) {
    newsbar();
}