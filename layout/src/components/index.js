import Vue from "vue";
import VueI18n from "vue-i18n";
import BootstrapVue from "bootstrap-vue";
import InfoOfToday from "./iot/InfoOfToday";
import OnThisDay from "./on-this-day/OnThisDay";
import arabic from "@/lang/ar-JO.js";
import english from "@/lang/en-US.js";

Vue.use(VueI18n);
Vue.use(BootstrapVue);

const i18n = new VueI18n({
  locale: scripts_data.langCode,
  dateTimeFormats: {
    ar: {
      short: { month: "long", day: "numeric" },
    },
    en: {
      short: { month: "long", day: "numeric" },
    },
  },
  messages: {
    ar: arabic,
    en: english,
  },
});

if (document.querySelector("#info-of-today")) {
  new Vue({
    i18n,
    el: "#info-of-today",
    components: { InfoOfToday },
    render: (h) => h(InfoOfToday),
  });
}

if (document.querySelector("#on-this-day")) {
  new Vue({
    i18n,
    el: "#on-this-day",
    components: { OnThisDay },
    render: (h) => h(OnThisDay),
  });
}
