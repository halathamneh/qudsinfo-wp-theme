import Vue from "vue";
import VueI18n from "vue-i18n";
import arabic from "@/lang/ar-JO.js";
import english from "@/lang/en-US.js";
import { currentLang } from "./utils";

Vue.use(VueI18n);

const i18n = new VueI18n({
  locale: currentLang,
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

export default i18n;
