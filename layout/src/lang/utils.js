export const DEFAULT_LANG = "ar";

export const langs = ["ar", "en"];

export const currentLang =
  window.scripts_data && window.scripts_data.langCode
    ? window.scripts_data.langCode
    : DEFAULT_LANG;

export const otherLanguages = langs.filter((l) => l !== currentLang);

let urls = {
  ar: "/",
  en: "/en",
};

if (window.scripts_data && window.scripts_data.translationUrls) {
  urls = { ...window.scripts_data.translationUrls };
}

export const langUrls = urls;
