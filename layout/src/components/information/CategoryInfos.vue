<template>
  <div class="infos-list">
    <ul v-if="infos.length > 0">
      <li v-for="info in infos" :key="info.id">
        <div class="info-list-item">
          <div class="info-body">
            <h3 class="info-title">{{ info.title }}</h3>
            <div v-html="info.excerpt" class="info-text"></div>
            <b-button variant="light" size="sm" class="mt-3">{{
              $t("view info")
            }}</b-button>
          </div>
          <img :src="info.thumbnail" />
        </div>
      </li>
    </ul>
    <ul v-else>
      <li>
        <div class="info-list-item"><box-loader /></div>
      </li>
      <li>
        <div class="info-list-item"><box-loader /></div>
      </li>
      <li>
        <div class="info-list-item"><box-loader /></div>
      </li>
    </ul>
  </div>
</template>

<script>
import BoxLoader from "@/components/loaders/BoxLoader";
export default {
  name: "CategoryInfos",
  components: { BoxLoader },
  props: {
    infos: {
      type: Array,
      default() {
        return [];
      },
    },
  },
};
</script>

<style lang="scss" scoped></style>
