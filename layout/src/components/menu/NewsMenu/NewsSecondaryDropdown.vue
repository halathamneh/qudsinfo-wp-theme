<template>
  <div class="news-secondary-menu">
    <div v-if="loading" class="loader">Loading</div>
    <vue-horizontal-list v-else :items="news" :options="options">
      <template v-slot:default="{ item }">
        <div class="d-flex justify-content-between">
          <div class="ml-3">
            <h4>
              <a :href="item.url">{{ item.title }}</a>
            </h4>
            <small v-html="item.excerpt" />
          </div>
          <img :src="item.thumbnail" alt="" />
        </div>
      </template>
    </vue-horizontal-list>
  </div>
</template>

<script>
import VueHorizontalList from "vue-horizontal-list";
import { getLatestNews } from "../../../api/news";

export default {
  name: "NewsSecondaryDropdown",
  components: { VueHorizontalList },
  data: () => ({
    news: null,
    loading: true,
    options: {
      responsive: [{ size: 1 }],
    },
  }),
  mounted() {
    getLatestNews().then((news) => {
      this.news = news;
      this.loading = false;
    });
  },
};
</script>

<style lang="scss">
.news-secondary-menu {
  padding: 32px 64px;
  width: 600px;
  min-height: 200px;
  .vhl-navigation {
    width: 52px !important;
    height: auto !important;
    margin: 0 !important;
    top: -16px !important;
    left: -32px !important;
    flex-direction: row-reverse !important;

    .vhl-btn-left,
    .vhl-btn-right {
      width: 24px !important;
      height: 24px !important;
      margin: 0 !important;
    }
    .vhl-btn-left {
      margin-right: auto !important;
    }
    .vhl-btn-right {
      margin-left: auto !important;
    }
  }
}
</style>
