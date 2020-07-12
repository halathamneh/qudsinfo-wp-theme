<template>
  <div class="wrap-content">
    <div class="d-flex justify-content-between mb-3">
      <iot-badge small />
      <small v-if="!loading" class="text-muted">
        <a :href="`/category/${infoOfToday.category.slug}`">
          {{ infoOfToday.category.label }}
        </a>
      </small>
    </div>
    <div v-if="loading" class="loader">Loading</div>
    <template v-else>
      <h4>
        <a :href="infoOfToday.url">{{ infoOfToday.title }}</a>
      </h4>
      <div>
        <small v-html="infoOfToday.content" />
      </div>
    </template>
  </div>
</template>

<script>
import getInfoOfToday from "../../../api/getInfoOfToday";
import IotBadge from "../../iot/IotBadge";

export default {
  name: "InfosSecondaryDropdown",
  components: { IotBadge },
  data: () => ({
    infoOfToday: null,
    loading: true,
  }),
  mounted() {
    getInfoOfToday().then((iot) => {
      this.infoOfToday = iot;
      this.loading = false;
    });
  },
};
</script>

<style scoped lang="scss">
.wrap-content {
  padding: 32px;
  width: 600px;
  min-height: 200px;
}
</style>
