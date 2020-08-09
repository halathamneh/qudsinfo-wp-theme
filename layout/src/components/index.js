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

if (document.querySelector("footer#footer")) {
  new Vue({
    i18n,
    el: "footer#footer",
    render: (h) => h(Footer),
  });
}
