import Vue from "vue";
import BootstrapVue from "bootstrap-vue";
import { Plugin } from "vue-fragment";
import Header from "./Header/Header";
import Footer from "./footer/Footer";
import store from "../store";
import i18n from "../lang/i18n";
import VueMq from "vue-mq";

Vue.use(VueMq, {
  breakpoints: {
    sm: 576,
    md: 768,
    lg: Infinity,
  },
});

Vue.use(Plugin);
Vue.use(BootstrapVue);

if (document.querySelector("#header-component")) {
  new Vue({
    i18n,
    store,
    el: "#header-component",
    render: (h) => h(Header),
  });
}

if (document.querySelector("#info-of-today")) {
  import(/* webpackChunkName: "home-comps" */ "./iot/InfoOfToday").then(
    ({ default: InfoOfToday }) =>
      new Vue({
        i18n,
        store,
        el: "#info-of-today",
        render: (h) => h(InfoOfToday),
      })
  );
}

if (document.querySelector("#on-this-day")) {
  import(/* webpackChunkName: "home-comps" */ "./on-this-day/OnThisDay").then(
    ({ default: OnThisDay }) =>
      new Vue({
        i18n,
        el: "#on-this-day",
        render: (h) => h(OnThisDay),
      })
  );
}

if (document.querySelector("#aqsa-distance-section")) {
  import(
    /* webpackChunkName: "home-comps" */ "./aqsa-distance/AqsaDistanceSection"
  ).then(
    ({ default: AqsaDistanceSection }) =>
      new Vue({
        i18n,
        el: "#aqsa-distance-section",
        render: (h) => h(AqsaDistanceSection),
      })
  );
}

if (document.querySelector("#services-section")) {
  import(
    /* webpackChunkName: "home-comps" */ "./Services/ServicesSection"
  ).then(
    ({ default: ServicesSection }) =>
      new Vue({
        i18n,
        el: "#services-section",
        render: (h) => h(ServicesSection),
      })
  );
}

if (document.querySelector("#teams-section")) {
  import(
    /* webpackChunkName: "home-comps" */ "./Teams/TeamsSlideshowSection"
  ).then(
    ({ default: TeamsSlideshowSection }) =>
      new Vue({
        i18n,
        el: "#teams-section",
        render: (h) => h(TeamsSlideshowSection),
      })
  );
}

if (document.querySelector("footer#footer")) {
  new Vue({
    i18n,
    el: "footer#footer",
    render: (h) => h(Footer),
  });
}
