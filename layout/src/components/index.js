import Vue from "vue";
import BootstrapVue from "bootstrap-vue";
import { Plugin } from "vue-fragment";
import Header from "./Header/Header";
import store from "../store";
import i18n from "../lang/i18n";

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
