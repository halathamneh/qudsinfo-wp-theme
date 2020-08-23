import { isRtl } from "./functions";
import "bootstrap";
import "owl.carousel/dist/assets/owl.carousel.css";

if (document.querySelectorAll("data-fancybox").length > 0) {
  import(/* webpackChunkName: "common-vendors" */ "@fancyapps/fancybox").then(
    () => {
      $("[data-fancybox]").fancybox({
        loop: true,
        thumbs: {
          autoStart: false, // Display thumbnails on opening
          hideOnClose: true, // Hide thumbnail grid when closing animation starts
        },
        buttons: ["share", "download", "thumbs", "close"],
      });
    }
  );
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

$('[data-toggle="tooltip"]').tooltip();

if (document.querySelectorAll(".owl-carousel").length > 0) {
  import(/* webpackChunkName: "common-vendors" */ "owl.carousel").then(() => {
    import(
      /* webpackChunkName: "common-vendors" */ "owl.carousel2.thumbs"
    ).then(() => {
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
    });
  });
}

masonryInit();
