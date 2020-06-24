import { isRtl } from "./functions";
import "bootstrap";
import "@fancyapps/fancybox";
import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel";
import "jquery-countto";

function fancyboxInit() {
  $("[data-fancybox]").fancybox({
    loop: true,
    thumbs: {
      autoStart: false, // Display thumbnails on opening
      hideOnClose: true, // Hide thumbnail grid when closing animation starts
    },
    buttons: ["share", "download", "thumbs", "close"],
  });
}

export function masonryInit() {
  const container = document.querySelector(".masonry-grid");
  if (container) {
    new Masonry(container, {
      columnWidth: ".grid-sizer",
      percentPosition: true,
      itemSelector: ".grid-item",
      gutter: ".grid-gutter",
      isOriginLeft: false,
    });
  }
}

function counterNumber() {
  if ($("#counter .counter-number").length) {
    $("#counter .counter-number").countTo();
  }
}

$('[data-toggle="tooltip"]').tooltip();

$(".owl-carousel").owlCarousel({
  rtl: isRtl(),
  autoHeight: false,
  responsive: {
    // breakpoint from 0 up
    0: {
      items: 1,
    },
    // breakpoint from 480 up
    480: {
      items: 2,
    },
    // breakpoint from 768 up
    960: {
      items: 3,
    },
  },
});

if (typeof mixitup !== "undefined") {
  var elementMixitup = document.querySelector(".cats-container");
  var toggleDefault = elementMixitup.dataset.default;
  var mixer = mixitup(elementMixitup, {
    controls: {
      toggleDefault: toggleDefault,
    },
  });
  mixer.toggleOn(toggleDefault).then(function () {
    return mixer.toggleOff("all");
  });
}

fancyboxInit();
masonryInit();
counterNumber();
