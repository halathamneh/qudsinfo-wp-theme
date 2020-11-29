import Vue from "vue";
import { Plugin } from "vue-fragment";
import Header from "./Header/Header";
import Footer from "./footer/Footer";
import store from "../store";
import i18n from "../lang/i18n";
import VueMq from "vue-mq";
import "@/plugins/registerIcons";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import "vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css";
import PerfectScrollbar from "vue2-perfect-scrollbar";
import "@/plugins/String.format";

Vue.use(PerfectScrollbar);

Vue.use(VueMq, {
  breakpoints: {
    sm: 576,
    md: 768,
    lg: Infinity,
  },
});

Vue.use(Plugin);

if (document.querySelector("#header-component")) {
  new Vue({
    i18n,
    store,
    el: "#header-component",
    render: (h) => h(Header),
  });
}

if (document.querySelector("#homepage-sections-wrapper")) {
  import(/* webpackChunkName: "home-comps" */ "../pages/home").then(
    ({ default: HomePage }) =>
      new Vue({
        i18n,
        store,
        el: "#homepage-sections-wrapper",
        render: (h) => h(HomePage),
      })
  );
}

if (document.querySelector("#photos-page-wrapper")) {
  import(/* webpackChunkName: "photos-comps" */ "../pages/photos/init").then(
    ({ default: intiPhotosPage }) => {
      intiPhotosPage();
    }
  );
}

if (document.querySelector("#knowquds-page-wrapper")) {
  import(
    /* webpackChunkName: "knowquds-comps" */ "../pages/knowquds/index"
  ).then(({ default: initKnowQudsPage }) => {
    initKnowQudsPage();
  });
}

if (document.querySelector("#infos-list-page")) {
  import(/* webpackChunkName: "infos-comps" */ "../pages/information").then(
    ({ default: initInfosPage }) => {
      initInfosPage();
    }
  );
}

if (document.querySelector("footer#footer")) {
  new Vue({
    i18n,
    el: "footer#footer",
    render: (h) => h(Footer),
  });
}

const imageSliderEl = document.querySelector("#pics-image-slider");
if (imageSliderEl) {
  const data = JSON.parse(imageSliderEl.dataset["pics"]);
  import(/* webpackChunkName: "photos-comps" */ "./photos/PicsSlider").then(
    ({ default: PicsSlider }) =>
      new Vue({
        i18n,
        store,
        el: "#pics-image-slider",
        render: (h) => h(PicsSlider, { props: { picData: data } }),
      })
  );
}
