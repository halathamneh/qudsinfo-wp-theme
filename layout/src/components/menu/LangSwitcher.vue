<template>
  <div class="lang-switcher">
    <a v-for="lang in otherLanguages" :href="langUrls[lang]" class="vsm-link">{{
      $t(lang)
    }}</a>
  </div>
</template>

<script>
import { langUrls, otherLanguages } from "../../lang/utils";

export default {
  name: "LangSwitcher",
  data: () => ({
    otherLanguages,
    langUrls,
  }),
};
</script>
